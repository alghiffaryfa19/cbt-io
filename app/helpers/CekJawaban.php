<?php

use App\Soal;
use App\HistoryUjian;
use Carbon\Carbon;

function cekjawaban($kd_soal,$jawaban)
{
	$cek = Soal::where('id',$kd_soal)->where('right_answer',$jawaban)->count();
	return $cek;
}

function jawaban_benar($kd_mapel,$id_siswa)
{
	return $cek = HistoryUjian::where('ujian_id',$kd_mapel)->where('user_id',$id_siswa)->where('betul_or_tidak',1)->count();
}

function jawaban_salah($kd_mapel,$id_siswa)
{
	return $cek = HistoryUjian::where('ujian_id',$kd_mapel)->where('user_id',$id_siswa)->where('betul_or_tidak',0)->count();
}

function GetScore($kd_soal)
{
	$skor = Soal::findOrfail($kd_soal);
	return $skor['skor'];
}

function CekPengerjaan($value, $jawabanAnda, $jawabanBenar)
{
	$status = '';
	if($jawabanAnda == $jawabanBenar && $value == $jawabanAnda){
		$status = 'text-success';
	}elseif($jawabanAnda != $jawabanBenar && $value == $jawabanAnda){
		$status = 'text-danger';
	}
	return $status;
}

function waktu($date)
{
	$status = '';
	$now = Carbon::parse(Carbon::now())->format('Y-m-d');
	if($date == $now){
		$status = '';
	}
	else{
		$status = 'disabled';
	}
	return $status;
}