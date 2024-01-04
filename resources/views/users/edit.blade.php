@extends('adminlte::page')
@section('title', 'Edit user')
@section('content_header')
<h1 class="m-0 text-dark">Edit user</h1>
@stop
@section('content')
<form action="{{route('users.update', $users)}}" method="post">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                     <link rel="stylesheet" href="/css/app.css">
                    <div class="form-group">
                        <label for="email">Email
                            address</label>
                        <input type="email" class="form-control
@error('email') is-invalid @enderror" id="email" placeholder="Masukkan Email" name="email" value="{{$users->email ??
old('email')}}">
                        @error('email') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control
@error('password') is-invalid @enderror" id="password" placeholder="Password" name="password">
                        @error('password') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Konfirmasi
                            Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Konfirmasi Password" name="password_confirmation">
                    </div>
                    <div class="form-group">
                        <label for="level">Level</label>
                        <select class="form-control @error('level') isinvalid @enderror" id="level" name="level">
                            <option value="admin" @if($users->level ==
                                'admin' || old('level') == 'admin')selected @endif>Admin</option>
                            <option value="operator" @if($users->level
                                == 'operator' || old('level') == 'operator')selected
                                @endif>Operator</option>
                            <option value="pelanggan" @if($users->level ==
                                'pelanggan' || old('level') == 'pelanggan')selected @endif>Pelanggan</option>
                            <option value="pemilik" @if($users->level ==
                                'pemilik' || old('level') == 'pemilik')selected @endif>Pemilik</option>
                        </select>
                        @error('level') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="aktif">Aktif</label>
                        <select class="form-control @error('aktif') isinvalid @enderror" id="aktif" name="aktif">
                            <option value="1" @if($users->aktif == '1'
                                || old('aktif') == '1')selected @endif>Ya</option>
                            <option value="0" @if($users->aktif == '0' ||
                                old('aktif') == '0')selected @endif>Tidak</option>
                        </select>
                        @error('level') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-peach">Simpan</button>
                    <a href="{{route('users.index')}}" class="btn btn-danger">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
    @stop