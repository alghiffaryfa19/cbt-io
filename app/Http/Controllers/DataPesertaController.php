<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Biodata;

class DataPesertaController extends Controller
{
    public function create()
    {
        return view('peserta.biodata.create');
    }

    public function store(Request $request)
     {
       $this->validate($request, [
           'nisn' => 'required',
           'ttl' => 'required',
           'alamat_rumah' => 'required',
           'agama' => 'required',
           'jenis_kelamin' => 'required',
           
           'kelas' => 'required',
           'no_wa' => 'required',
       ]);

       Biodata::create([
        'nisn' => $request->nisn,
        'ttl' => $request->ttl,
        'alamat_rumah' => $request->alamat_rumah,
        'agama' => $request->agama,
        'jenis_kelamin' => $request->jenis_kelamin,
        
        'kelas' => $request->kelas,
        'no_wa' => $request->no_wa,
        'user_id' => auth()->user()->id,
        ]);
       return redirect()->route('dashboard');
     }

     public function edit($id)
     {
         $biodata = Biodata::where('user_id',$id)->first();
         return view('peserta.biodata.edit', compact('biodata'));
     }

     public function update(Request $request, $id)
     {
       $this->validate($request, [
        'nisn' => 'required',
           'ttl' => 'required',
           'alamat_rumah' => 'required',
           'agama' => 'required',
           'jenis_kelamin' => 'required',
           'kelas' => 'required',
           
           'no_wa' => 'required',
       ]);

       $biodata = Biodata::find($id);
           $biodata->update([
            'nisn' => $request->nisn,
        'ttl' => $request->ttl,
        
        'alamat_rumah' => $request->alamat_rumah,
        'agama' => $request->agama,
        'jenis_kelamin' => $request->jenis_kelamin,
        'kelas' => $request->kelas,
        'no_wa' => $request->no_wa,
           ]);

       return redirect()->route('dashboard');
     }
}
