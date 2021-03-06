<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    @yield('head')
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>@yield('title') - Admin</title>
    <link rel="stylesheet" href="{{asset('superadmin/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="{{asset('superadmin/fonts/fontawesome-all.min.css')}}">
    <script src="{{asset('superadmin/js/jquery.min.js')}}"></script>
    
    <link rel="stylesheet" href="{{ asset('sb-admin2/vendor/datatables/dataTables.bootstrap4.min.css') }}">
    <script src="{{ asset('sb-admin2/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('sb-admin2/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">
    <script src="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.js"></script>
    <link href="{{ asset('assets/backend/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
    <script src="{{ asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/jquery-ui/jquery-ui.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/jquery-timepicker/jquery.timepicker.min.css') }}">
    


</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-user-tie"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>Admin</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="#"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwoa">
                            
                            <i class="fas fa-key text-white"></i>
                          <span>Akun</span></a>
                          <div id="collapseTwoa" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                              <h6 class="collapse-header">Akun :</h6>
                              <a class="collapse-item" href="{{route('accounts.index')}}">Peserta</a>
                            </div>
                          </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwoas">
                            <i class="fas fa-users text-white"></i>
                          <span>User</span></a>
                          <div id="collapseTwoas" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                              <h6 class="collapse-header">User :</h6>
                              <a class="collapse-item" href="{{route('biodata.index')}}">Data Peserta</a>
                              
                            </div>
                          </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwaoa">
                            <i class="fas fa-desktop text-white"></i>
                          <span>Web Informasi</span></a>
                          <div id="collapseTwaoa" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                              <h6 class="collapse-header">Web Informasi :</h6>
                              <a class="collapse-item" href="{{route('timeline.index')}}">Linimasa</a>
                              <a class="collapse-item" href="{{route('countdown.index')}}">Countdown</a>
                              <a class="collapse-item" href="{{route('juknis.index')}}">Juknis</a>
                              <a class="collapse-item" href="{{route('partner.index')}}">Partner</a>
                              <a class="collapse-item" href="#">Kategori Post</a>
                              <a class="collapse-item" href="#">Post</a>
                            </div>
                          </div>
                    </li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="{{route('seleksi.index')}}"><i class="fas fa-tachometer-alt"></i><span>Berkas</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="{{route('file.index')}}"><i class="fas fa-tachometer-alt"></i><span>File</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="{{route('ujian.index')}}"><i class="fas fa-tachometer-alt"></i><span>CBT</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i><span>Logout</span></a><form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                             {{ csrf_field() }}
                                           </form>
                    </li>
                    
                    
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <form class="form-inline d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"></form>
                        <ul class="nav navbar-nav flex-nowrap ml-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-right p-3 animated--grow-in" role="menu" aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>

                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow" role="presentation">

                                <div class="nav-item dropdown no-arrow">
                                    <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 small">{{Auth::user()->name}}</span></a>
                                    <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu">
                                    <div class="dropdown-divider"></div><a class="dropdown-item" role="presentation" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                     <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400">
                                         </i>&nbsp;Logout</a><form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                             @csrf
                                           </form></div>
                                </div>
                                
                    </li>
                    </ul>
            </div>
            </nav>
            @yield('content')
    <footer class="bg-white sticky-footer">
        <div class="container my-auto">
            <div class="text-center my-auto copyright"><span>Copyright ?? Pusat Prestasi Nasional 2020</span></div>
        </div>
    </footer>
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
    <script src="{{asset('superadmin/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('superadmin/js/script.min.js')}}"></script>
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-timepicker/jquery.timepicker.min.js') }}"></script>
    <script>
		$(function () {
	       // menampilkan datetime
	       $('#datepicker').datepicker({
		        dateFormat: 'yy-mm-dd',
		        changeMonth: true,
		        changeYear: true,
		        yearRange : '1990:2050',  
		        autoclose: true
      		});

       		$('.timepicker').timepicker({
        		'timeFormat' : 'H:i:s'
       		});
     	});
     	
	</script>

	<script>
		function pilgan(){
			$('#pilihan_ganda').show();
			$('#esay').hide();
			document.getElementById('esay_answer').value = '';
		}

		function esay(){
			$('#pilihan_ganda').hide();
			$('#esay').show();
			document.getElementById('option_1').value = '';
			document.getElementById('option_2').value = '';
			document.getElementById('option_3').value = '';
			document.getElementById('option_4').value = '';
			document.getElementById('option_5').value = '';
		}
	</script>
    
</body>

</html>