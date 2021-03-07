@extends('layouts.console')
@section('title','จัดการข้อมูล ร้านอาหาร/ของฝาก')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">ตาราง ร้านอาหาร/ของฝาก</h1>
    <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit, nemo.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><a href="{{route('shops.create')}}"> เพิ่มข้อมูล ร้านอาหาร/ของฝาก</a></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered"  width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ชื่อร้านอาหาร/ของฝาก</th>
                            <th>อำเภอ</th>
                            <th>วันที่เขียน</th>
                            <th>อัพเดทล่าสุด</th>
                            <th>แก้ไข/ลบ</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ชื่อร้านอาหาร/ของฝาก</th>
                            <th>อำเภอ</th>
                            <th>วันที่เขียน</th>
                            <th>อัพเดทล่าสุด</th>
                            <th>แก้ไข/ลบ</th>
                        </tr>
                    </tfoot>

                    <tbody>
                        @foreach ($shops as $shop)
                        <tr>

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
        </div>
    </div>

</div>
<!-- /.container-fluid -->

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

