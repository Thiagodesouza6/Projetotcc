<?php

namespace App\Http\Controllers;
use App\contatos;
use App\banner;
use Illuminate\Http\Request;

class HomeController extends Controller
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
        $contatos = contatos::all();
        $banner = banner::all();
        return view('home')->with('contatos', $contatos)->with('banner', $banner);
       
    }
   
}
