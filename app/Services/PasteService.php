<?php


namespace App\Services;
use App\Http\Requests\PasteRequest;
use App\Models\Paste;
use Illuminate\Support\Facades\Auth;
use DB;


class PasteService
{
    public static function register($request){
        $paste = new Paste();
        $paste->title=$request->input('title');
        $paste->text=$request->input('text');
        //$paste->user_id=$request->user()->id;
        if($request->input('time')!=0){
            $paste->time=date("Y-m-d H:i:s", time()+$request->input('time'));
        }
        else {
            $paste->time=date("Y-m-d H:i:s",0);
        }

        $paste->access=$request->input('access');

        $paste->save();

        $paste->hash=hash('crc32', $paste->id);

        $paste->save();

        $mess=$paste->hash;

        return $mess;
    }

    public static function getOnePaste($hash){
        $paste= new Paste();
        $data=$paste->where('access','public')->where('time','>',date("Y-m-d H:i:s", time()))
            ->orWhere('time','=','1970-01-01 00:00:00')->where('hash',$hash)->get();

        return $data;
    }

    public static function getTopTen(){
        $paste= new Paste();
        $data=$paste->where('access','public')->where('time','>',date("Y-m-d H:i:s", time()))
            ->orWhere('time','=','1970-01-01 00:00:00')
            ->orderBy('id','desc')
            ->take(10)->get();

        return $data;
    }
}