<?php

namespace App\Http\Controllers;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Location\Coordinate;
use Location\Distance\Vincenty;


class GuideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $use_people = $request->session()->get('use_people');
        $use_type = $request->session()->get('use_type');
        $use_day = $request->session()->get('use_day');
        $use_km = $request->session()->get('use_km');
        $Latitude = $request->session()->get('Latitude');
        $Longitude = $request->session()->get('Longitude');

        $type = "";
        foreach ((array)$use_type as $value) {
            $type = $type.$value;
        }

        // ->orWhere('type', '')
            if ($type == "ด้านธรรมชาติ") {
                // return dd('A');
                $data['contents'] = Content::where('type','["\u0e14\u0e49\u0e32\u0e19\u0e18\u0e23\u0e23\u0e21\u0e0a\u0e32\u0e15\u0e34"]')->orWhere('type', '["\u0e14\u0e49\u0e32\u0e19\u0e18\u0e23\u0e23\u0e21\u0e0a\u0e32\u0e15\u0e34","\u0e14\u0e49\u0e32\u0e19\u0e27\u0e31\u0e12\u0e19\u0e18\u0e23\u0e23\u0e21\u0e1b\u0e23\u0e30\u0e40\u0e1e\u0e13\u0e35\u0e27\u0e34\u0e16\u0e35\u0e0a\u0e35\u0e27\u0e34\u0e15"]')->orWhere('type', '["\u0e14\u0e49\u0e32\u0e19\u0e18\u0e23\u0e23\u0e21\u0e0a\u0e32\u0e15\u0e34","\u0e14\u0e49\u0e32\u0e19\u0e2a\u0e34\u0e48\u0e07\u0e17\u0e35\u0e48\u0e21\u0e19\u0e38\u0e29\u0e22\u0e4c\u0e2a\u0e23\u0e49\u0e32\u0e07\u0e02\u0e36\u0e49\u0e19"]')->orWhere('type', '["\u0e14\u0e49\u0e32\u0e19\u0e18\u0e23\u0e23\u0e21\u0e0a\u0e32\u0e15\u0e34","\u0e14\u0e49\u0e32\u0e19\u0e27\u0e31\u0e12\u0e19\u0e18\u0e23\u0e23\u0e21\u0e1b\u0e23\u0e30\u0e40\u0e1e\u0e13\u0e35\u0e27\u0e34\u0e16\u0e35\u0e0a\u0e35\u0e27\u0e34\u0e15","\u0e14\u0e49\u0e32\u0e19\u0e2a\u0e34\u0e48\u0e07\u0e17\u0e35\u0e48\u0e21\u0e19\u0e38\u0e29\u0e22\u0e4c\u0e2a\u0e23\u0e49\u0e32\u0e07\u0e02\u0e36\u0e49\u0e19"]')->simplePaginate(3);
                // return dd($data);
            }
            else if ($type == "ด้านวัฒนธรรมประเพณีวิถีชีวิต") {
                // return dd('B');
                $data['contents'] = Content::where('type','["\u0e14\u0e49\u0e32\u0e19\u0e27\u0e31\u0e12\u0e19\u0e18\u0e23\u0e23\u0e21\u0e1b\u0e23\u0e30\u0e40\u0e1e\u0e13\u0e35\u0e27\u0e34\u0e16\u0e35\u0e0a\u0e35\u0e27\u0e34\u0e15"]')->orWhere('type', '["\u0e14\u0e49\u0e32\u0e19\u0e27\u0e31\u0e12\u0e19\u0e18\u0e23\u0e23\u0e21\u0e1b\u0e23\u0e30\u0e40\u0e1e\u0e13\u0e35\u0e27\u0e34\u0e16\u0e35\u0e0a\u0e35\u0e27\u0e34\u0e15","\u0e14\u0e49\u0e32\u0e19\u0e2a\u0e34\u0e48\u0e07\u0e17\u0e35\u0e48\u0e21\u0e19\u0e38\u0e29\u0e22\u0e4c\u0e2a\u0e23\u0e49\u0e32\u0e07\u0e02\u0e36\u0e49\u0e19"]')->simplePaginate(3);
            }

            else if ($type == "ด้านสิ่งที่มนุษย์สร้างขึ้น") {
                // return dd('C');
                $data['contents'] = Content::where('type','["\u0e14\u0e49\u0e32\u0e19\u0e2a\u0e34\u0e48\u0e07\u0e17\u0e35\u0e48\u0e21\u0e19\u0e38\u0e29\u0e22\u0e4c\u0e2a\u0e23\u0e49\u0e32\u0e07\u0e02\u0e36\u0e49\u0e19"]')->simplePaginate(3);
            }

            else if ($type == "ด้านธรรมชาติด้านวัฒนธรรมประเพณีวิถีชีวิต") {
                // return dd('A & B');
                $data['contents'] = Content::where('type','["\u0e14\u0e49\u0e32\u0e19\u0e18\u0e23\u0e23\u0e21\u0e0a\u0e32\u0e15\u0e34"]')->orWhere('type', '["\u0e14\u0e49\u0e32\u0e19\u0e18\u0e23\u0e23\u0e21\u0e0a\u0e32\u0e15\u0e34","\u0e14\u0e49\u0e32\u0e19\u0e27\u0e31\u0e12\u0e19\u0e18\u0e23\u0e23\u0e21\u0e1b\u0e23\u0e30\u0e40\u0e1e\u0e13\u0e35\u0e27\u0e34\u0e16\u0e35\u0e0a\u0e35\u0e27\u0e34\u0e15"]')->orWhere('type', '["\u0e14\u0e49\u0e32\u0e19\u0e18\u0e23\u0e23\u0e21\u0e0a\u0e32\u0e15\u0e34","\u0e14\u0e49\u0e32\u0e19\u0e2a\u0e34\u0e48\u0e07\u0e17\u0e35\u0e48\u0e21\u0e19\u0e38\u0e29\u0e22\u0e4c\u0e2a\u0e23\u0e49\u0e32\u0e07\u0e02\u0e36\u0e49\u0e19"]')->orWhere('type', '["\u0e14\u0e49\u0e32\u0e19\u0e18\u0e23\u0e23\u0e21\u0e0a\u0e32\u0e15\u0e34","\u0e14\u0e49\u0e32\u0e19\u0e27\u0e31\u0e12\u0e19\u0e18\u0e23\u0e23\u0e21\u0e1b\u0e23\u0e30\u0e40\u0e1e\u0e13\u0e35\u0e27\u0e34\u0e16\u0e35\u0e0a\u0e35\u0e27\u0e34\u0e15","\u0e14\u0e49\u0e32\u0e19\u0e2a\u0e34\u0e48\u0e07\u0e17\u0e35\u0e48\u0e21\u0e19\u0e38\u0e29\u0e22\u0e4c\u0e2a\u0e23\u0e49\u0e32\u0e07\u0e02\u0e36\u0e49\u0e19"]')->simplePaginate(3);
            }

            else if ($type == "ด้านธรรมชาติด้านสิ่งที่มนุษย์สร้างขึ้น") {
                // return dd('A & C');
                $data['contents'] = Content::where('type','["\u0e14\u0e49\u0e32\u0e19\u0e18\u0e23\u0e23\u0e21\u0e0a\u0e32\u0e15\u0e34"]')->orWhere('type', '["\u0e14\u0e49\u0e32\u0e19\u0e18\u0e23\u0e23\u0e21\u0e0a\u0e32\u0e15\u0e34","\u0e14\u0e49\u0e32\u0e19\u0e27\u0e31\u0e12\u0e19\u0e18\u0e23\u0e23\u0e21\u0e1b\u0e23\u0e30\u0e40\u0e1e\u0e13\u0e35\u0e27\u0e34\u0e16\u0e35\u0e0a\u0e35\u0e27\u0e34\u0e15"]')->orWhere('type', '["\u0e14\u0e49\u0e32\u0e19\u0e18\u0e23\u0e23\u0e21\u0e0a\u0e32\u0e15\u0e34","\u0e14\u0e49\u0e32\u0e19\u0e2a\u0e34\u0e48\u0e07\u0e17\u0e35\u0e48\u0e21\u0e19\u0e38\u0e29\u0e22\u0e4c\u0e2a\u0e23\u0e49\u0e32\u0e07\u0e02\u0e36\u0e49\u0e19"]')->orWhere('type', '["\u0e14\u0e49\u0e32\u0e19\u0e18\u0e23\u0e23\u0e21\u0e0a\u0e32\u0e15\u0e34","\u0e14\u0e49\u0e32\u0e19\u0e27\u0e31\u0e12\u0e19\u0e18\u0e23\u0e23\u0e21\u0e1b\u0e23\u0e30\u0e40\u0e1e\u0e13\u0e35\u0e27\u0e34\u0e16\u0e35\u0e0a\u0e35\u0e27\u0e34\u0e15","\u0e14\u0e49\u0e32\u0e19\u0e2a\u0e34\u0e48\u0e07\u0e17\u0e35\u0e48\u0e21\u0e19\u0e38\u0e29\u0e22\u0e4c\u0e2a\u0e23\u0e49\u0e32\u0e07\u0e02\u0e36\u0e49\u0e19"]')->simplePaginate(3);
            }

            else if ($type == "ด้านธรรมชาติด้านวัฒนธรรมประเพณีวิถีชีวิตด้านสิ่งที่มนุษย์สร้างขึ้น") {
                // return dd('A  B  C');
                $data['contents'] = Content::where('type','["\u0e14\u0e49\u0e32\u0e19\u0e18\u0e23\u0e23\u0e21\u0e0a\u0e32\u0e15\u0e34"]')->orWhere('type', '["\u0e14\u0e49\u0e32\u0e19\u0e18\u0e23\u0e23\u0e21\u0e0a\u0e32\u0e15\u0e34","\u0e14\u0e49\u0e32\u0e19\u0e27\u0e31\u0e12\u0e19\u0e18\u0e23\u0e23\u0e21\u0e1b\u0e23\u0e30\u0e40\u0e1e\u0e13\u0e35\u0e27\u0e34\u0e16\u0e35\u0e0a\u0e35\u0e27\u0e34\u0e15"]')->orWhere('type', '["\u0e14\u0e49\u0e32\u0e19\u0e18\u0e23\u0e23\u0e21\u0e0a\u0e32\u0e15\u0e34","\u0e14\u0e49\u0e32\u0e19\u0e2a\u0e34\u0e48\u0e07\u0e17\u0e35\u0e48\u0e21\u0e19\u0e38\u0e29\u0e22\u0e4c\u0e2a\u0e23\u0e49\u0e32\u0e07\u0e02\u0e36\u0e49\u0e19"]')->orWhere('type', '["\u0e14\u0e49\u0e32\u0e19\u0e18\u0e23\u0e23\u0e21\u0e0a\u0e32\u0e15\u0e34","\u0e14\u0e49\u0e32\u0e19\u0e27\u0e31\u0e12\u0e19\u0e18\u0e23\u0e23\u0e21\u0e1b\u0e23\u0e30\u0e40\u0e1e\u0e13\u0e35\u0e27\u0e34\u0e16\u0e35\u0e0a\u0e35\u0e27\u0e34\u0e15","\u0e14\u0e49\u0e32\u0e19\u0e2a\u0e34\u0e48\u0e07\u0e17\u0e35\u0e48\u0e21\u0e19\u0e38\u0e29\u0e22\u0e4c\u0e2a\u0e23\u0e49\u0e32\u0e07\u0e02\u0e36\u0e49\u0e19"]')->orWhere('type', '["\u0e14\u0e49\u0e32\u0e19\u0e27\u0e31\u0e12\u0e19\u0e18\u0e23\u0e23\u0e21\u0e1b\u0e23\u0e30\u0e40\u0e1e\u0e13\u0e35\u0e27\u0e34\u0e16\u0e35\u0e0a\u0e35\u0e27\u0e34\u0e15"]')->orWhere('type', '["\u0e14\u0e49\u0e32\u0e19\u0e27\u0e31\u0e12\u0e19\u0e18\u0e23\u0e23\u0e21\u0e1b\u0e23\u0e30\u0e40\u0e1e\u0e13\u0e35\u0e27\u0e34\u0e16\u0e35\u0e0a\u0e35\u0e27\u0e34\u0e15","\u0e14\u0e49\u0e32\u0e19\u0e2a\u0e34\u0e48\u0e07\u0e17\u0e35\u0e48\u0e21\u0e19\u0e38\u0e29\u0e22\u0e4c\u0e2a\u0e23\u0e49\u0e32\u0e07\u0e02\u0e36\u0e49\u0e19"]')->orWhere('type', '["\u0e14\u0e49\u0e32\u0e19\u0e2a\u0e34\u0e48\u0e07\u0e17\u0e35\u0e48\u0e21\u0e19\u0e38\u0e29\u0e22\u0e4c\u0e2a\u0e23\u0e49\u0e32\u0e07\u0e02\u0e36\u0e49\u0e19"]')->simplePaginate(3);
            }

            else if ($type == "ด้านวัฒนธรรมประเพณีวิถีชีวิตด้านสิ่งที่มนุษย์สร้างขึ้น") {
                // return dd('B & C');
                $data['contents'] = Content::where('type','["\u0e14\u0e49\u0e32\u0e19\u0e27\u0e31\u0e12\u0e19\u0e18\u0e23\u0e23\u0e21\u0e1b\u0e23\u0e30\u0e40\u0e1e\u0e13\u0e35\u0e27\u0e34\u0e16\u0e35\u0e0a\u0e35\u0e27\u0e34\u0e15"]')->orWhere('type', '["\u0e14\u0e49\u0e32\u0e19\u0e27\u0e31\u0e12\u0e19\u0e18\u0e23\u0e23\u0e21\u0e1b\u0e23\u0e30\u0e40\u0e1e\u0e13\u0e35\u0e27\u0e34\u0e16\u0e35\u0e0a\u0e35\u0e27\u0e34\u0e15","\u0e14\u0e49\u0e32\u0e19\u0e2a\u0e34\u0e48\u0e07\u0e17\u0e35\u0e48\u0e21\u0e19\u0e38\u0e29\u0e22\u0e4c\u0e2a\u0e23\u0e49\u0e32\u0e07\u0e02\u0e36\u0e49\u0e19"]')->simplePaginate(3);
            }

            // $data['contents'] = Content::orderBy('id','desc')->simplePaginate(3);
        return view('guide.show',$data,compact('use_people','use_day','use_km','Latitude','Longitude'));
        // return dd($use_people,$use_type,$use_day,$use_km,$Latitude,$Longitude);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('guide.guide');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate(
        [
            'use_type'=> 'required',
            'Latitude'=> 'required',
            'Longitude'=> 'required'
        ],

            [
                'use_type.required' => 'กรุณาเลือกรูปแบบการท่องเที่ยวด้วยครับ',
                'Latitude.required' => 'กรุณากรอก ละติจูด ด้วยครับ',
                'Longitude.required' => 'กรุณากรอก ลองติจูด ด้วยครับ'
            ]

        );

        if($request->isMethod('post')) {

            $use_people = $request->get('use_people');
            $request->session()->put('use_people', $use_people);


            $use_type = $request->get('use_type');
            $request->session()->put('use_type', $use_type);

            $use_day = $request->get('use_day');
            $request->session()->put('use_day', $use_day);

            $use_km = $request->get('use_km');
            $request->session()->put('use_km', $use_km);

            $Latitude = $request->get('Latitude');
            $request->session()->put('Latitude', $Latitude);

            $Longitude = $request->get('Longitude');
            $request->session()->put('Longitude', $Longitude);

        }



        // $use_type = $request->get('use_type');
        // $use_day = $request->get('use_day');
        // $use_km = $request->get('use_km');
        return redirect()->route('guide.index');
        // return dd($use_people,$use_type,$use_day,$use_km,$Latitude,$Longitude);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
