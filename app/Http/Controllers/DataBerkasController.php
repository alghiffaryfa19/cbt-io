<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berkas;
use Storage;

class DataBerkasController extends Controller
{
    public function create()
    {
        return view('peserta.berkas.create');
    }

    public function store(Request $request)
     {
        $messages = [
            'required' => ':attribute wajib diisi',
        ];

        $this->validate($request, [
            'surat' => 'mimes:pdf,jpg,JPG,jpeg,JPEG|nullable',
            'bukti' => 'mimes:pdf,jpg,JPG,jpeg,JPEG|nullable',
            'twibbon' => 'mimes:pdf,jpg,JPG,jpeg,JPEG|nullable',
            
        ],$messages);

        Berkas::create([
            'surat' => $request->file('surat')->store('surat'),
            'bukti' => $request->file('bukti')->store('bukti'),
            'twibbon' => $request->file('twibbon')->store('twibbon'),
            'status' => 0,
            'user_id' => auth()->user()->id,
            ]);

       return redirect()->route('dashboard');
     }

     public function edit($id)
     {
         $berkas = Berkas::where('user_id',$id)->first();
         return view('peserta.berkas.edit', compact('berkas'));
     }

     public function update(Request $request, $id)
     {
        $messages = [
            'required' => ':attribute wajib diisi',
        ];

        $this->validate($request, [
            'surat' => 'mimes:pdf,jpg,JPG,jpeg,JPEG|nullable',
            'bukti' => 'mimes:pdf,jpg,JPG,jpeg,JPEG|nullable',
            'twibbon' => 'mimes:pdf,jpg,JPG,jpeg,JPEG|nullable',
            
        ],$messages);

        $berkas = Berkas::where('user_id',$id)->first();
        Storage::delete($berkas->surat);
        Storage::delete($berkas->bukti);
        Storage::delete($berkas->twibbon);
        $berkas->update([
            'surat' => $request->file('surat')->store('surat'),
            'bukti' => $request->file('bukti')->store('bukti'),
            'twibbon' => $request->file('twibbon')->store('twibbon'),
        ]);

       return redirect()->route('dashboard');
     }
}
