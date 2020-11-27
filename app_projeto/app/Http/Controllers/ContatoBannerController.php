<?php

namespace App\Http\Controllers;
use App\banner;
use App\contatos;
use App\Produto;
use Request;
use File;
use Illuminate\Support\Facades\Storage;

class ContatoBannerController extends Controller
{
    public function mostrar_contact($id)
    {

        $contatos = contatos::find($id);
        return view('contato')->with('contatos', $contatos);
    }
    public function contact()
    {
        $banner = banner::all();
        $id = Request::get('id');
        $contato= contatos::find($id);

        $contato->telefone = Request::get('telefone');
        $contato->email = Request::get('email');
        $contato->linkwpp = Request::get('linkwpp');
        $contato->linkfacebook = Request::get('linkfacebook');
        $contato->linkinstagram = Request::get('linkinstagram');
        $contato->save();
        $mensagem = "Informações alteradas com sucesso";
        $contatos = contatos::all();
        return view('home')->with('mensagem', $mensagem)->with('contatos', $contatos)->with('banner',  $banner);

    }
    public function mostrar_editbanner($id)
    {

        $banner = banner::find($id);
        return view('editbanner')->with('banner',  $banner);
    }
    public function banner()
    {
        $produtos = Produto::all();
        $id = Request::get('id');
        $banners= banner::find($id);
        $banners->banner1 = Request::file('banner1')->store('');
        if(!empty(Request::file('banner2'))){
          
        $banners->banner2 = Request::file('banner2')->store('');
        }
        else{
            Storage::delete($banners->banner2);
            $banners->banner2 = Request::file('banner2'); 
        }
        if(!empty(Request::file('banner3'))){
          
            $banners->banner3 = Request::file('banner3')->store('');
            }
            else{
                Storage::delete($banners->banner3);
                $banners->banner3 = Request::file('banner3');
            }
       
     
        $banners->save();
        $mensagem = "Banner alteradas com sucesso";
        $banner = banner::all();
        return view('welcome')->with('banner',  $banner)->with('produtos', $produtos);

    }
}