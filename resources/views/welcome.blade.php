<!DOCTYPE html>
<html lang="en">

<head>
  <title>LaTravel</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet" />

  <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css" />
  <link rel="stylesheet" href="css/animate.css" />

  <link rel="stylesheet" href="css/owl.carousel.min.css" />
  <link rel="stylesheet" href="css/owl.theme.default.min.css" />
  <link rel="stylesheet" href="css/magnific-popup.css" />

  <link rel="stylesheet" href="css/aos.css" />

  <link rel="stylesheet" href="css/ionicons.min.css" />

  <link rel="stylesheet" href="css/bootstrap-datepicker.css" />
  <link rel="stylesheet" href="css/jquery.timepicker.css" />

  <link rel="stylesheet" href="css/flaticon.css" />
  <link rel="stylesheet" href="css/icomoon.css" />
  <link rel="stylesheet" href="css/style.css" />
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="#home">LaTravel<span>Travel Agency</span></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="#home" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="#tentang" class="nav-link">About</a>
          </li>
          <li class="nav-item">
            <a href="#destinasi" class="nav-link">Destination</a>
          </li>
          <li class="nav-item">
            <a href="#blog" class="nav-link">Blog</a>
          </li>
          <li class="nav-item">
            <a href="#contact" class="nav-link">Contact</a>
          </li>
          <li class="nav-item cta">
            <a href="{{route('login')}}" class="btn btn-primary">Login</a>
          </li>
        </ul>
      </div>

    </div>
    <style>
      @media (max-width: 767px) {
        .modal-dialog {
          max-width: 100%;
          margin: 1rem auto;
        }
      }

      .modal-header {
        position: sticky;
        top: 0;
        z-index: 1050;
        background-color: #ffffff;
      }
    </style>
  </nav>
  <!-- END nav -->

  <div class="hero-wrap js-fullheight" style="background-image: url('images/woah.jpg')" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
        <div class="col-md-9 text text-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
          <a href="https://youtu.be/tpXhpq5FL2Y" class="icon-video popup-vimeo d-flex align-items-center justify-content-center mb-4">
            <span class="ion-ios-play"></span>
          </a>
          <p class="caps" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
            Travel to the any corner of the world, without going around in
            circles
          </p>
          <h1 data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
            Make Your Tour Amazing With Us
          </h1>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section services-section bg-light" id="tentang">
    <div class="container">
      <div class="row d-flex">
        <div class="col-md-6 order-md-last heading-section pl-md-5 ftco-animate">
          <h2 class="mb-4">It's time to start your adventure</h2>
          <p>
            A small river named Duden flows by their place and supplies it
            with the necessary regelialia. It is a paradisematic country, in
            which roasted parts of sentences fly into your mouth.
          </p>
          <p>
            Far far away, behind the word mountains, far from the countries
            Vokalia and Consonantia, there live the blind texts. Separated
            they live in Bookmarksgrove right at the coast of the Semantics, a
            large language ocean. A small river named Duden flows by their
            place and supplies it with the necessary regelialia.
          </p>
          <p>
            <a href="#destinasi" class="btn btn-primary py-3 px-4">Search Destination</a>
          </p>
        </div>
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-6 d-flex align-self-stretch ftco-animate">
              <div class="media block-6 services d-block">
                <div class="icon">
                  <span class="flaticon-paragliding"></span>
                </div>
                <div class="media-body">
                  <h3 class="heading mb-3">Activities</h3>
                  <p>
                    A small river named Duden flows by their place and
                    supplies it with the necessary
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-6 d-flex align-self-stretch ftco-animate">
              <div class="media block-6 services d-block">
                <div class="icon"><span class="flaticon-route"></span></div>
                <div class="media-body">
                  <h3 class="heading mb-3">Travel Arrangements</h3>
                  <p>
                    A small river named Duden flows by their place and
                    supplies it with the necessary
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-6 d-flex align-self-stretch ftco-animate">
              <div class="media block-6 services d-block">
                <div class="icon">
                  <span class="flaticon-tour-guide"></span>
                </div>
                <div class="media-body">
                  <h3 class="heading mb-3">Private Guide</h3>
                  <p>
                    A small river named Duden flows by their place and
                    supplies it with the necessary
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-6 d-flex align-self-stretch ftco-animate">
              <div class="media block-6 services d-block">
                <div class="icon"><span class="flaticon-map"></span></div>
                <div class="media-body">
                  <h3 class="heading mb-3">Location Manager</h3>
                  <p>
                    A small river named Duden flows by their place and
                    supplies it with the necessary
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-counter img" id="section-counter">
    <div class="container">
      <div class="row d-flex">
        <div class="col-md-6 d-flex">
          <div class="img d-flex align-self-stretch" style="background-image: url(images/about.jpg)"></div>
        </div>
        <div class="col-md-6 pl-md-5 py-5">
          <div class="row justify-content-start pb-3">
            <div class="col-md-12 heading-section ftco-animate">
              <h2 class="mb-4">Make Your Tour Memorable and Safe With Us</h2>
              <p>
                Far far away, behind the word mountains, far from the
                countries Vokalia and Consonantia, there live the blind texts.
                Separated they live in Bookmarksgrove right at the coast of
                the Semantics, a large language ocean.
              </p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 justify-content-center counter-wrap ftco-animate">
              <div class="block-18 text-center mb-4">
                <div class="text">
                  <strong class="number" data-number="300">0</strong>
                  <span>Successful Tours</span>
                </div>
              </div>
            </div>
            <div class="col-md-4 justify-content-center counter-wrap ftco-animate">
              <div class="block-18 text-center mb-4">
                <div class="text">
                  <strong class="number" data-number="24000">0</strong>
                  <span>Happy Tourist</span>
                </div>
              </div>
            </div>
            <div class="col-md-4 justify-content-center counter-wrap ftco-animate">
              <div class="block-18 text-center mb-4">
                <div class="text">
                  <strong class="number" data-number="200">0</strong>
                  <span>Place Explored</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <br><br><br><br><br><br>
  <section class="ftco-section ftco-no-pt" id="destinasi">
    <div class="container">
      <div class="row justify-content-center pb-4">
        <div class="col-md-12 heading-section text-center ftco-animate">
          <h2 class="mb-4">Tour Destination</h2>
        </div>
      </div>
      <div class="row">
        @foreach($paket_wisata->slice(0,5) as $key => $data)
        <div class="col-md-4 ftco-animate" data-wow-delay="0.{{$key+2}}s">
          <div class="project-wrap">
            <a href="#" class="img"><img src="storage/{{$data->foto1}}" width="350" height="270"></a>
            <div class="text p-4">
              <a href="{{route('reservasi.create')}}" data-toggle="modal" data-target="#exampleModalCenter"><span class="price">Diskon {{$data->diskon}} %</a></span>
              <span class="days">Rp. {{number_format ($data->daftar_paket->harga_paket)}}</span>
              <h3><a href="#">{{$data->nama_paket}}</a></h3>
              <p class="location">
                <span class="ion-ios-map"></span> Indonesia
              </p>
              <ul>
                <li><span class="flaticon-shower"></span>Shower</li>
                <li><span class="flaticon-king-size"></span>Bed</li>
                <li><span class="flaticon-sun-umbrella"></span>Resort</li>
              </ul>
            </div>
          </div>
        </div>

        <!-- //modal -->
        <div class="modal fade custom_search_pop" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Detail Paket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body">
                <h2>Deskripsi</h2>
                <h5>{{$data->deskripsi}}</h5>
                <!-- <p>Liburan ke Bali adalah pengalaman yang luar biasa. Pulau yang indah ini menawarkan pantai-pantai spektakuler, budaya yang kaya, dan kehidupan malam yang bersemangat. Nikmati matahari terbenam di Pantai Kuta, jelajahi candi pura yang megah, dan bersantap dengan hidangan lezat Bali. Rasakan ketenangan di hutan monyet Ubud dan pemandian air panas di Tirta Empul. Dengan keindahannya yang menakjubkan dan keramahannya yang memikat, Bali adalah surga wisatawan.</p> -->
                <h2>Fasilitas</h2>
                <h5>{{$data->fasilitas}}</h5>
                <h2>Itinerary</h2>
                <h5>{{$data->itinerary}}</h5>
                <div class="modal-footer">
                  <a href="{{route('reservasi.create')}}" class="btn btn-olive" style="color: white;">
                    Pesan Sekarang</a>
                </div>
              </div>
            </div>
          </div>
          <!-- //end modal -->
        </div>
          @endforeach
  </section>

  <section class="ftco-section testimony-section bg-bottom" style="background-image: url(images/bg_3.jpg)" id="blog">
    <div class="container">
      <div class="row justify-content-center pb-4">
        <div class="col-md-12 heading-section text-center ftco-animate">
          <h2 class="mb-4">Recent Post</h2>
        </div>
      </div>
      <div class="row d-flex">
        <div class="col-md-4 d-flex ftco-animate">
          <div class="blog-entry justify-content-end">
            <a href="blog-single.html" class="block-20" style="background-image: url('images/image_1.jpg')">
            </a>
            <div class="text mt-3 float-right d-block">
              <div class="d-flex align-items-center mb-4 topp">
                <div class="one">
                  <span class="day">21</span>
                </div>
                <div class="two">
                  <span class="yr">2019</span>
                  <span class="mos">August</span>
                </div>
              </div>
              <h3 class="heading">
                <a href="#">Why Lead Generation is Key for Business Growth</a>
              </h3>
              <p>
                A small river named Duden flows by their place and supplies it
                with the necessary regelialia.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex ftco-animate">
          <div class="blog-entry justify-content-end">
            <a href="blog-single.html" class="block-20" style="background-image: url('images/image_2.jpg')">
            </a>
            <div class="text mt-3 float-right d-block">
              <div class="d-flex align-items-center mb-4 topp">
                <div class="one">
                  <span class="day">21</span>
                </div>
                <div class="two">
                  <span class="yr">2019</span>
                  <span class="mos">August</span>
                </div>
              </div>
              <h3 class="heading">
                <a href="bali.blade.php" class="details-link"><i class="bx bx-link"></i>Why Lead Generation is Key for Business Growth</a>
              </h3>
              <p>
                A small river named Duden flows by their place and supplies it
                with the necessary regelialia.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex ftco-animate">
          <div class="blog-entry">
            <a href="blog-single.html" class="block-20" style="background-image: url('images/image_3.jpg')">
            </a>
            <div class="text mt-3 float-right d-block">
              <div class="d-flex align-items-center mb-4 topp">
                <div class="one">
                  <span class="day">21</span>
                </div>
                <div class="two">
                  <span class="yr">2019</span>
                  <span class="mos">August</span>
                </div>
              </div>
              <h3 class="heading">
                <a href="/bali">Why Lead Generation is Key for Business Growth</a>
              </h3>
              <p>
                A small river named Duden flows by their place and supplies it
                with the necessary regelialia.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer class="ftco-footer bg-bottom" style="background-image: url(images/footer-bg.jpg)" id="contact">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Vacation</h2>
            <p>
              Far far away, behind the word mountains, far from the countries
              Vokalia and Consonantia, there live the blind texts.
            </p>
            <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
              <li class="ftco-animate">
                <a href="https://twitter.com/" target="_blank"><span class="icon-twitter"></span></a>
              </li>
              <li class="ftco-animate">
                <a href="https://facebook.com/" target="_blank"><span class="icon-facebook"></span></a>
              </li>
              <li class="ftco-animate">
                <a href="https://instagram.com/" target="_blank"><span class="icon-instagram"></span></a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4 ml-md-5">
            <h2 class="ftco-heading-2">Infromation</h2>
            <ul class="list-unstyled">
              <li><a href="#" class="py-2 d-block">Online Enquiry</a></li>
              <li><a href="#" class="py-2 d-block">General Enquiries</a></li>
              <li><a href="#" class="py-2 d-block">Booking Conditions</a></li>
              <li><a href="#" class="py-2 d-block">Privacy and Policy</a></li>
              <li><a href="#" class="py-2 d-block">Refund Policy</a></li>
              <li><a href="#" class="py-2 d-block">Call Us</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Experience</h2>
            <ul class="list-unstyled">
              <li><a href="#" class="py-2 d-block">Adventure</a></li>
              <li>
                <a href="#" class="py-2 d-block">Hotel and Restaurant</a>
              </li>
              <li><a href="#" class="py-2 d-block">Beach</a></li>
              <li><a href="#" class="py-2 d-block">Nature</a></li>
              <li><a href="#" class="py-2 d-block">Camping</a></li>
              <li><a href="#" class="py-2 d-block">Party</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Have a Questions?</h2>
            <div class="block-23 mb-3">
              <ul>
                <li>
                  <span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California,
                    USA</span>
                </li>
                <li>
                  <a href="#"><span class="icon icon-phone"></span><span class="text">+62 851 5755 8679</span></a>
                </li>
                <li>
                  <a href="#"><span class="icon icon-envelope"></span><span class="text">iqballubis015@gmai..com</span></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-center">
          <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;
            <script>
              document.write(new Date().getFullYear());
            </script>
            All rights reserved | This template is made with
            <i class="icon-heart color-danger" aria-hidden="true"></i> by
            <a href="https://colorlib.com" target="_blank">Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>
        </div>
      </div>
    </div>
  </footer>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#3d9970" />
    </svg>
  </div>

  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
</body>

</html>