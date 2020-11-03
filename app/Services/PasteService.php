<?php


namespace App\Services;
use App\Http\Requests\PasteRequest;
use App\Models\Paste;
use Illuminate\Support\Facades\Auth;
use DB;


class PasteService
{
    public static function register($request)
    {
        $paste = new Paste();
        $paste->title=$request->input('title');
        $paste->text=$request->input('text');
        $paste->syntax=$request->input('syntax');
        if (isset(Auth::user()->id))
        {
        $paste->user_id=$request->user()->id;
        };
        if($request->input('time')!=0)
        {
            $paste->time=date("Y-m-d H:i:s", time()+$request->input('time'));
        }
        else
        {
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
        if (isset(Auth::user()->id))
        {
            $data = $paste->WhereNull('user_id')
                ->orwhere('user_id','=',Auth::user()->id)
                ->orWhere('time', '>', date("Y-m-d H:i:s", time()))
                ->Where('time', '=', '1970-01-01 00:00:00')->get();
            $private=$data->where('hash',$hash)->first();

            if ($private->access == 'private')
            {
                if ($private->user_id == Auth::user()->id)
                {
                    return $private->where('hash',$hash)->get();
                }
                return abort(404);
            }

            return $data->where('hash',$hash);
        }

        $data = $paste->where('access',['public','unlisted'])
            ->orWhere('time', '>', date("Y-m-d H:i:s", time()))
            ->Where('time', '=', '1970-01-01 00:00:00')->get();

        return $data->where('hash',$hash);
    }

    public static function getTopTen()
    {
        $paste= new Paste();
        $data=$paste->where('access','public')->where('time','>',date("Y-m-d H:i:s", time()))
            ->orWhere('time','=','1970-01-01 00:00:00')
            ->orderBy('id','desc')
            ->take(10)->get();

        return $data;
    }

    public static function getMyTen($id)
    {
        $paste= new Paste();
        $data=$paste->Where('time','>',date("Y-m-d H:i:s", time()))
            ->orWhere('time','=','1970-01-01 00:00:00')
            ->orderBy('id','desc')
            ->take(10)->get();

        return $data->where('user_id',$id);
    }

    public static function allMyPastes($id)
    {
        $paste= new Paste();
        $data=$paste->where('time','>',date("Y-m-d H:i:s", time()))
            ->orWhere('time','=','1970-01-01 00:00:00')
            ->where('user_id','=',$id)
            ->orderBy('id','desc')
            ->paginate(10);

        return $data;
    }

    public static function getSearch($search)
    {
        $paste= new Paste();
        if (isset(Auth::user()->id))
        {
            $data = $paste->Where('title', 'like', '%' . $search . '%')
                ->orWhere('text', 'like', '%' . $search . '%')
                ->Where('time','>',date("Y-m-d H:i:s", time()))
                ->orWhere('time','=','1970-01-01 00:00:00')
                ->Where('access','public')
                ->where('user_id','=',Auth::user()->id)
                ->paginate(10);

            return $data;
        };

        $data = $paste->Where('title', 'like', '%' . $search . '%')
            ->orWhere('text', 'like', '%' . $search . '%')
            ->Where('time','=','1970-01-01 00:00:00')
            ->orWhere('time','>',date("Y-m-d H:i:s", time()))
            ->Where('access','public')
            ->paginate(10);

        return $data;
    }
}