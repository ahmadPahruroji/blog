	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
		<title>Blank Page &mdash; Stisla</title>

		<!-- General CSS Files -->
		@include('templatebn.css')
		<!-- /END GA -->
	</head>

	<body>
		<div id="app">
			<div class="main-wrapper main-wrapper-1">
				<div class="navbar-bg"></div>
				<nav class="navbar navbar-expand-lg main-navbar">
					<form class="form-inline mr-auto">
						<ul class="navbar-nav mr-3">
							<li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
						</ul>
					</form>
					<ul class="navbar-nav navbar-right">
						<li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
							<img alt="image" src="{{ asset('public/assets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
							<div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div></a>
							<div class="dropdown-menu dropdown-menu-right">
								<div class="dropdown-title">Logged in 5 min ago</div>
								<a href="features-profile.html" class="dropdown-item has-icon">
									<i class="far fa-user"></i> Profile
								</a>
								<div class="dropdown-divider"></div>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
								</form>
								<a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
								<a href="#" class="dropdown-item has-icon text-danger">
									<i class="fas fa-sign-out-alt"></i> Logout
								</a>
							</div>
						</li>
					</ul>
				</nav>
				@include('templatebn.sidebar')
				<!-- Main Content -->
				<div class="main-content">
					<section class="section">
						<div class="section-header">
							<h1>@yield('subjudul')</h1>
						</div>
						@yield('content')
						<div class="section-body">
						</div>
					</section>
				</div>
				<footer class="main-footer">
					<div class="footer-left">
						Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
					</div>
					<div class="footer-right">

					</div>
				</footer>
			</div>
		</div>

		<!-- General JS Scripts -->
		@include('templatebn.script')
		@yield('scripth')
	</body>
	</html>