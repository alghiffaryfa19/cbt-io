<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Session;

class AkunPesertaController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->role == 2)
        {
            $akun = User::where('id', auth()->user()->id)->first();
            return view('peserta.akun.index',compact('akun'));
        }
        else
        {
            return redirect()->route('frontend')->with('noakses', 'Anda tidak memiliki akses');
        }

        
    }

    public function store(Request $request)
    {
        
        if (empty($request->password)) {
            $akun = User::where('id', auth()->user()->id)->first();
            $akun->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
        } else {
            $akun = User::where('id', auth()->user()->id)->first();
            $akun->update([
                'name' => $request->name,
                'email' => $request->email,
                
                'password' => bcrypt($request->password),
            ]);
        }

    	Session::flash('pesan','Akun berhasil di update');
    	return redirect()->route('dashboard');
    }
}
