<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;

class AmpherController extends Controller
{
    public function mueang_tak () {

        $data['contents'] = Content::orderBy('id','desc')->paginate(6);
        return view('ampher.mueang_tak',$data);
    }

    public function ban_tak () {

        $data['contents'] = Content::orderBy('id','desc')->paginate(6);
        return view('ampher.ban_tak',$data);
    }




    public function sam_ngao () {

        $data['contents'] = Content::orderBy('id','desc')->paginate(6);
        return view('ampher.sam_ngao',$data);
    }


    public function measot () {

        $data['contents'] = Content::orderBy('id','desc')->paginate(6);
        return view('ampher.measot',$data);
    }


    public function mae_ramat () {

        $data['contents'] = Content::orderBy('id','desc')->paginate(6);
        return view('ampher.mae_ramat',$data);
    }


    public function tha_song_yang () {

        $data['contents'] = Content::orderBy('id','desc')->paginate(6);
        return view('ampher.tha_song_yang',$data);
    }


    public function phop_phra () {

        $data['contents'] = Content::orderBy('id','desc')->paginate(6);
        return view('ampher.phop_phra',$data);
    }


    public function um_phang () {

        $data['contents'] = Content::orderBy('id','desc')->paginate(6);
        return view('ampher.um_phang',$data);
    }


    public function wang_chao () {

        $data['contents'] = Content::orderBy('id','desc')->paginate(6);
        return view('ampher.wang_chao',$data);
    }

}
