<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;

class FileDokController extends Controller
{
    public function index()
      {
          $file = File::all();
          return view('peserta.file.index', compact('file'));
      }
}
