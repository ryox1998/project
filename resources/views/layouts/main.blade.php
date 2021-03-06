<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title')</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=K2D:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
  <!-- Google Fonts
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet"> -->

  <!-- Vendor CSS Files -->

  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{asset ('assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
  <link href="{{asset ('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{asset ('assets/vendor/venobox/venobox.css') }}" rel="stylesheet">
  <link href="{{asset ('assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
  <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA5jDH1BL6_WnRSTJHx8BvJBr7V3YiHlT0&callback=initMap"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body >


<!--
--======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"> <img src="{{asset('assets/img/logo.png')}}" > <a href="{{ route('contents.index')}}">TAK Travel</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a> -->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="{{ route('contents.index')}}">หน้าแรก</a></li>
          <li><a href="{{ url('ampher/showall')}}">สถานที่ท่องเที่ยว</a></li>
          <li><a href="{{route('guide.create')}}">แนะนำสถานที่ท่องเที่ยว</a></li>
          <li><a href="{{route('hotels.index')}}">ที่พัก/โรงแรม</a></li>
          <li><a href="{{route('shops.index')}}">ร้านอาหาร/ของฝาก</a></li>
          <li class="drop-down"><a href="#">อำเภอ</a>
            <ul>
              <li><a href="{{ url('ampher/mueang_tak')}}">เมืองตาก</a></li>
              <li><a href="{{ url('ampher/ban_tak')}}">บ้านตาก</a></li>
              <li><a href="{{ url('ampher/sam_ngao')}}">สามเงา</a></li>
              <li><a href="{{ url('ampher/measot')}}">แม่สอด</a></li>
              <li><a href="{{ url('ampher/mae_ramat')}}">แม่ระมาด</a></li>
              <li><a href="{{ url('ampher/tha_song_yang')}}">ท่าสองยาง</a></li>
              <li><a href="{{ url('ampher/phop_phra')}}">พบพระ</a></li>
              <li><a href="{{ url('ampher/um_phang')}}">อุ้มผาง</a></li>
              <li><a href="{{ url('ampher/wang_chao')}}">วังเจ้า</a></li>
            </ul>
          </li>
          <li class="drop-down"><a href="#">เจ้าหน้าที่</a>
            <ul>
              @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                    <a class="text-primary">สวัสดีคุณ, {{ Auth::user()->name }}</a>
                    <li><a href="{{ url('admin/content')}}">แผงจัดการข้อมูล</a></li>

                    <form class="ml-1" method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')" class="text-danger" onclick="event.preventDefault();this.closest('form').submit();">
                         {{ __('Logout') }}
                        </x-responsive-nav-link>
                    </form>
                    {{-- <li><a href="{{ route('logout') }}"></a></li> --}}

                    @else
                    <li><a href="{{ route('login') }}">เข้าสู่ระบบ</a></li>
                        @if (Route::has('register'))
                        <li><a href="{{ route('register') }}">สมัครสมาชิก</a></li>
                        @endif
                    @endauth
                </div>
            @endif
            </ul>
          </li>
        </ul>
      </nav><!-- .nav-menu -->



    </div>
  </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
              <h1>(ททท.) สำนักงานตาก</h1>
              <h2>มา Cool มาคุย มาลุย มาเท่ แล้วก็มาเปย์กันที่..ตาก</h2>
              <div class="d-flex">
                <a href="{{route('guide.create')}}" class="btn-get-started scrollto">แนะนำสถานที่ท่องเที่ยว</a>
                <a href="https://youtu.be/AlY5qNYNJdM" class="venobox btn-watch-video " data-vbtype="video" data-autoplay="true"> MV มาเที่ยวตาก <i class="icofont-play-alt-2"></i></a>
              </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img">
              <img src="{{asset('assets/img/banner.png')}}" class="img-fluid animated" alt="">
            </div>
          </div>
        </div>
      </section><!-- End Hero -->
    <div class="container">

  @yield('content')



    </div>


    <div class="mt-5"></div>

   <!-- ======= Footer ======= -->
 <footer id="footer">

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>Panupong Muntaworn</span></strong>. All Rights Reserved
      </div>
    </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <!-- Vendor JS Files -->

    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/venobox/venobox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <!-- Template Main JS File -->
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script src="cdn.ckeditor.com/4.15.1/standard/ckeditor.js" ></script>

    </body>
    </html>
