<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guru;

class DataGuruController extends Controller
{
    public function create()
    {
        return view('peserta.guru.create');
    }

    public function store(Request $request)
     {
       $this->validate($request, [
           'nama' => 'required',
           'nipnuptk' => 'required',
           'no_telp' => 'required',
       ]);

       Guru::create([
        'nama' => $request->nama,
        'nipnuptk' => $request->nipnuptk,
        'no_telp' => $request->no_telp,
        'user_id' => auth()->user()->id,
        ]);
       return redirect()->route('dashboard');
     }

     public function edit($id)
     {
         $guru = Guru::where('user_id',$id)->first();
         return view('peserta.guru.edit', compact('guru'));
     }

     public function update(Request $request, $id)
     {
       $this->validate($request, [
            'nama' => 'required',
           'nipnuptk' => 'required',
           'no_telp' => 'required',
       ]);

       $guru = Guru::find($id);
           $guru->update([
            'nama' => $request->nama,
        'nipnuptk' => $request->nipnuptk,
        'no_telp' => $request->no_telp,
           ]);

       return redirect()->route('dashboard');
     }
}
