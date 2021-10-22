<?php

use App\Soal;

function getJumlahSoal($ujian_id)
{
	return $jumlah_soal = Soal::where('ujian_id',$ujian_id)->count();
}