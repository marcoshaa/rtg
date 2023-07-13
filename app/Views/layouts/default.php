<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Nest Travel - Seguro de viagem</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    		<!-- Favicon -->
		<link rel="icon" href="<?=$template_url;?>/img/brand/favicon.png" type="image/x-icon"/>

    <!-- Bootstrap css -->
    <link href="<?=$template_url;?>/plugins/bootstrap/css/bootstrap.css" rel="stylesheet" />

    <!-- Icons css -->
    <link href="<?=$template_url;?>/css/icons.css" rel="stylesheet">

    <!--  Owl-carousel css-->
    <link href="<?=$template_url;?>/plugins/owl-carousel/owl.carousel.css" rel="stylesheet" />

    <!--  Right-sidemenu css -->
    <link href="<?=$template_url;?>/plugins/sidebar/sidebar.css" rel="stylesheet">

    <!-- Sidemenu css -->
    <link rel="stylesheet" href="<?=$template_url;?>/css/sidemenu.css">

    <!-- Maps css -->
    <link href="<?=$template_url;?>/plugins/jqvmap/jqvmap.min.css" rel="stylesheet">

    <!-- Jvectormap css -->
    <link href="<?=$template_url;?>/plugins/jqvmap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />

    <!-- style css -->
    <link href="<?=$template_url;?>/css/style.css" rel="stylesheet">
    <link href="<?=$template_url;?>/css/style-dark.css" rel="stylesheet">

    <!--- Color css-->
    <link id="theme" href="<?=$template_url;?>/css/colors/color.css" rel="stylesheet">

    <!---Skinmodes css-->
    <link href="<?=$template_url;?>/css/skin-modes.css" rel="stylesheet" />

	<!-- JQuery min js -->
	<script src="<?=$template_url;?>/plugins/jquery/jquery-3.5.1.min.js"></script>

	<!-- Internal Data table css -->
	<link href="<?=$template_url;?>/plugins/datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
	<link href="<?=$template_url;?>/plugins/datatable/css/buttons.bootstrap4.min.css" rel="stylesheet">
	<link href="<?=$template_url;?>/plugins/datatable/css/responsive.bootstrap4.min.css" rel="stylesheet" />
	<link href="<?=$template_url;?>/plugins/datatable/css/jquery.dataTables.min.css" rel="stylesheet">
	<link href="<?=$template_url;?>/plugins/datatable/css/responsive.dataTables.min.css" rel="stylesheet">

  </head>
  <body class="main-body light-theme app sidebar-mini active leftmenu-color">

		<!-- Loader -->
		<div id="global-loader">
			<img src="<?=$template_url;?>/img/loader-2.svg" class="loader-img" alt="Loader">
		</div>
		<!-- /Loader -->

		<!-- main-sidebar -->
		<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
		<aside class="app-sidebar">
			<div class="main-sidebar-header active">
				<a class="desktop-logo logo-light active" href="index.html">
					<img src="<?=$template_url;?>/img/brand/logo.png" class="main-logo logo-color1" alt="logo">
					<img src="<?=$template_url;?>/img/brand/logo2.png" class="main-logo logo-color2" alt="logo">
					<img src="<?=$template_url;?>/img/brand/logo3.png" class="main-logo logo-color3" alt="logo">
					<img src="<?=$template_url;?>/img/brand/logo4.png" class="main-logo logo-color4" alt="logo">
					<img src="<?=$template_url;?>/img/brand/logo5.png" class="main-logo logo-color5" alt="logo">
					<img src="<?=$template_url;?>/img/brand/logo6.png" class="main-logo logo-color6" alt="logo">
				</a>
				<a class="desktop-logo logo-dark active" href="index.html"><img src="<?=$template_url;?>/img/LOGO_branca.png" class="main-logo dark-theme" alt="logo"></a>
				<div class="app-sidebar__toggle" data-toggle="sidebar">
					<a class="open-toggle" href="#"><i class="header-icon fe fe-chevron-left"></i></a>
					<a class="close-toggle" href="#"><i class="header-icon fe fe-chevron-right"></i></a>
				</div>
			</div>
			<div class="main-sidemenu sidebar-scroll">
				<ul class="side-menu"> 
					<li class="slide">
						<a class="side-menu__item" href="<?=site_url('home');?>"><div class="side-angle1"></div><div class="side-angle2"></div><div class="side-arrow"></div>
						<svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3zm5 15h-2v-6H9v6H7v-7.81l5-4.5 5 4.5V18z"/><path d="M7 10.19V18h2v-6h6v6h2v-7.81l-5-4.5z" opacity=".3"/></svg>
						<span class="side-menu__label">Dashboard</span></a>
					</li>
          			<li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="#"><div class="side-angle1"></div><div class="side-angle2"></div><div class="side-arrow"></div>
						<svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24" viewBox="0 0 24 24" width="24"><g><rect fill="none" height="24" width="24"/></g><g><g><rect height="5" opacity=".3" width="5" x="11" y="11"/><rect height="5" opacity=".3" width="5" x="4" y="11"/><rect height="5" opacity=".3" width="12" x="4" y="4"/><path d="M20,6v14H6v2h14c1.1,0,2-0.9,2-2V6H20z"/><path d="M18,16V4c0-1.1-0.9-2-2-2H4C2.9,2,2,2.9,2,4v12c0,1.1,0.9,2,2,2h12C17.1,18,18,17.1,18,16z M4,4h12v5H4V4z M9,16H4v-5h5 V16z M11,11h5v5h-5V11z"/></g></g></svg>
						<span class="side-menu__label">Cadastros</span><i class="angle fe fe-chevron-right"></i></a>
						<ul class="slide-menu">
							<li><a class="slide-item" href="<?=site_url('configuration');?>">Configurações</a></li>
							<li><a class="slide-item" href="<?=site_url('customer');?>">Clientes</a></li>
							<!-- <li><a class="slide-item" href="mail-compose.html">Produtos</a></li> -->
						</ul>
					</li>
					<li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="#"><div class="side-angle1"></div><div class="side-angle2"></div><div class="side-arrow"></div>
						<svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M17 7H7V4H5v16h14V4h-2z" opacity=".3"/><path d="M19 2h-4.18C14.4.84 13.3 0 12 0S9.6.84 9.18 2H5c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-7 0c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm7 18H5V4h2v3h10V4h2v16z"/></svg>
						<span class="side-menu__label">Consultas</span><i class="angle fe fe-chevron-right"></i></a>
						<ul class="slide-menu">
							<li><a class="slide-item" href="<?=site_url('request');?>">Pedidos</a></li>
							<li><a class="slide-item" href="<?=site_url('request/consultapaxs');?>">Passageiros</a></li>
						</ul>
					</li>
          <!--
					<li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="#"><div class="side-angle1"></div><div class="side-angle2"></div><div class="side-arrow"></div>
						<svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24" viewBox="0 0 24 24" width="24"><g><rect fill="none" height="24" width="24"/></g><g><g><rect height="5" opacity=".3" width="5" x="11" y="11"/><rect height="5" opacity=".3" width="5" x="4" y="11"/><rect height="5" opacity=".3" width="12" x="4" y="4"/><path d="M20,6v14H6v2h14c1.1,0,2-0.9,2-2V6H20z"/><path d="M18,16V4c0-1.1-0.9-2-2-2H4C2.9,2,2,2.9,2,4v12c0,1.1,0.9,2,2,2h12C17.1,18,18,17.1,18,16z M4,4h12v5H4V4z M9,16H4v-5h5 V16z M11,11h5v5h-5V11z"/></g></g></svg>
						<span class="side-menu__label">Sub Menu</span><i class="angle fe fe-chevron-right"></i></a>
						<ul class="slide-menu">
							<li class="sub-slide">
								<a class="sub-side-menu__item" data-toggle="sub-slide" href="#"><span class="sub-side-menu__label">Submenu 1</span><i class="sub-angle fe fe-chevron-right"></i></a>
								<ul class="sub-slide-menu">
									<li><a class="sub-slide-item" href="#">Submenu 1.1</a></li>
									<li class="sub-slide2">
										<a class="sub-slide-item" data-toggle="sub-slide2" href="#"><span class="sub-side-menu__label2">Submenu 1.2</span><i class="sub-angle2 fe fe-chevron-right"></i></a>
										<ul class="sub-slide-menu2">
											<li><a class="sub-slide-item2" href="#">Submenu 1.2.1</a></li>
											<li><a class="sub-slide-item2" href="#">Submenu 1.2.2</a></li>
											<li><a class="sub-slide-item2" href="#">Submenu 1.2.3</a></li>
										</ul>
									</li>
									<li><a class="sub-slide-item" href="#">Submenu 1.3</a></li>
								</ul>
							</li>
							<li><a class="sub-side-menu__item"  href="#"><span class="sub-side-menu__label">Submenu 2</span></a></li>
							<li><a class="sub-side-menu__item"  href="#"><span class="sub-side-menu__label">Submenu 3</span></a></li>
						</ul>
					</li>
          -->
				</ul>
				<div class="app-sidefooter">
					<a class="side-menu__item" href=""><svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 4c-4.41 0-8 3.59-8 8s3.59 8 8 8 8-3.59 8-8-3.59-8-8-8zm1 14h-2v-2h2v2zm0-3h-2c0-3.25 3-3 3-5 0-1.1-.9-2-2-2s-2 .9-2 2H8c0-2.21 1.79-4 4-4s4 1.79 4 4c0 2.5-3 2.75-3 5z" opacity=".3"/><path d="M11 16h2v2h-2zm1-14C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm0-14c-2.21 0-4 1.79-4 4h2c0-1.1.9-2 2-2s2 .9 2 2c0 2-3 1.75-3 5h2c0-2.25 3-2.5 3-5 0-2.21-1.79-4-4-4z"/></svg> <span class="side-menu__label">Suport</span></a>
					<a class="side-menu__item" href="<?=site_url('security/logout');?>"><svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24" viewBox="0 0 24 24" width="24"><g><rect fill="none" height="24" width="24"/></g><g><path d="M11,7L9.6,8.4l2.6,2.6H2v2h10.2l-2.6,2.6L11,17l5-5L11,7z M20,19h-8v2h8c1.1,0,2-0.9,2-2V5c0-1.1-0.9-2-2-2h-8v2h8V19z"/></g></svg> <span class="side-menu__label">Logout</span></a>
				</div>
			</div>
		</aside>
		<!-- main-sidebar -->

