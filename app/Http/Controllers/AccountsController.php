<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Storage;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AccountsController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->role == 1)
        {
            if(request()->ajax())
            {
            return datatables()->of(User::where('role',2))
            ->addColumn('cekberkas', function($data){
                $button = '<span class="badge badge-warning">Belum diseleksi</span>';
                if (cekBerkas($data->id)) {
                    $button = '<span class="badge badge-success">Sudah Unggah Berkas</span>';
                }
                else {
                    $button = '<span class="badge badge-warning">Belum Unggah Berkas</span>';
                }
                
                return $button;
            })
            ->addColumn('cekwa', function($data){
                if (cekBiodata($data->id)) {
                    $button = cekWa($data->id);
                }
                else {
                    $button = '<span class="badge badge-warning">Belum isi profil</span>';
                }
                
                return $button;
            })
            ->rawColumns(['cekberkas','cekwa'])
            ->make(true);
            }
            return view('admin.user.peserta.index');
        }
        else
        {
            return redirect()->route('frontend')->with('noakses', 'Anda tidak memiliki akses');
        }

        
        
    }

    public function store(Request $request)
    {
        $rules = array(
            'name'    =>  'required',
            'email'     =>  'required',
            'password'    =>  'required'
        );

        $error = Validator::make($request->all(), $rules);

        $form_data = array(
            'name'        =>  $request->name,
            'email'         =>  $request->email,
            'role'         =>  2,
            'password' => Hash::make($request->password),
        );

        User::create($form_data);

        return redirect()->route('accounts.index');
    }

    public function edit($id)
    {
        if (Auth::check() && Auth::user()->role == 1)
        {
            $peserta = User::find($id);
            return view('admin.user.peserta.edit', compact('peserta'));
        }
        else
        {
            return redirect()->route('frontend')->with('noakses', 'Anda tidak memiliki akses');
        }

        
    }

    public function update(Request $request, $id)
    {
        if (empty($request->password)) {
            $peserta = User::find($id);
            $peserta->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
        } else {
            $peserta = User::find($id);
            $peserta->update([
                'name' => $request->name,
                
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        }
        return redirect()->route('accounts.index');
    }

    public function destroy($id)
    {
        $peserta = User::find($id);
        if (!$peserta) {
            return redirect()->back();
        }
        $peserta->delete();
        return redirect()->route('accounts.index');
    }
}
