<?php

namespace App\Http\Controllers;

use App\Models\Paslon;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PaslonController extends Controller
{
    public function index()
    {
        $paslons = Paslon::all();
        $kategoris = Kategori::all();

        return view('admin.paslon.index', compact('paslons', 'kategoris'));
    }
    public function create(){
        $kategoris = Kategori::all();
        return view('admin.paslon.create', compact('kategoris'));
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi untuk foto
            'kategori_id' => 'required|exists:kategoris,id' // Validasi untuk kategori_id
        ]);

        $paslons = new Paslon();

        $paslons->name = $request->name;
        $paslons->description = $request->description;
        $paslons->kategori_id = $request->kategori_id;

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('public/images/');
            $paslons->photo = basename($path);
        }


        $paslons->save();

        return redirect()->route('admin.paslon.create')->with('success', 'Paslon created successfully.');
    }

    public function edit($id)
    {
        $kategoris = Kategori::all();
        $paslons = Paslon::findOrFail($id); // Cari kandidat berdasarkan ID, gagal jika tidak ditemukan
        return view('admin.paslon.edit', compact('paslons','kategoris')); // Tampilkan view edit dengan data kandidat
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kategori_id' => 'required|exists:kategoris,id'
        ]);

        $paslons = Paslon::findOrFail($id);

        $paslons->name = $request->name;
        $paslons->description = $request->description;
        $paslons->kategori_id = $request->kategori_id;

        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($paslons->photo && Storage::exists('public/images/' . $paslons->photo)) {
                Storage::delete('public/images/' . $paslons->photo);
            }

            // Simpan foto baru
            $path = $request->file('photo')->store('public/images');
            $paslons->photo = basename($path);
        }

        $paslons->save();

        return redirect()->route('admin.paslon.index')->with('success', 'paslon updated successfully.');
    }
    public function show($id)
    {
        $paslons = Paslon::findOrFail($id); // Cari kandidat berdasarkan ID, gagal jika tidak ditemukan
        return view('admin.paslon.show', compact('paslons')); // Tampilkan view edit dengan data kandidat
    }
    public function destroy($id)
    {
        $paslons = Paslon::find($id);
        if ($paslons) {
            $paslons->delete();
            return redirect()->route('admin.paslon.index')->with('success', 'paslon successfully deleted.');
        }
        return back()->with('error', 'Candidate not found.');
    }
}
