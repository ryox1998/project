@extends('layouts.main')
@section('title', 'Edit')
@section('content')


    @if (session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ section('status') }}
        </div>
    @endif


    <h1>จัดการข้อมูล ที่พัก/โรงแรม</h1>
    <hr> <br>
    <form action="{{ route('hotels.update', $hotel->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="h_name">ชื่อ ที่พัก/โรงแรม :</label>
            <input type="text" class="form-control" name="h_name" value="{{ $hotel->h_name }}">
            @error('h_name')
                <div class="alert alert-danger mb-1 mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="h_detail">รายละเอียด :</label>
            <textarea class="form-control" name="h_detail" rows="3"
                placeholder="content detail">{{ $hotel->h_detail }}</textarea>
            @error('h_detail')
                <div class="alert alert-danger mb-1 mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="h_ampher">อำเภอ :</label>
            <select class="form-control" name="h_ampher">
                <option selected>{{ $hotel->h_ampher }}</option>
                <option value="เมืองตาก">เมืองตาก</option>
                <option value="บ้านตาก">บ้านตาก</option>
                <option value="สามเงา">สามเงา</option>
                <option value="แม่สอด">แม่สอด</option>
                <option value="แม่ระมาด">แม่ระมาด</option>
                <option value="ท่าสองยาง">ท่าสองยาง</option>
                <option value="พบพระ">พบพระ</option>
                <option value="อุ้มผาง">อุ้มผาง</option>
                <option value="วังเจ้า">วังเจ้า</option>
            </select>
            @error('h_ampher')
                <div class="alert alert-danger mb-1 mt-1">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-group">
            <label for="h_lat">ละติจูด (Latitude) :</label>
            <input type="text" class="form-control" name="h_lat" value="{{ $hotel->h_lat }}">
            @error('h_lat')
                <div class="alert alert-danger mb-1 mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="h_long">ลองจิจูด (Longitude) :</label>
            <input type="text" class="form-control" name="h_long" value="{{ $hotel->h_long }}">
            @error('h_long')
                <div class="alert alert-danger mb-1 mt-1">{{ $message }}</div>
            @enderror
        </div>

        {{-- form image --}}
        <div class="row">
            <div class="col-md-6">
                <input type="file" name="h_image" class="form-control">
                @error('h_image')
                    <div class="alert alert-danger mb-1 mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group mt-5">
            <img src="{{ asset('storage/' . $hotel->h_image) }}" height="30%" width="30%" alt="" />
        </div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
        </div>

    </form>
    <div class="mt-5"></div>

@endsection
