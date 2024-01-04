<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfilePelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Menampilkan profile pelanggan
        $pelanggan = Pelanggan::where('id_user', Auth::user()->id)->first();
        return view('profile-pelanggan.index', ['pelanggan' => $pelanggan]);
    }

    public function edit(string $id)
    {
        //Menampilkan Form Edit pelanggan
        $pelanggan = Pelanggan::find($id);
        if (!$pelanggan) return redirect()->route('profile-pelanggan.index')->with('error_message', 'pelanggan dengan id = ' . $id . ' tidak ditemukan');
        return view('profile-pelanggan.edit', [
            'pelanggan' => $pelanggan,
            'users' => User::all() //Mengirimkan semua data bidang studi ke Modal pada halaman edit
        ]);
    }

    public function update(Request $request, $id)
    {
        //Mengedit Data pelangganp
        $request->validate([
            'nama_pelanggan' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            // 'foto' => 'required',
            'foto' => $request->file('foto') != null ? 'image|file|max:2048' : '',
            'id_user' => 'required'
        ]);

        $pelanggan = Pelanggan::find($id);
        $pelanggan->nama_pelanggan = $request->nama_pelanggan;
        $pelanggan->no_hp = $request->no_hp;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->foto = $request->file('foto')->store('Foto Pelanggan');
        $pelanggan->id_user = $request->id_user;
        if ($request->file('foto') != null) {
            unlink("storage/" . $pelanggan->foto);
            $pelanggan->foto = $request->file('foto')->store('Foto pelanggan');
        }
        $pelanggan->save();
        return redirect()->route('profile-pelanggan.index')
            ->with('success_message', 'Berhasil mengubah profile pelanggan');
    }

    /**
     * Update the specified resource in storage

     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        // Menghapus profil pelanggan
        $pelanggan = Pelanggan::where('id_user', Auth::user()->id)->first();
        if (!$pelanggan) {
            return redirect()->route('profile-pelanggan.index')
                ->with('error_message', 'Profil pelanggan tidak ditemukan');
        }

        if ($pelanggan->foto != 'no-image.png') {
            unlink("storage/" . $pelanggan->foto);
        }

        $pelanggan->delete();

        return redirect()->route('home')
            ->with('success_message', 'Profil pelanggan berhasil dihapus');
    }
}
