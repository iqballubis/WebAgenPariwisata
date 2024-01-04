@extends('adminlte::page')
@section('title', 'Tambah karyawan')
@section('content_header')
<h1 class="m-0 text-dark">Tambah karyawan</h1>
@stop
@section('content')
<form action="{{route('karyawan.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                     <link rel="stylesheet" href="/css/app.css">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="nama_karyawan">Nama karyawan</label>
                            <input type="text" class="form-control
@error('nama_karyawan') is-invalid @enderror" id="nama_karyawan" placeholder="Nama karyawan" name="nama_karyawan" value="{{old('nama_karyawan')}}">
                            @error('nama_karyawan') <span class="textdanger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea type="text" class="form-control" name="alamat">{{old('alamat')}}</textarea>
                            @error('alamat') <span class="textdanger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="no_hp">Nomer Telepon</label>
                            <input type="number" class="form-control
@error('no_hp') is-invalid @enderror" id="no_hp" placeholder="Nomer Telepon" name="no_hp" value="{{old('no_hp')}}">
                            @error('no_hp') <span class="textdanger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <select class="form-select @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan">
                                <option value="administrasi" @if(old('jabatan')=='administrasi' )selected @endif>Admin</option>
                                <option value="operator" @if(old('jabatan')=='operator' )selected @endif>Operator</option>
                                <option value="pemilik" @if(old('jabatan')=='pemilik' )selected @endif>Pemilik</option>
                            </select>
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
                @push('js')
                <script>
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