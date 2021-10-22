@extends('layouts.frontend')
@section('description','Informatics Olympiad by HMIF UNEJ')
@section('title','Dashboard')
@section('content')
    <div style="background-image:url('{{asset('assets/img/annie-spratt-XMpXzzWrJ6g-unsplash.jpg')}}');height:500px;background-position:center;background-size:cover;background-repeat:no-repeat;">
        <div class="d-flex justify-content-center align-items-center" style="height:inherit;min-height:initial;width:100%;position:absolute;left:0;background-color:rgba(30,41,99,0.53);">
            <div class="d-flex align-items-center order-12" style="height:200px;">
                <div class="container">
                    <h1 class="text-center" style="color:rgb(242,245,248);font-size:56px;font-weight:bold;font-family:Roboto, sans-serif;">Selamat Datang</h1>
                    <h3 class="text-center" style="color:rgb(242,245,248);padding-top:0.25em;padding-bottom:0.25em;font-weight:normal;">{{Auth::user()->name}}</h3>
                </div>
            </div>
        </div>
    </div>
    <div style="padding-top: 57px;background-color: rgba(156,208,255,0);padding-bottom: 20px;margin-top: -14px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-primary" style="color: #25a9e0;font-weight: bold;">Data</h2><span style="font-weight: bold;font-size: 84px;position: absolute;left: -40px;top: -60px;z-index: -1;color: #e0e0e0;">Data</span></div>
                <div class="col">
                    <div class="row">
                            <div class="col-lg-6 mb-4">
                                <a href="{{route('akun-peserta.index')}}">
                                    <div class="card text-white bg-success shadow">
                                        <div class="card-body">
                                            <p class="m-0">Akun</p>
                                            <p class="text-white-50 small m-0">Atur akun sesukamu</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-6 mb-4">
                                @if (cekAkun(auth()->user()->id))
                                    @if (cekBiodata(auth()->user()->id))
                                    <a href="{{route('data-peserta.edit', auth()->user()->id)}}">
                                        <div class="card text-white bg-success shadow">
                                            <div class="card-body">
                                                <p class="m-0">Data Pribadi</p>
                                                <p class="text-white-50 small m-0">Isi data pribadimu dengan lengkap dan benar ya</p>
                                            </div>
                                        </div>
                                    </a> 
                                    @else
                                    <a href="{{route('data-peserta.create')}}">
                                        <div class="card text-black bg-warning shadow">
                                            <div class="card-body">
                                                <p class="m-0">Data Pribadi</p>
                                                <p class="text-black-50 small m-0">Isi data pribadimu dengan lengkap dan benar ya</p>
                                            </div>
                                        </div> 
                                    </a>
                                    @endif
                                @endif
                            </div>
                            <div class="col-lg-6 mb-4">
                                @if (cekBiodata(auth()->user()->id))
                                    @if (cekGuru(auth()->user()->id))
                                    <a href="{{route('data-guru.edit', auth()->user()->id)}}">
                                        <div class="card text-white bg-success shadow">
                                            <div class="card-body">
                                                <p class="m-0">Data Guru Pembimbing</p>
                                                <p class="text-white-50 small m-0">Isi data guru pembimbing yang telah membimbingmu</p>
                                            </div>
                                        </div>
                                    </a>    
                                    @else
                                    <a href="{{route('data-guru.create')}}">
                                        <div class="card text-black bg-warning shadow">
                                            <div class="card-body">
                                                <p class="m-0">Data Guru Pembimbing</p>
                                                <p class="text-black-50 small m-0">Isi data guru pembimbing yang telah membimbingmu</p>
                                            </div>
                                        </div>
                                    </a> 
                                    @endif
                                @endif
                            </div>
                            <div class="col-lg-6 mb-4">
                                @if (cekGuru(auth()->user()->id))
                                    @if (cekSekolah(auth()->user()->id))
                                    <a href="{{route('data-sekolah.edit', auth()->user()->id)}}">
                                        <div class="card text-white bg-success shadow">
                                            <div class="card-body">
                                                <p class="m-0">Data Sekolah</p>
                                                <p class="text-white-50 small m-0">Isi data sekolah kamu berasal</p>
                                            </div>
                                        </div>
                                    </a>    
                                    @else
                                    <a href="{{route('data-sekolah.create')}}">
                                        <div class="card text-black bg-warning shadow">
                                            <div class="card-body">
                                                <p class="m-0">Data Sekolah</p>
                                                <p class="text-black-50 small m-0">Isi data sekolah kamu berasal</p>
                                            </div>
                                        </div>
                                    </a> 
                                    @endif
                                @endif
                            </div>
                            <div class="col-lg-6 mb-4">
                                @if (cekSekolah(auth()->user()->id))
                                    @if (cekBerkas(auth()->user()->id))
                                    <a href="{{route('data-berkas.edit', auth()->user()->id)}}">
                                        <div class="card text-white bg-success shadow">
                                            <div class="card-body">
                                                <p class="m-0">Berkas dan Pembayaran</p>
                                                <p class="text-white-50 small m-0">Jangan lupa yaa.. biar bisa ikut ujian</p>
                                            </div>
                                        </div>
                                    </a>
                                    @else
                                    <a href="{{route('data-berkas.create')}}">
                                        <div class="card text-black bg-warning shadow">
                                            <div class="card-body">
                                                <p class="m-0">Berkas dan Pembayaran</p>
                                                <p class="text-black-50 small m-0">Jangan lupa yaa.. biar bisa ikut ujian</p>
                                            </div>
                                        </div>
                                    </a>
                                    @endif
                                @endif
                            </div>
                            <div class="col-lg-6 mb-4">
                                @if (cekBerkas(auth()->user()->id))
                                <a href="{{route('files.index')}}">
                                    <div class="card text-white bg-success shadow">
                                        <div class="card-body">
                                            <p class="m-0">Dokumen Untuk Belajar</p>
                                            <p class="text-white-50 small m-0">Ini qaqa kasih modul untuk kalian belajar yaa..</p>
                                        </div>
                                    </div>
                                </a>
                                @endif
                            </div>
                            <div class="col-lg-6 mb-4">
                                @if (cekBerkas(auth()->user()->id))
                                @if (cekStatus(auth()->user()->id) == 0)
                                <div class="card text-white bg-secondary shadow">
                                    <div class="card-body">
                                        <p class="m-0">Ujian</p>
                                        <p class="text-white-50 small m-0">Tunggu konfirmasi ya, biar bisa gas ujian</p>
                                    </div>
                                </div>
                                @elseif (cekStatus(auth()->user()->id) == 1)
                                <a href="{{route('list.ujian')}}">
                                    <div class="card text-white bg-success shadow">
                                        <div class="card-body">
                                            <p class="m-0">Ujian</p>
                                            <p class="text-white-50 small m-0">Wah, kamu dah bisa ikut ujian, gasskeun, Semangattt</p>
                                        </div>
                                    </div>
                                </a>
                                @endif
                                @endif
                            </div>

                            
                            <div class="col-lg-6 mb-4">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <div class="card text-white bg-danger shadow">
                                        <div class="card-body">
                                            <p class="m-0">Logout</p>
                                            <p class="text-white-50 small m-0">Tetap semangat yaaa</p>
                                        </div>
                                    </div>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                      </form>
                                </a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection