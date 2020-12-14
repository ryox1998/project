@extends('layouts.show')
@section('title', 'guide')
@section('content')



    <section id="team" class="team section-bg mt-6">
        <h1 class="col-sm-6 mt-5">แนะนำสถานที่ท่องเที่ยว</h1>


        <form method="POST" action="{{ route('guide.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="col-sm-6">
                <label for="use_people">มาเที่ยวกี่คน</label>
                <select class="form-control" name="use_people">
                    <option>เที่ยวเดี่ยว</option>
                    <option>เที่ยวแบบคู่</option>
                    <option>เที่ยวแบบกลุ่ม</option>
                    <option>เที่ยวแบบหมู่คณะ</option>
                </select>
            </div>


            <br>
            <p class="col-sm-6">รูปแบบการท่องเที่ยว</p>

            <div class="col-sm-6 pl-5">
                <input class="form-check-input" type="checkbox" name="use_type" value="ด้านธรรมชาติ">
                <label class="form-check-label" for="use_type">ด้านธรรมชาติ</label>
            </div>

            <div class="col-sm-6 pl-5">
                <input class="form-check-input" type="checkbox" name="use_type" value="ด้านวัฒนธรรมประเพณีวิถีชีวิต">
                <label class="form-check-label" for="use_type">ด้านวัฒนธรรมประเพณีวิถีชีวิต</label>
            </div>

            <div class="col-sm-6 pl-5">
                <input class="form-check-input" type="checkbox" name="use_type" value="ด้านสิ่งที่มนุษย์สร้างขึ้น">
                <label class="form-check-label" for="use_type">ด้านสิ่งที่มนุษย์สร้างขึ้น</label>
            </div>


            <div class="col-sm-6">
                <br>
                <label for="use_day">ระยะเวลาในการเที่ยว</label>
                <select class="form-control" name="use_day">
                    <option value="1">1 วัน</option>
                    <option value="2">2 วัน</option>
                    <option value="3">3 วัน</option>
                    <option value="4">4 วัน</option>
                    <option value="5">5 วันขึ้นไป</option>
                </select>
            </div>


            <div class="col-sm-6">
                <label for="use_km">ระยะทางในการเดินทาง</label>
                <select class="form-control" name="use_km">
                    <option value="10km">ภายใน 10 Km.</option>
                    <option value="20km">ภายใน 20 Km.</option>
                    <option value="30km">ภายใน 30 Km.</option>
                    <option value="40km">ภายใน 40 Km.</option>
                    <option value="50km">ภายใน 50 Km.</option>
                </select>
            </div>
            <div class="mt-3 pl-3"> <button class="btn btn-outline-success" type="submit">ค้นหาสถานที่ท่องเที่ยว</button>
            </div>
        </form>
    </section>
@endsection
