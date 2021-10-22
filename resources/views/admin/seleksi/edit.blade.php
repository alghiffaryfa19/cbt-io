@extends('layouts.admin')
@section('title','Detail')
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex justify-content-between align-items-center mb-4">
        <h3 class="text-dark mb-0">Seleksi</h3>
    </div>

    <div class="card shadow mb-5">
        <div class="card-header py-3">
            <p class="text-primary m-0 font-weight-bold">Kartu Tanda Pelajar</p>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    @if (empty($berkas->surat))
                    <div class="alert alert-warning" role="alert">
                        Belum unggah surat
                      </div>
                      @else
                      <a href="{{asset('uploads/'.$berkas->surat)}}" target="_blank" type="button" class="btn btn-primary">Kartu Tanda Pelajar</a>
                      @endif
                    
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow mb-5">
        <div class="card-header py-3">
            <p class="text-primary m-0 font-weight-bold">Bukti Pembayaran</p>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    @if (empty($berkas->bukti))
                    <div class="alert alert-warning" role="alert">
                        Belum unggah bukti
                      </div>
                      @else
                      <a href="{{asset('uploads/'.$berkas->bukti)}}" target="_blank" type="button" class="btn btn-primary">Bukti Pembayaran</a>
                      @endif
                    
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow mb-5">
        <div class="card-header py-3">
            <p class="text-primary m-0 font-weight-bold">Twibbon</p>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    @if (empty($berkas->twibbon))
                    <div class="alert alert-warning" role="alert">
                        Belum unggah Twibbon
                      </div>
                      @else
                      <a href="{{asset('uploads/'.$berkas->twibbon)}}" target="_blank" type="button" class="btn btn-primary">Bukti Unggah Twibbon</a>
                      @endif
                    
                </div>
            </div>
        </div>
    </div>

    

    
    <div class="card shadow mb-5">
        <div class="card-header py-3">
            <p class="text-primary m-0 font-weight-bold">Kelolosan</p>
        </div>
        <div class="card-body">
            <div class="row text-center">
                <div class="col">
                    <h6>Apakah lolos ke tahap ujian ?</h6>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <form action="{{route('seleksi.update',$berkas->id)}}" method="post">
                            @method('PUT')
                            @csrf
                            <input type="hidden" value="1" name="status">
                            <button type="submit" class="btn btn-success">Klik untuk Lolos</button>
                        </form>
                        <br/>
                        <form action="{{route('seleksi.update',$berkas->id)}}" method="post">
                            @method('PUT')
                            @csrf
                            <input type="hidden" value="0" name="status">
                            <button style="margin-left: 10px" type="submit" class="btn btn-danger">Klik untuk Tidak Lolos</button>
                        </form>
                      </div>

                    
               
                </div>
            </div>
        </div>
    </div>


</div>
@endsection