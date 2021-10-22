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
    <script src="{{asset('assets/js/script.min.js')}}"></script>
</body>

</html>