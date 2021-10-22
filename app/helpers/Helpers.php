<?php

use App\User;
use App\Biodata;
use App\Berkas;
use App\Guru;
use App\Sekolah;

function cekAkun($id)
{
	return $cek = User::where('id',$id)->exists();
}

function cekBiodata($id)
{
	return $cek = Biodata::where('user_id',$id)->exists();
}

function cekWa($id)
{
	$cek = Biodata::where('user_id',$id)->first();
	return $cek['no_wa'];
}

function cekBerkas($id)
{
	return $cek = Berkas::where('user_id',$id)->exists();
}

function cekGuru($id)
{
	return $cek = Guru::where('user_id',$id)->exists();
}

function cekSekolah($id)
{
	return $cek = Sekolah::where('user_id',$id)->exists();
}

function cekStatus($id)
{
	$cek = Berkas::where('user_id',$id)->first();
	return $cek['status'];
}

function cekUnggahBukti($id)
{
	$cek = Berkas::where('user_id',$id)->first();
	return $cek['status'];
}

