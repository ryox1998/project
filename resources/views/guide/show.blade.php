@extends('layouts.main')
@section('title', 'GUIDE | TAK Travel')
@section('content')

    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg mt-5">
        <div class="container">

            <div class="section-title">
                <span>สะถานท่องเที่ยวที่แนะนำ</span>
                <h2>สะถานท่องเที่ยวที่แนะนำ</h2>
                <p>
                    ตาก..เที่ยวได้ทุกวัน ตาก..เที่ยวได้ทุกที่ ตาก..เที่ยวได้ทุกฤดู !!
                </p>
            </div>

            <div class="row">


                @foreach ($contents as $content) {{--
                    loopแสดงเนื้อหาสถานที่ท่องเที่ยว --}}
                    @foreach (Session::get('use_type') as $use_type)
                        {{-- loop ดูข้อมูลหน้าแนะนำสถานที่ท่องเที่ยว
                        Dataประเภทของการท่องเที่ยว --}}
                        @foreach ((array) $content->type as $value)
                            {{-- loop แสดงข้อมูลประเภทการท่องเที่ยวของ
                            Content--}}
                            @switch($use_km)
                                @case(10)
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
                                            @if ($km<=10)
                                            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                                                <div class="member">
                                                  <img  class="page-content" src="{{ asset('storage/'.$content->image) }}" height="154.89px" width="275px"  alt="" />

                                                  <a href="{{ route('contents.show',$content->id) }}"> <h4> {{$content->name}}</h4></a>
                                                  <span>อำเภอ {{$content->ampher}}</span> <hr> <br>
                                                      <p class="a">{{$content->detail}}</p>
                                                  <div class="social">
                                                    <a href="https://www.facebook.com/taktravel" target="_blank" ><i class="icofont-facebook"></i></a>
                                                    <a href="https://www.instagram.com/taktravel/" target="_blank"><i class="icofont-instagram"></i></a>
                                                    <p>เขียนเมื่อ {{$content->created_at}}</p>
                                                    <a  href="{{ route('contents.show',$content->id) }}">อ่านเพิ่มเติม</a>
                                                  </div>
                                                  <form align = "right" class="mt-3 p-3" action="{{ route('contents.destroy',$content->id) }}" method="POST">
                                                      <a href="{{ route('contents.edit',$content->id) }}"><img src="{{asset('assets/img/edit.svg')}}" alt="" height="30px" width="30px"></a>
                                                      @csrf
                                                      @method('DELETE')
                                                  <button onclick="return confirm('คุณต้องการลบ ใช่ หรือ ไม่')" class="myButton"> <img src="{{asset('assets/img/delete.svg')}}" alt="" height="30px" width="30px"></button>
                                                  </form>
                                                </div>
                                              </div>
                                            @endif
                                @break
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
                            @if ($km<=29)
                            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                                <div class="member">
                                  <img  class="page-content" src="{{ asset('storage/'.$content->image) }}" height="154.89px" width="275px"  alt="" />

                                  <a href="{{ route('contents.show',$content->id) }}"> <h4> {{$content->name}}</h4></a>
                                  <span>อำเภอ {{$content->ampher}}</span> <hr> <br>
                                      <p class="a">{{$content->detail}}</p>
                                  <div class="social">
                                    <a href="https://www.facebook.com/taktravel" target="_blank" ><i class="icofont-facebook"></i></a>
                                    <a href="https://www.instagram.com/taktravel/" target="_blank"><i class="icofont-instagram"></i></a>
                                    <p>เขียนเมื่อ {{$content->created_at}}</p>
                                    <a  href="{{ route('contents.show',$content->id) }}">อ่านเพิ่มเติม</a>
                                  </div>
                                  <form align = "right" class="mt-3 p-3" action="{{ route('contents.destroy',$content->id) }}" method="POST">
                                      <a href="{{ route('contents.edit',$content->id) }}"><img src="{{asset('assets/img/edit.svg')}}" alt="" height="30px" width="30px"></a>
                                      @csrf
                                      @method('DELETE')
                                  <button onclick="return confirm('คุณต้องการลบ ใช่ หรือ ไม่')" class="myButton"> <img src="{{asset('assets/img/delete.svg')}}" alt="" height="30px" width="30px"></button>
                                  </form>
                                </div>
                              </div>
                            @endif
                                @break
                                @case(30)
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
                            @if ($km<=39)
                            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                                <div class="member">
                                  <img  class="page-content" src="{{ asset('storage/'.$content->image) }}" height="154.89px" width="275px"  alt="" />

                                  <a href="{{ route('contents.show',$content->id) }}"> <h4> {{$content->name}}</h4></a>
                                  <span>อำเภอ {{$content->ampher}}</span> <hr> <br>
                                      <p class="a">{{$content->detail}}</p>
                                  <div class="social">
                                    <a href="https://www.facebook.com/taktravel" target="_blank" ><i class="icofont-facebook"></i></a>
                                    <a href="https://www.instagram.com/taktravel/" target="_blank"><i class="icofont-instagram"></i></a>
                                    <p>เขียนเมื่อ {{$content->created_at}}</p>
                                    <a  href="{{ route('contents.show',$content->id) }}">อ่านเพิ่มเติม</a>
                                  </div>
                                  <form align = "right" class="mt-3 p-3" action="{{ route('contents.destroy',$content->id) }}" method="POST">
                                      <a href="{{ route('contents.edit',$content->id) }}"><img src="{{asset('assets/img/edit.svg')}}" alt="" height="30px" width="30px"></a>
                                      @csrf
                                      @method('DELETE')
                                  <button onclick="return confirm('คุณต้องการลบ ใช่ หรือ ไม่')" class="myButton"> <img src="{{asset('assets/img/delete.svg')}}" alt="" height="30px" width="30px"></button>
                                  </form>
                                </div>
                              </div>
                            @endif
                                @break
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
                            @if ($km<=49)
                            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                                <div class="member">
                                  <img  class="page-content" src="{{ asset('storage/'.$content->image) }}" height="154.89px" width="275px"  alt="" />

                                  <a href="{{ route('contents.show',$content->id) }}"> <h4> {{$content->name}}</h4></a>
                                  <span>อำเภอ {{$content->ampher}}</span> <hr> <br>
                                      <p class="a">{{$content->detail}}</p>
                                  <div class="social">
                                    <a href="https://www.facebook.com/taktravel" target="_blank" ><i class="icofont-facebook"></i></a>
                                    <a href="https://www.instagram.com/taktravel/" target="_blank"><i class="icofont-instagram"></i></a>
                                    <p>เขียนเมื่อ {{$content->created_at}}</p>
                                    <a  href="{{ route('contents.show',$content->id) }}">อ่านเพิ่มเติม</a>
                                  </div>
                                  <form align = "right" class="mt-3 p-3" action="{{ route('contents.destroy',$content->id) }}" method="POST">
                                      <a href="{{ route('contents.edit',$content->id) }}"><img src="{{asset('assets/img/edit.svg')}}" alt="" height="30px" width="30px"></a>
                                      @csrf
                                      @method('DELETE')
                                  <button onclick="return confirm('คุณต้องการลบ ใช่ หรือ ไม่')" class="myButton"> <img src="{{asset('assets/img/delete.svg')}}" alt="" height="30px" width="30px"></button>
                                  </form>
                                </div>
                              </div>
                            @endif
                                @break

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
                            @if ($km>0 && $km <=200)
                            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                                <div class="member">
                                  <img  class="page-content" src="{{ asset('storage/'.$content->image) }}" height="154.89px" width="275px"  alt="" />

                                  <a href="{{ route('contents.show',$content->id) }}"> <h4> {{$content->name}}</h4></a>
                                  <span>อำเภอ {{$content->ampher}}</span> <hr> <br>
                                      <p class="a">{{$content->detail}}</p>
                                  <div class="social">
                                    <a href="https://www.facebook.com/taktravel" target="_blank" ><i class="icofont-facebook"></i></a>
                                    <a href="https://www.instagram.com/taktravel/" target="_blank"><i class="icofont-instagram"></i></a>
                                    <p>เขียนเมื่อ {{$content->created_at}}</p>
                                    <a  href="{{ route('contents.show',$content->id) }}">อ่านเพิ่มเติม</a>
                                  </div>
                                  <form align = "right" class="mt-3 p-3" action="{{ route('contents.destroy',$content->id) }}" method="POST">
                                      <a href="{{ route('contents.edit',$content->id) }}"><img src="{{asset('assets/img/edit.svg')}}" alt="" height="30px" width="30px"></a>
                                      @csrf
                                      @method('DELETE')
                                  <button onclick="return confirm('คุณต้องการลบ ใช่ หรือ ไม่')" class="myButton"> <img src="{{asset('assets/img/delete.svg')}}" alt="" height="30px" width="30px"></button>
                                  </form>
                                </div>
                              </div>
                            @endif
                                @break
                                @default

                            @endswitch

                        @endforeach {{-- End
                        loopแสดงเนื้อหาสถานที่ท่องเที่ยว --}}
                    @endforeach {{-- End
                    loopดูข้อมูลหน้าแนะนำสถานที่ท่องเที่ยว Data ประเภทของการท่องเที่ยว --}}
                @endforeach {{-- End loopแสดงข้อมูลประเภทการท่องเที่ยวของ
                Content --}}


            </div>
            <div align="center" class="mt-5">{{ $contents->links() }}</div>
        </div>
    </section><!-- End Team Section -->





    {{-- {{ $value }}
    {{ $use_type }}
    {{ $use_people }}
    {{ $use_day }}
    {{ $use_km }}
    {{ $Latitude }}
    {{ $Longitude }} --}}


@endsection
