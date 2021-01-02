<?php

namespace App\Http\Controllers;
use App\Models\Content;
use App\Models\hotel;
use App\Models\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\GuideController;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Support\Facades\Storage;
use function PHPSTORM_META\type;

class ContentCRUDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    $data['contents'] = Content::orderBy('id','desc')->simplePaginate(3);
    return view('contents.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contents.create');
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
        'name'=> 'required',
        'detail' => 'required',
        'ampher'=> 'required',
        'type'=> 'required',
        'people'=> 'required',
        'day'=> 'required',
        'lat'=> 'required',
        'long'=> 'required',
        'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',],

        [
            'name.required' => 'กรุณาใส่ชื่อสถานที่ด้วยครับ' ,
            'detail.required'=> 'กรุณาใส่รายละเอียด',
            'type.required' => 'กรุณาเลือกรูปแบบการท่องเที่ยว',
            'lat.required' => 'กรุณาระบุ ละติจูด',
            'long.required' => 'กรุณาระบุ ลองติจูด',
            'image.required' => 'กรุณาเลือกรูปภาพด้วยครับ',
        ]

    );


        $path = $request->file('image')->store('public/images');
        $content = new Content;
        $content ->name = $request->name;
        $content ->detail = $request->detail;
        $content ->ampher = $request->ampher;
        // $content ->type = implode(",",$request->type);
        $content['type'] = $request->input('type');
        // $content ->type = $request->type;
        $content ->people = $request->people;
        $content ->day = $request->day;
        $content ->lat = $request->lat;
        $content ->long = $request->long;
        $content->image = $path;

        $content ->save();

        return redirect()->route('contents.index')
        ->with('success', 'บันทึกรายการ สถานที่ท่องเที่ยว สำเร็จ !!');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\content $content
     * @return \Illuminate\Http\Response
     */
    public function show(Content $content)
    {
        $h_data['hotels'] = hotel::orderBy('id','desc')->simplePaginate(3);
        $h_data['shops'] = Shop::orderBy('id','desc')->simplePaginate(3);
        return view('contents.show',$h_data,compact('content'));
    }


    /**
     * Show the form for editing the specified resource.
     * @param  \App\content $content
     * @return \Illuminate\Http\Response
     */
    public function edit(Content $content)
    {

        return view('contents.edit',compact('content'));

        // return dd($content->type);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\content  $content
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $request->validate([
        'name'=> 'required',
        'detail' => 'required',
        'ampher'=> 'required',
        'type'=> 'required',
        'people'=> 'required',
        'day'=> 'required',
        'lat'=> 'required',
        'long'=> 'required',] ,

        [
            'name.required' => 'กรุณาใส่ชื่อสถานที่ด้วยครับ' ,
            'detail.required'=> 'กรุณาใส่รายละเอียด',
            'type.required' => 'กรุณาเลือกรูปแบบการท่องเที่ยว',
            'lat.required' => 'กรุณาระบุ Lat',
            'long.required' => 'กรุณาระบุ Long',
            'image.required' => 'กรุณาเลือกรูปภาพด้วยครับ',
        ]);


        $content = Content::find($id);
        if ($request->hasFile('image')){
            Storage::delete($content->image);
            $request->validate(['image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $path = $request->file('image')->store('public/images');
            $content->image = $path;
        }



        $content ->name = $request->name;
        $content ->detail = $request->detail;
        $content ->ampher = $request->ampher;
        // $content ->type = $request->type;
        $content['type'] = $request->input('type');
        // $content ->type = implode(",",$request->type);
        $content ->people = $request->people;
        $content ->day = $request->day;
        $content ->lat = $request->lat;
        $content ->long = $request->long;
        $content->save();

        return redirect()->route('contents.index')->with('success','อัพเดท สถานที่ท่องเที่ยว สำเร็จ !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\content $content
     * @return \Illuminate\Http\Response
     */
    public function destroy(Content $content)
    {

        Storage::delete($content->image);
        $content->delete();
        return redirect()->route('contents.index')
                        ->with('success','ลบรายการ สถานที่ท่องเที่ยว สำเร็จ !!');
    }

}

