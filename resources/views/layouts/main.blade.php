<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>@yield('title') - SIMBeng</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="{{url('assets/css/bootstrap.min.css')}}" />
		<link rel="stylesheet" href="{{url('assets/css/datatables.bootstrap.css')}}" />
		<link rel="stylesheet" href="{{url('assets/font-awesome/4.5.0/css/font-awesome.min.css')}}" />
		<style>
			.swal2-popup {
				font-size: 1.6rem !important;
			}
		</style>
		@stack('more-css')
		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="{{url('assets/css/fonts.googleapis.com.css')}}" />

		<!-- ace styles -->
		<link rel="stylesheet" href="{{url('assets/css/ace.min.css')}}" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="{{url('assets/css/ace-skins.min.css')}}" />
		<link rel="stylesheet" href="{{url('assets/css/ace-rtl.min.css')}}" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="{{url('assets/js/ace-extra.min.js')}}"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default          ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="index.html" class="navbar-brand">
						<small>
							<img clas src="{{url('assets/images/logo.png')}}" alt="" height="25">
							SIMBeng
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="{{url('assets/images/avatars/user.jpg')}}" alt="Jason's Photo" />
								<span class="user-info">
									<small>Selamat Datang,</small>
									Jason
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								{{-- <li>
									<a href="#">
										<i class="ace-icon fa fa-cog"></i>
										Settings
									</a>
								</li>

								<li>
									<a href="profile.html">
										<i class="ace-icon fa fa-user"></i>
										Profile
									</a>
								</li> --}}

								{{-- <li class="divider"></li>	 --}}

								<li>
									<a href="#">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar responsive ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						SMK Negeri 1 Cirebon
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
					<li class="">
						<a href="index.html">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-database"></i>
							<span class="menu-text">
								Data Master
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>
						<ul class="submenu">
							<li class="">
								<a href=" {{route('class.index')}} ">
									<i class="menu-icon fa fa-caret-right"></i>
									<span class="menu-text"> Data Kelas </span>
								</a>
								<b class="arrow"></b>
							</li>
							<li class="">
								<a href=" {{route('student.index')}} ">
									<i class="menu-icon fa fa-caret-right"></i>
									<span class="menu-text"> Data Siswa </span>
								</a>
								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="{{route('room.index')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									<span class="menu-text"> Data Ruangan </span>
								</a>
								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="{{route('item.index')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									<span class="menu-text"> Data Barang </span>
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-dropbox"></i>
							<span class="menu-text">
								Manajemen Barang
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>
						<ul class="submenu">
							<li class="">
								<a href=" {{route('exit.index')}} ">
									<i class="menu-icon fa fa-caret-right"></i>
									<span class="menu-text"> Barang Keluar </span>
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-recycle"></i>
							<span class="menu-text">
								Data Transaksi
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>
						<ul class="submenu">
							<li class="">
								<a href=" {{route('borrow.index')}} ">
									<i class="menu-icon fa fa-caret-right"></i>
									<span class="menu-text"> Peminjaman Barang </span>
								</a>
								<b class="arrow"></b>
							</li>
							<li class="">
								<a href=" {{route('return.index')}} ">
									<i class="menu-icon fa fa-caret-right"></i>
									<span class="menu-text"> Pengembalian Barang </span>
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-print"></i>
							<span class="menu-text">
								Laporan - laporan
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>
						<ul class="submenu">
							<li class="">
								<a href=" {{route('report.item.index')}} ">
									<i class="menu-icon fa fa-caret-right"></i>
									<span class="menu-text"> Laporan Data Barang </span>
								</a>
								<b class="arrow"></b>
							</li>
							<li class="">
								<a href=" {{route('report.borrow.index')}} ">
									<i class="menu-icon fa fa-caret-right"></i>
									<span class="menu-text"> Laporan Peminjaman Barang </span>
								</a>
								<b class="arrow"></b>
							</li>
							<li class="">
								<a href=" {{route('report.exit.index')}} ">
									<i class="menu-icon fa fa-caret-right"></i>
									<span class="menu-text"> Laporan Barang Keluar </span>
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>
				</ul><!-- /.nav-list -->
			</div>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
                                <i class="fa fa-cogs"></i>
                                Sistem Informasi Manajemen Bengkel SMK Negeri 1 Cirebon
                            </li>
						</ul><!-- /.breadcrumb -->

						<div class="nav-search" id="nav-search">

						</div><!-- /.nav-search -->
					</div>

					<div class="page-content">
						@yield('content')
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">Sunarto</span> ||
							 Sistem Informasi Manajemen Benkel &copy; {{date('Y')}}
						</span>

						
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="{{url('assets/js/jquery-2.1.4.min.js')}}"></script>
		{{-- <script src="{{url('assets/js/jquery3.js')}}"></script> --}}

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='{{url('assets/js/jquery.mobile.custom.min.js')}}'>"+"<"+"/script>");
		</script>
		<script src="{{url('assets/js/bootstrap.min.js')}}"></script>

		{{-- datatables --}}

        <script src="{{url('assets/js/jquery.dataTables.min.js')}}"></script>
		<script src="{{url('assets/js/jquery.dataTables.bootstrap.min.js')}}"></script>

		<!-- page specific plugin scripts -->

		<!-- ace scripts -->
		<script src="{{url('assets/js/ace-elements.min.js')}}"></script>
		{{-- <script src="{{url('assets/js/sweetalert2.all.min.js')}}"></script> --}}
		<script src="{{url('assets/js/ace.min.js')}}"></script>

		<!-- inline scripts related to this page -->

		<script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
        </script>

        @stack('more-js')
	</body>
</html>
