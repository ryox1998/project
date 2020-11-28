<?php

namespace App\Http\Controllers;
use App\Models\Content;
use Illuminate\Http\Request;

class ContentCRUDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['contents'] = Content::orderBy('id','desc')->paginate(5);
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
        'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',]);
        
        $path = $request->file('image')->store('public/images');
        $content = new Content;
        $content ->name = $request->name;
        $content ->detail = $request->detail;
        $content ->ampher = $request->ampher;
        $content ->type = $request->type;
        $content ->people = $request->people;
        $content ->day = $request->day;
        $content ->lat = $request->lat;
        $content ->long = $request->long;
        $content->image = $path;

        $content ->save();

        return redirect()->route('contents.index')
        -> with('success','Content has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\content $content
     * @return \Illuminate\Http\Response
     */
    public function show(Content $content)
    {
        return view('contents.show',compact('content'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\content $content
     * @return \Illuminate\Http\Response
     */
    public function edit(Content $content)
    {
        return view('contents.edit',compact('content'));
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
        'long'=> 'required',]);


        $content = Content::find($id);
        if ($request->hasFile('image')){
            $request->validate(['image'=>'required|image|mimes:jpg,png,gif,svg|max:2048',
            ]);
            $path = $request->file('image')->store('public/images');
            $content->image = $path;
        }
        $content ->name = $request->name;
        $content ->detail = $request->detail;
        $content ->type = $request->type;
        $content ->people = $request->people;
        $content ->day = $request->day;
        $content ->lat = $request->lat;
        $content ->long = $request->long;
        $content->save();

        return redirect()->route('contents.index')->with('success','Contect updated successfuly.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\content $content
     * @return \Illuminate\Http\Response
     */
    public function destroy(Content $content)
    {
        $content->delete();
    
        return redirect()->route('contents.index')
                        ->with('success','Content has been deleted successfully');
    }
}
