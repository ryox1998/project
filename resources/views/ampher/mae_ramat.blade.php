@extends('layouts.main')
@section('title','mae_ramat')
@section('content')

<!-- ======= Team Section ======= -->
<section id="team" class="team section-bg mt-5">
    <div class="container">

      <div class="section-title">
        <span>อำเภอ แม่ระมาด</span>
        <h2>อำเภอ แม่ระมาด</h2>
        <p>

            ตาก..เที่ยวได้ทุกวัน ตาก..เที่ยวได้ทุกที่ ตาก..เที่ยวได้ทุกฤดู !!
        </p>
      </div>
      <div class="row">
        @foreach ($contents as $content)
        @if ($content->ampher == "แม่ระมาด")

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <img  class="page-content" src="{{ asset('storage/'.$content->image) }}" height="154.89px" width="275px"  alt="" />

              <a href="{{ route('contents.show',$content->id) }}"> <h4> {{$content->name}}</h4></a>
              <span>อำเภอ {{$content->ampher}}</span> <hr> <br>
                  <p class="a">{{$content->detail}}</p>
              <div class="social">
                <a href="https://www.facebook.com/taktravel" target="_blank" ><i class="icofont-facebook"></i></a>
                <a href="https://www.instagram.com/taktravel/" target="_blank"><i class="icofont-instagram"></i></a>
                <p>เขียนเมื่อ {{$content->created_at}}</p>
                <a  href="{{ route('contents.show',$content->id) }}">อ่านเพิ่มเติม</a>
              </div>
              <form align = "right" class="mt-3 p-3" action="{{ route('contents.destroy',$content->id) }}" method="POST">
                  <a href="{{ route('contents.edit',$content->id) }}"><img src="{{asset('assets/img/edit.svg')}}" alt="" height="30px" width="30px"></a>
                  @csrf
                  @method('DELETE')
              <button onclick="return confirm('คุณต้องการลบ ใช่ หรือ ไม่')" class="myButton"> <img src="{{asset('assets/img/delete.svg')}}" alt="" height="30px" width="30px"></button>
              </form>
            </div>
          </div>

        @endif
        @endforeach
      </div>
      <div align ="center" class="mt-5">{{ $contents->links() }}</div>
    </div>
  </section><!-- End Team Section -->

@endsection
