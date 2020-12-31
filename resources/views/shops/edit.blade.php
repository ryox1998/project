@extends('layouts.main')
@section('title', 'จัดการข้อมูล ร้านอาหาร/ของฝาก')
@section('content')


    @if (session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ section('status') }}
        </div>
    @endif


    <br><br><br><br>
    <div class="d-flex justify-content-center">
    <section id="team" class="team section-bg col-sm-8 mt-6 ">
    <h1>จัดการข้อมูล ที่พัก/โรงแรม</h1>
    <hr> <br>
    <form action="{{ route('shops.update', $shop->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="s_name">ชื่อ ที่พัก/โรงแรม :</label>
            <input type="text" class="form-control" name="s_name" value="{{ $shop->s_name }}">
            @error('s_name')
                <div class="alert alert-danger mb-1 mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="s_detail">รายละเอียด :</label>
            <textarea class="form-control" name="s_detail" rows="3"
                placeholder="content detail">{{ $shop->s_detail }}</textarea>
            @error('s_detail')
                <div class="alert alert-danger mb-1 mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="s_ampher">อำเภอ :</label>
            <select class="form-control" name="s_ampher">
                <option selected>{{ $shop->s_ampher }}</option>
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
            @error('s_ampher')
                <div class="alert alert-danger mb-1 mt-1">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-group">
            <label for="s_lat">ละติจูด (Latitude) :</label>
            <input type="text" class="form-control" name="s_lat" value="{{ $shop->s_lat }}">
            @error('s_lat')
                <div class="alert alert-danger mb-1 mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="s_long">ลองจิจูด (Longitude) :</label>
            <input type="text" class="form-control" name="s_long" value="{{ $shop->s_long }}">
            @error('s_long')
                <div class="alert alert-danger mb-1 mt-1">{{ $message }}</div>
            @enderror
        </div>

        {{-- form image --}}
        <div class="row">
            <div class="col-md-6">
                <input type="file" name="s_image" class="form-control">
                @error('s_image')
                    <div class="alert alert-danger mb-1 mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group mt-5">
            <img src="{{ asset('storage/' . $shop->s_image) }}" height="30%" width="30%" alt="" />
        </div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
        </div>

    </form>
    <div class="mt-5"></div>

</section>
</div>


@endsection
