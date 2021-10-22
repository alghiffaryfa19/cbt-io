@extends('layouts.frontend')
@section('description','Informatics Olympiad by HMIF UNEJ')
@section('title','Dashboard')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card shadow mb-3">
                <div class="card-header py-3">
                    <p class="text-primary m-0 font-weight-bold">Biodata</p>
                </div>
                <div class="card-body">
                    <form action="{{route('data-peserta.store')}}" method="POST">
                        @method('POST')
                        @csrf
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label><strong>NISN/NIS</strong></label>
                                    <input type="number" class="form-control" placeholder="NISN/NIS" name="nisn" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label><strong>Tempat, Tanggal Lahir</strong></label>
                                    <input type="text" class="form-control" placeholder="Ngawi, 12 April 2002" name="ttl" />
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label><strong>Alamat Rumah</strong></label>
                                    <textarea class="form-control" name="alamat_rumah"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label><strong>Agama</strong></label>
                                    <input type="text" class="form-control" placeholder="Agama" name="agama" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label><strong>Jenis Kelamin</strong></label>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                        <option value="L" selected>Laki-Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label><strong>Kelas</strong></label>
                                    <select name="kelas" id="kelas" class="form-control">
                                        <option value="10" selected>10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label><strong>No. WhatsApp</strong></label>
                                    <input type="text" class="form-control" placeholder="+628..." name="no_wa" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Simpan</button></div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection