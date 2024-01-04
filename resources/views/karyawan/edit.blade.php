@extends('adminlte::page')
@section('title', 'Edit Karyawan')
@section('content_header')
<h1 class="m-0 text-dark">Edit Karyawan</h1>
@stop
@section('content')
<form action="{{route('karyawan.update', $karyawan)}}" method="post">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                     <link rel="stylesheet" href="/css/app.css">
                    <div class="form-group">
                        <label for="nama_karyawan">Nama Karyawan</label>
                        <input type="text" class="form-control
@error('nama_karyawan') is-invalid @enderror" id="nama_karyawan" placeholder="Nama
karyawan" name="nama_karyawan" value="{{$karyawan->nama_karyawan??old('nama_karyawan')}}">
                        @error('nama_karyawan') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea rows="5" class="form-control
@error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{$karyawan->alamat ??old('alamat')}}"></textarea>
                        @error('alamat') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="no_hp">No Telepon/HP</label>
                        <input type="number" class="form-control
@error('no_hp') is-invalid @enderror" id="no_hp" placeholder="No
Telepon/HP" name="no_hp" value="{{$karyawan->no_hp ??old('no_hp')}}">
                        @error('no_hp') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="jabatan">jabatan</label>
                        <select class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan">
                            <option value="administrasi" @if($karyawan->jabatan ==
                                'administrasi' || old('jabatan') == 'administrasi')selected @endif>administrasi</option>
                            <option value="operator" @if($karyawan->jabatan
                                == 'operator' || old('jabatan') == 'operator')selected
                                @endif>operator</option>
                            <option value="pemilik" @if($karyawan->jabatan ==
                                'pemilik' || old('jabatan') == 'pemilik')selected @endif>pemilik</option>
                        </select>
                        @error('jabatan') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_user">Users</label>
                        <div class="input-group">
                            <input type="hidden" name="id_user" id="id_user" value="{{$karyawan->users->id ?? old('id_user')}}">
                            <input type="text" class="form-control @error('users') is-invalid @enderror" placeholder="Users" id="users" name="users" value="{{$karyawan->users->email ?? old('email')}}" aria-label="Users" ariadescribedby="cari" readonly>
                            <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari" data-bs-target="#staticBackdrop"></i>
                                Cari Data Users</button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="aktif">Aktif</label>
                        <select class="form-control @error('aktif') is-invalid @enderror" id="aktif" name="aktif">
                            <option value="1" @if($karyawan->aktif == '1'
                                || old('aktif') == '1')selected @endif>Ya</option>
                            <option value="0" @if($karyawan->aktif == '0' ||
                                old('aktif') == '0')selected @endif>Tidak</option>
                        </select>
                        @error('jabatan') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>

                <div class="card-footer">
                    <link rel="stylesheet" href="/css/app.css">
                    <button type="submit" class="btn btn-peach">Simpan</button>
                    <a href="{{route('karyawan.index')}}" class="btn btn-default">
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
    </script>
    @endpush