@extends('adminlte::page')
@section('title', 'Edit Reservasi')
@section('content_header')
<h1 class="m-0 text-dark">Edit Reservasi</h1>
@stop
@section('content')
<form action="{{route('reservasi.update', $reservasi)}}" method="post" enctype="multipart/form-data">
      @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_daftar_paket">Nama Paket</label>
                        <div class="input-group">
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
                    <div class="form-group">
                        <label for="file_bukti_tf" class="form-label">Bukti TF</label>
                        <input class="form-control @error('file_bukti_tf') isinvalid @enderror" type="file" id="file_bukti_tf" name="file_bukti_tf" value="{{old('file_bukti_tf')}}">
                        @error('file_bukti_tf') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <link rel="stylesheet" href="/css/app.css">
                    <button type="submit" class="btn btn-peach">Simpan</button>
                    <a href="{{route('reservasi.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Pencarian Data Paket</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-hover table-bordered tablestripped" id="example2">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Paket</th>
                            <th>Jumlah Peserta</th>
                            <th>Harga Paket</th>
                            <th>Diskon</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($daftar_paket as $key => $daftar_paket)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$daftar_paket->nama_paket}}</td>
                            <td>{{$daftar_paket->jumlah_peserta}}</td>
                            <td>{{$daftar_paket->harga_paket}}</td>
                            <td>{{$daftar_paket->paket_wisata->diskon}}</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-xs" onclick="pilih('{{$daftar_paket->id}}', '{{$daftar_paket->nama_paket}}', '{{$daftar_paket->harga_paket}}', '{{$daftar_paket->jumlah_peserta}}', '{{$daftar_paket->paket_wisata->diskon}}'); decontamination();" data-bs-dismiss="modal">
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

    function pilih(id_daftar_paket, daftar_paket, harga_paket, jumlah_peserta, diskon) {
        document.getElementById('id_daftar_paket').value = id_daftar_paket
        document.getElementById('daftar_paket').value = daftar_paket
        document.getElementById('harga').value = harga_paket
        document.getElementById('jumlah_peserta').value = jumlah_peserta
        document.getElementById('diskon').value = diskon
    }
</script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#tampil').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#file_bukti_tf").change(function() {
        readURL(this);
    });
</script>
<script>
    function decontamination() {
        let harga = document.getElementById('harga').value;
        let diskon = document.getElementById('diskon').value;
        let peserta = document.getElementById('jumlah_peserta').value;

        nd = diskon / 100;
        hargat = harga * nd;
        total = harga - hargat;
        // total = harga * peserta - hargat ;
        document.getElementById('nilai_diskon').value = hargat;
        document.getElementById('total_bayar').value = total;
    }
</script>
@endpush