@extends('layouts.show')
@section('title','ล็อคอิน')
@section('content')



<div class="d-flex justify-content-center mt-5">
<section id="team" class="team section-bg col-sm-8 mt-6 ">
<center><img class="rounded-circle" src="{{ asset('assets/img/login.svg') }}" alt="" height="150px" width="150px"></center>
<center><h2 class="mt-2">เข้าสู่ระบบ</h2></center>

<form action="{{route('loginweb.create')}}" enctype="multipart/form-data">
    <div class="form-group mt-4">
      <label for="username">Username :</label>
      <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
    </div>
    @error('username')
    <div class="alert alert-danger mb-1 mt-1">{{$message}}</div>
    @enderror

    <div class="form-group mt-4">
      <label for="password">Password :</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
    </div>
    @error('password')
    <div class="alert alert-danger mb-1 mt-1">{{$message}}</div>
    @enderror

    <div class="form-group form-check mt-3">
      <input type="checkbox" class="form-check-input" id="check" name="check"> 
      <label class="form-check-label" for="check">ยืนยันการเข้าสู่ระบบ</label>
    </div>
    @error('check')
    <div class="alert alert-danger mb-1 mt-1">{{$message}}</div>
    @enderror

    <button type="submit" class="btn btn-primary">เข้าสู่ระบบ</button>
  </form>

</section>
</div></div>
    
@endsection