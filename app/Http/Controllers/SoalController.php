<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ujian;
use App\Soal;
use Storage;

class SoalController extends Controller
{
    public function index($id)
      {
          $ujiann = Ujian::find($id);
          if(request()->ajax())
            {
                return datatables()->of(Soal::query()->where('ujian_id', $ujiann->id))
                ->addColumn('soall', function($data){
                   return \Str::limit($data->soal, 500);
              })
              ->rawColumns(['soall'])
                         ->make(true);
            }
          return view('admin.cbt.soal.index', compact('ujiann'));
      }

      public function create($id)
      {
        $ujiann = Ujian::find($id);
          return view('admin.cbt.soal.create', compact('ujiann'));
      }



      public function store(Request $request, $id)
      {
          $ujiann = Ujian::find($id);
          
          $this->validate($request, [
              'soal' => 'required',
          ]);
          if(!empty($request->key_answer)){
            $right = $request->key_answer;
          }
          if(!empty($request->esay_answer)){
              $right = $request->esay_answer;
          }
          Soal::create([
            'soal' => $request->soal,
            'option_1' => $request->option_1,
            'option_2' => $request->option_2,
            'option_3' => $request->option_3,
            'option_4' => $request->option_4,
            'option_5' => $request->option_5,
            'right_answer' => $right,
            'pembahasan' => $request->pembahasan,
            'skor' => $request->skor,
            'skor_salah' => $request->skor_salah,
            'ujian_id' => $ujiann->id,
          ]);

      return redirect()->route('soal', $ujiann->id);
      }
 
     
      public function edit($id, $soal)
      {
          $ujiann = Ujian::find($id);
          $soall = Soal::find($soal);
          return view('admin.cbt.soal.edit', compact('ujiann', 'soall'));
      }

      public function update(Request $request, $id, $soal)
      {

          $ujiann = Ujian::find($id);
          
          $this->validate($request, [
            'soal' => 'required',
              
              
          ]);

          
          $soall = Soal::find($soal);
          if(!empty($request->key_answer)){
            $right = $request->key_answer;
          }
          if(!empty($request->esay_answer)){
              $right = $request->esay_answer;
          }
            $soall->update([
              'soal' => $request->soal,
              'option_1' => $request->option_1,
              'option_2' => $request->option_2,
              'option_3' => $request->option_3,
              'option_4' => $request->option_4,
              'option_5' => $request->option_5,
              'right_answer' => $right,
              'pembahasan' => $request->pembahasan,
              'skor' => $request->skor,
              'skor_salah' => $request->skor_salah,
            ]);
  
            return redirect()->route('soal', $ujiann->id);
      }
 

      public function destroy($id, $soal)
      {
        $ujiann = Ujian::find($id);
        $soall = Soal::find($soal);
          if (!$soall) {
              return redirect()->back();
          }
        $soall->delete();
        return redirect()->route('soal', $ujiann->id);
      }
}
