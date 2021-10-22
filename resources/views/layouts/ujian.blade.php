<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>@yield('title') - Informatics Olympiad</title>
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="{{asset('assets/fonts/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/fonts/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/fonts/fontawesome5-overrides.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/styles.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md sticky-top bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/"><img id="brand-logo" src="{{asset('assets/img/logoio.png')}}"></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="/">Beranda</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="#">Blog</a></li>
                    @if (Route::has('login'))
                    @auth
                    <li class="nav-item" role="presentation"><a href="{{ route('dashboard') }}" class="btn btn-primary" type="button">Dashboard</a></li>
                    @else
                    <li class="nav-item" role="presentation"><a href="{{ route('login') }}" class="btn btn-primary" type="button">Sign In</a></li>
                    @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
    <div class="footer-clean" style="background-color: rgb(39,95,143);background-position: center;background-size: cover;background-repeat: no-repeat;">
        <footer>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-4 col-md-3 item">
                        <h3>Tentang</h3>
                        <ul>
                            <li><a href="#">Informatics Olympiad</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4 col-md-3 item"></div>
                    <div class="col-sm-4 col-md-3 item"></div>
                    <div class="col-lg-3 item social">
                        <h5 style="margin-bottom: 0px;">Keep in touch with us</h5><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-instagram"></i></a><a href="#"><i class="fa fa-whatsapp"></i></a><a href="#"><i class="fa fa-envelope-open"></i></a>
                        <p class="copyright">&nbsp;Made with ❤ from HMIF UNEJ © 2020</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/macy@2"></script>
    <script src="{{asset('assets/js/script.min.js')}}"></script>
    <script>
		@php 
		if($tipe == 'kerjakan_soal'){
			$akhir = strtotime($pengerjaan['time_end']);
		}
		if($tipe == 'waktu_tunggu'){
			$akhir = strtotime($detail['time_start']);
		}
		if($tipe == 'konfirmasi'){
			$akhir = strtotime($mapel['time_end']);
		}
		$waktu = $akhir - time();
		$jam = floor($waktu/3600);
		$menit = floor($waktu/60);
		$detik = floor($waktu%60);
		if ($menit < 60) {
			$jam = 0;
			$menit = $menit;
			$detik = $detik;
		}else {
			$jam = (int)($menit/60);
			$menit = $menit%60;
			$detik = $detik;
		}
		@endphp	
		$(document).ready(function() {
			var tipe = '{{ $tipe }}' ;
			var detik   = {{$detik }} ;
			var menit   = {{ $menit }};
			var jam     = {{ $jam }};
			function timeLeft() {
				setTimeout(timeLeft,1000);
				$('.time_left').html(
					jam + ' : ' + menit + ' : ' + detik 
					);
				detik --;
				if(detik < 0) {
					detik = 59;
					menit --;
					if(menit < 0) {
						menit = 59;
						jam --;      
						if(jam < 0) { 
							if(tipe == 'waktu_tunggu'){
								$('.time_left').hide();
								$('.warn').show();
								$('.warn').html('<strong><span class="text-danger">Silahkan Klik Button Mulai, Ujian Telah Dapat Dimulai</span></strong>')
								$('#btn-mulai').removeAttr('disabled');
							}
							if(tipe == 'kerjakan_soal'){
								finish();
							}
						} 
					} 
				} 
			}           
			timeLeft();   
		});

		function start_ujian(id){
			var lm_ujian = $('#lm_ujian').val();
			var ujian_id = $('#ujian_id').val();
			var _token = "{{ csrf_token() }}";
			$.ajax({
				url: '{{ route('attemp') }}',
				type : 'POST',
				dataType : 'JSON',
				data : {_token:_token,ujian_id:ujian_id,id:id,lm_ujian:lm_ujian},
				success: function(data) {
					console.log(data);
					window.location.href = '{{ url('test/soal') }}'+'/'+data.ujian_id+'/'+data.no_soal;
				}
			})
		} 

		function simpan_soal(kondisi,kd_soal) {
			var answer = '';
			var ujian_id = $('#ujian_id').val();
			var soal_id = $('#soal_id').val();
			var _token = "{{ csrf_token() }}";
			if($('#esay_answer').val() != null) {
				answer = $('#esay_answer').val();
			}
			else if(document.getElementById('radio1').checked) {
				answer = document.getElementById('radio1').value;
			}
			else if(document.getElementById('radio2').checked) {
				answer = document.getElementById('radio2').value;
			}
			else if(document.getElementById('radio3').checked) {
				answer = document.getElementById('radio3').value;
			}
			else if(document.getElementById('radio4').checked) {
				answer = document.getElementById('radio4').value;
			}
			else if(document.getElementById('radio5').checked) {
				answer = document.getElementById('radio5').value;
			}
			console.log(answer)
			$.ajax({
				url : '{{ url('test/simpan') }}',
				type : 'POST',
				dataType : 'JSON',
				data : {_token:_token,ujian_id:ujian_id,soal_id:soal_id,answer:answer,kondisi:kondisi},
				success : function(response) {
					console.log('OK');
					$('.simpan_soal').show();
				}
			});
		}

		function finish(){
				var ujian_id = $('#ujian_idi').val();
				
				var _token = "{{ csrf_token() }}";
				$.ajax({
					url : '{{url('test/selesai')}}',
					type : 'POST',
					data : {_token:_token,ujian_id:ujian_id},
					success : function(response){
						window.location.href = '{{route('dashboard')}}'
					}
				})
			}   

	</script>
</body>

</html>