<!DOCTYPE html>
<html lang="en">

<head>
    <title>FCAM</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon icon -->
    <link rel="icon" href="{{ URL::asset('assets/images/favicon.ico') }}" type="image/x-icon">

    <!-- vendor css -->
	<link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}">    
</head>
<body class="">
	<!-- [ Pre-loader ] start -->
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill">A</div>
		</div>
	</div>
	<!-- [ Pre-loader ] End -->
	<!-- [ navigation menu ] start -->
	<nav class="pcoded-navbar menu-light ">
		<div class="navbar-wrapper  ">
			<div class="navbar-content scroll-div " >
				
				<div class="">
					<div class="main-menu-header">
						<img class="img-radius" src="../images/user/kg.png" alt="User-Profile-Image">
						<div class="user-details">
							<div id="more-details">{{ Auth::user()->name }}<i class="fa fa-caret-down"></i></div>
						</div>
					</div>
					<div class="collapse" id="nav-user-link">
						<ul class="list-unstyled">
							
							<li class="list-group-item"><a href=" {{ route('logout') }}"><i class="feather icon-log-out m-r-5"></i>Logout</a></li>
						</ul>
					</div>
				</div>
				
				<ul class="nav pcoded-inner-navbar ">
					<li class="nav-item pcoded-menu-caption">
					    <label>Navigation</label>
					</li>
					<li class="nav-item">
					    <a href="{{ route('home') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Menu</span></a>
					</li>
					<li class="nav-item pcoded-menu-caption">
					    <label>Formulaires &amp; Tableaux</label>
					</li>
					<li class="nav-item">
					    <a href="{{ route('inscription') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Inscription</span></a>
					</li>
                    <li class="nav-item">
					    <a href="{{ route('moniteur') }}" class="nav-link "><span class="pcoded-micon"><i class="fa fa-user"></i></span><span class="pcoded-mtext">Moniteurs</span></a>
					</li>
					<li class="nav-item pcoded-hasmenu">
					    <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="fas fa-hand-holding-usd"></i></span><span class="pcoded-mtext">Caisse</span></a>
					    <ul class="pcoded-submenu">
					        <li><a href="{{ route('paiement') }}">Paiement du Client</a></li>
					        <li><a href="{{ route('fiche_paye') }}">Paiement des moniteurs</a></li>
					        <li><a href="{{ route('depence') }}">Dépences</a></li>
					    </ul>
					</li>
                    <li class="nav-item">
					    <a href="{{ route('session') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Session</span></a>
					</li>
                    <li class="nav-item">
					    <a href="{{ route('cour') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Cours</span></a>
					</li>
					<li class="nav-item">
					    <a href="{{ route('participer') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Programmer un cour</span></a>
					</li>
					{{-- <li class="nav-item"> --}}
					    {{-- <a href="{{ route('list_app') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-align-justify"></i></span><span class="pcoded-mtext">Listes</span></a> --}}
					{{-- </li> --}}
					<li class="nav-item pcoded-menu-caption">
					    <label>NETIS</label>
					</li>
					<li class="nav-item">
					    <a href="#" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Programmer un cour</span></a>
					</li>
					<li class="nav-item pcoded-menu-caption">
					    <label>Paramètres</label>
					</li>

					<li class="nav-item pcoded-hasmenu">
					    <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-settings m-r-5"></i></span><span class="pcoded-mtext">Settings</span></a>
					    <ul class="pcoded-submenu">
							<li><a href="#!">Historique</a></li>
					    </ul>
					</li>

					<li class="nav-item"><a href="{{ route('sample') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-sidebar"></i></span><span class="pcoded-mtext">Sample page</span></a></li>

				</ul>
				
			</div>
		</div>
	</nav>
	<header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">
		
			
				<div class="m-header">
					<a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
					<a href="#!" class="b-brand">
						<!-- ========   change your logo hear   ============ -->
						<img src="../assets/images/logo.png" alt="" class="logo">
						<img src="../assets/images/logo-icon.png" alt="" class="logo-thumb">
					</a>
					<a href="#!" class="mob-toggler">
						<i class="feather icon-more-vertical"></i>
					</a>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item">
							<a href="#!" class="pop-search"><i class="feather icon-search"></i></a>
							<div class="search-bar">
								<input type="text" class="form-control border-0 shadow-none" placeholder="Search hear">
								<button type="button" class="close" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						</li>
					</ul>
					<ul class="navbar-nav ml-auto">
						<li>
							<div class="dropdown drp-user">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="feather icon-user"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right profile-notification">
									<div class="pro-head">
										<img src="../assets/images/user/avatar-1.jpg" class="img-radius" alt="">
										<span>{{ Auth::user()->name }}</span>
										<a href="{{ route('logout') }}" class="dud-logout" title="Logout">
											<i class="feather icon-log-out"></i>
										</a>
									</div>
									<ul class="pro-body">
										<li><a href="user-profile.html" class="dropdown-item"><i class="feather icon-user"></i> Profile</a></li>
										<li><a href="email_inbox.html" class="dropdown-item"><i class="feather icon-mail"></i> My Messages</a></li>
									</ul>
								</div>
							</div>
						</li>
					</ul>
				</div>
				
			
	</header>

	@yield('content')
    <script src="../assets/js/vendor-all.min.js"></script>
    <script src="../assets/js/plugins/bootstrap.min.js"></script>
    <script src="../assets/js/ripple.js"></script>
    <script src="../assets/js/pcoded.min.js"></script>

<!-- Apex Chart -->
<script src="../js/plugins/apexcharts.min.js"></script>


<!-- custom-chart js -->
<script src="../js/pages/dashboard-main.js"></script>
</body>

</html>
