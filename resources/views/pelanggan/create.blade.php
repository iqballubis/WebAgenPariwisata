@extends('adminlte::page')
@section('title', 'Tambah pelanggan')
@section('content_header')
<h1 class="m-0 text-dark">Tambah pelanggan</h1>
@stop
@section('content')
<form action="{{route('pelanggan.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                     <link rel="stylesheet" href="/css/app.css">
                    <div class="form-group">
                       <div class="form-group">
                            <label for="id_pelanggan">Nama pelanggan</label>
                            <input type="text" class="form-control
@error('id_pelanggan') is-invalid @enderror" id="id_pelanggan" placeholder="Nama pelanggan" name="id_pelanggan" value="{{old('id_pelanggan')}}">
                            @error('id_pelanggan') <span class="textdanger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="no_hp">Nomer Telepon</label>
                            <input type="number" class="form-control
@error('no_hp') is-invalid @enderror" id="no_hp" placeholder="Nomer Telepon" name="no_hp" value="{{old('no_hp')}}">
                            @error('no_hp') <span class="textdanger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea type="text" class="form-control" name="alamat">{{old('alamat')}}</textarea>
                            @error('alamat') <span class="textdanger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                        <label for="foto" class="form-label">Foto</label>
                        <img src="/vendor/adminlte/dist/img/no-image.png" class="img-thumbnail d-block" name="tampil" alt="..." width="10%" id="tampil">
                        <input class="form-control @error('foto') isinvalid @enderror" type="file" id="foto" name="foto" value="{{old('foto')}}">
                        @error('foto1') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                        <div class="form-group">
                            <label for="id_user">Users</label>
                            <div class="input-group">
                                <input type="hidden" name="id_user" id="id_user" value="{{old('id_user')}}">
                                <input type="text" class="form-control
@error('users') is-invalid @enderror" placeholder="Users" id="users" name="users" value="{{old('users')}}" arialabel="users" aria-describedby="cari" readonly>
                                <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari" data-bs-target="#staticBackdrop"></i>
                                    Cari Data Users</button>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-peach">Simpan</button>
                                <a href="{{route('pelanggan.index')}}" class="btn btn-default">
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
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Pencarian Data Users</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-hover table-bordered tablestripped" id="example2">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Email</th>
                                            <th>Aktif</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $key => $user)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->aktif}}</td>
                                            <td>
                                                <button type="button" class="btn btn-peach
btn-xs" onclick="pilih('{{$user->id}}', '{{$user->email}}', )" data-bs-dismiss="modal">
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


                    function pilih(id, user) {
                        document.getElementById('id_user').value = id
                        document.getElementById('users').value = user
                    }

                    function readURL(input) {
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();
                            reader.onload = function(e) {
                                $('#tampil').attr('src', e.target.result);
                            }
                            reader.readAsDataURL(input.files[0]);
                        }
                    }
                    $("#foto").change(function() {
                        readURL(this);
                    });
                </script>
                @endpush