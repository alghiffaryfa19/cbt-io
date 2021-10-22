<?php

use App\Soal, App\SoalTemp;
use Illuminate\Support\Facades\Session;

function  InsertSoalToTemp($kd_mapel)
{
	$soal = Soal::where('ujian_id',$kd_mapel)->get();
	$no = 0;
	foreach ($soal as $data) {
		$no++;
		$soaltemp =  new SoalTemp();
		$soaltemp->user_id = auth()->user()->id;
		$soaltemp->mapel_id = $data->mapel_id;
		$soaltemp->soal_id = $data->id;
		$soaltemp->nomor_soal = $no;
		$soaltemp->save();
	}
	return true;
}