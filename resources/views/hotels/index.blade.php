@extends('layouts.main')
@section('title', 'TAK Hotel')
@section('content')

@if (session()->has('success'))

<script>
     swal("<?php echo session()->get('success'); ?>", "", "success");
</script>

@endif

    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg mt-5">
        <div class="container">

            <div class="section-title">
                <span>โรงแรม ใหม่ที่แนะนำ</span>
                <h2>โรงแรม  ใหม่ที่แนะนำ</h2>
                <p>

                    Lorem ipsum dolor sit amet.
                </p>
            </div>
            <div class="row">
                @foreach ($hotels as $hotel)
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">

                        <div class="member">
                            <img class="position-absolute" src="{{ asset('assets/img/newl.svg') }}" height="45px"
                                width="45px">
                            <img class="page-content" src="{{ asset('storage/'.$hotel->h_image) }}" height="154.89px"
                                width="275px" />
                            <a href="{{ route('hotels.show', $hotel->id) }}">
                                <h4> {{ $hotel->h_name }}</h4>
                            </a>
                            <span>อำเภอ {{ $hotel->h_ampher }}</span>
                            <hr> <br>
                            <p class="a">{{ $hotel->h_detail }}</p>
                            <div class="social">
                                <a href="https://www.facebook.com/taktravel" target="_blank"><i
                                        class="icofont-facebook"></i></a>
                                <a href="https://www.instagram.com/taktravel/" target="_blank"><i
                                        class="icofont-instagram"></i></a>
                                        <p> เขียนเมื่อ {{ $hotel->created_at }} <br>
                                            อัพเดทล่าสุด {{ $hotel->updated_at }} </p>
                                <a href="{{ route('hotels.show', $hotel->id) }}">อ่านเพิ่มเติม</a>
                            </div>
                            <form align="right" id="cf" class="mt-3 p-3" action="{{ route('hotels.destroy', $hotel->id) }}"
                                method="POST">
                                <a href="{{ route('hotels.edit', $hotel->id) }}"><img
                                        src="{{ asset('assets/img/edit.svg') }}" alt="" height="30px" width="30px"></a>
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="return del()" class="myButton"> <img
                                        src="{{ asset('assets/img/delete.svg') }}" alt="" height="30px"
                                        width="30px"></button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
            <div align="center" class="mt-5">{{ $hotels->links() }}</div>
        </div>
    </section><!-- End Team Section -->


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
