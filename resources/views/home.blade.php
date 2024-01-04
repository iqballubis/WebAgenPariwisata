@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <h2>Ayo Berwisata!</h2>
                    <p>Selamat datang di halaman dashboard. Berikut adalah beberapa tempat wisata yang mungkin bisa Anda kunjungi:</p>

                    <div id="slideshow" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#slideshow" data-slide-to="0" class="active"></li>
                            <li data-target="#slideshow" data-slide-to="1"></li>
                            <li data-target="#slideshow" data-slide-to="2"></li>
                        </ol>

                        <!-- Slides -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="/images/10.png" alt="Image 1" class="d-block w-100">
                            </div>
                            <div class="carousel-item">
                                <img src="/images/11.png" alt="Image 2" class="d-block w-100">
                            </div>
                            <div class="carousel-item">
                               <img src="/images/12.png" alt="Image 3" class="d-block w-100">
                            </div>
                        </div>

                        <!-- Controls -->
                        <a class="carousel-control-prev" href="#slideshow" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#slideshow" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@stop

@push('scripts')
<script>
    $('#example2').reser$reservasiTable({
        "responsive": true,
    });

    function notificationBeforeDelete(event, el, dt) {
        event.preventDefault();
        if (confirm('Apakah anda yakin akan menghapus reser$reservasi reservasi \"' +
                document.getElementById(dt).innerHTML + '\" ?')) {
            $("#delete-form").attr('action', $(el).attr('href'));
            $("#delete-form").submit();
        }
    }
</script>

<script>
    $(document).ready(function(){
        $('.carousel').carousel();
    });
</script>
@endpush
