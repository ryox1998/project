@extends('layouts.show')
@section('title','ร้านอาหาร/ของฝาก')
@section('content')

<script>
  // Initialize and add the map
  function initMap() {
    // The location of Uluru
    const uluru = { lat: {{$shop->s_lat}}, lng: {{ $shop->s_long }} };
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
        <div align="center"> <img src="{{ asset('assets/images/'.$shop->s_image) }}" height="100%" width="100%" alt="" /></div>
    </div>
  <div class="section-title ">
    <h2>{{($shop->shop_name)}}</h2>
    <h5>อำเภอ {{$shop->s_ampher}}</h5>
  </div>
  <h5 class="title mt-3"> ● รายละเอียด : </h5> <hr>
  <p class="text-justify b mt-3">
    {{($shop->s_detail)}}
  </p>

  <!--The div element for the map -->
  <div class="mt-5" id="map"></div>
</section>
@endsection
