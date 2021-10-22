@extends('layouts.frontend')
@section('description','Informatics Olympiad by HMIF UNEJ')
@section('title','Akun')
@section('content')
<div class="register-photo">
    <div class="form-container">
        <div class="image-holder" style="background: url({{asset('assets/img/christopher-gower-m_HRfLhgABo-unsplash.jpg')}}) center / cover no-repeat;"></div>
        <form method="POST" action="{{ route('akun-peserta.store') }}">
            @csrf
            <h2 class="text-center"><strong>Edit</strong>&nbsp;Akun</h2>
            <div class="form-group">
                <input id="name" type="text" placeholder="Nama Lengkap" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$akun->name}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            </div>
            <div class="form-group">
                <input placeholder="E-Mail" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$akun->email}}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            </div>
            <div class="form-group">
                <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            </div>
            
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">Simpan</button></div>
                </form>
    </div>
</div>
<script>
	$(document).ready(function(){
		var flash = "{{ Session::has('pesan') }}";
		if(flash){
			var pesan = "{{ Session::get('pesan') }}";
			alert(pesan);
		}
	});
</script>
@endsection