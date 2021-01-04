@extends('layouts.show')
@section('title','จัดการข้อมูล')
@section('content')
<br><br>
<!-- ======= Team Section ======= -->
<section id="team" class="team section-bg mt-5">
<div class="container">

    <h2><strong>1. จัดการข้อมูล สถานที่ท่องเที่ยว</strong></h2>

    <table class="table mt-4">
        <thead class="thead-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">ชื่อสถานที่ท่องเที่ยว</th>
            <th scope="col">อำเภอ</th>
            <th scope="col">วันที่เขียน</th>
            <th scope="col">อัพเดทล่าสุด</th>
            <th scope="col">แก้ไข/ลบ</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($contents as $content)
          <tr>
            <th scope="row">{{ $content->id}}</th>
            <td>{{ $content->name}}</td>
            <td>{{ $content->ampher }}</td>
            <td>{{ $content->created_at}}</td>
            <td>{{ $content->updated_at}}</td>
            <td><form id="cf" class="mt-3 p-3" action="{{route('contents.destroy', $content->id) }}"method="POST">
            <a href="{{ route('contents.edit', $content->id) }}"><img src="{{ asset('assets/img/edit.svg') }}" alt="" height="30px" width="30px"></a>
                @csrf
                @method('DELETE')
                <button type="button" class="myButton" onclick="return del()" > <img
                        src="{{ asset('assets/img/delete.svg') }}" alt="" height="30px"
                        width="30px"> </button>
            </form></td>
          </tr>
        </tbody>
        @endforeach
      </table>
      <div align="right" class="mt-5">{{ $contents->links() }}</div>


      <hr>


      {{-- ที่พัก/โรงแรม --}}
      <h2 class="mt-5"><strong>2. จัดการข้อมูล ที่พัก/โรงแรม</strong></h2>
      <table class="table mt-4">
        <thead class="thead-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">ชื่อที่พัก/โรงแรม</th>
            <th scope="col">อำเภอ</th>
            <th scope="col">วันที่เขียน</th>
            <th scope="col">อัพเดทล่าสุด</th>
            <th scope="col">แก้ไข/ลบ</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($hotels as $hotel)
          <tr>
            <th scope="row">{{ $hotel->id}}</th>
            <td>{{ $hotel->h_name}}</td>
            <td>{{ $hotel->h_ampher }}</td>
            <td>{{ $hotel->created_at}}</td>
            <td>{{ $hotel->updated_at}}</td>
            <td><form id="cf" class="mt-3 p-3" action="{{route('hotels.destroy', $hotel->id) }}"method="POST">
            <a href="{{ route('hotels.edit', $hotel->id) }}"><img src="{{ asset('assets/img/edit.svg') }}" alt="" height="30px" width="30px"></a>
                @csrf
                @method('DELETE')
                <button type="button" class="myButton" onclick="return del()" > <img
                        src="{{ asset('assets/img/delete.svg') }}" alt="" height="30px"
                        width="30px"> </button>
            </form></td>
          </tr>
        </tbody>
        @endforeach
      </table>
      <div align="right" class="mt-5">{{ $hotels->links() }}</div>

      <hr>

            {{-- ร้านอาหาร/ของฝาก --}}
            <h2 class="mt-5"><strong>3. จัดการข้อมูล ร้านอาหาร/ของฝาก</strong></h2>
            <table class="table mt-4">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">ชื่อร้านค้า/ของฝาก</th>
                  <th scope="col">อำเภอ</th>
                  <th scope="col">วันที่เขียน</th>
                  <th scope="col">อัพเดทล่าสุด</th>
                  <th scope="col">แก้ไข/ลบ</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($shops as $shop)
                <tr>
                  <th scope="row">{{ $shop->id}}</th>
                  <td>{{ $shop->s_name}}</td>
                  <td>{{ $shop->s_ampher }}</td>
                  <td>{{ $shop->created_at}}</td>
                  <td>{{ $shop->updated_at}}</td>

                  <td><form id="cf" class="mt-3 p-3" action="{{route('shops.destroy', $shop->id) }}"method="POST">
                  <a href="{{ route('shops.edit', $shop->id) }}"><img src="{{ asset('assets/img/edit.svg') }}" alt="" height="30px" width="30px"></a>
                      @csrf
                      @method('DELETE')
                      <button type="button" class="myButton" onclick="return del()" > <img
                              src="{{ asset('assets/img/delete.svg') }}" alt="" height="30px"
                              width="30px"> </button>
                  </form></td>
                </tr>
              </tbody>
              @endforeach
            </table>
            <div align="right" class="mt-5">{{ $shops->links() }}</div>




</div>
</section><!-- End Team Section -->


@if (session()->has('success'))
<script>
 swal("<?php echo session()->get('success'); ?>", "", "success");
</script>
@endif

<script>
    function del() {
        swal({
            title: "",
            text: "คุณต้องการลบเนื้อหาในส่วนนี้ใช่ไหม  ?",
            icon: "warning",
            buttons: ['ยกเลิก','ยืนยัน'],
            dangerMode: true,
        }).then(function(isConfirm) {
            if (isConfirm) {
                document.getElementById("cf").submit();
            } else {
                swal("ยกเลิก !" , "กลับมายังหน้าเดิม", "error");
            }
        })
    }
</script>


@endsection

