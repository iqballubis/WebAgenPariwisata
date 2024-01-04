<?php

namespace App\Http\Controllers;

use App\Models\PaketWisata;
use Illuminate\Http\Request;

class PaketWisataController extends Controller
{
    public function index()
    {
        $paket_wisata = PaketWisata::all();
        return view('paket_wisata.index', [
            'paket_wisata' => $paket_wisata
        ]);
    }

    public function create()
    {
        return view('paket_wisata.create');
    }

    public function store(Request $request)
    {
        //Menyimpan Data paketwisata
        $request->validate([
            'nama_paket' => 'required|unique:paket_wisata,nama_paket',
            'deskripsi' => 'required',
            'fasilitas' => 'required',
            'itinerary' => 'required',
            'diskon' => 'required',
            'foto1' => 'required|image|file|max:2048',
            'foto2' => 'required|image|file|max:2048',
            'foto3' => 'required|image|file|max:2048',
            'foto4' => 'required|image|file|max:2048',
            'foto5' => 'required|image|file|max:2048'
        ]);
        $array = $request->only([
            'nama_paket',
            'deskripsi',
            'fasilitas',
            'itinerary',
            'diskon'
        ]);
        $array['foto1'] = $request->file('foto1')->store('Foto Wisata');
        $array['foto2'] = $request->file('foto2')->store('Foto Wisata');
        $array['foto3'] = $request->file('foto3')->store('Foto Wisata');
        $array['foto4'] = $request->file('foto4')->store('Foto Wisata');
        $array['foto5'] = $request->file('foto5')->store('Foto Wisata');
        $tambah = PaketWisata::create($array);
        if ($tambah) $request->file('foto1')->store('Foto Wisata');
        return redirect()->route('paket_wisata.index')->with('success_message', 'Berhasil menambah Paket Wisata');
        if ($tambah) $request->file('foto2')->store('Foto Wisata');
        return redirect()->route('paket_wisata.index')->with('success_message', 'Berhasil menambah Paket Wisata');
        if ($tambah) $request->file('foto3')->store('Foto Wisata');
        return redirect()->route('paket_wisata.index')->with('success_message', 'Berhasil menambah Paket Wisata');
        if ($tambah) $request->file('foto4')->store('Foto Wisata');
        return redirect()->route('paket_wisata.index')->with('success_message', 'Berhasil menambah Paket Wisata');
        if ($tambah) $request->file('foto5')->store('Foto Wisata');
        return redirect()->route('paket_wisata.index')->with('success_message', 'Berhasil menambah Paket Wisata');
    }

    public function edit($id)
    {
        //Menampilkan Form Edit
        $paket_wisata = PaketWisata::find($id);
        if (!$paket_wisata) return redirect()->route('paket_wisata.index')->with('error_message', 'paket_wisata dengan id' . $id . ' tidak ditemukan');
        return view('paket_wisata.edit', [
            'paket_wisata' => $paket_wisata
        ]);
    }

    public function destroy(Request $request, $id)
    {
        //Delete
        $paket_wisata = PaketWisata::find($id);
        if ($paket_wisata) {
            $hapus = $paket_wisata->delete();
            if ($hapus) unlink("storage/" . $paket_wisata->foto1);
            if ($hapus) unlink("storage/" . $paket_wisata->foto2);
            if ($hapus) unlink("storage/" . $paket_wisata->foto3);
            if ($hapus) unlink("storage/" . $paket_wisata->foto4);
            if ($hapus) unlink("storage/" . $paket_wisata->foto5);
        }
        return redirect()->route('paket_wisata.index')->with('success_message', 'Berhasil menghapus Paket Wisata ');
    }

    public function update(Request $request, $id)
    {
        //Mengedit Data Standar Kompetensi
        $request->validate([
            'nama_paket' => 'required|unique:paket_wisata,nama_paket,' . $id,
            'deskripsi' => 'required',
            'fasilitas' => 'required',
            'itinerary' => 'required',
            'diskon' => 'required'
        ]);
        $paket_wisata = PaketWisata::find($id);
        $paket_wisata->nama_paket = $request->nama_paket;
        $paket_wisata->deskripsi = $request->deskripsi;
        $paket_wisata->fasilitas = $request->fasilitas;
        $paket_wisata->itinerary = $request->itinerary;
        $paket_wisata->diskon = $request->diskon;
        $paket_wisata->foto1 = $request->file('foto1')->store('Foto Paket');
        $paket_wisata->foto2 = $request->file('foto2')->store('Foto Paket');
        $paket_wisata->foto3 = $request->file('foto3')->store('Foto Paket');
        $paket_wisata->foto4 = $request->file('foto4')->store('Foto Paket');
        $paket_wisata->foto5 = $request->file('foto5')->store('Foto Paket');
        $paket_wisata->save();
        return redirect()->route('paket_wisata.index')->with('success_message', 'Berhasil mengubah Paket Wisata');
    }
}
