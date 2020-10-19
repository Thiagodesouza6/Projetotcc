<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Produto;



class WelcomeController extends Controller
{  
    Public function index(){

        $produtos = Produto::all();
	   
	   
        return view('welcome')->with('produtos', $produtos);
    }



}