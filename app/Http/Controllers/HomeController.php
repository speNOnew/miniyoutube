<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Video;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('web');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    //Obtenemos los videos y los mostramos en la vista home
    public function index()
    {
        $videos = Video::orderBy('id','desc')->paginate(3);
        return view('home', array
        (
            'videos' => $videos
        ));
    }
}