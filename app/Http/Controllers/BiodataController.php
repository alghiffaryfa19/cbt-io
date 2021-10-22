<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Sekolah;
use App\Biodata;
use App\Guru;

class BiodataController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->role == 1)
        {
            if(request()->ajax())
            {
            return datatables()->of(Biodata::query()->with('user')->select('biodatas.*'))
            ->make(true);
            }
            return view('admin.profil.peserta.index');
        }
        else
        {
            return redirect()->route('frontend')->with('noakses', 'Anda tidak memiliki akses');
        }
    }

    public function edit($id)
    {
        
        $biodata = Biodata::find($id);
        $sekolah = Sekolah::where('user_id',$biodata->user_id)->first();
        $guru = Guru::where('user_id',$biodata->user_id)->first();
        return view('admin.profil.peserta.edit', compact('biodata','sekolah','guru'));
    }
}
