@extends('layouts.frontend')
@section('description','Informatics Olympiad by HMIF UNEJ')
@section('title','Dashboard')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card shadow mb-3">
                <div class="card-header py-3">
                    <p class="text-primary m-0 font-weight-bold">Biodata Guru Pembimbing</p>
                </div>
                <div class="card-body">
                    <form action="{{route('data-guru.update', $guru->id)}}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label><strong>Nama</strong></label>
                                    <input value="{{$guru->nama}}" type="text" class="form-control" placeholder="Nama" name="nama" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label><strong>NIP/NUPTK</strong></label>
                                    <input value="{{$guru->nipnuptk}}" type="number" class="form-control" placeholder="NIP/NUPTK" name="nipnuptk" />
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label><strong>No Telfon</strong></label>
                                    <input value="{{$guru->no_telp}}" type="text" class="form-control" placeholder="No Telfon" name="no_telp" />
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