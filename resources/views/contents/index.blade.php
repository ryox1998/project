@extends('layouts.main')
@section('title','home')
@section('content')

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{$message}}</p>
    </div>
@endif

    <h1>fecth data</h1>

    <a href="{{route('contents.create')}}"> create </a>

    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Detail</th>
            <th scope="col">Ampher</th>
            <th scope="col">Type</th>
            <th scope="col">People</th>
            <th scope="col">Day</th>
            <th scope="col">Lat</th>
            <th scope="col">Long</th>
            <th scope="col">Image</th>
            <th scope="col">Date</th>
            <tr>
        </thead>
        @foreach ($contents as $content)


        <tbody>
            <tr>
                <th scope="row">{{$content->id}}</th>
                <td>{{$content->name}}</td>
                <td>{{$content->detail}}</td>
                <td>{{$content->ampher}}</td>
                <td>{{$content->type}}</td>
                <td>{{$content->people}}</td>
                <td>{{$content->day}}</td>
                <td>{{$content->lat}}</td>
                <td>{{$content->long}}</td>
                <td>{{$content->image}}</td>
                <td>{{$content->created_at}}</td>
              </tr>

        </tbody>

        @endforeach
    </table>
@endsection
