@extends('layouts.main')
@section('title', 'Edit')
@section('content')


    @if (session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ section('status') }}
        </div>
    @endif


    <h1>EDIT DATA</h1>
    <hr> <br>
    <form action="{{ route('contents.update', $content->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">ชื่อสถานที่ท่องเที่ยว :</label>
            <input type="text" class="form-control" name="name" value="{{ $content->name }}">
            @error('name')
                <div class="alert alert-danger mb-1 mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="detail">รายละเอียด :</label>
            <textarea class="form-control" name="detail" rows="3"
                placeholder="content detail">{{ $content->detail }}</textarea>
            @error('detail')
                <div class="alert alert-danger mb-1 mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="ampher">อำเภอ :</label>
            <select class="form-control" name="ampher">
                <option selected>{{ $content->ampher }}</option>
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
            @error('ampher')
                <div class="alert alert-danger mb-1 mt-1">{{ $message }}</div>
            @enderror
        </div>


        <p class="form-group">รูปแบบการท่องเที่ยว :</p>
        <p><strong> ข้อมูลเดิม : </strong>
            @foreach ((array)$content->type as $value)
            &nbsp;
            &nbsp;
            &nbsp;
            <input class="form-check-input" type="checkbox" name="type[]" checked value="{{$value}}">
           <label class="form-check-label">{{$value}}</label>
           @endforeach
        </p>

        <div class="col-sm-6 pl-5">
            <input class="form-check-input" type="checkbox" name="type[]"
             value="ด้านธรรมชาติ">
            <label class="form-check-label">ด้านธรรมชาติ</label>
        </div>

        <div class="col-sm-6 pl-5">
            <input class="form-check-input" type="checkbox"name="type[]"
            value="ด้านวัฒนธรรมประเพณีวิถีชีวิต">
            <label class="form-check-label">ด้านวัฒนธรรมประเพณีวิถีชีวิต</label>
        </div>

        <div class="col-sm-6 pl-5">
            <input class="form-check-input" type="checkbox" name="type[]"
            value="ด้านสิ่งที่มนุษย์สร้างขึ้น">
            <label class="form-check-label">ด้านสิ่งที่มนุษย์สร้างขึ้น</label>
        </div>

        <div>
            @error('type')
                <div class="alert alert-danger mb-1 mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mt-4">
            <label for="people">จำนวนนักท่องเที่ยวที่แนะนำ :</label>
            <select class="form-control" name="people">
                <option selected>{{ $content->people }}</option>
                <option value="เที่ยวเดี่ยว">เที่ยวเดี่ยว</option>
                <option value="เที่ยวแบบคู่">เที่ยวแบบคู่</option>
                <option value="เที่ยวแบบกลุ่ม">เที่ยวแบบกลุ่ม</option>
                <option value="เที่ยวแบบหมู่คณะ">เที่ยวแบบหมู่คณะ</option>
            </select>
            @error('people')
                <div class="alert alert-danger mb-1 mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="day">จำนวนวันที่ใช้ในการเที่ยวที่แนะนำ :</label>
            <select class="form-control" name="day">
                <option selected>{{ $content->day }}</option>
                <option value="1 วัน">1 วัน</option>
                <option value="2 วัน">2 วัน</option>
                <option value="3 วัน">3 วัน</option>
                <option value="4 วัน">4 วัน</option>
                <option value="5 วัน">5 วันขึ้นไป</option>
            </select>
            @error('day')
                <div class="alert alert-danger mb-1 mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="lat">ละติจูด (Latitude) :</label>
            <input type="text" class="form-control" name="lat" value="{{ $content->lat }}">
            @error('lat')
                <div class="alert alert-danger mb-1 mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="long">ลองจิจูด (Longitude) :</label>
            <input type="text" class="form-control" name="long" value="{{ $content->long }}">
            @error('long')
                <div class="alert alert-danger mb-1 mt-1">{{ $message }}</div>
            @enderror
        </div>

        {{-- form image --}}
        <div class="row">
            <div class="col-md-6">
                <input type="file" name="image" class="form-control">
                @error('image')
                    <div class="alert alert-danger mb-1 mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group mt-5">
            <img src="{{ asset('storage/'.$content->image) }}" height="30%" width="30%" alt="" />
        </div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
        </div>

    </form>
    <div class="mt-5"></div>

@endsection
