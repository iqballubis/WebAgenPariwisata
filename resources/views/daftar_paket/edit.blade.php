@extends('adminlte::page')
@section('title', 'Edit Daftar Paket')
@section('content_header')
<h1 class="m-0 text-dark">Edit Daftar Paket</h1>
@stop
@section('content')
<form action="{{route('daftar_paket.update', $daftar_paket)}}" method="post">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                     <link rel="stylesheet" href="/css/app.css">
                    <div class="form-group">
                        <label for="nama_paket">Nama Paket</label>
                        <input type="text" class="form-control
@error('nama_paket') is-invalid @enderror" id="nama_paket" placeholder="Tulis
Nama Paket" name="nama_paket" value="{{$daftar_paket->nama_paket??old('nama_paket')}}">
                        @error('nama_paket') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                      <div class="form-group">
                        <label for="id_paket_wisata">Paket Wisata</label>
                        <div class="input-group">
                            <input type="hidden" name="id_paket_wisata" id="id_paket_wisata" value="{{$daftar_paket->paket_wisata->id ?? old('id_paket_wisata')}}">
                            <input type="text" class="form-control @error('paket_wisata') is-invalid @enderror" placeholder="Pilih Paket Wisata" id="paket_wisata" name="paket_wisata" value="{{$daftar_paket->paket_wisata->email ?? old('email')}}" aria-label="paket_wisata" ariadescribedby="cari" readonly>
                            <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari" data-bs-target="#staticBackdrop"></i>
                                Cari Data paket_wisata</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_peserta">Jumlah Peserta</label>
                        <input type="number" class="form-control
@error('jumlah_peserta') is-invalid @enderror" id="jumlah_peserta" placeholder="Masukan Jumlah Peserta" name="jumlah_peserta" value="{{$daftar_paket->jumlah_peserta ??old('jumlah_peserta')}}">
                        @error('jumlah_peserta') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="harga_paket">Harga Paket</label>
                        <input type="number" class="form-control
@error('harga_paket') is-invalid @enderror" id="harga_paket" placeholder="Masukan Harga Paket" name="harga_paket" value="{{$daftar_paket->harga_paket ??old('harga_paket')}}">
                        @error('harga_paket') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                <div class="card-footer">
                    <link rel="stylesheet" href="/css/app.css">
                    <button type="submit" class="btn btn-peach">Simpan</button>
                    <a href="{{route('daftar_paket.index')}}" class="btn btn-danger">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Pencarian Data paket_wisata</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-hover table-bordered tablestripped" id="example2">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Paket</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($paket_wisata as $key => $paket_wisata)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$paket_wisata->nama_paket}}</td>
                                            <td>
                                                <button type="button" class="btn btn-peach
btn-xs" onclick="pilih('{{$paket_wisata->id}}', '{{$paket_wisata->nama_paket}}', )" data-bs-dismiss="modal">
                                                    Pilih
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Modal -->
                @stop
                @push('js')
                <script>
                    $('#example2').DataTable({
                        "responsive": true,
                    });


                    function pilih(id, paket_wisata) {
                        document.getElementById('id_paket_wisata').value = id
                        document.getElementById('paket_wisata').value = paket_wisata
                    }
                </script>
                @endpush