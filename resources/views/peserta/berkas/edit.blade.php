@extends('layouts.frontend')
@section('description','Informatics Olympiad by HMIF UNEJ')
@section('title','Dashboard')
@section('content')
<div class="container">
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Guys!</strong> Kalau mau perbarui berkas, unggah ulang semua berkas ya.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @if ($errors->has('surat'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">Format surat harus dengan ekstensi pdf/jpg</div>
    @endif
    @if ($errors->has('bukti'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">Format bukti harus dengan ekstensi pdf/jpg</div>
    @endif
    @if ($errors->has('twibbon'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">Format bukti twibbon harus dengan ekstensi pdf/jpg</div>
    @endif
    <div class="row">
        <div class="col">
            <div class="card shadow mb-3">
                <div class="card-header py-3">
                    <p class="text-primary m-0 font-weight-bold">Berkas</p>
                </div>
                <div class="card-body">
                    <form action="{{route('data-berkas.update', $berkas->id)}}" enctype="multipart/form-data" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label><strong>Scan Kartu Tanda Pelajar / Surat Keterangan dari Sekolah (pdf/jpg)</strong></label>
                                    <input type="file" class="form-control" name="surat" />
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label><strong>Bukti Pembayaran (pdf/jpg)</strong></label>
                                    <input type="file" class="form-control" name="bukti" />
                            </div>
                        </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label><strong>Tangkapan Layar Unggah Twibbon (pdf/jpg)</strong></label>
                                    <input type="file" class="form-control" name="twibbon" />
                            </div>
                        </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block" type="submit">Simpan</button>
                        </div>
                        <div>
                            <a type="button" target="_blank" href="{{ asset('uploads/'.$berkas->surat) }}" class="btn btn-primary">Lihat Kartu Tanda Pelajar</a>
                            <a type="button" target="_blank" href="{{ asset('uploads/'.$berkas->bukti) }}" class="btn btn-primary">Lihat Bukti Pembayaran</a>
                            <a type="button" target="_blank" href="{{ asset('uploads/'.$berkas->twibbon) }}" class="btn btn-primary">Lihat Bukti Twibbon</a>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection