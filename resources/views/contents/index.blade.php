@extends('layouts.main')
@section('title','home')
@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

    <a href="{{route('contents.create')}}"> create </a>

    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            {{-- <th scope="col">Detail</th> --}}
            <th scope="col">Ampher</th>
            <th scope="col">Type</th>
            <th scope="col">People</th>
            <th scope="col">Day</th>
            <th scope="col">Lat</th>
            <th scope="col">Long</th>
            <th scope="col">Image</th>
            <th scope="col">Date</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
            <tr>
        </thead>
        @foreach ($contents as $content)


        <tbody>
            <tr>
                <th scope="row">{{$content->id}}</th>
                <td>{{$content->name}}</td>
                {{-- <td>{{$content->detail}}</td> --}}
                <td>{{$content->ampher}}</td>
                <td>{{$content->type}}</td>
                <td>{{$content->people}}</td>
                <td>{{$content->day}}</td>
                <td>{{$content->lat}}</td>
                <td>{{$content->long}}</td>
                <td><img src="{{ Storage::url($content->image) }}" height="75" width="75" alt="" /></td>
                <td>{{$content->created_at}}</td>
                <td>
                    <form action="{{ route('contents.destroy',$content->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('contents.edit',$content->id) }}">Edit</a>    </td>
                        @csrf
                        @method('DELETE')
                        <td>  <button type="submit" class="btn btn-danger">Delete</button> 
                    </form> </td>
              </tr>
        </tbody>

        @endforeach
    </table>

<!-- ======= Team Section ======= -->
<section id="team" class="team section-bg">
    <div class="container">

      <div class="section-title">
        <span>สถานที่ท่องเที่ยว</span>
        <h2>สถานที่ท่องเที่ยว</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, eum.</p>
      </div>
      <div class="row">
        @foreach ($contents as $content)
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
          <div class="member">
            <img src="{{ Storage::url($content->image) }}" height="154.89px" width="275px" alt="" />
            <h4>{{$content->name}}</h4>
            <span>อำเภอ {{$content->ampher}}</span>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime vitae in fuga culpa. Nihil harum deserunt dolore facere architecto totam!
            </p>
            <div class="social">
              <a href=""><i class="icofont-twitter"></i></a>
              <a href=""><i class="icofont-facebook"></i></a>
              <a href=""><i class="icofont-instagram"></i></a>
              <a href=""><i class="icofont-linkedin"></i></a>
              <p>เขียนเมื่อ {{$content->created_at}}</p>
              <a  href="{{ route('contents.show',$content->id) }}">คลิกเพื่ออ่าน</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
   

    </div>
  </section><!-- End Team Section -->
  {!! $contents->links() !!}
@endsection
