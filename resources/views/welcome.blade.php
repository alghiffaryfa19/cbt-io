@extends('layouts.frontend')
@section('description','Informatics Olympiad by HMIF UNEJ')
@section('title','Home')
@section('content')
<div style="margin-top: 20px" class="container">
    @if(session('tutup'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Maaf ya..</strong> Kami udah menutup pendaftaran Informatics Olympiad, nantikan event selanjutnya yaa.. Semangattt!!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
    
</div>
<div data-bs-parallax-bg="true" style="height: auto;padding-bottom: 42px;background: url({{asset('assets/img/annie-spratt-XMpXzzWrJ6g-unsplash.jpg')}}) bottom / cover;">
    <div class="container hero" style="margin-top: 1px;">
        <div class="row" style="padding-top: 85px;">
            <div class="col-12 col-lg-6 col-xl-5 offset-xl-1 bounce animated">
                <h5 class="text-warning" style="color: rgb(0,0,0);margin-top: 93px;font-style: normal;font-weight: bold;font-size: 27px;"><strong>Get in The Game !</strong></h5>
                <h1 class="text-primary" style="color: rgb(0,0,0);margin-top: 0px;font-style: normal;font-weight: bold;font-size: 52px;">Informatics Olympiad</h1>
                <p class="text-white" style="color: rgba(0,0,0,0.8);margin-bottom: 28px;">Proudly present by</p>
                <div style="margin-top: -31px;"><img class="img-fluid" src="{{asset('assets/img/logo.png')}}" style="height: 147px;"></div>
            </div>
            <div class="col-md-5 col-lg-5 offset-lg-1 offset-xl-0 d-none d-lg-block phone-holder">
                <div class="iphone-mockup"><img class="img-fluid bounce animated device" src="{{asset('assets/img/banner.png')}}" style="width: 402px;"></div>
            </div>
        </div>
    </div>
</div>
<div style="margin: 0px;margin-top: 108px;">
    <div class="container">
        <div class="row">
            <div class="col-md-6"><img class="img-fluid" data-bs-hover-animate="pulse" src="{{asset('assets/img/christopher-gower-m_HRfLhgABo-unsplash.jpg')}}" style="border-radius: 25px" loading="lazy"></div>
            <div class="col-md-6 align-self-center" style="padding-top: 15px;">
                <h1 class="text-primary">Apa itu Informatics Olympiad ?</h1>
                <p>Informatics Olympiad disingkat I/O adalah Olimpiade Komputer yang menitikberatkan pada pemahaman konsep tingkat lanjut dari siswa Sekolah Menengah Atas (SMA), Sekolah Menengah Kejuruan (SMK), Madrasah Aliyah (MA)  atau sederajat untuk mengerjakan soal yang diberikan. Perlombaan ini terdiri dari dua babak, yaitu babak penyisihan, dan babak final dan untuk tahun ini akan dilaksanakan secara online<br></p><a href="#"><i class="fa fa-rocket"></i>&nbsp;Find out here</a></div>
        </div>
    </div>
</div>
<div style="margin-top: 141px;">
    <div class="container">
        <h1 class="text-center text-primary">Penghargaan</h1>
        <div class="row" style="margin-top: 50px;">
            <div class="col-md-4 text-center"><img class="img-fluid" src="{{asset('assets/img/gold.png')}}" style="height: 204px;margin-bottom: 20px;"><br><span>Uang Pembinaan Rp. 1.500.000 + Trofi + Sertifikat</span></div>
            <div class="col-md-4 text-center"><img class="img-fluid" src="{{asset('assets/img/silver.png')}}" style="height: 204px;margin-bottom: 20px;"><br><span>Uang Pembinaan Rp. 1.250.000 + Trofi + Sertifikat</span></div>
            <div class="col-md-4 text-center"><img class="img-fluid" src="{{asset('assets/img/bronze.png')}}" style="height: 204px;margin-bottom: 20px;"><br><span>Uang Pembinaan Rp. 1.000.000 + Trofi + Sertifikat</span></div>
        </div>
    </div>
</div>
<div style="margin-top: 120px;">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="text-primary" style="font-weight: bold;">Penutupan</h1>
                <h1 class="text-primary" style="font-weight: bold;">Pendaftaran</h1>
                <h1 class="text-primary" style="font-weight: bold;">Informatics Olympiad</h1>
                <h3 style="display: none" id="countdowns" class="text-danger" style="font-weight: bold;">Pendaftaran Telah Tutup</h3>
                <div id="countdown" class="row" style="margin-top: 34px;">
                    <div class="col-6 col-sm-6 col-md-3 text-center">
                        <div style="background-color: #F1F1F1;"><span class="text-danger" id="hari" style="font-size: 56px;"></span></div><span class="text-secondary" style="font-size: 20px;">Hari</span></div>
                    <div class="col-6 col-sm-6 col-md-3 text-center">
                        <div style="background-color: #F1F1F1;"><span class="text-danger" id="jam" style="font-size: 56px;"></span></div><span class="text-secondary" style="font-size: 20px;">Jam</span></div>
                    <div class="col-6 col-sm-6 col-md-3 text-center">
                        <div style="background-color: #F1F1F1;"><span class="text-danger" id="menit" style="font-size: 56px;"></span></div><span class="text-secondary" style="font-size: 20px;">Menit</span></div>
                    <div class="col-6 col-sm-6 col-md-3 text-center">
                        <div style="background-color: #F1F1F1;"><span class="text-danger" id="detik" style="font-size: 56px;"></span></div><span class="text-secondary" style="font-size: 20px;">Detik</span></div>
                </div>
               
            </div>
            <div class="col-md-6 text-center" style="margin-top: 30px;"><img class="img-fluid" src="{{asset('assets/img/timer.jpg')}}" style="height: 269px;"></div>
        </div>
    </div>
</div>
<div style="padding-top: 57px;background-color: rgba(156,208,255,0);padding-bottom: 20px;margin-top: 127px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-primary" style="color: #25a9e0;font-weight: bold;">Linimasa</h2><span style="font-weight: bold;font-size: 84px;position: absolute;left: -40px;top: -60px;z-index: -1;color: #e0e0e0;">Timeline</span>
                <div class="container mt-5 mb-5">
                    <div class="row">
                        <div class="col-12">
                            <ul class="timeline">
                                @foreach ($timeline as $item)
                                <li>
                                    <span><strong>{{$item->keterangan}}</strong></span>
                                    <span class="float-right text-danger"><strong>{{$item->waktu}}</strong></span>
                                    <p>{{$item->detail}}</p>
                                </li>
                                @endforeach 
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="highlight-phone" style="margin-top: 60px;margin-bottom: 20px;background-color: rgba(238,244,247,0.55);">
    <div class="container">
        <div class="row">
            <div class="col-md-8 align-self-center">
                <div class="intro">
                    <h2 class="text-primary">Let's Rock Now..</h2><span style="font-weight: bold;font-size: 90px;position: absolute;left: -40px;top: -60px;z-index: -1;color: #e0e0e0;">Register</span>
                    <p>Hallo Informaticians<br>Ayo keluarkan kemampuanmu untuk bertanding di Informatics Olympiad..</p>
                    <a class="btn btn-primary" role="button" href="{{ route('register') }}"><i class="far fa-id-card"></i>&nbsp;Daftar sekarang</a>
                    <a class="btn btn-warning" role="button" href="{{$juknis->link}}" style="margin-left: 15px;"><i class="fas fa-file-download"></i>&nbsp;Unduh Petunjuk Teknis</a></div>
            </div>
            <div class="col align-self-center"><img class="img-fluid" src="{{asset('assets/img/logoio.png')}}" style="margin-top: 54px;"></div>
        </div>
    </div>
</div>
<div>
    <h1 class="text-center text-primary">In Collaboration with</h1>
    <div class="slider">
        <div class="slide-track">
            @foreach ($partner as $item)
                <div  class="slide">
                    <a href="{{$item->url}}">
                        <img src="{{ asset('uploads/'.$item->logo) }}" style="padding-right: 20px" height="auto" width="200" alt="{{$item->name}}" />
                    </a>
                </div>
                @endforeach
        </div>
    </div>
</div>
<script>
    // Set the date we're counting down to
    var countDownDate = new Date('{{$time->penutupan}}');
    
    // Update the count down every 1 second
    var x = setInterval(function() {
    
      // Get today's date and time
      var now = new Date().getTime();
    
      // Find the distance between now and the count down date
      var distance = countDownDate - now;
    
      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
      // Display the result in the element with id="demo"
      document.getElementById("hari").innerHTML = days;
    document.getElementById("jam").innerHTML = hours;
    document.getElementById("menit").innerHTML = minutes;
    document.getElementById("detik").innerHTML = seconds;
    
      // If the count down is finished, write some text
      if (distance < 0) {
        clearInterval(x);
        document.getElementById("countdown").style.display = "none";
        document.getElementById("countdowns").style.display = "block";
      }
    }, 1000);
    </script>
@endsection