@extends('adminlte::page')
@section('title', 'Validasi Pembayaran')
@section('content_header')
<h1 class="m-0 text-dark">Validasi Pembayaran</h1>
@stop
@section('content')
<form action="{{route('operator.update', $reservasi)}}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_pelanggan">Nama Pelanggan</label>
                        <div class="input-group">
                            <input type="hidden" name="id_pelanggan" id="id_pelanggan" value="{{old('id_pelanggan')}}">
                            <input type="text" class="form-control
@error('id_pelanggan') is-invalid @enderror" id="id_pelanggan" placeholder="Nama paket" name="id_pelanggan" value="{{$reservasi->pelanggan->nama_pelanggan??old('id_pelanggan')}}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="id_daftar_paket">Nama Paket</label>
                        <div class="input-group">
                            <input type="hidden" name="id_daftar_paket" id="id_daftar_paket" value="{{old('id_daftar_paket')}}">
                            <input type="text" class="form-control
@error('id_daftar_paket') is-invalid @enderror" id="id_daftar_paket" placeholder="Nama paket" name="id_daftar_paket" value="{{$reservasi->daftar_paket->nama_paket??old('id_daftar_paket')}}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tgl_reservasi_wisata">Tanggal Pemesanan</label>
                        <input type="datetime-local" class="form-control
@error('tgl_reservasi_wisata') is-invalid @enderror" id="tgl_reservasi_wisata" placeholder="Nama
reservasi" name="tgl_reservasi_wisata" value="{{$reservasi->tgl_reservasi_wisata??old('tgl_reservasi_wisata')}}" readonly>
                        @error('tgl_reservasi_wisata') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga </label>
                        <input type="number" class="form-control
@error('harga') is-invalid @enderror" id="harga" placeholder="Nama
reservasi" name="harga" value="{{$reservasi->harga??old('harga')}}" readonly onchange="decontamination()">
                        @error('harga') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="jumlah_peserta">Jumlah Pesrta</label>
                        <input type="number" class="form-control
@error('jumlah_peserta') is-invalid @enderror" id="jumlah_peserta" placeholder="Nama
reservasi" name="jumlah_peserta" value="{{$reservasi->jumlah_peserta??old('jumlah_peserta')}}" readonly onchange="decontamination()">
                        @error('jumlah_peserta') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div>
                        <label>Diskon</label>
                        <input type="number" class="form-control
@error('diskon') is-invalid @enderror" id="diskon" placeholder="Nama
reservasi" name="diskon" value="{{$reservasi->diskon??old('diskon
')}}" readonly onchange="decontamination()">
                        <!-- <input type="number" class="form-control" step="0.01" min="0.00" max="999999.99" name="diskon" required> -->
                        @error('diskon') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="nilai_diskon">Nilai Diskon</label>
                        <input type="number" class="form-control" step="0.01" min="0.00" max="99999999.99" name="nilai_diskon" required id="nilai_diskon" value="{{$reservasi->nilai_diskon??old('nilai_diskon')}}" readonly>
                        @error('nilai_diskon') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="total_bayar">Total Bayar</label>
                        <input type="number" class="form-control" step="0.01" min="0.00" max="99999999.99" name="total_bayar" required id="total_bayar" value="{{$reservasi->total_bayar??old('total_bayar')}}" readonly>
                        @error('total_bayar') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <label for="status_reservasi_wisata">Status</label>
                    <select class="form-select @error('status_reservasi_wisata') isinvalid @enderror" id="status_reservasi_wisata" name="status_reservasi_wisata">
                        <option value="pesan" @if($reservasi->status_reservasi_wisata == 'pesan' ||
                            old('status_reservasi_wisata') == 'pesan')selected @endif>Pesan</option>
                        <option value="dibayar" @if($reservasi->status_reservasi_wisata == 'dibayar' ||
                            old('status_reservasi_wisata') == 'dibayar')selected @endif>Dibayar</option>
                        <option value="selesai" @if($reservasi->status_reservasi_wisata == 'selesai' ||
                            old('status_reservasi_wisata') == 'selesai')selected @endif>Selesai</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <link rel="stylesheet" href="/css/app.css">
            <button type="submit" class="btn btn-peach">Simpan</button>
            <a href="{{route('paket_wisata.index')}}" class="btn btn-danger">
                Batal
        </div>
    </div>
    </div>
    </div>
    @stop
    @push('js')
    <script>
        $('#example2').DataTable({
            "responsive": true,
        });
    </script>