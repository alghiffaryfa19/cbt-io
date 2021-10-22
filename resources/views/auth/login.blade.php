@extends('layouts.frontend')
@section('title', 'Login')
@section('content')
<div class="login-clean">
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <h2 class="sr-only">Login Form</h2>
        <div class="illustration"><img class="img-fluid" src="{{asset('assets/img/logoio.png')}}"></div>
        <div class="form-group">
            <input placeholder="E-Mail" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
        </div>
        <div class="form-group">
            <input placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit">Masuk</button>
        </div>
        {{-- <a class="forgot" href="{{ route('register') }}">Belum Punya Akun ? Daftar.</a> --}}
       
        
    </form>
</div>
@endsection