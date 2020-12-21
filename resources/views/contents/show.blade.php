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
        <div align="center"> <img src="{{ Storage::url($content->image) }}" height="100%" width="100%" alt="" /></div>
    </div>
  <div class="section-title ">
    <h2>{{($content->name)}}</h2>
    <h5>อำเภอ {{$content->ampher}}</h5>
  </div>
  <h5 class="title"> ● รายละเอียด : </h5> <hr>
  <p class="text-justify b">
    {{($content->detail)}}
  </p>

  <!--The div element for the map -->
  <div id="map"></div>
</section>
<h6 class="mt-3"> <strong> Tag :{{$content->people}} @foreach ((array)$content->type as $value),{{$value}} @endforeach </strong> </h6>

@endsection
