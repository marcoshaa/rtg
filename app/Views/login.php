<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="Description" content="Admin Dashboard Bootstrap HTML template">
		<meta name="Author" content="Spruko Technologies Private Limited">
		<meta name="Keywords" content="admin, dashboard, premium, admin html, dash admin, best admin, admin theme, admin portal, simple admin, admin layout, new dashboard, html template for web application, simple dashboard template bootstrap, bootstrap 4 sidebar collapse, bootstrap 4 collapse sidebar, bootstrap dashboard template, simple bootstrap 4 template, simple admin panel template, admin dashboard bootstrap 4, bootstrap 4 admin template, bootstrap collapse sidebar, bootstrap simple dashboard, dashboard website template, bootstrap backend template, template admin bootstrap 4, bootstrap 4 admin template, bootstrap admin dashboard, ecommerce admin panel template"/>

		<!-- Title -->
		<title> NestTravel - Admin</title>

		<!-- Favicon -->
		<link rel="icon" href="<?=$template_url;?>/img/brand/favicon.png" type="image/x-icon"/>

		<!-- Bootstrap css -->
		<link href="<?=$template_url;?>/plugins/bootstrap/css/bootstrap.css" rel="stylesheet" />

		<!-- Icons css -->
		<link href="<?=$template_url;?>/css/icons.css" rel="stylesheet">

		<!--  Right-sidemenu css -->
		<link href="<?=$template_url;?>/plugins/sidebar/sidebar.css" rel="stylesheet">

		<!--  Left-Sidebar css -->
		<link rel="stylesheet" href="<?=$template_url;?>/css/sidemenu.css">

		<!--- Dashboard-2 css-->
		<link href="<?=$template_url;?>/css/style.css" rel="stylesheet">
		<link href="<?=$template_url;?>/css/style-dark.css" rel="stylesheet">

		<!--- Color css-->
		<link id="theme" href="<?=$template_url;?>/css/colors/color.css" rel="stylesheet">

		<!---Skinmodes css-->
		<link href="<?=$template_url;?>/css/skin-modes.css" rel="stylesheet" />

		<!--- Animations css-->
		<link href="<?=$template_url;?>/css/animate.css" rel="stylesheet">

	</head>
	<body class="main-body bg-light light-theme">

		<!-- Loader -->
		<div id="global-loader">
			<img src="<?=$template_url;?>/img/loader-2.svg" class="loader-img" alt="Loader">
		</div>
		<!-- /Loader -->

		<!-- main-signin-wrapper -->
		<div class="my-auto page page-h">
			<div class="main-signin-wrapper error-wrapper">
				<div class="main-card-signin d-md-flex wd-100p">
				<div class="wd-md-50p login d-none d-md-block page-signin-style p-5 text-white" >
					<div class="my-auto authentication-pages">
						<div>
							<h2 class="mb-4 text-center">Área administrativa</h2>
						</div>
					</div>
				</div>
				<div class="p-5 wd-md-50p">
					<div class="main-signin-header">                        
                        <img src="<?=$template_url;?>/img/nesttravel.png" class=" m-0 mb-4" alt="logo" style="width:280px;">  
						<form id="form-login" accept-charset="UTF-8" role="form" action="<?=$actionlogin;?>" method="post">
							<div class="form-group">
								<label>Email</label><input class="form-control" placeholder="Enter your email" name="email" type="text" value="">
							</div>
							<div class="form-group">
								<label>Senha</label> <input class="form-control" placeholder="Enter your password" name="password" type="password" value="">
							</div><button class="btn btn-main-primary btn-block" id="btn-login">Entrar</button>
						</form>
					</div>
					<div class="main-signin-footer mt-3 mg-t-5">
						<p><a href="">Esqueceu a senha ?</a></p>
					</div>
				</div>
			</div>
			</div>
		</div>
		<!-- /main-signin-wrapper -->

		<!-- JQuery min js -->
		<script src="<?=$template_url;?>/plugins/jquery/jquery-3.5.1.min.js"></script>

		<!-- Bootstrap4 js-->
		<script src="<?=$template_url;?>/plugins/bootstrap/popper.min.js"></script>
		<script src="<?=$template_url;?>/plugins/bootstrap/js/bootstrap.min.js"></script>

		<!-- Ionicons js -->
		<script src="<?=$template_url;?>/plugins/ionicons/ionicons.js"></script>

		<!-- Moment js -->
		<script src="<?=$template_url;?>/plugins/moment/moment.js"></script>

		<!-- eva-icons js -->
		<script src="<?=$template_url;?>/js/eva-icons.min.js"></script>

		<!-- Rating js-->
		<script src="<?=$template_url;?>/plugins/rating/jquery.barrating.js"></script>

		<!-- custom js -->
		<script src="<?=$template_url;?>/js/custom.js"></script>
        <script src="<?=$scripts_url?>/identification.js"></script>

	</body>
</html>