@extends('layouts.frontend')
@section('description','Informatics Olympiad by HMIF UNEJ')
@section('title','Dashboard')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card shadow mb-3">
                <div class="card-header py-3">
                    <p class="text-primary m-0 font-weight-bold">Data Sekolah</p>
                </div>
                <div class="card-body">
                    <form action="{{route('data-sekolah.store')}}" method="POST">
                        @method('POST')
                        @csrf
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label><strong>Nama Sekolah</strong></label>
                                    <input type="text" class="form-control" placeholder="Nama Sekolah" name="sekolah" />
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label><strong>NPSN</strong></label>
                                    <input type="number" class="form-control" placeholder="NPSN" name="npsn" />
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label><strong>Alamat Sekolah</strong></label>
                                    <textarea name="alamat_sekolah" class="form-control"></textarea>
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