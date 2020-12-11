@extends('layouts.main')
@section('title','GUIDE | TAK Travel')
@section('content')


<h1 class="container"> Show data</h1>

    @if (Session::has('user'))
    <h6 class="pl-3">มีข้อมูล</h6>
    @else 
    <h6 class="pl-3">ไม่มีข้อมูล</h6>
    @endif
    {{-- <p class="alert alert-info">{{ Session::get('user') }}</p> --}}

@endsection
