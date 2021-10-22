<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;

class CountdownController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->role == 1)
        {
            $countdown = \DB::table('countdowns')->where('id',1)->first();

    	return view('admin.informasi.countdown.index',compact('countdown'));
        }
        else
        {
            return redirect()->route('frontend')->with('noakses', 'Anda tidak memiliki akses');
        }

    	
    }

    public function store(Request $request)
    {
        $penutupans = $request->penutupan;

    	\DB::table('countdowns')->where('id',1)->update([
            'penutupan'=>$penutupans,
    	]);

    	Session::flash('pesan','Waktu berhasil di update');
    	return redirect()->route('countdown.index');
    }
}
