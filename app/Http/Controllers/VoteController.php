<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use App\Models\Paslon;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class VoteController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::with('paslons')->get();
        $userVotes = Vote::where('user_id', auth()->id())->get()->groupBy('paslon.kategori_id');

        return view('voter.vote', compact('kategoris', 'userVotes'));
    }

    public function store(Request $request)
    {
        $paslon = Paslon::findOrFail($request->paslon_id);

        $voteExists = Vote::where('user_id', auth()->id())
                          ->whereHas('paslon', function ($query) use ($paslon) {
                              $query->where('kategori_id', $paslon->kategori_id);
                          })
                          ->exists();

        if ($voteExists) {
            return redirect()->back()->with('error', 'You have already voted in this Kategori.');
        }

        Vote::create([
            'user_id' => auth()->id(),
            'paslon_id' => $request->paslon_id,
        ]);

        return redirect()->route('voter.vote')->with('success', 'Your vote has been cast.');
    }
    
    public function show($id)
    {
        $paslons = Paslon::findOrFail($id); // Cari kandidat berdasarkan ID, gagal jika tidak ditemukan
        return view('voter.show', compact('paslons')); // Tampilkan view edit dengan data kandidat
    }

    public function results(Request $request)
    {
        $selectedKategoriId = $request->get('kategori_id');
        $kategoris = Kategori::all();

        $selectedKategori = null;
        if ($selectedKategoriId) {
            $selectedKategori = Kategori::with(['paslons' => function ($query) {
                $query->withCount('votes');
            }])->find($selectedKategoriId);
        }

        return view('hasil', compact('kategoris', 'selectedKategori', 'selectedKategoriId'));
    }

    public function resultsPdf(Request $request)
    {
        $selectedKategoriId = $request->get('kategori_id');
        $kategoris = Kategori::all();

        $selectedKategori = null;
        if ($selectedKategoriId) {
            $selectedKategori = Kategori::with(['paslons' => function ($query) {
                $query->withCount('votes');
            }])->find($selectedKategoriId);
        }

        $pdf = Pdf::loadView('hasilpdf', compact('kategoris', 'selectedKategori', 'selectedKategoriId'));
        return $pdf->download('hasil_voting.pdf');
    }
    public function allResultsPdf()
    {
        $kategoris = Kategori::with(['paslons' => function ($query) {
            $query->withCount('votes');
        }])->get();

        $pdf = Pdf::loadView('all_results_pdf', compact('kategoris'));
        return $pdf->download('hasil_voting_semua_kategori.pdf');
    }
}
