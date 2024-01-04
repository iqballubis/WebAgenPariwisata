<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
     public function index()
    {
        $karyawan = Karyawan::all();
        return view('karyawan.index', [
            'karyawan' => $karyawan
        ]);
    }

    public function create()
    {
        //Menampilkan Form Tambah Mata Pelajaran
        return view(
            'karyawan.create',
            [
                'users' => User::all()   //Mengirimkan semua data bidang studi ke Modal pada halaman create
            ]
        );
    }
    public function store(Request $request)
    {
        //Menyimpan Data karyawan
        $request->validate([
            'nama_karyawan' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'jabatan' => 'required',
            'id_user' => 'required'
        ]);
        $array = $request->only([
            'nama_karyawan',
            'alamat',
            'no_hp',
            'jabatan',
            'id_user'
        ]);

        $tambah = Karyawan::create($array);
        return redirect()->route('karyawan.index')->with('success_message', 'Berhasil menambah karyawan baru');
    }

     public function destroy(Request $request, $id)
    {
        //Menghapus User
        $karyawan = Karyawan::find($id);
        if ($id == $request->karyawan()->id) return redirect()->route('karyawan.index')
            ->with('error_message', 'Anda tidak dapat menghapus diri sendiri.');
        if ($karyawan) $karyawan->delete();
        return redirect()->route('karyawan.index')
            ->with('success_message', 'Berhasil menghapus Karyawan');
    }
     public function edit($id)
    {
        //Menampilkan Form Edit
        $karyawan = Karyawan::find($id);
        if (!$karyawan) return redirect()->route('karyawan.index')
            ->with('error_message', 'Data karyawan dengan id = ' . $id . ' tidak ditemukan');
        return view('karyawan.edit', [
            'karyawan' => $karyawan,
            'users' => User::all() //Mengirimkan semua data bidang studi ke Modal pada halaman edit
        ]);
    }

    public function update(Request $request, $id)
    {
        //Mengedit Data Bidang Studi
        $request->validate([
            'nama_karyawan' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'jabatan' => 'required',
        ]);
        $karyawan = Karyawan::find($id);
        $karyawan->nama_karyawan = $request->nama_karyawan;
        $karyawan->alamat = $request->alamat;
        $karyawan->no_hp = $request->no_hp;
        $karyawan->jabatan = $request->jabatan;
        $karyawan->id_user = $request->id_user;
        $karyawan->save();
        return redirect()->route('karyawan.index')->with('success_message', 'Berhasil mengubah karyawan');
    }
}
