@extends('layouts.show')
@section('title','เพิ่มข้อมูลโรงแรม')
@section('content')


<div class="d-flex justify-content-center">
<section id="team" class="team section-bg col-sm-8 mt-6 ">
<h1 class="mt-5">เพิ่มข้อมูล ที่พัก/โรงแรม</h1>
<hr><br>

<form action="{{ route('hotels.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="h_name">ชื่อที่ พัก/โรงแรม :</label>
      <input type="text" class="form-control" name="h_name" placeholder="กรอก พัก/โรงแรม">
      @error('h_name')
      <div class="alert alert-danger mb-1 mt-1">{{$message}}</div>
      @enderror
    </div>

    <div class="form-group">
        <label for="h_detail">รายละเอียด :</label>
        <textarea class="form-control" name="h_detail" rows="3" placeholder="กรอก รายละเอียด"></textarea>
        @error('h_detail')
        <div class="alert alert-danger mb-1 mt-1">{{$message}}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="h_ampher">อำเภอ :</label>
        <select class="form-control" name="h_ampher">
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
        <div class="alert alert-danger mb-1 mt-1">{{$message}}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="h_lat">ละติจูด (Latitude) :</label>
        <input type="text" class="float form-control" name="h_lat" placeholder="เลขทศนิยม">
        @error('h_lat')
        <div class="alert alert-danger mb-1 mt-1">{{$message}}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="h_long">ลองติจูด (Longitude) :</label>
        <input type="text" class="float form-control" name="h_long" placeholder="เลขทศนิยม">
        @error('h_long')
        <div class="alert alert-danger mb-1 mt-1">{{$message}}</div>
        @enderror
      </div>

       {{-- form image --}}
      <div class="row">
        <div class="col-md-6 mt-3">
            <input type="file" name="h_image" class="form-control">
            @error('h_image')
            <div class="alert alert-danger mb-1 mt-1">{{$message}}</div>
            @enderror
        </div>
        <div class="col-md-6 mt-3">
            <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
        </div>
      </div>
  </form>

  <div class="mt-5"></div>
</section>
</div>


@endsection
