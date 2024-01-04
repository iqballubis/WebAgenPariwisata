@extends('adminlte::page')
@section('title', 'Tambah Reservasi')
@section('content_header')
<h1 class="m-0 text-dark">Tambah Reservasi</h1>
@stop
@section('content')
<form action="{{route('reservasi.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <input type="hidden" class="form-control
@error('id_pelanggan') is-invalid @enderror" id="id_pelanggan" placeholder="Nama Pelanggan" name="id_pelanggan" value="{{Auth::user()->pelanggan->id }}">
                        @error('id_pelanggan') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_daftar_paket">Nama Paket</label>
                        <div class="input-group">
                            <input type="hidden" name="id_daftar_paket" id="id_daftar_paket" value="{{old('id_daftar_paket')}}">
                            <input type="text" class="form-control @error('daftar_paket') is-invalid @enderror" placeholder="Pilih Paket" id="daftar_paket" name="daftar_paket" value="{{old('daftar_paket')}}" arialabel="daftar_paket" aria-describedby="cari" readonly>
                            <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari" data-bs-target="#staticBackdrop">
                                Cari Paket Anda
                            </button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tgl_reservasi_wisata">Tanggal Pemesanan</label>
                       <input type="datetime-local" class="form-control @error('tgl_reservasi_wisata') is-invalid @enderror" id="tgl_reservasi_wisata" placeholder="Tanggal Pemesanan" name="tgl_reservasi_wisata" value="{{ isset($formattedDateTime) ? $formattedDateTime : '' }}"  readonly>
                        @error('tgl_reservasi_wisata') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <!-- <div class="form-group">
                        <label for="tgl_reservasi_wisata">Tanggal Pemesanan</label>
                        <input type="datetime-local" class="form-control @error('tgl_reservasi_wisata') is-invalid @enderror" id="tgl_reservasi_wisata" placeholder="Tanggal Pemesanan" name="tgl_reservasi_wisata" value="{{old('tgl_reservasi_wisata')}}">
                        @error('tgl_reservasi_wisata') <span class="text-danger">{{$message}}</span> @enderror
                    </div> -->
                    <div class="form-group">
                        <label for="jumlah_peserta">Jumlah Pesrta</label>
                        <input type="number" class="form-control @error('jumlah_peserta') is-invalid @enderror" id="jumlah_peserta" placeholder="Pilihlah nama paket" name="jumlah_peserta" value="{{old('jumlah_peserta')}}" readonly onchange="decontamination()">
                        @error('jumlah_peserta') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="harga">Harga </label>
                        <input type="number" class="form-control
@error('harga') is-invalid @enderror" id="harga" placeholder="Masukan Harga Paket" name="harga" value="{{old('harga')}}" readonly onchange="decontamination()">
                        @error('harga') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div>
                        <label>Diskon</label>
                        <input type="number" class="form-control @error('diskon') is-invalid @enderror" id="diskon" placeholder="Pilihlah nama paket" name="diskon" value="{{old('diskon')}}" readonly onchange="decontamination()">
                        <!-- <input type="number" class="form-control" step="0.01" min="0.00" max="999999.99" name="diskon" required> -->
                        @error('diskon') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="nilai_diskon">Nilai Diskon</label>
                        <input type="number" class="form-control" step="0.01" min="0.00" max="99999999.99" name="nilai_diskon" required id="nilai_diskon" readonly>
                        @error('nilai_diskon') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="total_bayar">Total Bayar</label>
                        <input type="number" class="form-control" step="0.01" min="0.00" max="99999999.99" name="total_bayar" required id="total_bayar" readonly>
                        @error('total_bayar') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <link rel="stylesheet" href="/css/app.css">
                    <button type="submit" class="btn btn-peach">Simpan</button>
                    <a href="{{route('reservasi.index')}}" class="btn btn-danger">
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
                            <td>{{number_format($daftar_paket->jumlah_peserta)}}</td>
                            <td>Rp. {{number_format($daftar_paket->harga_paket)}}</td>
                            <td>{{$daftar_paket->paket_wisata->diskon}} %</td>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script>
    setInterval(function() {
        var currentDatetime = moment().format("YYYY-MM-DDTHH:mm");
        document.getElementById("tgl_reservasi_wisata").value = currentDatetime;
    }, 1000); // Memperbarui setiap 1 detik (1000 ms)
</script>
@endpush