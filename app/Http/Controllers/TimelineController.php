<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Timeline;
use Validator;
use Storage;
use Auth;

class TimelineController extends Controller
{
    public function index()
     {
        if (Auth::check() && Auth::user()->role == 1)
        {
            if(request()->ajax())
            {
                return datatables()->of(Timeline::query())
                        ->make(true);
            }
            return view('admin.informasi.timeline.index');
        }
        else
        {
            return redirect()->route('frontend')->with('noakses', 'Anda tidak memiliki akses');
        }

         
     }
 
      public function store(Request $request)
      {
          $this->validate($request, [
              'keterangan' => 'required',
              'detail' => 'required',
              'waktu' => 'required',
          ]);
          Timeline::create([
            'keterangan' => $request->keterangan,
            'detail' => $request->detail,
            'waktu' => $request->waktu,
            //'gambarkategori' => $image,
          ]);
      return redirect()->route('timeline.index');
      }
 
     
      public function edit($id)
      {
        if (Auth::check() && Auth::user()->role == 1)
        {
            $timeline = Timeline::find($id);
            return view('admin.informasi.timeline.edit', compact('timeline'));
        }
        else
        {
            return redirect()->route('frontend')->with('noakses', 'Anda tidak memiliki akses');
        }
          
      }

      public function update(Request $request, $id)
      {
          $this->validate($request, [
            'keterangan' => 'required',
              'detail' => 'required',
              'waktu' => 'required',
          ]);
          
          $timeline = Timeline::find($id);
              $timeline->update([
                'keterangan' => $request->keterangan,
            'detail' => $request->detail,
            'waktu' => $request->waktu,
              ]);
  
          return redirect()->route('timeline.index');
      }
 

      public function destroy($id)
      {
          $timeline = Timeline::find($id);
          if (!$timeline) {
              return redirect()->back();
          }
          
          $timeline->delete();
          return redirect()->route('timeline.index');
      }
}
