<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileContoller extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //echo '<pre>'; print_r($this->middleware('auth')); die();
        //return view('home');
    }

    public function edit()
    {
        //echo '<pre>'; print_r($this->middleware('auth')); die();
        //return view('home');
    }
}
