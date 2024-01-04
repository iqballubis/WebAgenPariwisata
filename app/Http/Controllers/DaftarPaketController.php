<?php

namespace App\Http\Controllers;

use App\Models\PaketWisata;
use App\Models\DaftarPaket;
use Illuminate\Http\Request;

class DaftarPaketController extends Controller
{
     public function index()
    {
        $daftar_paket = DaftarPaket::all();
        return view('daftar_paket.index', [
            'daftar_paket' => $daftar_paket
        ]);
    }

    public function create()
    {
        //Menampilkan Form Tambah Mata Pelajaran
        return view(
            'daftar_paket.create',
            [
                'paket_wisata' => PaketWisata::all()   //Mengirimkan semua data bidang studi ke Modal pada halaman create
            ]
        );
    }
    public function store(Request $request)
    {
        //Menyimpan Data daftar_paket
        $request->validate([
            'nama_paket' => 'required',
            'id_paket_wisata' => 'required',
            'jumlah_peserta' => 'required',
            'harga_paket' => 'required'
        ]);
        $array = $request->only([
            'nama_paket',
            'id_paket_wisata',
            'jumlah_peserta',
            'harga_paket'
        ]);

        $tambah = DaftarPaket::create($array);
        return redirect()->route('daftar_paket.index')->with('success_message', 'Berhasil menambah daftar_paket baru');
    }

   public function destroy(Request $request, $id)
    {
        //Menghapus daftar_paket
        $daftar_paket = DaftarPaket::find($id);
        if ($daftar_paket) {
            $hapus = $daftar_paket->delete();
            if ($hapus) unlink("storage/" . $daftar_paket->foto);
        }
        return redirect()->route('daftar_paket.index')->with('success_message', 'Berhasil menghapus daftar_paket "' . $daftar_paket->name . '" !');
    }

     public function edit($id)
    {
        //Menampilkan Form Edit
        $daftar_paket = DaftarPaket::find($id);
        if (!$daftar_paket) return redirect()->route('daftar_paket.index')
            ->with('error_message', 'Data daftar_paket dengan id = ' . $id . ' tidak ditemukan');
        return view('daftar_paket.edit', [
            'daftar_paket' => $daftar_paket,
            'paket_wisata' => PaketWisata::all() //Mengirimkan semua data bidang studi ke Modal pada halaman edit
        ]);
    }

    public function update(Request $request, $id)
    {
        //Mengedit Data Bidang Studi
        $request->validate([
            'nama_paket' => 'required',
            'id_paket_wisata' => 'required',
            'jumlah_peserta' => 'required',
            'harga_paket' => 'required'
        ]);
        $daftar_paket = DaftarPaket::find($id);
        $daftar_paket->nama_paket = $request->nama_paket;
        $daftar_paket->id_paket_wisata = $request->id_paket_wisata;
        $daftar_paket->jumlah_peserta = $request->jumlah_peserta;
        $daftar_paket->harga_paket = $request->harga_paket;
        $daftar_paket->save();
        return redirect()->route('daftar_paket.index')->with('success_message', 'Berhasil mengubah daftar_paket');
    }
}
