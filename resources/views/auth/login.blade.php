
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Login Page - Simbeng</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="{{url('assets/css/bootstrap.min.css')}}" />
		<link rel="stylesheet" href="{{url('assets/font-awesome/4.5.0/css/font-awesome.min.css')}}" />

		<!-- text fonts -->
		<link rel="stylesheet" href="{{url('assets/css/fonts.googleapis.com.css')}}" />

		<!-- ace styles -->
		<link rel="stylesheet" href="{{url('assets/css/ace.min.css')}}" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="{{url('assets/css/ace-part2.min.css')}}" />
		<![endif]-->
		<link rel="stylesheet" href="{{url('assets/css/ace-rtl.min.css')}}" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="{{url('assets/css/ace-ie.min.css')}}" />
		<![endif]-->

		<!-- HTML5shiv and Respond.js')}} for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="{{url('assets/js/html5shiv.min.js')}}"></script>
		<script src="{{url('assets/js/respond.min.js')}}"></script>
		<![endif]-->
	</head>

	<body class="login-layout login-layout light-login">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									
									<span class="red">SIMBENG</span>
								</h1>
								<h4 class="blue" id="id-company-text">&copy; SMK Negeri 1 Cirebon</h4>
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<div class="text-center">
												<img src="{{url('assets/images/logo.png')}}" alt="" width="200px">
											</div>
											<h5 class="header blue lighter bigger text-center">
												
												Silahkan Masuk Untuk Melanjutkan
											</h5>
											@if (session('status'))
												<div class="alert alert-danger text-center">
													{{session('status')}}
												</div>
											@endif

											{{-- <div class="space-4"></div> --}}

											<form action="{{route('post.login')}}" method="POST">
												@csrf
												<fieldset>
													<label class="block clearfix @error('username') has-error @enderror">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" name="username" placeholder="Username" />
															<i class="ace-icon fa fa-user"></i>
														</span>
														@error('username')
															<div class="invalid-feedback text-danger">
																{{$message}}
															</div>
														@enderror
													</label>

													<label class="block clearfix @error('password') has-error @enderror">
														<span class="block input-icon input-icon-right">
															<input type="password" name="password" class="form-control" placeholder="Password" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
														@error('password')
															<div class="invalid-feedback text-danger">
																{{$message}}
															</div>
														@enderror
													</label>

													<div class="space"></div>

													<div class="clearfix">
														

														<button type="submit" class="width-35 btn btn-sm btn-primary">
															<i class="ace-icon fa fa-key"></i>
															<span class="bigger-110">Masuk</span>
														</button>
													</div>

													<div class="space-4"></div>
												</fieldset>
											</form>

											
										</div><!-- /.widget-main -->

										
									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->
							</div><!-- /.position-relative -->
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="{{url('assets/js/jquery-2.1.4.min.js')}}"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="{{url('assets/js/jquery-1.11.3.min.js')}}"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='{{url('assets/js/jquery.mobile.custom.min.js')}}'>"+"<"+"/script>");
		</script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
			 $(document).on('click', '.toolbar a[data-target]', function(e) {
				e.preventDefault();
				var target = $(this).data('target');
				$('.widget-box.visible').removeClass('visible');//hide others
				$(target).addClass('visible');//show target
			 });
			});
			
			
			
			
		</script>
	</body>
</html>
