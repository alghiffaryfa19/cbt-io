<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ujian;
use Storage;

class UjianController extends Controller
{
    public function index()
      {
          if(request()->ajax())
            {
                return datatables()->of(Ujian::query())
                ->addColumn('jam', function($data){
                    return $data->lama_ujian/60;
                })
                ->rawColumns(['jam'])
                         ->make(true);
            }
          return view('admin.cbt.ujian.index');
      }

      public function store(Request $request)
      {

          $this->validate($request, [
              'nama' => 'required',
              'date_ujian' => 'required',
              'time_start' => 'required',
              'lama_ujian' => 'required',
              
          ]);

          Ujian::create([
            'nama' => $request->nama,
            'date_ujian' => $request->date_ujian,
            'time_start' => $request->time_start,
            'lama_ujian' => $request->lama_ujian*3600,
          ]);

      return redirect()->route('ujian.index');
      }
 
     
      public function edit($id)
      {
          $ujian = Ujian::find($id);
          return view('admin.cbt.ujian.edit', compact('ujian'));
      }

      public function update(Request $request, $id)
      {

          
          $this->validate($request, [
            'nama' => 'required',
              'date_ujian' => 'required',
              'time_start' => 'required',
              'lama_ujian' => 'required',
              
          ]);
          
          $ujian = Ujian::find($id);
            $ujian->update([
                'nama' => $request->nama,
            'date_ujian' => $request->date_ujian,
            'time_start' => $request->time_start,
            'lama_ujian' => $request->lama_ujian*3600,
            ]);
  
            return redirect()->route('ujian.index');
      }
 

      public function destroy($id)
      {

        $ujian = Ujian::find($id);
          if (!$ujian) {
              return redirect()->back();
          }
        $ujian->delete();
        return redirect()->route('ujian.index');
      }
}
