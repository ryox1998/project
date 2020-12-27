@extends('layouts.main')
@section('title','GUIDE | TAK Travel')
@section('content')


<!-- ======= Team Section ======= -->
<section id="team" class="team section-bg mt-5">
    <div class="container">

      <div class="section-title">
        <span>สะถานท่องเที่ยวที่แนะนำ</span>
        <h2>สะถานท่องเที่ยวที่แนะนำ</h2>
        <p>
            ตาก..เที่ยวได้ทุกวัน ตาก..เที่ยวได้ทุกที่ ตาก..เที่ยวได้ทุกฤดู !!
        </p>
      </div>

      <div class="row">


        @foreach ($contents as $content)
        @foreach(Session::get('use_type') as $use_type)
        @foreach ((array)$content->type as $value)

        @if ($use_type == "ด้านธรรมชาติ")
        {{$value}}
        {{$use_type}}
        {{$use_people}}
        {{$use_day}}
        {{$use_km}}
        {{$Latitude}}
        {{$Longitude}}
        @break
        @endif



        @endforeach
        @endforeach
        @endforeach


      </div>
      <div align ="center" class="mt-5">{{ $contents->links() }}</div>
    </div>
  </section><!-- End Team Section -->






@endsection
