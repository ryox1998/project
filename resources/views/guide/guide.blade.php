@extends('layouts.show')
@section('title', 'guide')
@section('content')

    <div class="d-flex justify-content-center">
        <section id="team" class="team section-bg col-sm-8 mt-6 ">
            <h1 class="col-sm-8 mt-5">แนะนำสถานที่ท่องเที่ยว</h1>
            <form method="POST" action="{{ route('guide.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="col-sm-6 mt-3">
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
                    <input class="form-check-input" type="checkbox" name="use_type[]" value="ด้านธรรมชาติ">
                    <label class="form-check-label">ด้านธรรมชาติ</label>
                </div>
                <div class="col-sm-6 pl-5">
                    <input class="form-check-input" type="checkbox" name="use_type[]" value="ด้านวัฒนธรรมประเพณีวิถีชีวิต">
                    <label class="form-check-label">ด้านวัฒนธรรมประเพณีวิถีชีวิต</label>
                </div>
                <div class="col-sm-6 pl-5">
                    <input class="form-check-input" type="checkbox" name="use_type[]" value="ด้านสิ่งที่มนุษย์สร้างขึ้น">
                    <label class="form-check-label">ด้านสิ่งที่มนุษย์สร้างขึ้น</label>
                </div>

                @error('use_type')
                    <div class="alert alert-danger mb-1 mt-1">{{ $message }}</div>
                @enderror

                <div class="col-sm-6">
                    <br>
                    <label for="use_day">ระยะเวลาในการเที่ยว</label>
                    <select class="form-control" name="use_day">
                        <option value="1 วัน">1 วัน</option>
                        <option value="2 วัน">2 วัน</option>
                        <option value="3 วัน">3 วัน</option>
                        <option value="4 วัน">4 วัน</option>
                        <option value="5 วัน">5 วันขึ้นไป</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <label for="use_km">ระยะทางในการเดินทาง</label>
                    <select class="form-control" name="use_km">
                        <option value="10">ช่วง 10 Km.</option>
                        <option value="20">ช่วง 20 Km.</option>
                        <option value="30">ช่วง 30 Km.</option>
                        <option value="40">ช่วง 40 Km.</option>
                        <option value="50">ช่วง 50 Km. ขึ้นไป</option>
                    </select>
                </div>

                <br>
                {{-- Show Lat and Long --}}
                <a class="col-sm-8 mt-4 pl-3 text-danger " href="#" rel="noreferrer" onclick="getLocation()"><img
                        src="{{ asset('assets/img/location.svg') }}" alt="" height="15px"
                        width="15px"><U><small>คลิกเพื่อหาตำแหน่งปัจจุบันและกรุณารอซักครู่ !!</small></U></a>
                <p hidden class="mt-3 pl-3 text-primary" id="location"></p>

                {{-- End Show Lat and Long --}}

                {{-- input Latitude --}}
                <div class="input-group col-sm-6 ">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="num">ละติจูด</span>
                    </div>
                    <input id="Latitude" type="text" class="float form-control" placeholder="Latitude" aria-label="Username"
                        name="Latitude" aria-describedby="basic-addon1" >
                </div>
                @error('Latitude')
                    <div class="alert alert-danger mb-1 mt-1">{{ $message }}</div>
                @enderror
                {{-- End input Latitude --}}


                {{-- input Longitude --}}
                <div class="input-group col-sm-6 mt-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="num">ลองติจูด</span>
                    </div>
                    <input id="Longitude" type="text" class="float form-control" placeholder="Longitude" aria-label="Username"
                        name="Longitude" aria-describedby="basic-addon1">
                </div>

                {{-- End input Longitude --}}

                @error('Longitude')
                    <div class="alert alert-danger mb-1 mt-1">{{ $message }}</div>
                @enderror
                <div class="mt-3 pl-3"> <button class="btn btn-outline-success"
                        type="submit">ค้นหาสถานที่ท่องเที่ยว</button>
                </div>
            </form>
        </section>
    </div>

    <script>
        var x = document.getElementById('location');
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }

        function showPosition(position) {
            x.innerHTML = "Latitude: " + position.coords.latitude +
                "<br>Longitude: " + position.coords.longitude;
                $("#Latitude").val(position.coords.latitude);
                $("#Longitude").val(position.coords.longitude);
        }
    </script>








@endsection