<!-- main-content -->
<div class="main-content app-content">

	<!-- main-header -->
	<div class="main-header sticky side-header nav nav-item">
		<div class="container-fluid">
			<div class="main-header-left">
				<div class="responsive-logo">
					<a href="index.html"><img src="../../assets/img/brand/logo.png" class="logo-1 logo-color1" alt="logo"></a>
					<a href="index.html"><img src="../../assets/img/brand/logo2.png" class="logo-1 logo-color2" alt="logo"></a>
					<a href="index.html"><img src="../../assets/img/brand/logo3.png" class="logo-1 logo-color3" alt="logo"></a>
					<a href="index.html"><img src="../../assets/img/brand/logo4.png" class="logo-1 logo-color4" alt="logo"></a>
					<a href="index.html"><img src="../../assets/img/brand/logo5.png" class="logo-1 logo-color5" alt="logo"></a>
					<a href="index.html"><img src="../../assets/img/brand/logo6.png" class="logo-1 logo-color6" alt="logo"></a>
					<a href="index.html"><img src="../../assets/img/brand/logo-white.png" class="dark-logo-1" alt="logo"></a>
					<a href="index.html"><img src="../../assets/img/brand/favicon.png" class="logo-2 logo-color1" alt="logo"></a>
					<a href="index.html"><img src="../../assets/img/brand/favicon2.png" class="logo-2 logo-color2" alt="logo"></a>
					<a href="index.html"><img src="../../assets/img/brand/favicon3.png" class="logo-2 logo-color3" alt="logo"></a>
					<a href="index.html"><img src="../../assets/img/brand/favicon4.png" class="logo-2 logo-color4" alt="logo"></a>
					<a href="index.html"><img src="../../assets/img/brand/favicon5.png" class="logo-2 logo-color5" alt="logo"></a>
					<a href="index.html"><img src="../../assets/img/brand/favicon6.png" class="logo-2 logo-color6" alt="logo"></a>
					<a href="index.html"><img src="../../assets/img/brand/favicon-white.png" class="dark-logo-2" alt="logo"></a>
				</div>
				<div class="app-sidebar__toggle d-md-none" data-toggle="sidebar">
					<a class="open-toggle" href="#"><i class="header-icon fe fe-align-left"></i></a>
					<a class="close-toggle" href="#"><i class="header-icons fe fe-x"></i></a>
				</div>
			</div>
			<div class="main-header-right">
				<div class="nav nav-item  navbar-nav-right ml-auto">
					<div class="dropdown nav-item main-header-notification">
						<a class="new nav-link" href="#"><i class="fe fe-bell"></i><span class=" pulse"></span></a>
						<div class="dropdown-menu shadow">
							<div class="menu-header-content bg-primary text-left d-flex">
								<div class="">
									<h6 class="menu-header-title text-white mb-0">7 new Notifications</h6>
								</div>
								<div class="my-auto ml-auto">
									<span class="badge badge-pill badge-warning float-right">Mark All Read</span>
								</div>
							</div>
							<div class="main-notification-list Notification-scroll ps">
								<a class="d-flex p-3 border-bottom" href="#">
									<div class="notifyimg bg-success-transparent">
										<i class="la la-shopping-basket text-success"></i>
									</div>
									<div class="ml-3">
										<h5 class="notification-label mb-1">New Order Received</h5>
										<div class="notification-subtext">1 hour ago</div>
									</div>
									<div class="ml-auto">
										<i class="las la-angle-right text-right text-muted"></i>
									</div>
								</a>
								<a class="d-flex p-3 border-bottom" href="#">
									<div class="notifyimg bg-danger-transparent">
										<i class="la la-user-check text-danger"></i>
									</div>
									<div class="ml-3">
										<h5 class="notification-label mb-1">22 verified registrations</h5>
										<div class="notification-subtext">2 hour ago</div>
									</div>
									<div class="ml-auto">
										<i class="las la-angle-right text-right text-muted"></i>
									</div>
								</a>
								<a class="d-flex p-3 border-bottom" href="#">
									<div class="notifyimg bg-primary-transparent">
										<i class="la la-check-circle text-primary"></i>
									</div>
									<div class="ml-3">
										<h5 class="notification-label mb-1">Project has been approved</h5>
										<div class="notification-subtext">4 hour ago</div>
									</div>
									<div class="ml-auto">
										<i class="las la-angle-right text-right text-muted"></i>
									</div>
								</a>
								<a class="d-flex p-3 border-bottom" href="#">
									<div class="notifyimg bg-pink-transparent">
										<i class="la la-file-alt text-pink"></i>
									</div>
									<div class="ml-3">
										<h5 class="notification-label mb-1">New files available</h5>
										<div class="notification-subtext">10 hour ago</div>
									</div>
									<div class="ml-auto">
										<i class="las la-angle-right text-right text-muted"></i>
									</div>
								</a>
								<a class="d-flex p-3 border-bottom" href="#">
									<div class="notifyimg bg-warning-transparent">
										<i class="la la-envelope-open text-warning"></i>
									</div>
									<div class="ml-3">
										<h5 class="notification-label mb-1">New review received</h5>
										<div class="notification-subtext">1 day ago</div>
									</div>
									<div class="ml-auto">
										<i class="las la-angle-right text-right text-muted"></i>
									</div>
								</a>
								<a class="d-flex p-3" href="#">
									<div class="notifyimg bg-purple-transparent">
										<i class="la la-gem text-purple"></i>
									</div>
									<div class="ml-3">
										<h5 class="notification-label mb-1">Updates Available</h5>
										<div class="notification-subtext">2 days ago</div>
									</div>
									<div class="ml-auto">
										<i class="las la-angle-right text-right text-muted"></i>
									</div>
								</a>
								<div class="dropdown-footer">
									<a href="">VIEW ALL</a>
								</div>
							</div>
						</div>
					</div>
					<div class="dropdown main-profile-menu nav nav-item nav-link">
						<a class="profile-user d-flex" href=""><img alt="" src="<?=$template_url;?>/img/perfil/vanderson.jpg">
							<div class="p-text d-none">
								<span class="p-name font-weight-bold">Vanderson Ramos</span>
								<small class="p-sub-text">Premium Member</small>
							</div>
						</a>
						<div class="dropdown-menu shadow">
							<div class="main-header-profile header-img">
								<div class="main-img-user"><img alt="" src="<?=$template_url;?>/img/perfil/vanderson.jpg"></div>
								<h6>Vanderson Ramos</h6><span>Premium Member</span>
							</div>
							<a class="dropdown-item" href=""><i class="far fa-user"></i> My Profile</a>
							<a class="dropdown-item" href=""><i class="far fa-edit"></i> Edit Profile</a>
							<a class="dropdown-item" href=""><i class="far fa-clock"></i> Activity Logs</a>
							<a class="dropdown-item" href=""><i class="fas fa-sliders-h"></i> Account Settings</a>
							<a class="dropdown-item" href="signin.html"><i class="fas fa-sign-out-alt"></i> Sign Out</a>
						</div>
					</div>
					<div class="dropdown main-header-message right-toggle">
						<a class="nav-link pr-0" data-toggle="sidebar-right" data-target=".sidebar-right">
							<i class="ion ion-md-menu tx-20 bg-transparent"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /main-header -->		

    <!-- Carregando o conteúdo principal -->
    <?= $this->rendersection('content');?>

