@extends('layouts.admin')
@section('description','Expo FIKSI')
@section('title','Tim')
@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card shadow mb-3">
                <div class="card-header py-3">
                    <p class="text-primary m-0 font-weight-bold">Detail Profil</p>
                </div>
                <div class="card-body">
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label><strong>Nama</strong></label>
                                    <input type="text" value="{{$biodata->user->name}}" class="form-control" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label><strong>NISN</strong></label>
                                    <input type="text" value="{{$biodata->nisn}}" class="form-control" readonly />
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label><strong>TTL</strong></label>
                                    <input type="text" value="{{$biodata->TTL}}" class="form-control" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label><strong>Alamat</strong></label>
                                    <textarea class="form-control" readonly name="alamat">{{$biodata->alamat_rumah}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label><strong>Agama</strong></label>
                                    <input type="text" value="{{$biodata->agama}}" class="form-control" readonly />
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label><strong>Jenis Kelamin</strong></label>
                                    <input type="text" value="{{$biodata->jenis_kelamin}}" class="form-control" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label><strong>Kelas</strong></label>
                                    <input type="text" value="{{$biodata->kelas}}" class="form-control" readonly />
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label><strong>WA</strong></label>
                                    <input type="text" value="{{$biodata->no_wa}}" class="form-control" readonly />
                                </div>
                            </div>
                        </div>
                        
                </div>
            </div>
            
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card shadow mb-3">
                <div class="card-header py-3">
                    <p class="text-primary m-0 font-weight-bold">Detail Sekolah</p>
                </div>
                <div class="card-body">
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label><strong>NPSN</strong></label>
                                    <input type="text" value="{{$sekolah->npsn}}" class="form-control" readonly />
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label><strong>Sekolah</strong></label>
                                    <input type="text" value="{{$sekolah->sekolah}}" class="form-control" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label><strong>Alamat Sekolah</strong></label>
                                    <textarea class="form-control" readonly name="alamat">{{$sekolah->alamat_sekolah}}</textarea>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card shadow mb-3">
                <div class="card-header py-3">
                    <p class="text-primary m-0 font-weight-bold">Detail Guru Pembimbing</p>
                </div>
                <div class="card-body">
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label><strong>NIP/NUPTK</strong></label>
                                    <input type="text" value="{{$guru->nipnuptk}}" class="form-control" readonly />
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label><strong>Nama</strong></label>
                                    <input type="text" value="{{$guru->nama}}" class="form-control" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label><strong>Nomor Telefon</strong></label>
                                    <input type="text" value="{{$guru->no_telp}}" class="form-control" readonly />
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection