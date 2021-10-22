<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berkas;

class SeleksiController extends Controller
{
    public function index()
      {
          if(request()->ajax())
            {
                return datatables()->of(Berkas::query())
                ->addColumn('nama', function($data){
                   return $data->user->name;
              })
              ->addColumn('cekkarya', function($data){
                
                if($data->bukti != ''){ //your condition
                  $span='<span class="badge badge-success">Sudah Unggah</span>';
                  
              } else if($data->bukti == ''){
                  $span='<span class="badge badge-danger">Belum Unggah</span>';
              }
               
                 return $span;
            })
            ->addColumn('status', function($data){
                
              if($data->status == 1){ //your condition
                $span='<span class="badge badge-success">Lolos</span>';
                
            } else if($data->status == 0){
                $span='<span class="badge badge-danger">Tidak Lolos</span>';
            }
             
               return $span;
          })
              ->rawColumns(['nama','cekkarya','status'])
                         ->make(true);
            }
          return view('admin.seleksi.index');
      }

      public function edit($id)
     {
         $berkas = Berkas::find($id);
         return view('admin.seleksi.edit', compact('berkas'));
     }

     public function update(Request $request, $id)
     {
      $berkas = Berkas::find($id);
      $berkas->update([
       'status' => $request->status,
      ]);

       return redirect()->route('seleksi.index');
     }
}
