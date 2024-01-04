@extends('adminlte::page')
@section('title', 'Edit pelanggan')
@section('content_header')
<h1 class="m-0 text-dark">Edit pelanggan</h1>
@stop
@section('content')
<form action="{{route('pelanggan.update', $pelanggan)}}" method="post">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                     <link rel="stylesheet" href="/css/app.css">
                    <div class="form-group">
                        <label for="nama_pelanggan">Nama pelanggan</label>
                        <input type="text" class="form-control
@error('nama_pelanggan') is-invalid @enderror" id="nama_pelanggan" placeholder="Nama
pelanggan" name="nama_pelanggan" value="{{$pelanggan->nama_pelanggan??old('nama_pelanggan')}}">
                        @error('nama_pelanggan') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="no_hp">No Telepon/HP</label>
                        <input type="number" class="form-control
@error('no_hp') is-invalid @enderror" id="no_hp" placeholder="No
Telepon/HP" name="no_hp" value="{{$pelanggan->no_hp ??old('no_hp')}}">
                        @error('no_hp') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea rows="5" class="form-control
@error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{$pelanggan->alamat ??old('alamat')}}"></textarea>
                        @error('alamat') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="foto" class="form-label">Foto</label>
                        <img src="/vendor/adminlte/dist/img/no-image.png" class="img-thumbnail d-block" name="tampil" alt="..." width="10%" id="tampil">
                        <input class="form-control @error('foto') is-invalid @enderror" type="file" id="foto" name="foto" value="{{$pelanggan->foto ?? old('foto')}}>
                        @error('foto') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="id_user">Users</label>
                        <div class="input-group">
                            <input type="hidden" name="id_user" id="id_user" value="{{$pelanggan->users->id ?? old('id_user')}}">
                            <input type="text" class="form-control @error('users') is-invalid @enderror" placeholder="Users" id="users" name="users" value="{{$pelanggan->users->email ?? old('email')}}" aria-label="Users" ariadescribedby="cari" readonly>
                            <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari" data-bs-target="#staticBackdrop"></i>
                                Cari Data Users</button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="aktif">Aktif</label>
                        <select class="form-control @error('aktif') is-invalid @enderror" id="aktif" name="aktif">
                            <option value="1" @if($pelanggan->aktif == '1'
                                || old('aktif') == '1')selected @endif>Ya</option>
                            <option value="0" @if($pelanggan->aktif == '0' ||
                                old('aktif') == '0')selected @endif>Tidak</option>
                        </select>
                        @error('jabatan') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
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
    </div>
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

        function readURL1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#tampil').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#foto").change(function() {
            readURL1(this);
        });
    </script>
    @endpush