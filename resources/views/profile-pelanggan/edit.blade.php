@extends('adminlte::page')
@section('title', 'Edit profile pelanggan')
@section('content_header')
<h1 class="m-0 text-dark">Edit profile</h1>
@stop
@section('content')
<form action="{{route('profile-pelanggan.update', $pelanggan)}}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_pelanggan">Nama</label>
                        <input type="text" class="form-control
@error('nama_pelanggan') is-invalid @enderror" id="nama_pelanggan" placeholder="Nama lengkap" name="nama_pelanggan" value="{{$pelanggan->nama_pelanggan ?? old('nama_pelanggan')}}">
                        @error('nama_pelanggan') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="no_hp">No Telepon</label>
                        <input type="number" class="form-control
@error('no_hp') is-invalid @enderror" id="no_hp" placeholder="Masukkan
No Telepon/HP" name="no_hp" value="{{$pelanggan->no_hp ?? old('no_hp')}}">
                        @error('no_hp') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="foto" class="formlabel">Foto</label>
                        <img src="/vendor/adminlte/dist/img/no-image.png" class="imgthumbnail d-block" name="tampil" alt="..." width="15%" id="tampil">
                        <input class="form-control @error('foto') isinvalid @enderror" type="file" id="foto" name="foto">
                        @error('foto') <span class="text-danger">{{$message}}</span> @enderror
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea rows="5" class="form-control
@error('alamat') is-invalid @enderror" id="alamat" name="alamat">{{$pelanggan->alamat ?? old('alamat')}}</textarea>
                        @error('alamat') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="id_user">Users</label>
                        <div class="input-group">
                            <input type="hidden" name="id_user" id="id_user" value="{{$pelanggan->users->id ?? old('id_user')}}">
                            <input type="text" class="form-control @error('users') is-invalid @enderror" placeholder="Users" id="users" name="users" value="{{$pelanggan->users->email ?? old('email')}}" aria-label="Users" ariadescribedby="cari" readonly>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <link rel="stylesheet" href="/css/app.css">
                    <button type="submit" class="btn btn-peach">Simpan</button>
                    <a href="{{route('profile-pelanggan.index')}}" class="btn
btn-danger">
                        Batal
                    </a>
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
            //$('#hasil').show();
        });
    </script>
    @endpush