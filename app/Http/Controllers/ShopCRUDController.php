<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use Illuminate\Support\Facades\Storage;

class ShopCRUDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $s_data['shops'] = Shop::orderBy('id','desc')->simplePaginate(3);
        return view('shops.index',$s_data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shops.create');
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
        's_name'=> 'required',
        's_detail' => 'required',
        's_ampher'=> 'required',
        's_lat'=> 'required',
        's_long'=> 'required',
        's_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',],

        [
            's_name.required' => 'กรุณาใส่ชื่อ ที่พัก/โรงแรมด้วยครับ' ,
            's_detail.required'=> 'กรุณาใส่รายละเอียด',
            's_lat.required' => 'กรุณาระบุ ละติจูด',
            's_long.required' => 'กรุณาระบุ ลองติจูด',
            's_image.required' => 'กรุณาเลือกรูปภาพด้วยครับ',
        ]

    );

        $path = $request->file('s_image')->store('public/images');
        $shop = new Shop;
        $shop ->s_name = $request->s_name;
        $shop ->s_detail = $request->s_detail;
        $shop ->s_ampher = $request->s_ampher;
        $shop ->s_lat = $request->s_lat;
        $shop ->s_long = $request->s_long;
        $shop->s_image = $path;
        $shop ->save();

        return redirect()->route('shops.index')
        -> with('success','บันทึกรายการ ร้านค้า/ของฝาก สำเร็จ !!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $shop)
    {
        return view('shops.show',compact('shop'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Shop $shop)
    {
        return view('shops.edit',compact('shop'));
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
            's_name'=> 'required',
            's_detail' => 'required',
            's_lat'=> 'required',
            's_long'=> 'required',] ,

            [
                's_name.required' => 'กรุณาใส่ชื่อ ร้านค้า/ของฝาก ด้วยครับ' ,
                's_detail.required'=> 'กรุณาใส่รายละเอียด',
                's_lat.required' => 'กรุณาระบุ ละติจูด',
                's_long.required' => 'กรุณาระบุ ลองติจูด',
                's_image.required' => 'กรุณาเลือกรูปภาพด้วยครับ',
            ]);


            $shop = Shop::find($id);
            if ($request->hasFile('s_image')){
                Storage::delete($shop->s_image);
                $request->validate(['s_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                ]);
                $path = $request->file('s_image')->store('public/images');
                $shop->s_image = $path;
            }

            $shop ->s_name = $request->s_name;
            $shop ->s_detail = $request->s_detail;
            $shop ->s_ampher = $request->s_ampher;
            $shop ->s_lat = $request->s_lat;
            $shop ->s_long = $request->s_long;
            $shop ->save();

            return redirect()->route('shops.index')->with('success','อัพเดทรายการ ร้านค้า/ของฝาก สำเร็จ !!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop)
    {
        Storage::delete($shop->s_image);
        $shop->delete();
        return redirect()->route('shops.index')
                        ->with('success','ลบรายการ ร้านค้า/ของฝาก สำเร็จ !!');
    }
}
