<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\hotel;
use Illuminate\Support\Facades\Storage;

class HotelCRUDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

            $h_data['hotels'] = hotel::orderBy('id','desc')->simplePaginate(3);
            return view('hotels.index',$h_data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hotels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
        'h_name'=> 'required',
        'h_detail' => 'required',
        'h_ampher'=> 'required',
        'h_lat'=> 'required',
        'h_long'=> 'required',
        'h_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',],

        [
            'h_name.required' => 'กรุณาใส่ชื่อ ที่พัก/โรงแรมด้วยครับ' ,
            'h_detail.required'=> 'กรุณาใส่รายละเอียด',
            'h_lat.required' => 'กรุณาระบุ ละติจูด',
            'h_long.required' => 'กรุณาระบุ ลองติจูด',
            'h_image.required' => 'กรุณาเลือกรูปภาพด้วยครับ',
        ]

    );

        $path = $request->file('h_image')->store('public/images');
        $hotel = new hotel;
        $hotel ->h_name = $request->h_name;
        $hotel ->h_detail = $request->h_detail;
        $hotel ->h_ampher = $request->h_ampher;
        $hotel ->h_lat = $request->h_lat;
        $hotel ->h_long = $request->h_long;
        $hotel->h_image = $path;
        $hotel ->save();

        return redirect()->route('hotels.index')
        -> with('success','บันทึกรายการ ที่พัก/โรงแรม สำเร็จ !!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(hotel $hotel)
    {
        return view('hotels.show',compact('hotel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(hotel $hotel)
    {
        return view('hotels.edit',compact('hotel'));
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
        {
            $request->validate([
            'h_name'=> 'required',
            'h_detail' => 'required',
            'h_lat'=> 'required',
            'h_long'=> 'required',] ,

            [
                'h_name.required' => 'กรุณาใส่ชื่อ ที่พัก/โรงแรมด้วยครับ' ,
                'h_detail.required'=> 'กรุณาใส่รายละเอียด',
                'h_lat.required' => 'กรุณาระบุ ละติจูด',
                'h_long.required' => 'กรุณาระบุ ลองติจูด',
                'h_image.required' => 'กรุณาเลือกรูปภาพด้วยครับ',
            ]);


            $hotel = hotel::find($id);
            if ($request->hasFile('h_image')){
                Storage::delete($hotel->h_image);
                $request->validate(['h_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                ]);
                $path = $request->file('h_image')->store('public/images');
                $hotel->h_image = $path;
            }

            $hotel ->h_name = $request->h_name;
            $hotel ->h_detail = $request->h_detail;
            $hotel ->h_ampher = $request->h_ampher;
            $hotel ->h_lat = $request->h_lat;
            $hotel ->h_long = $request->h_long;
            $hotel ->save();

            return redirect()->route('hotels.index')->with('success','อัพเดทรายการ ที่พัก/โรงแรม สำเร็จ !!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(hotel $hotel)
    {
        Storage::delete($hotel->h_image);
        $hotel->delete();
        return redirect()->route('hotels.index')
                        ->with('success','ลบรายการ ที่พัก/โรงแรม สำเร็จ !!');
    }
}
