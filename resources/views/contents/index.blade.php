@extends('layouts.main')
@section('title', 'TAK Travel')
@section('content')

    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg mt-5">
        <div class="container">

            <div class="section-title">
                <span>สถานที่ท่องเที่ยว ใหม่ที่แนะนำ</span>
                <h2>สถานที่ท่องเที่ยว ใหม่ที่แนะนำ</h2>
                <p>

                    ตาก..เที่ยวได้ทุกวัน ตาก..เที่ยวได้ทุกที่ ตาก..เที่ยวได้ทุกฤดู !!
                </p>
            </div>
            <div class="row">
                @foreach ($contents as $content)
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">

                        <div class="member">

                            <img class="position-absolute" src="{{ asset('assets/img/newl.svg') }}" height="45px" width="45px">
                            <img class="page-content" src="{{ asset('assets/images/'.$content->image) }}" height="154.89px"
                                width="275px" />
                            <a href="{{ route('contents.show', $content->id) }}">
                                <h4> {{ $content->name }}</h4>
                            </a>
                            <span>อำเภอ {{ $content->ampher }}</span>
                            <hr> <br>
                            <p class="a">{{ $content->detail }}</p>
                            <div class="social">
                                <a href="https://www.facebook.com/taktravel" target="_blank"><i class="icofont-facebook"></i></a>
                                <a href="https://www.instagram.com/taktravel/" target="_blank"><i class="icofont-instagram"></i></a>
                                        <p> เขียนเมื่อ {{ $content->created_at }} <br>
                                            อัพเดทล่าสุด {{ $content->updated_at }} </p>
                                <a href="{{ route('contents.show', $content->id) }}">อ่านเพิ่มเติม</a>
                            </div>
                            @if (Route::has('login'))
                            @auth
                            <form  align="right" id="cf" class="mt-3 p-3" action="{{route('contents.destroy', $content->id) }}"method="POST">
                                <a href="{{ route('contents.edit', $content->id) }}"><img
                                        src="{{ asset('assets/img/edit.svg') }}" alt="" height="30px" width="30px"></a>
                                @csrf
                                @method('DELETE')
                                <button type="button" class="myButton" onclick="return del()" > <img
                                        src="{{ asset('assets/img/delete.svg') }}" alt="" height="30px"
                                        width="30px"> </button>
                            </form>
                            @endauth
                            @endif

                        </div>
                    </div>
                @endforeach
            </div>
            {{-- <div align="center" class="mt-5">{{ $contents->links() }}</div> --}}
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
