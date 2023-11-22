<!DOCTYPE html>
<!--
Template Name: NobleUI - HTML Bootstrap 5 Admin Dashboard Template
Author: NobleUI
Website: https://www.nobleui.com
Portfolio: https://themeforest.net/user/nobleui/portfolio
Contact: nobleui123@gmail.com
Purchase: https://1.envato.market/nobleui_admin
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
	<meta name="author" content="NobleUI">
	<meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<title>Admin Login Page</title>

    <style type="text/css">
         .authlogin-side-wrapper{
            width: 100%;
            height: 100%;
            background-image: url({{ asset('upload/login.png')}})
         }
    </style>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <!-- End fonts -->

	<!-- core:css -->
	<link rel="stylesheet" href="../../../assets/vendors/core/core.css">
	<!-- endinject -->

	<!-- Plugin css for this page -->
	<!-- End plugin css for this page -->

	<!-- inject:css -->
	<link rel="stylesheet" href="{{ asset('backend/assets/fonts/feather-font/css/iconfont.css')}}">
	<link rel="stylesheet" href="{{ asset('backend/assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
	<!-- endinject -->

  <!-- Layout styles -->
	<link rel="stylesheet" href="{{ asset('backend/assets/css/demo2/style.css')}}">
  <!-- End layout styles -->

  <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.png"')}} />
</head>
<body>
	<div class="main-wrapper">
		<div class="page-wrapper full-page"s>
			<div class="page-content d-flex align-items-center justify-content-center mt-7">

				<div class="mx-0 row w-100 auth-page">
					<div class="mx-auto col-md-8 col-xl-6">
						<div class="card">
							<div class="row">
                <div class="col-md-4 pe-md-0">
                  <div class="authlogin-side-wrapper">

                  </div>
                </div>
                <div class="col-md-8 ps-md-0">
                  <div class="px-4 py-5 auth-form-wrapper">
                    <a href="#" class="mb-2 noble-ui-logo logo-light d-block">Shdab<span>UI</span></a>
                    <h5 class="mb-4 text-muted fw-normal">Welcome back! Log in to your account.</h5>
                    <form  id= "myForm" class="forms-sample" method="post" action="{{ route('login') }}">
                        @csrf
                      <div class="mb-3 form-group">
                        <label for="login" class="form-label">Email/Name/Phone</label>
                        <input type="text" class="form-control" id="login" name="login" placeholder="Email">
                      </div>
                      <div class="mb-3 form-group">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" autocomplete="current-password" placeholder="Password">
                      </div>
                      <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="authCheck">
                        <label class="form-check-label" for="authCheck">
                          Remember me
                        </label>
                      </div>
                      <div>
                        <button type='submit' class="mb-2 btn btn-outline-primary btn-icon-text mb-md-0">Login</button>
                      </div>
                      <a href="register.html" class="mt-3 d-block text-muted">Not a user? Sign up</a>
                    </form>
                  </div>
                </div>
              </div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<!-- core:js -->
	<script src="{{ asset('backend/assets/vendors/core/core.js')}}"></script>
	<!-- endinject -->

	<!-- Plugin js for this page -->
	<!-- End plugin js for this page -->

	<!-- inject:js -->
	<script src="{{ asset('backend/assets/vendors/feather-icons/feather.min.js')}}"></script>
	<script src="{{ asset('backend/assets/js/template.js')}}"></script>
	<!-- endinject -->

	<!-- Custom js for this page -->
	<!-- End custom js for this page -->

</body>
</html>
