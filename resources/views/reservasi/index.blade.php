@extends('adminlte::page')
@section('title', 'List Pemesanan')
@section('content_header')
<h1 class="m-0 text-dark">Pemesanan</h1>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card overflow-scroll">
            <div class="card-body pe-4">
                <link rel="stylesheet" href="/css/app.css">
                <a href="{{route('reservasi.create')}}" class="btn btn-peach mb-2">
                    Tambah
                </a>
                <table class="table table-hover table-bordered table-stripped" id="example2">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Pelanggan</th>
                            <th>Paket</th>
                            <th>Tanggal reservasi</th>
                            <th>Harga</th>
                            <th>Jumlah Peserta</th>
                            <th>Diskon</th>
                            <th>Nilai Diskon</th>
                            <th>Total Bayar</th>
                            <th>Bukti TF</th>
                            <th>Status</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $key => $res)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td id={{$key+1}}>{{$res->pelanggan->nama_pelanggan}}</td>
                            <td id={{$key+1}}>{{$res->daftar_paket->nama_paket}}</td>
                            <td>{{$res->tgl_reservasi_wisata}}</td>
                            <td>Rp. {{number_format($res->harga)}}</td>
                            <td>{{$res->jumlah_peserta}}</td>
                            <td>{{$res->diskon}} %</td>
                            <td>Rp. {{number_format($res->nilai_diskon)}}</td>
                            <td>Rp. {{number_format($res->total_bayar)}}</td>
                            <td>
                                <img src="storage/{{$res->file_bukti_tf}}" alt="{{$res->file_bukti_tf}} tidak tampil" class="img-thumbnail">

                            </td>
                            <td>{{$res->status_reservasi_wisata}}</td>
                            <td>
                                <a href="{{route('reservasi.edit', $res)}}" class="btn btn-peach btn-xs">
                                    Bayar
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop
@push('js')
<form action="" id="delete-form" method="post">
    @method('delete')
    @csrf
</form>
<script>
    $('#example2').reser$reservasiTable({
        "responsive": true,
    });

    function notificationBeforeDelete(event, el, dt) {
        event.preventDefault();
        if (confirm('Apakah anda yakin akan menghapus reser$reservasi reservasi \"' +
                document.getElementById(dt).innerHTML + '\" ?')) {
            $("#delete-form").attr('action', $(el).attr('href'));
            $("#delete-form").submit();
        }
    }
</script>
@endpush