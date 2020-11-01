<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PasteRequest;
use App\Models\Paste;
use App\Services\PasteService;

class PasteController extends Controller
{
    public function index(){
        $top = PasteService::getTopTen();
        return view('home',['top'=>$top]);
    }
    public function submit(PasteRequest $request){
        $data=PasteService::register($request);

        return redirect()->route('home')->with('success', $data);
    }

    public function showOnePaste($hash){
        $paste = PasteService::getOnePaste($hash);
        $top = PasteService::getTopTen();
        return view('one-paste',['paste'=>$paste, 'top'=>$top]);
    }
}
