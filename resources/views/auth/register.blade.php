@extends('layouts.frontend')
@section('title', 'Register')
@section('content')
<h3 style="display: none" id="countdowns" class="text-danger" style="font-weight: bold;">Pendaftaran Telah Tutup</h3>
<div id="countdown" class="row">
</div>
@if(now()->isBefore($time->penutupan))
<div class="register-photo">
    <div class="form-container">
        <div class="image-holder" style="background: url({{asset('assets/img/christopher-gower-m_HRfLhgABo-unsplash.jpg')}}) center / cover no-repeat;"></div>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <h2 class="text-center"><strong>Let's</strong>&nbsp;Rock.</h2>
                <div class="form-group">
                    <input id="name" type="text" placeholder="Nama Lengkap" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                </div>
                <div class="form-group">
                    <input placeholder="E-Mail" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            </div>
            <div class="form-group">
                <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            </div>
            <div class="form-group">
                <input id="password-confirm" placeholder="Password Confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
            <div class="form-group"><button id="buttons" class="btn btn-primary btn-block" type="submit">Daftar</button></div><a class="already" href="{{ route('login') }}">Sudah siap ? Masuk.</a></form>
    </div>
</div>
@endif
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