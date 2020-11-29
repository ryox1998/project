@extends('layouts.show')
@section('title','show')
@section('content')

<section id="team" class="team section-bg mt-5">
    <div class="container">
        <div align="center"> <img src="{{ Storage::url($content->image) }}" height="100%" width="100%" alt="" /></div>
    </div>
  <div class="section-title ">
    <h2>{{($content->name)}}</h2>
    <h5>อำเภอ {{$content->ampher}}</h5>
  </div>
  <h5 class="title"> ● รายละเอียด :</h5> <hr>
  <p class="b">
    {{($content->detail)}}
  </p>
</section>




@endsection
