<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ujian;
use App\Nilai;
use App\HistoryUjian;

class HasilController extends Controller
{
    public function hasil($ujian)
      {
          $ujiann = Ujian::find($ujian);
          if(request()->ajax())
            {
                return datatables()->of(Nilai::with('ujian')->where('ujian_id', $ujiann->id)->orderBy('nilai','desc'))
                ->addColumn('nama', function($data){
                    return $data->user->name;
                })
                ->addColumn('total', function($data){
                    return $data->nilai + $data->nilai_esay;
                })
                ->rawColumns(['nama','total'])
                         ->make(true);
            }
          return view('admin.cbt.nilai.index', compact('ujiann'));
      }

      public function edit($ujian, $nilai)
      {

          $ujiann = Ujian::find($ujian);
          
          $nilaii = Nilai::find($nilai);
          $pengerjaan = HistoryUjian::join('users','users.id','=','history_ujians.user_id')->join('soals','soals.id','=','history_ujians.soal_id')
    		->where('history_ujians.user_id',$nilaii->user_id)
    		->where('history_ujians.ujian_id',$nilaii->ujian_id)->get();
          return view('admin.cbt.nilai.edit', compact('ujiann', 'nilaii','pengerjaan'));
      }

      public function update(Request $request, $ujian, $nilai)
      {

          $ujiann = Ujian::find($ujian);

          
          $nilaii = Nilai::find($nilai);
            $nilaii->update([
              'nilai_esay' => $request->nilai_esay,
            ]);
  
            return redirect()->route('nilaii', $ujiann->id);
      }
}
