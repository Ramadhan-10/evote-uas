<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vote;
use App\Models\Paslon;
use App\Models\Kategori;
use Illuminate\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): View
    {

       
        return view('voter.home');
    } 
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome(): View
    {
         // Count the total number of paslons
         $totalPaslons = Paslon::count();

         // Count the total number of voters
         // Adjust this according to how you track voters; this example assumes voters are users
         $totalVoters = User::count();
 
         // Count the total number of votes
         $totalVotes = Vote::count();
 
         // Get data for the pie chart (this is a simple example; adjust according to your needs)
         $votesData = Paslon::withCount('votes')
                            ->get()
                            ->map(function ($paslon) {
                                return [
                                    'name' => $paslon->name,
                                    'votes' => $paslon->votes_count
                                ];
                            });

        $categories = Kategori::with(['paslons.votes'])->get();

        $categoriesData = $categories->map(function ($kategori) {
            $totalVotes = $kategori->paslons->sum(function ($paslon) {
                return $paslon->votes->count();
            });

            return [
                'kategori' => $kategori->name,
                'paslons' => $kategori->paslons->map(function ($paslon) use ($totalVotes) {
                    return [
                        'name' => $paslon->name,
                        'votes' => $paslon->votes->count(),
                        'percentage' => $totalVotes > 0 ? round(($paslon->votes->count() / $totalVotes) * 100, 2) : 0
                    ];
                })
            ];
        });
        return view('admin.home', compact('totalPaslons', 'totalVoters', 'totalVotes', 'votesData', 'categoriesData'));
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function managerHome(): View
    {
        return view('managerHome');
    }
}
