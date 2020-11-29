@extends('layouts.main')
@section('title','home')
@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<!-- ======= Team Section ======= -->
<section id="team" class="team section-bg mt-5">
    <div class="container">

      <div class="section-title">
        <span>สถานที่ท่องเที่ยว</span>
        <h2>สถานที่ท่องเที่ยว</h2>
        <p>

            ตาก..เที่ยวได้ทุกวัน ตาก..เที่ยวได้ทุกที่ ตาก..เที่ยวได้ทุกฤดู !!
        </p>
      </div>
      <div class="row">
        @foreach ($contents as $content)
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
          <div class="member">
            <img  class="page-content" src="{{ Storage::url($content->image) }}" height="154.89px" width="275px"  alt="" />

            <h4>{{$content->name}}</h4>
            <span>อำเภอ {{$content->ampher}}</span> <hr> <br>
                <p class="a">{{$content->detail}}</p>
            <div class="social">
              <a href=""><i class="icofont-twitter"></i></a>
              <a href=""><i class="icofont-facebook"></i></a>
              <a href=""><i class="icofont-instagram"></i></a>
              <a href=""><i class="icofont-linkedin"></i></a>
              <p>เขียนเมื่อ {{$content->created_at}}</p>
              <a  href="{{ route('contents.show',$content->id) }}">อ่านเพิ่มเติม</a>
            </div>
            <form align = "right" class="mt-3 p-3" action="{{ route('contents.destroy',$content->id) }}" method="POST">
                <a href="{{ route('contents.edit',$content->id) }}"><img src="{{asset('assets/img/edit.svg')}}" alt="" height="30px" width="30px"></a>
                @csrf
                @method('DELETE')
            <button class="myButton"> <img src="{{asset('assets/img/delete.svg')}}" alt="" height="30px" width="30px"></button>
            </form>
          </div>
        </div>
        @endforeach
      </div>

    </div>
  </section><!-- End Team Section -->

  <div class="mt-5"></div>
  {!! $contents->links() !!}
@endsection