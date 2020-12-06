@extends('layouts.show')
@section('title','show')
@section('content')



<?php
  $data = 'xxx'; // ตัวแปร PHP

  echo '<script type="text/javascript">';
  echo "var data = '$data';"; // ส่งค่า $data จาก PHP ไปยังตัวแปร data ของ Javascript
  echo '</script>';
?>


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
        <div align="center"> <img src="{{ Storage::url($content->image) }}" height="100%" width="100%" alt="" /></div>
    </div>
  <div class="section-title ">
    <h2>{{($content->name)}}</h2>
    <h5>อำเภอ {{$content->ampher}}</h5>
  </div>
  <h5 class="title"> ● รายละเอียด : </h5> <hr>
  <p class="b">
    {{($content->detail)}}
  </p>

  <!--The div element for the map -->
  <div id="map"></div>
</section>
<h6 class="pl-3"> Tag : {{$content->people}} , {{$content->type}} </h6>

@endsection
