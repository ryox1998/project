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
              <li><a href="{{route('contents.create')}}">เพิ่มข้อมูล สถานที่ท่องเที่ยว</a></li>
              <li><a href="{{route('hotels.create')}}">เพิ่มข้อมูล ที่พัก/โรงแรม</a></li>
              <li><a href="{{route('shops.create')}}">เพิ่มข้อมูล ร้านอาหาร/ของฝาก</a></li>
            </ul>
          </li>

        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->


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

    <!-- Template Main JS File -->
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

    </body>
    </html>
