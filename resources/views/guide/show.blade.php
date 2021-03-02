@extends('layouts.main')
@section('title', 'GUIDE | TAK Travel')
@section('content')

    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg mt-5">
        <div class="container">

            <div class="section-title">
                <span>สถานท่องเที่ยวที่แนะนำ</span>
                <h2>สถานท่องเที่ยวที่แนะนำ</h2>
                <p>
                    ตาก..เที่ยวได้ทุกวัน ตาก..เที่ยวได้ทุกที่ ตาก..เที่ยวได้ทุกฤดู !!
                </p>
            </div>

            <div class="row">
                @foreach ($contents as $content) {{--loopแสดงเนื้อหาสถานที่ท่องเที่ยว --}}
                        @switch($use_km)
                        @case(20)
                        <?php
                        $lat1 = $Latitude ;
                        $lon1 = $Longitude;
                        $lat2 = $content->lat;
                        $lon2 = $content->long;
                        $theta = $lon1 - $lon2;
                        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
                        $dist = acos($dist);
                        $dist = rad2deg($dist);
                        $miles = $dist * 60 * 1.1515;
                        $km = $miles * 1.609344 ;
                         ?>

                         @if ($km <=20)
                             <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                                <div class="member">
                                  <img  class="page-content" src="{{ asset('assets/images/'.$content->image) }}" height="154.89px" width="275px"  alt="" />
                                  <a href="{{ route('contents.show',$content->id) }}"> <h4> {{$content->name}}</h4></a>
                                  <span>อำเภอ {{$content->ampher}}</span> <hr> <br>
                                      <p class="a">{{$content->detail}}</p>
                                  <div class="social">
                                    <a href="https://www.facebook.com/taktravel" target="_blank" ><i class="icofont-facebook"></i></a>
                                    <a href="https://www.instagram.com/taktravel/" target="_blank"><i class="icofont-instagram"></i></a>
                                    <p>เขียนเมื่อ {{$content->created_at}}</p>
                                    <a  href="{{ route('contents.show',$content->id) }}">อ่านเพิ่มเติม</a>
                                  </div>
                                  @if (Route::has('login'))
                                  @auth
                                  <form align = "right" class="mt-3 p-3" action="{{ route('contents.destroy',$content->id) }}" method="POST">
                                      <a href="{{ route('contents.edit',$content->id) }}"><img src="{{asset('assets/img/edit.svg')}}" alt="" height="30px" width="30px"></a>
                                      @csrf
                                      @method('DELETE')
                                  <button onclick="return confirm('คุณต้องการลบ ใช่ หรือ ไม่')" class="myButton"> <img src="{{asset('assets/img/delete.svg')}}" alt="" height="30px" width="30px"></button>
                                  </form>

                                  @endauth
                                  @endif
                                </div>
                              </div>
                         @endif
                            @break  {{-- case2 --}}

                            @case(40)
                            <?php
                            $lat1 = $Latitude ;
                            $lon1 = $Longitude;
                            $lat2 = $content->lat;
                            $lon2 = $content->long;
                            $theta = $lon1 - $lon2;
                            $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
                            $dist = acos($dist);
                            $dist = rad2deg($dist);
                            $miles = $dist * 60 * 1.1515;
                            $km = $miles * 1.609344 ;
                             ?>

                             @if ($km <=40)
                                 <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                                    <div class="member">
                                      <img  class="page-content" src="{{ asset('assets/images/'.$content->image) }}" height="154.89px" width="275px"  alt="" />
                                      <a href="{{ route('contents.show',$content->id) }}"> <h4> {{$content->name}}</h4></a>
                                      <span>อำเภอ {{$content->ampher}}</span> <hr> <br>
                                          <p class="a">{{$content->detail}}</p>
                                      <div class="social">
                                        <a href="https://www.facebook.com/taktravel" target="_blank" ><i class="icofont-facebook"></i></a>
                                        <a href="https://www.instagram.com/taktravel/" target="_blank"><i class="icofont-instagram"></i></a>
                                        <p>เขียนเมื่อ {{$content->created_at}}</p>
                                        <a  href="{{ route('contents.show',$content->id) }}">อ่านเพิ่มเติม</a>
                                      </div>
                                      @if (Route::has('login'))
                                      @auth
                                      <form align = "right" class="mt-3 p-3" action="{{ route('contents.destroy',$content->id) }}" method="POST">
                                          <a href="{{ route('contents.edit',$content->id) }}"><img src="{{asset('assets/img/edit.svg')}}" alt="" height="30px" width="30px"></a>
                                          @csrf
                                          @method('DELETE')
                                      <button onclick="return confirm('คุณต้องการลบ ใช่ หรือ ไม่')" class="myButton"> <img src="{{asset('assets/img/delete.svg')}}" alt="" height="30px" width="30px"></button>
                                      </form>
                                      @endauth
                                        @endif
                                    </div>
                                  </div>
                             @endif
                            @break  {{-- case2 --}}


                            @case(50)
                            <?php
                            $lat1 = $Latitude ;
                            $lon1 = $Longitude;
                            $lat2 = $content->lat;
                            $lon2 = $content->long;
                            $theta = $lon1 - $lon2;
                            $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
                            $dist = acos($dist);
                            $dist = rad2deg($dist);
                            $miles = $dist * 60 * 1.1515;
                            $km = $miles * 1.609344 ;
                             ?>

                             @if ($km >0)
                                 <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                                    <div class="member">
                                      <img  class="page-content" src="{{ asset('assets/images/'.$content->image) }}" height="154.89px" width="275px"  alt="" />
                                      <a href="{{ route('contents.show',$content->id) }}"> <h4> {{$content->name}}</h4></a>
                                      <span>อำเภอ {{$content->ampher}}</span> <hr> <br>
                                          <p class="a">{{$content->detail}}</p>
                                      <div class="social">
                                        <a href="https://www.facebook.com/taktravel" target="_blank" ><i class="icofont-facebook"></i></a>
                                        <a href="https://www.instagram.com/taktravel/" target="_blank"><i class="icofont-instagram"></i></a>
                                        <p>เขียนเมื่อ {{$content->created_at}}</p>
                                        <a  href="{{ route('contents.show',$content->id) }}">อ่านเพิ่มเติม</a>
                                      </div>
                                      @if (Route::has('login'))
                                        @auth
                                      <form align = "right" class="mt-3 p-3" action="{{ route('contents.destroy',$content->id) }}" method="POST">
                                          <a href="{{ route('contents.edit',$content->id) }}"><img src="{{asset('assets/img/edit.svg')}}" alt="" height="30px" width="30px"></a>
                                          @csrf
                                          @method('DELETE')
                                      <button onclick="return confirm('คุณต้องการลบ ใช่ หรือ ไม่')" class="myButton"> <img src="{{asset('assets/img/delete.svg')}}" alt="" height="30px" width="30px"></button>
                                      </form>
                                      @endauth
                                        @endif
                                    </div>
                                  </div>
                             @endif
                            @break  {{-- case2 --}}
                        @default
                    @endswitch
                @endforeach {{-- Endloopแสดงข้อมูลประเภทการท่องเที่ยวของContent --}}
            </div>

            {{-- <div align="center" class="mt-5">{{ $contents->links()}}</div> --}}

        </div>
    </section><!-- End Team Section -->








@endsection
