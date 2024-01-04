<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use App\Models\Pelanggan;
use App\Models\DaftarPaket;
use App\Models\PaketWisata;
use app\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ReservasiController extends Controller
{
    public function index(){
        if (Auth::user()->pelanggan) {
            $reservasi = Reservasi::where('id_pelanggan', Auth::user()->pelanggan->id)->get();
        } else {
            $reservasi = Reservasi::get();
        }
        
        return view('reservasi.index', [
            'data' => $reservasi,
            'paket_wisata' => PaketWisata::get(),
            'pelanggan' => Pelanggan::get()
        ]);
    }

    public function create()
    {
            $now = Carbon::now('Asia/Jakarta');
            $formattedDateTime = $now->format('Y-m-d\TH:i');
        //Menampilkan Form Tambah 
        return view(
            'reservasi.create',
            [
                'pelanggan' => Pelanggan::all(),
                'paket_wisata' => PaketWisata::all(),
                'daftar_paket' => DaftarPaket::all(),
                'now' => $now, // Tambahkan variabel $now ke dalam array
                'formattedDateTime' => $formattedDateTime // Tambahkan variabel $formattedDateTime ke dalam array
            ]
        );
    }

    public function store(Request $request)
    {
    //Menyimpan Data 
    $request->validate([
    'id_pelanggan' =>'required',
    'id_daftar_paket'=> 'required',
    'tgl_reservasi_wisata'=> 'required',
    'harga' => 'required',
    'jumlah_peserta'=> 'required',
    'diskon'=> 'required',
    'nilai_diskon'=> 'required',
    'total_bayar'=> 'required',
    'status_reservasi_wisata'=> 'pesan',
    'file_bukti_tf' => 'null.png',
    ]);
    $array = $request->only([
    'id_pelanggan', 'id_daftar_paket', 'tgl_reservasi_wisata', 'harga', 'jumlah_peserta', 'diskon', 'nilai_diskon', 'total_bayar', 'status_reservasi_wisata'
    ]);
    $tambah = Reservasi::create($array);
    return redirect()->route('reservasi.index')->with('success_message', 'Terimakasih telah melakukan reservasi ');
    }
    
    public function edit($id)
    {
        //Menampilkan Form Edit
        $reservasi = reservasi::find($id);
        if (!$reservasi) return redirect()->route('reservasi.index')
            ->with('error_message', 'Data reservasi dengan id = ' . $id . ' tidak ditemukan');
        return view('reservasi.edit', [
            'reservasi' => $reservasi,
            'users' => User::all(),
            'paket_wisata' =>PaketWisata::all(),
             'daftar_paket' => DaftarPaket::all()
        ]);
    }

    public function update(Request $request, $id)
    {
          $request->validate([
           'file_bukti_tf' => $request->file('file_bukti_tf') != null ? 'image|file|max:2048' : '',
        ]);
        $reservasi = Reservasi::find($id);
        $reservasi->file_bukti_tf = $request->file('file_bukti_tf')->store('File Bukti Transaksi');
        $reservasi->save();
        return redirect()->route('reservasi.index')->with('success_message', 'Pembayaran Mu Telah Diperoses Silahkan Tunggu');
    }


}