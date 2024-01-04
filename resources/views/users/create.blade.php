@extends('adminlte::page')
@section('title', 'Tambah user')
@section('content_header')
<h1 class="m-0 text-dark">Tambah user</h1>
@stop
@section('content')
<form action="{{route('users.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                 <link rel="stylesheet" href="/css/app.css">
                    <div class="form-group">
                        <label for="email">Email
                            address</label>
                        <input type="email" class="form-control
@error('email') is-invalid @enderror" id="email" placeholder="Masukkan Email" name="email" value="{{old('email')}}">
                        @error('email') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control
@error('password') is-invalid @enderror" id="password" placeholder="Password" name="password">
                        @error('password') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Konfirmasi
                            Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Konfirmasi Password" name="password_confirmation">
                    </div>
                    <div class="form-group">
                        <label for="level">level</label>
                        <select class="form-control @error('level') is-invalid @enderror" id="level" name="level">
                            <option value="admin" @if(old('level')=='admin' ) selected @endif>Admin</option>
                            <option value="operator" @if(old('level')=='operator' ) selected @endif>Operator</option>
                            <option value="pelanggan" @if(old('level')=='pelanggan' ) selected @endif>Pelanggan</option>
                            <option value="pemilik" @if(old('level')=='pemilik' ) selected @endif>Pemilik</option>
                        </select>
                        @error('level') <span class="text-danger">{{$message}}</span> @enderror
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