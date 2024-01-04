<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use App\Models\Pelanggan;
use App\Models\DaftarPaket;
use App\Models\PaketWisata;
use app\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OperatorController extends Controller
{
    public function index()
    {
            $reservasi = Reservasi::all();
            return view('operator.index', [
                'reservasi' => $reservasi
            ]);
        }

    public function store(Request $request)
    {
        //Menyimpan reservasi 
       $array = $request->only([
        'id_pelanggan',
        'id_daftar_paket',
        'tgl_reservasi_wisata',
        'harga',
        'jumlah_peserta',
        'diskon',
        'nilai_diskon',
        'total_bayar',
        'status_reservasi_wisata'
       ]);
    //    $array['file_bukti_tf'] = $request->file('file_bukti_tf')->store('Bukti Transfer');
    //    $tambah = Reservasi::create($array);
    //    if ($tambah) $request->file('file_bukti_tf')->store('Bukti Transfer');
    //     return redirect()->route('operator.index')
    //         ->with('success_message', 'Berhasil mengubah profile reservasi');
    }

    public function edit($id)
    {
        //Menampilkan Form Edit
        $reservasi = Reservasi::find($id);
        if (!$reservasi) return redirect()->route('operator.index')
            ->with('error_message', 'reservasi reservasi dengan id = ' . $id . ' tidak ditemukan');
        return view('operator.edit', [
            'reservasi' => $reservasi,
            'users' => User::all(),
            'daftar_paket' => DaftarPaket::all(),
             'pelanggan' => Pelanggan::all()
        ]);
    }

    public function update(Request $request, $id)
    {
          $request->validate([
            'tgl_reservasi_wisata' => 'required',
            'harga' => 'required',
            'jumlah_peserta' => 'required',
            'diskon' => 'required',
            'nilai_diskon' => 'required',
            'total_bayar' => 'required',
            'status_reservasi_wisata' => 'required'
        ]);
        $reservasi = Reservasi::find($id);
        // $reservasi->id_pelanggan = $request->id_pelanggan;
        // $reservasi->id_daftar_paket = $request->id_daftar_paket;
        $reservasi->tgl_reservasi_wisata = $request->tgl_reservasi_wisata;
        $reservasi->harga = $request->harga;
        $reservasi->jumlah_peserta = $request->jumlah_peserta;
        $reservasi->diskon = $request->diskon;
        $reservasi->nilai_diskon = $request->nilai_diskon;
        $reservasi->total_bayar = $request->total_bayar;
    //    if($request->file('file_bukti_tf')) {
    //      $reservasi['file_bukti_tf'] = $request->file('file_bukti_tf')->store('Bukti Transfer');
    //    }
       $reservasi->status_reservasi_wisata = $request->status_reservasi_wisata;

       $reservasi->save();
       return redirect()->route('operator.index')->with('success_message', 'Berhasil menambah reservasi baru');
    }
    
    public function destroy(Request $request, $id)
{
    // Menghapus
    $reservasi = Reservasi::find($id);
    if ($reservasi) {
        $hapus = $reservasi->delete();
        if ($hapus) unlink("storage/" . $reservasi->file_bukti_tf);
    }
    return redirect()->route('operator.index')
        ->with('success_message', 'Berhasil menghapus Paket Wisata');
}

}





