@extends('layouts.console')
@section('title','จัดการข้อมูล ที่พัก/โรงแรม')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">ตาราง ที่พัก/โรงแรม</h1>
    <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit, nemo.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><a href="{{route('hotels.create')}}"> เพิ่มข้อมูล ที่พัก/โรงแรม</a></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered"  width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ชื่อที่พัก/โรงแรม</th>
                            <th>อำเภอ</th>
                            <th>วันที่เขียน</th>
                            <th>อัพเดทล่าสุด</th>
                            <th>แก้ไข/ลบ</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ชื่อที่พัก/โรงแรม</th>
                            <th>อำเภอ</th>
                            <th>วันที่เขียน</th>
                            <th>อัพเดทล่าสุด</th>
                            <th>แก้ไข/ลบ</th>
                        </tr>
                    </tfoot>

                    <tbody>
                        @foreach ($hotels as $hotel)
                        <tr>
                       
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

