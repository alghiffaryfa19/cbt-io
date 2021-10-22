<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\File;

class FileController extends Controller
{
    public function index()
      {
          if(request()->ajax())
            {
                return datatables()->of(File::query())
                ->make(true);
            }
          return view('admin.file.index');
      }

    public function store(Request $request)
      {
        $this->validate($request, [
            'keterangan' => 'required',
            'dokumen' => 'mimes:pdf',
        ]);
        if (empty($request->file('dokumen'))) {
            File::create([
              'keterangan' => $request->keterangan,
            ]);
        } else {
            File::create([
                'keterangan' => $request->keterangan,
                'dokumen' => $request->file('dokumen')->store('dokumen'),
                    
                ]);
        }
        return redirect()->route('file.index');
      }
 
      public function edit($id)
      {
          $file = File::find($id);
          return view('admin.file.edit', compact('file'));
      }
 
      public function update(Request $request, $id)
      {
        $this->validate($request, [
            'keterangan' => 'required',
            'dokumen' => 'mimes:pdf',
        ]);
        if (empty($request->file('dokumen'))) {
            $file = File::find($id);
            $file->update([
                'keterangan' => $request->keterangan,
            ]);
        } else {
            $file = File::find($id);
            Storage::delete($file->dokumen);
            $file->update([
                'keterangan' => $request->keterangan,
                'dokumen' => $request->file('dokumen')->store('dokumen'),
            ]);
        }

        return redirect()->route('file.index');
      }
 
      public function destroy($id)
      {
        $file = File::find($id);
        if (!$file) {
            return redirect()->back();
        }
        Storage::delete($file->dokumen);
        $file->delete();
        return redirect()->route('file.index');
      }
}
