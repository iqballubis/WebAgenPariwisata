@extends('adminlte::page')
@section('title', 'Bayar Paket Wisata')
@section('content_header')
<h1 class="m-0 text-dark">Bayar Paket Wisata</h1>
@stop
@section('content')
<form action="{{route('paket_wisata.update', $paket_wisata)}}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                     <link rel="stylesheet" href="/css/app.css">
                      <div class="form-group">
                        <label for="nama_paket">Nama Paket</label>
                        <input type="nama_paket" class="form-control
@error('nama_paket') is-invalid @enderror" id="nama_paket" placeholder="Masukkan nama paket" name="nama_paket" value="{{$paket_wisata->nama_paket??old('nama_paket')}}">
                        @error('nama_paket') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea type="text" class="form-control" name="deskripsi" value="{{$paket_wisata->deskripsi??old('deskripsi')}}"></textarea>
                        @error('deskripsi') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="fasilitas">Fasilitas
                        </label>
                        <input type="fasilitas" class="form-control
@error('fasilitas') is-invalid @enderror" id="fasilitas" placeholder="Masukkan rincian fasilitas" name="fasilitas" value="{{$paket_wisata->fasilitas??old('fasilitas')}}">
                        @error('fasilitas') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="itinerary">Itinerary</label>
                        <textarea type="text" class="form-control" name="itinerary" value="{{$paket_wisata->itinerary??old('itinerary')}}"></textarea>
                        @error('itinerary') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label>Diskon</label>
                        <input type="number" class="form-control" step="0.01" min="0.00" max="999999.99" name="diskon" value="{{$paket_wisata->diskon??old('diskon')}}" required>
                        @error('diskon') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="foto1" class="form-label">Foto 1</label>
                        <img src="/vendor/adminlte/dist/img/no-image.png" class="img-thumbnail d-block" name="tampil" alt="..." width="10%" id="tampil1">
                        <input class="form-control @error('foto1') isinvalid @enderror" type="file" id="foto1" name="foto1" value="{{old('foto1')}}">
                        @error('foto1') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="foto2" class="form-label">Foto 2</label>
                        <img src="/vendor/adminlte/dist/img/no-image.png" class="img-thumbnail d-block" name="tampil" alt="..." width="10%" id="tampil2">
                        <input class="form-control @error('foto2') isinvalid @enderror" type="file" id="foto2" name="foto2" value="{{old('foto2')}}">
                        @error('foto2') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="foto3" class="form-label">Foto 3</label>
                        <img src="/vendor/adminlte/dist/img/no-image.png" class="img-thumbnail d-block" name="tampil" alt="..." width="10%" id="tampil3">
                        <input class="form-control @error('foto3') isinvalid @enderror" type="file" id="foto3" name="foto3" value="{{old('foto3')}}">
                        @error('foto3') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="foto4" class="form-label">Foto 4</label>
                        <img src="/vendor/adminlte/dist/img/no-image.png" class="img-thumbnail d-block" name="tampil" alt="..." width="10%" id="tampil4">
                        <input class="form-control @error('foto4') isinvalid @enderror" type="file" id="foto4" name="foto4" value="{{old('foto4')}}">
                        @error('foto4') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="foto5" class="form-label">Foto 5</label>
                        <img src="/vendor/adminlte/dist/img/no-image.png" class="img-thumbnail d-block" name="tampil" alt="..." width="10%" id="tampil5">
                        <input class="form-control @error('foto5') isinvalid @enderror" type="file" id="foto5" name="foto5" value="{{old('foto5')}}">
                        @error('foto5') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="card-footer">
                        <link rel="stylesheet" href="/css/app.css">
                        <button type="submit" class="btn btn-peach">Simpan</button>
                        <a href="{{route('paket_wisata.index')}}" class="btn btn-danger">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @stop
    @push('js')
    <script>
        function readURL1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#tampil1').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#foto1").change(function() {
            readURL1(this);
        });

        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#tampil2').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#foto2").change(function() {
            readURL2(this);
        });

        function readURL3(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#tampil3').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#foto3").change(function() {
            readURL3(this);
        });

        function readURL4(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#tampil4').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#foto4").change(function() {
            readURL4(this);
        });

        function readURL5(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#tampil5').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#foto5").change(function() {
            readURL5(this);
        });
    </script>
    @endpush