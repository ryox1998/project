@extends('layouts.show')
@section('title','Show')
@section('content')

<script>
  // Initialize and add the map
  function initMap() {
    // The location of Uluru
    const uluru = { lat: {{$content->lat}}, lng: {{ $content->long }} };
    // The map, centered at Uluru
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 15,
      center: uluru,
    });
    // The marker, positioned at Uluru
    const marker = new google.maps.Marker({
      position: uluru,
      map: map,
    });
  }
</script>



<section id="team" class="team section-bg mt-5">
    <div class="container">
        <div align="center"> <img src="{{ asset('storage/'.$content->image) }}" height="100%" width="100%" alt="" /></div>
    </div>
  <div class="section-title ">
    <h2>{{($content->name)}}</h2>
    <h5>อำเภอ {{$content->ampher}}</h5>
  </div>
  <h5 class="title mt-3"> ● รายละเอียด : </h5> <hr>
  <p class="text-justify b mt-3">
    {{($content->detail)}}
  </p>

  <!--The div element for the map -->
  <div  class="mt-5" id="map"></div>
  <h5 class="title mt-5"> ● ที่พัก/โรงแรมที่ไกล้เคียง : </h5> <hr>

  <div class="row">
    @foreach ($hotels as $hotel)
  <?php
  $lat1 = $content->lat ;
  $lon1 = $content->long;

  // $lat1 = 17.241366919161337;
  // $lon1 = 98.9729376858265;
  //ใช้ทดสอบ
  $lat2 = $hotel->h_lat;
  $lon2 = $hotel->h_long;
  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  $km = $miles * 1.609344 ;
   ?>

   @if ($km<5)
   <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
      <div class="member">
          <img class="page-content" src="{{ asset('storage/'.$hotel->h_image) }}" height="154.89px"
              width="275px" />
          <a href="{{ route('hotels.show', $hotel->id) }}">
              <h4> {{ $hotel->h_name }}</h4>
          </a>
          <span>อำเภอ {{ $hotel->h_ampher }}</span>
          <hr> <br>
          <p class="a">{{ $hotel->h_detail }}</p>

          <div class="social">
              <p> เขียนเมื่อ {{ $hotel->created_at }} <br>
                  อัพเดทล่าสุด {{ $hotel->updated_at }} </p>
              <a href="{{ route('hotels.show', $hotel->id) }}">ดูข้อมูลเพิ่มเติม</a>
          </div>
      </div>
  </div>
   @else
  <center>
        <strong><p class="text-danger"> ไม่มี ที่พัก/โรงแรมที่ไกล้เคียงท่าน ในรัศมี 5 Km.</p></strong>
        <img src="{{ asset('assets/img/map.svg') }}" alt="" height="100px" width="100px">
  </center>
   @endif
    @endforeach
  </div>


  <h5 class="title mt-5"> ● ร้านค้า/ของฝากที่ไกล้เคียง : </h5> <hr>

  <div class="row">
      @foreach ($shops as $shop)
    <?php
    $lat1 = $content->lat ;
    $lon1 = $content->long;

    $lat2 = $shop->s_lat;
    $lon2 = $shop->s_long;

    $theta = $lon1 - $lon2;
    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $miles = $dist * 60 * 1.1515;
    $km = $miles * 1.609344 ;
     ?>

     @if ($km<5)

     <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
        <div class="member">
            <img class="page-content" src="{{ asset('storage/'.$shop->s_image) }}" height="154.89px"
                width="275px" />
            <a href="{{ route('shops.show', $shop->id) }}">
                <h4> {{ $shop->s_name }}</h4>
            </a>
            <span>อำเภอ {{ $shop->s_ampher }}</span>
            <hr> <br>
            <p class="a">{{ $shop->s_detail }}</p>

            <div class="social">
                <p> เขียนเมื่อ {{ $shop->created_at }} <br>
                    อัพเดทล่าสุด {{ $shop->updated_at }} </p>
                <a href="{{ route('shops.show', $shop->id) }}">ดูข้อมูลเพิ่มเติม</a>
            </div>
        </div>
    </div>
     @else
        <center>
          <strong><p class="text-danger">ไม่มี ร้านค้า/ของฝากที่ไกล้เคียงท่าน ในรัศมี 5 Km.</p></strong>
          <img src="{{ asset('assets/img/map.svg') }}" alt="" height="100px" width="100px">
        </center>

     @endif
      @endforeach
    </div>



  <hr>
  <center><h6 class="mt-3"> <strong> Tag : {{$content->people}} @foreach ((array)$content->type as $value) , {{$value}} @endforeach </strong> </h6></center>
</section>


@endsection
