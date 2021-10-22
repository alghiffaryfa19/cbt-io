<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sekolah;

class DataSekolahController extends Controller
{
    public function create()
    {
        return view('peserta.sekolah.create');
    }

    public function store(Request $request)
     {
       $this->validate($request, [
           'sekolah' => 'required',
           'npsn' => 'required',
           'alamat_sekolah' => 'required',
       ]);

       Sekolah::create([
        'sekolah' => $request->sekolah,
        'npsn' => $request->npsn,
        'alamat_sekolah' => $request->alamat_sekolah,
        'user_id' => auth()->user()->id,
        ]);
       return redirect()->route('dashboard');
     }

     public function edit($id)
     {
         $sekolah = Sekolah::where('user_id',$id)->first();
         return view('peserta.sekolah.edit', compact('sekolah'));
     }

     public function update(Request $request, $id)
     {
       $this->validate($request, [
        'sekolah' => 'required',
        'npsn' => 'required',
        'alamat_sekolah' => 'required',
       ]);

       $sekolah = Sekolah::find($id);
           $sekolah->update([
            'sekolah' => $request->sekolah,
        'npsn' => $request->npsn,
        'alamat_sekolah' => $request->alamat_sekolah,
           ]);

       return redirect()->route('dashboard');
     }
}
