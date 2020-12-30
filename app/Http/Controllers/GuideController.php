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


        $data['contents'] = Content::orderBy('id','desc')->simplePaginate(3);
        return view('guide.show',$data,compact('use_people','use_type','use_day','use_km','Latitude','Longitude'));






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
