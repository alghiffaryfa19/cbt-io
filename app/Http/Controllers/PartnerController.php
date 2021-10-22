<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Partner;
use Storage;
use Validator;
use File;

class PartnerController extends Controller
{
    public function index()
     {
         if(request()->ajax())
         {
             return datatables()->of(Partner::latest())
                ->make(true);
         }
         return view('admin.informasi.partner.index');
     }
 
     public function store(Request $request)
     {
       $this->validate($request, [
           'name' => 'required',
           'logo' => 'mimes:jpeg,bmp,png,jpg,JPG',
       ]);
       if (empty($request->file('logo'))) {
            Partner::create([
             'name' => $request->name,
             'url' => $request->url,
             //'gambarkategori' => $image,
           ]);
       } else {
        Partner::create([
            'name' => $request->name,
            'url' => $request->url,
               'logo' => $request->file('logo')->store('partner'),
                   
               ]);
       }
       return redirect()->route('partner.index');
     }

     public function edit($id)
     {
         $partner = Partner::find($id);
         return view('admin.informasi.partner.edit', compact('partner'));
     }

     public function update(Request $request, $id)
     {
       $this->validate($request, [
        'name' => 'required',
        'logo' => 'mimes:jpeg,bmp,png,jpg,JPG',
       ]);
       if (empty($request->file('logo'))) {
           $partner = Partner::find($id);
           $partner->update([
            'name' => $request->name,
            'url' => $request->url,
           ]);
       } else {
           $partner = Partner::find($id);
           Storage::delete($partner->logo);
           $partner->update([
            'name' => $request->name,
            'url' => $request->url,
               'logo' => $request->file('logo')->store('partner'),
           ]);
       }

       return redirect()->route('partner.index');
     }

     public function destroy($id)
     {
         $partner = Partner::find($id);
         if (!$partner) {
             return redirect()->back();
         }
         Storage::delete($partner->logo);
         $partner->delete();
         return redirect()->route('partner.index');
     }
}
