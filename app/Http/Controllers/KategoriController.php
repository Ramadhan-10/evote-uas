<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();
        return view('admin.kategori.index', compact('kategoris'));
    }
    public function create(){
        return view('admin.kategori.create');
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $kategoris = new Kategori();

        $kategoris->name = $request->name;

        $kategoris->save();

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori created successfully.');
    }
    public function edit($id)
    {
        $kategoris = Kategori::findOrFail($id); // Cari kandidat berdasarkan ID, gagal jika tidak ditemukan
        return view('admin.kategori.edit', compact('kategoris')); // Tampilkan view edit dengan data kandidat
    }
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $kategoris = Kategori::findOrFail($id);

        $kategoris->name = $request->name;

        $kategoris->save();

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori created successfully.');
    }
    public function destroy($id)
    {
        $kategoris = Kategori::find($id);
        if ($kategoris) {
            $kategoris->delete();
            return redirect()->route('admin.kategori.index')->with('success', 'Kategori successfully deleted.');
        }
        return back()->with('error', 'Kategori not found.');
    }
}