</div>

   <!-- Footer opened -->
		<div class="main-footer">
			<div class="container-fluid pd-t-0-f ht-100p">
				<span>Copyright © <script>document.write(new Date().getFullYear());</script>  <a href="#">Nest Travel</a>. Desenvolvido por <a href="https://www.grupoaguia.com.br/" target="_blank">Grupo Águia</a> Todos os direitos reservados.</span>
			</div>
		</div>
		<!-- Footer closed -->

		<!-- Back-to-top -->
		<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>

		<!-- Bootstrap4 js-->
		<script src="<?=$template_url;?>/plugins/bootstrap/popper.min.js"></script>
		<script src="<?=$template_url;?>/plugins/bootstrap/js/bootstrap.min.js"></script>

		<!--Internal  Chart.bundle js -->
		<!-- <script src="<?=$template_url;?>/plugins/chart.js/Chart.bundle.min.js"></script> -->

		<!-- Ionicons js -->
		<script src="<?=$template_url;?>/plugins/ionicons/ionicons.js"></script>

		<!-- Moment js -->
		<script src="<?=$template_url;?>/plugins/moment/moment.js"></script>

		<!--Internal Sparkline js -->
		<!-- <script src="<?=$template_url;?>/plugins/jquery-sparkline/jquery.sparkline.min.js"></script> -->

		<!-- Moment js -->
		<script src="<?=$template_url;?>/plugins/raphael/raphael.min.js"></script>

		<!--Internal  Flot js-->
		<!--
		<script src="<?=$template_url;?>/plugins/jquery.flot/jquery.flot.js"></script>
		<script src="<?=$template_url;?>/plugins/jquery.flot/jquery.flot.pie.js"></script>
		<script src="<?=$template_url;?>/plugins/jquery.flot/jquery.flot.resize.js"></script>
		<script src="<?=$template_url;?>/plugins/jquery.flot/jquery.flot.categories.js"></script>
		<script src="<?=$template_url;?>/js/dashboard.sampledata.js"></script>
		<script src="<?=$template_url;?>/js/chart.flot.sampledata.js"></script>
		-->

		<!--Internal Apexchart js-->
		<!-- <script src="<?=$template_url;?>/js/apexcharts.js"></script> -->

		<!-- Chart-circle js -->
		<!-- <script src="<?=$template_url;?>/js/circle-progress.min.js"></script> -->
		<!-- <script src="<?=$template_url;?>/js/chart-circle.js"></script> -->

		<!-- Rating js-->
		<!-- <script src="<?=$template_url;?>/plugins/rating/jquery.barrating.js"></script> -->

		<!-- Suggestion js-->
		<!-- <script src="<?=$template_url;?>/plugins/suggestion/jquery.input-dropdown.js"></script> -->
		<!-- <script src="<?=$template_url;?>/js/search.js"></script> -->

		<!--Internal  Perfect-scrollbar js -->
		<script src="<?=$template_url;?>/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="<?=$template_url;?>/plugins/perfect-scrollbar/p-scroll.js"></script>

		<!-- Eva-icons js -->
		<script src="<?=$template_url;?>/js/eva-icons.min.js"></script>

		<!-- right-sidebar js -->
		<script src="<?=$template_url;?>/plugins/sidebar/sidebar.js"></script>
		<script src="<?=$template_url;?>/plugins/sidebar/sidebar-custom.js"></script>

		<!-- Sticky js -->
		<script src="<?=$template_url;?>/js/sticky.js"></script>
		<script src="<?=$template_url;?>/js/modal-popup.js"></script>

		<!-- Left-menu js-->
		<script src="<?=$template_url;?>/plugins/side-menu/sidemenu.js"></script>

		<!-- ECharts js-->
		<!-- <script src="<?=$template_url;?>/plugins/echart/echart.js"></script> -->

		<!--Internal  index js -->
		<!-- <script src="<?=$template_url;?>/js/apexcharts.js"></script> -->
		<!-- <script src="<?=$template_url;?>/js/index.js"></script> -->

		<!-- custom js -->
		<script src="<?=$template_url;?>/js/custom.js"></script> 

		<!-- Internal Data tables -->
		<script src="<?=$template_url;?>/plugins/datatable/js/jquery.dataTables.min.js"></script>
		<script src="<?=$template_url;?>/plugins/datatable/js/dataTables.dataTables.min.js"></script>
		<script src="<?=$template_url;?>/plugins/datatable/js/dataTables.responsive.min.js"></script>
		<script src="<?=$template_url;?>/plugins/datatable/js/responsive.dataTables.min.js"></script>
		<script src="<?=$template_url;?>/plugins/datatable/js/jquery.dataTables.js"></script>
		<script src="<?=$template_url;?>/plugins/datatable/js/dataTables.bootstrap4.js"></script>
		<script src="<?=$template_url;?>/plugins/datatable/js/dataTables.buttons.min.js"></script>
		<script src="<?=$template_url;?>/plugins/datatable/js/buttons.bootstrap4.min.js"></script>
		<script src="<?=$template_url;?>/plugins/datatable/js/jszip.min.js"></script>
		<script src="<?=$template_url;?>/plugins/datatable/js/pdfmake.min.js"></script>
		<script src="<?=$template_url;?>/plugins/datatable/js/vfs_fonts.js"></script>
		<script src="<?=$template_url;?>/plugins/datatable/js/buttons.html5.min.js"></script>
		<script src="<?=$template_url;?>/plugins/datatable/js/buttons.print.min.js"></script>
		<script src="<?=$template_url;?>/plugins/datatable/js/buttons.colVis.min.js"></script>
		<script src="<?=$template_url;?>/plugins/datatable/js/dataTables.responsive.min.js"></script>
		<script src="<?=$template_url;?>/plugins/datatable/js/responsive.bootstrap4.min.js"></script>

		<script type="text/javascript">
			$(function () {
				$('#example1').DataTable({
					language: {
						searchPlaceholder: 'Filtrar...',
						sSearch: '',
						lengthMenu: '_MENU_',
					}
				});
			});	  
		</script>

    
  </body>
</html>