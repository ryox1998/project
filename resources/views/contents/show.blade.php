@extends('layouts.show')
@section('title','Show')
@section('content')





<section id="team" class="team section-bg mt-5">
    <div class="container">
        <div align="center"> <img src="{{ asset('assets/images/'.$content->image) }}" height="100%" width="100%" alt="" /></div>
    </div>
  <div class="section-title ">
    <h2>{{($content->name)}}</h2>
    <h5>อำเภอ {{$content->ampher}}</h5>
  </div>
  <h5 class="title mt-3"> ● รายละเอียด : </h5> <hr>
  <p class="text-justify b mt-3"> {{ $content->detail}} </p>

  <!--The div element for the map -->
  <div  class="mt-5" id="map"></div>
  {{-- End map --}}


  {{-- ที่พัก/โรงแรมที่ไกล้เคียง --}}
  <h5 class="title mt-5"> ● ที่พัก/โรงแรมที่ไกล้เคียง : </h5> <hr>
  <div class="row">

  @foreach ($hotels as $hotel)

  <?php
  $lat1 = $content->lat ;
  $lon1 = $content->long;
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
   <div class="col-lg-4 col-md-6 d-flex align-items-stretch ml-3">
      <div class="member">
          <img class="page-content" src="{{ asset('assets/images/'.$hotel->h_image) }}" height="154.89px"
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
   {{-- ไม่มีทีพัก --}}
   <div class="col-lg-6 col-md-6 d-flex align-items-stretch">
    <center><strong><p class="text-danger pl-3"><img src="{{ asset('assets/img/cancel.svg') }}" alt="" height="15px" width="15px">    ไม่มี ที่พัก/โรงแรมที่ไกล้เคียงท่าน ในรัศมี 5 Km. ขออภัยด้วยครับ </p></strong></center>
    </div>
    {{-- ไม่มีทีพัก --}}
        @break
   @endif
    @endforeach
  </div>

  {{-- ที่พัก/โรงแรมที่ไกล้เคียง --}}

  <hr>
  <center><h6 class="mt-3"> <strong> <img src="{{ asset('assets/img/human.svg') }}" alt="" height="30px" width="30px">  Tag : {{$content->people}} @foreach ((array)$content->type as $value) , {{$value}} @endforeach </strong> </h6></center>
</section>


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

@endsection
