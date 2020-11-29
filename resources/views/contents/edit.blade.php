@extends('layouts.main')
@section('title','edit')
@section('content')


@if (session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{section('status')}}
    </div>
@endif

<h1>EDIT DATA</h1> <hr> <br>
<form action="{{ route('contents.update',$content->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="name">ชื่อสถานที่ท่องเที่ยว :</label>
      <input type="text" class="form-control" name="name" value="{{$content->name}}">
      @error('name')
      <div class="alert alert-danger mb-1 mt-1">{{$message}}</div>
      @enderror
    </div>

    <div class="form-group">
        <label for="detail">รายละเอียด :</label>
        <textarea class="form-control" name="detail" rows="3" placeholder="content detail">{{ $content->detail }}</textarea>
        @error('detail')
        <div class="alert alert-danger mb-1 mt-1">{{$message}}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="ampher">อำเภอ :</label>
        <select class="form-control" name="ampher" >
         <option selected>{{$content->ampher}}</option>
          <option>เมืองตาก</option>
          <option>บ้านตาก</option>
          <option>สามเงา</option>
          <option>แม่สอด</option>
          <option>แม่ระมาด</option>
          <option>ท่าสองยาง</option>
          <option>พบพระ</option>
          <option>อุ้มผาง</option>
          <option>วังเจ้า</option>
        </select>
        @error('ampher')
        <div class="alert alert-danger mb-1 mt-1">{{$message}}</div>
        @enderror
      </div>


      <div class="form-group">
        <label for="type">รูปแบบการท่องเที่ยว :</label>
        <select class="form-control" name="type">
         <option selected>{{$content->type}}</option>
          <option>ด้านธรรมชาติ</option>
          <option>ด้านวัฒนธรรมประเพณีวิถีชีวิต</option>
          <option>ด้านสิ่งที่มนุษย์สร้างขึ้น</option>
        </select>
        @error('type')
        <div class="alert alert-danger mb-1 mt-1">{{$message}}</div>
        @enderror
      </div>


    <div class="form-group">
      <label for="people">จำนวนนักท่องเที่ยวที่แนะนำ :</label>
      <select class="form-control" name="people">
        <option selected>{{$content->people}}</option>
        <option value="1">1 คน</option>
        <option value="2">2 คน</option>
        <option value="3">3 คน</option>
        <option value="4">4 คน</option>
        <option value="5">5 คนขึ้นไป</option>
      </select>
      @error('people')
      <div class="alert alert-danger mb-1 mt-1">{{$message}}</div>
      @enderror
    </div>

    <div class="form-group">
        <label for="day">จำนวนวันที่ใช้ในการเที่ยวที่แนะนำ :</label>
        <select class="form-control" name="day">
          <option selected>{{$content->day}}</option>
          <option value="1">1 วัน</option>
          <option value="2">2 วัน</option>
          <option value="3">3 วัน</option>
          <option value="4">4 วัน</option>
          <option value="5">5 วันขึ้นไป</option>
        </select>
        @error('day')
        <div class="alert alert-danger mb-1 mt-1">{{$message}}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="lat">Latitude :</label>
        <input type="text" class="form-control" name="lat" value="{{$content->lat}}">
        @error('lat')
        <div class="alert alert-danger mb-1 mt-1">{{$message}}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="long">Longitude :</label>
        <input type="text" class="form-control" name="long" value="{{$content->long}}">
        @error('long')
        <div class="alert alert-danger mb-1 mt-1">{{$message}}</div>
        @enderror
      </div>

       {{-- form image --}}
      <div class="row">
        <div class="col-md-6">
            <input type="file" name="image" class="form-control">
            @error('image')
            <div class="alert alert-danger mb-1 mt-1">{{$message}}</div>
            @enderror
        </div>
      </div>

      <div class="form-group mt-5">
        <img src="{{ Storage::url($content->image) }}" height="30%" width="30%" alt="" />
      </div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
        </div>
      </div>


  </form>
  <div class="mt-5"></div>

@endsection
