<?php

use App\HistoryUjian;
use App\Nilai;
use App\StartUjian;
use App\Submisi;

function cekSdhJawabSoal($kd_soal,$id_siswa)
{
	return $cek = HistoryUjian::where('soal_id',$kd_soal)
		->where('user_id',$id_siswa)->count();
}

function CekYourAnswer($kd_soal,$id_siswa)
{
	$cek = HistoryUjian::where('soal_id',$kd_soal)
		->where('user_id',$id_siswa)->first();
	return $cek['your_answer'];
}

function CekYakin($kd_soal,$id_siswa)
{
	$cek = HistoryUjian::where('soal_id',$kd_soal)
		->where('user_id',$id_siswa)->where('yakin_or_not',1)->count();
	return $cek;
}

function CekRagu2($kd_soal,$id_siswa)
{
	$cek = HistoryUjian::where('soal_id',$kd_soal)
		->where('user_id',$id_siswa)->where('yakin_or_not',0)->count();
	return $cek;
}

function CekRagu($ujian_id)
{
	$ragu = HistoryUjian::where('ujian_id',$ujian_id)
        ->where('user_id',auth()->user()->id)->where('yakin_or_not',0)->count();
	return $ragu;
}

function cekSudahDikerjakan($kd_mapel,$id_siswa)
{
	return $cek = Nilai::where('ujian_id',$kd_mapel)->where('user_id',$id_siswa)->count();
}

function cekSudahUnggah($kd_mapel,$id_siswa)
{
	return $cek = Submisi::where('tugas_id',$kd_mapel)->where('user_id',$id_siswa)->count();
}

function cekMasihDikerjakan($kd_mapel,$id_siswa)
{
	return $cek = StartUjian::where('ujian_id',$kd_mapel)
		->where('user_id',$id_siswa)
		->where('is_active',1)->count();
}

