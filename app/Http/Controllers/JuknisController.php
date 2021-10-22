<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;

class JuknisController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->role == 1)
        {
            $countdown = \DB::table('juknis')->where('id',1)->first();

    	return view('admin.informasi.juknis.index',compact('countdown'));
        }
        else
        {
            return redirect()->route('frontend')->with('noakses', 'Anda tidak memiliki akses');
        }

    	
    }

    public function store(Request $request)
    {
        $link = $request->link;

    	\DB::table('juknis')->where('id',1)->update([
            'link'=>$link,
    	]);

    	Session::flash('pesan','Waktu berhasil di update');
    	return redirect()->route('juknis.index');
    }
}
