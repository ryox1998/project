<?php

namespace App\Http\Controllers;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
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
        return dd($use_people);
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
        if($request->isMethod('post')) {
            $use_people = $request->get('use_people');
            $request->session()->put('use_people', $use_people);
            // $request->session()->put('use_type', 'use_type');
            // $request->session()->put('use_day', 'use_day');
            // $request->session()->put('use_km', 'use_type');
        }
        // $use_type = $request->get('use_type');
        // $use_day = $request->get('use_day');
        // $use_km = $request->get('use_km');
        return redirect()->route('guide.index');
        // return dd($use_people);


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
