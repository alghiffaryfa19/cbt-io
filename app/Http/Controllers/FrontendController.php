<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Timeline;
use App\Countdown;
use App\Juknis;
use App\Partner;

class FrontendController extends Controller
{
    public function index()
    {
        $timeline = Timeline::all();
        $time = Countdown::where('id',1)->first();
        $juknis = Juknis::where('id',1)->first();
        $partner = Partner::all();
        return view('welcome', compact('timeline','time','juknis','partner'));
    }
}
