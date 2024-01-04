@extends('adminlte::page')
@section('title', 'List Paket Wisata')
@section('content_header')
<h1 class="m-0 text-dark">List Paket Wisata</h1>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card overflow-scroll">
            <div class="card-body pe-3">
                <link rel="stylesheet" href="/css/app.css">
                <a href="{{route('paket_wisata.create')}}" class="btn btn-peach mb-2">
                    Tambah
                </a>
                <table class="table table-hover table-bordered table-stripped" id="example2">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Paket</th>
                            <th>Deskripsi</th>
                            <th>Fasilitas</th>
                            <th>Itinerary</th>
                            <th>Diskon</th>
                            <th>Foto 1</th>
                            <th>Foto 2</th>
                            <th>Foto 3</th>
                            <th>Foto 4</th>
                            <th>Foto 5</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($paket_wisata as $key => $data)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td id={{$key+1}}>{{$data->nama_paket}}</td>
                            <td>{{$data->deskripsi}}</td>
                            <td>{{$data->fasilitas}}</td>
                            <td>{{$data->itinerary}}</td>
                            <td>{{$data->diskon}}</td>
                            <td>
                                <img src="storage/{{$data->foto1}}" alt="{{$data->foto1}} tidak tampil" class="img-thumbnail">
                            </td>
                             <td>
                                <img src="storage/{{$data->foto2}}" alt="{{$data->foto2}} tidak tampil" class="img-thumbnail">
                            </td>
                             <td>
                                <img src="storage/{{$data->foto3}}" alt="{{$data->foto3}} tidak tampil" class="img-thumbnail">
                            </td>
                             <td>
                                <img src="storage/{{$data->foto4}}" alt="{{$data->foto4}} tidak tampil" class="img-thumbnail">
                            </td>
                             <td>
                                <img src="storage/{{$data->foto5}}" alt="{{$data->foto5}} tidak tampil" class="img-thumbnail">
                            </td>
                            <td>
                                <a href="{{route('paket_wisata.edit', $data)}}" class="btn btn-peach btn-xs">
                                    Edit
                                </a>
                                <a href="{{route('paket_wisata.destroy', $data)}}" onclick="notificationBeforeDelete(event, this, <?php echo
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
    $('#example2').DataTable({
        "responsive": true,
    });

    function notificationBeforeDelete(event, el, dt) {
        event.preventDefault();
        if (confirm('Apakah anda yakin akan menghapus data paket_wisata$paket_wisata \"' +
                document.getElementById(dt).innerHTML + '\" ?')) {
            $("#delete-form").attr('action', $(el).attr('href'));
            $("#delete-form").submit();
        }
    }
</script>
@endpush