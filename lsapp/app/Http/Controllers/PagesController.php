<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index  (){
        $title='welcome to laravel';
        // return view('pages.index',compact('title'));
        return view('pages.index')->with('title',$title);
    }

    public function about(){
        $title='about';

        return view('pages.about')->with('title',$title);
    }

    public function services(){
        $data=array(
            'title'=>'Services',
            'services'=>['web','desktop','mobile']
        );
        return view('pages.services')->with($data);
    }
}
