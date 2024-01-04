@extends('adminlte::page')
@section('title', 'List Pemesanan')
@section('content_header')
<h1 class="m-0 text-dark">List Pemesanan</h1>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card overflow-scroll">
            <div class="card-body pe-3">
                <link rel="stylesheet" href="/css/app.css">
                <table class="table table-hover table-bordered table-stripped" id="example2">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Pelanggan</th>
                            <th>Paket</th>
                            <th>Tanggal Reservasi</th>
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
                        @foreach($reservasi as $key => $reservasi)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td id={{$key+1}}>{{$reservasi->pelanggan->nama_pelanggan}}</td>
                            <td id={{$key+1}}>{{$reservasi->daftar_paket->nama_paket}}</td>
                            <td>{{$reservasi->tgl_reservasi_wisata}}</td>
                            <td>Rp. {{$reservasi->harga}}</td>
                            <td>{{$reservasi->jumlah_peserta}}</td>
                            <td>{{$reservasi->diskon}} %</td>
                            <td>Rp. {{$reservasi->nilai_diskon}}</td>
                            <td>Rp. {{$reservasi->total_bayar}}</td>
                            <td>
                                <img src="storage/{{$reservasi->file_bukti_tf}}" alt="{{$reservasi->file_bukti_tf}} tidak tampil" class="img-thumbnail">

                            </td>
                            <td>{{$reservasi->status_reservasi_wisata}}</td>
                            <td>
                                <a href="{{route('operator.edit',
$reservasi)}}" class="btn btn-peach btn-xs">
                                    edit
                                </a>
                                <a href="{{route('operator.destroy',
$reservasi)}}" onclick="notificationBeforeDelete(event, this, <?php echo
                                                            $key + 1; ?>)" class="btn btn-danger btn-xs">
                                    Delete
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