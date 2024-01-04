@extends('adminlte::page')
@section('title', 'List pelanggan')
@section('content_header')
<h1 class="m-0 text-dark">List pelanggan</h1>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card overflow-scroll">
            <div class="card-body pe-3">
                 <link rel="stylesheet" href="/css/app.css">
                <a href="{{route('pelanggan.create')}}" class="btn btn-peach mb-2">
                    Tambah
                </a>
                <table class="table table-hover table-bordered table-stripped" id="example2">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama pelanggan</th>
                            <th>No Telpon</th>
                            <th>Alamat</th>
                            <th>Foto</th>
                            <th>Id User</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pelanggan as $key => $data)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td id={{$key+1}}>{{$data->nama_pelanggan}}</td>
                            <td>{{$data->no_hp}}</td>
                            <td>{{$data->alamat}}</td>
                            <td>
                                <img src="storage/{{$data->foto}}" alt="{{$data->foto}}" class="img-thumbnail">
                            </td>
                            <td id={{$key+1}}>{{$data->users->email}}</td>
                            <td>
                                <a href="{{route('pelanggan.edit',$data)}}" class="btn btn-peach btn-xs">
                                    Edit
                                </a>
                                <a href="{{route('pelanggan.destroy',$data)}}" onclick="notificationBeforeDelete(event, this, <?php echo $key + 1; ?>)" class="btn btn-danger btn-xs">
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
        if (confirm('Apakah anda yakin akan menghapus data pelanggan \"' +
                document.getElementById(dt).innerHTML + '\" ?')) {
            $("#delete-form").attr('action', $(el).attr('href'));
            $("#delete-form").submit();
        }
    }
</script>
@endpush

