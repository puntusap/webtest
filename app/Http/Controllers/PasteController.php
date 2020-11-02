<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PasteRequest;
use App\Models\Paste;
use App\Services\PasteService;
use Illuminate\Support\Facades\Auth;

class PasteController extends Controller
{
    public function index(){
        $mytop=[];
        if (isset(Auth::user()->id)){
            $mytop=PasteService::getMyTen(Auth::user()->id);
        }
        $top = PasteService::getTopTen();
        return view('home',['top'=>$top, 'mytop'=>$mytop]);
    }
    public function submit(PasteRequest $request){
        $data=PasteService::register($request);

        return redirect()->route('home')->with('success', $data);
    }

    public function showOnePaste($hash){
        $paste = PasteService::getOnePaste($hash);
        $top = PasteService::getTopTen();
        $mytop=[];
        if (isset(Auth::user()->id)){
            $mytop=PasteService::getMyTen(Auth::user()->id);
        }
        return view('one-paste',['paste'=>$paste, 'top'=>$top,'mytop'=>$mytop]);
    }

    public function myPastes(){
        if (isset(Auth::user()->id)){
            $data=PasteService::allMyPastes(Auth::user()->id);
        }
        return view('mypastes',['allpaste'=>$data]);
    }

    public function search(Request $request){
        $data=PasteService::getSearch($request->input('search'));
        return view('search', ['allpaste'=>$data] );
    }
}
