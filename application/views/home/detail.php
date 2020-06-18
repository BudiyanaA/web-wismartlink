<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.5
Version: 4.1.0
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
	<meta charset="utf-8" />
	<title>API OTT</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
	<link href="<?php echo base_url() ?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css">
	<!-- END PAGE LEVEL PLUGIN STYLES -->
	<!-- BEGIN PAGE STYLES -->
	<link href="<?php echo base_url() ?>assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css" />
	<!-- END PAGE STYLES -->
	<!-- BEGIN THEME STYLES -->
	<!-- DOC: To use 'rounded corners' style just load 'components-rounded.css' stylesheet instead of 'components.css' in the below style tag -->
	<link href="<?php echo base_url() ?>assets/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>assets/global/css/plugins.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>assets/admin/layout4/css/layout.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>assets/admin/layout4/css/themes/light.css" rel="stylesheet" type="text/css" id="style_color" />
	<link href="<?php echo base_url() ?>assets/admin/layout4/css/custom.css" rel="stylesheet" type="text/css" />
	<!-- END THEME STYLES -->
	<link rel="shortcut icon" href="favicon.ico" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->

<body class="page-header-fixed page-sidebar-closed-hide-logo page-sidebar-closed-hide-logo">
	<!-- BEGIN HEADER -->
	<div class="page-header navbar navbar-fixed-top">
		<!-- BEGIN HEADER INNER -->
		<div class="page-header-inner">
			<!-- BEGIN LOGO -->
			<div class="page-logo">
				<h1>
					API OTT
				</h1>
			</div>
			<!-- END LOGO -->
			<!-- BEGIN RESPONSIVE MENU TOGGLER -->
			<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
			</a>
			<!-- END RESPONSIVE MENU TOGGLER -->
			<!-- BEGIN PAGE ACTIONS -->
			<!-- DOC: Remove "hide" class to enable the page header actions -->
			<!-- END PAGE ACTIONS -->
			<!-- BEGIN PAGE TOP -->
			<div class="page-top">
				<!-- BEGIN HEADER SEARCH BOX -->
				<!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
				<form class="search-form" action="extra_search.html" method="GET">
					<div class="input-group">
						<input type="text" class="form-control input-sm" placeholder="Search..." name="query">
						<span class="input-group-btn">
							<a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
						</span>
					</div>
				</form>
				<!-- END HEADER SEARCH BOX -->
				<!-- BEGIN TOP NAVIGATION MENU -->
				<!-- END TOP NAVIGATION MENU -->
			</div>
			<!-- END PAGE TOP -->
		</div>
		<!-- END HEADER INNER -->
	</div>
	<!-- END HEADER -->
	<div class="clearfix">
	</div>
	<!-- BEGIN CONTAINER -->
	<div class="page-container">
		<!-- BEGIN SIDEBAR -->
		<div class="page-sidebar-wrapper">
			<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
			<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
			<div class="page-sidebar navbar-collapse collapse">
				<!-- BEGIN SIDEBAR MENU -->
				<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
				<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
				<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
				<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
				<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
				<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
				<ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
					<li class="start">
						<a href="<?php echo base_url() ?>index.php/api/home/Home">
							<i class="icon-home"></i>
							<span class="title">Dashboard</span>
						</a>
					</li>
					<!-- BEGIN ANGULARJS LINK -->
					<li class="tooltips" data-container="body" data-placement="right" data-html="true" data-original-title="AngularJS version demo">
						<a href="<?php echo base_url() ?>index.php/api/Home/">
							<i class="icon-diamond"></i>
							<span class="title">
								All API </span>
						</a>
					</li>
					<li class="tooltips" data-container="body" data-placement="right" data-html="true" data-original-title="AngularJS version demo">
						<a href="<?php echo base_url() ?>index.php/api/Home/detail/1">
							<i class="icon-diamond"></i>
							<span class="title">
								Customer </span>
						</a>
					</li>
					<li class="tooltips" data-container="body" data-placement="right" data-html="true" data-original-title="AngularJS version demo">
						<a href="<?php echo base_url() ?>index.php/api/Home/detail/2">
							<i class="icon-user"></i>
							<span class="title">
								Login </span>
						</a>
					</li>
					<li class="tooltips" data-container="body" data-placement="right" data-html="true" data-original-title="AngularJS version demo">
						<a href="<?php echo base_url() ?>index.php/api/Home/detail/3">
							<i class="icon-docs"></i>
							<span class="title">
								Keycode </span>
						</a>
					</li>
					<li class="tooltips" data-container="body" data-placement="right" data-html="true" data-original-title="AngularJS version demo">
						<a href="<?php echo base_url() ?>index.php/api/Home/detail/4">
							<i class="icon-wallet"></i>
							<span class="title">
								Firebase Token </span>
						</a>
					</li>
					<li class="tooltips" data-container="body" data-placement="right" data-html="true" data-original-title="AngularJS version demo">
						<a href="<?php echo base_url() ?>index.php/api/Home/detail/5">
							<i class="icon-paper-plane"></i>
							<span class="title">
								Channel </span>
						</a>
					</li>
					<li class="tooltips" data-container="body" data-placement="right" data-html="true" data-original-title="AngularJS version demo">
						<a href="<?php echo base_url() ?>index.php/api/Home/detail/6">
							<i class="icon-briefcase"></i>
							<span class="title">
								Channel Category </span>
						</a>
					</li>
					<li class="tooltips" data-container="body" data-placement="right" data-html="true" data-original-title="AngularJS version demo">
						<a href="<?php echo base_url() ?>index.php/api/Home/detail/7">
							<i class="icon-bar-chart"></i>
							<span class="title">
								Channel Schedule </span>
						</a>
					</li>
					<li class="tooltips" data-container="body" data-placement="right" data-html="true" data-original-title="AngularJS version demo">
						<a href="<?php echo base_url() ?>index.php/api/Home/detail/8">
							<i class="icon-present"></i>
							<span class="title">
								Package </span>
						</a>
					</li>

				</ul>
				<!-- END SIDEBAR MENU -->
			</div>
		</div>
		<!-- END SIDEBAR -->
		<!-- BEGIN CONTENT -->
		<div class="page-content-wrapper">
			<div class="page-content">
				<!-- BEGIN PAGE HEAD -->
				<div class="page-head">
					<!-- BEGIN PAGE TITLE -->
					<div class="page-title">
						<h1>
							<?php if ($id == 1) {
								echo 'Customer';
							} elseif ($id == 2) {
								echo 'Login';
							} elseif ($id == 3) {
								echo 'Keycode';
							} elseif ($id == 4) {
								echo 'Firebase Token';
							} elseif ($id == 5) {
								echo 'Channel';
							} elseif ($id == 6) {
								echo 'Channel Category';
							} elseif ($id == 7) {
								echo 'Channel Schedule';
							} elseif ($id == 8) {
								echo 'Package';
							} else {
								echo 'Dashboard';
							}
							?>
						</h1>
					</div>
					<!-- END PAGE TITLE -->
					<!-- BEGIN PAGE TOOLBAR -->
					<!-- END PAGE TOOLBAR -->
				</div>
				<!-- END PAGE HEAD -->
				<!-- BEGIN PAGE BREADCRUMB -->
				<ul class="page-breadcrumb breadcrumb hide">
					<li>
						<a href="javascript:;">Home</a><i class="fa fa-circle"></i>
					</li>
					<li class="active">
						Dashboard
					</li>
				</ul>
				<!-- END PAGE BREADCRUMB -->
				<!-- BEGIN PAGE CONTENT INNER -->
				<!-- <div class="row margin-top-10">
				</div> -->
				<div class="row">
					<div class="col-md-12">
						<?php
						if ($id == 1) {
							?>
							<div class="portlet box green">
								<div class="portlet-title">
									<div class="caption">
										<i class="fa fa-gift"></i>Customer
									</div>
									<div class="tools">
										<a href="javascript:;" class="collapse">
										</a>
									</div>
								</div>
								<div class="portlet-body">
									<div class="navbar navbar-default" role="navigation">
										<!-- Brand and toggle get grouped for better mobile display -->
										<div class="navbar-header">
											<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
												<span class="sr-only">
													Toggle navigation </span>
												<span class="icon-bar">
												</span>
												<span class="icon-bar">
												</span>
												<span class="icon-bar">
												</span>
											</button>
											<a class="navbar" href="#" style="font-size:13px;">
												&nbsp;&nbsp;&nbsp;&nbsp;<b>Get All</b> : (GET) http://android.moratelindo.co.id/app/ott/customer/Customer
											</a>
										</div>
										<!-- Collect the nav links, forms, and other content for toggling -->
										<!-- /.navbar-collapse -->
									</div>

									<a href="<?php echo base_url() ?>customer/Customer">
										<button class="btn btn-sm btn-info">Lihat Output</button>
									</a>
									<div id="all" style="display:none"></div>
									<!-- <button onclick="myFunction()">Copy text</button> -->

									<div class="navbar navbar-default" role="navigation">
										<!-- Brand and toggle get grouped for better mobile display -->
										<div class="navbar-header">
											<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
												<span class="sr-only">
													Toggle navigation </span>
												<span class="icon-bar">
												</span>
												<span class="icon-bar">
												</span>
												<span class="icon-bar">
												</span>
											</button>
											<a class="navbar" href="javascript:;" style="font-size:13px">
												&nbsp;&nbsp;&nbsp;&nbsp;<b>Get By Id</b> : (GET) http://android.moratelindo.co.id/app/ott/customer/Customer?id=1
											</a>
										</div>
										<!-- Collect the nav links, forms, and other content for toggling -->
										<!-- /.navbar-collapse -->
									</div>
									<a href="<?php echo base_url() ?>customer/Customer?id=1">
										<!-- <a data-toggle="modal" href="#large"> -->
										<button class="btn btn-sm btn-info">Lihat Output</button>
									</a>
								</div>
							</div>

						<?php
						} elseif ($id == 2) {
							?>
							<div class="portlet box green">
								<div class="portlet-title">
									<div class="caption">
										<i class="fa fa-gift"></i>Login
									</div>
									<div class="tools">
										<a href="javascript:;" class="collapse">
										</a>
										<a href="#portlet-config" data-toggle="modal" class="config">
										</a>
									</div>
								</div>
								<div class="portlet-body">
									<div class="navbar navbar-default" role="navigation">
										<!-- Brand and toggle get grouped for better mobile display -->
										<div class="navbar-header">
											<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
												<span class="sr-only">
													Toggle navigation </span>
												<span class="icon-bar">
												</span>
												<span class="icon-bar">
												</span>
												<span class="icon-bar">
												</span>
											</button>
											<a class="navbar" href="javascript:;" style="font-size:12px">
												&nbsp;&nbsp;&nbsp;&nbsp; <b>Login (1). Phone Number</b> : <br>(POST) http://android.moratelindo.co.id/app/ott/login/Authentication?phone_number=081380602015&firebase_token=da39a3ee5e6b4b0d3255bfef95601890afd80709
											</a>
										</div>
										<!-- Collect the nav links, forms, and other content for toggling -->
										<!-- /.navbar-collapse -->
									</div>
									<!-- <a href="<?php echo base_url() ?>login/Authentication?phone_number=081380602015&firebase_token=da39a3ee5e6b4b0d3255bfef95601890afd80709"> -->
									<a data-toggle="modal" href="#phonenumber">
										<p>
											<button class="btn btn-sm btn-info">Lihat Output</button>

										</p>
									</a>
									<div class="navbar navbar-default" role="navigation">
										<!-- Brand and toggle get grouped for better mobile display -->
										<div class="navbar-header">
											<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
												<span class="sr-only">
													Toggle navigation </span>
												<span class="icon-bar">
												</span>
												<span class="icon-bar">
												</span>
												<span class="icon-bar">
												</span>
											</button>
											<a class="navbar" href="javascript:;" style="font-size:13px">
												&nbsp;&nbsp;&nbsp;&nbsp;<b>Login (2). OTP</b> : (POST) http://android.moratelindo.co.id/app/ott/otp/Check?phone_number=081380602015&otp=6049

											</a>
										</div>
										<!-- Collect the nav links, forms, and other content for toggling -->
										<!-- /.navbar-collapse -->
									</div>
									<!-- <a href="<?php echo base_url() ?>customer/Customer?id=1"> -->
									<!-- <a data-toggle="modal" href="#large"> -->
									<a data-toggle="modal" href="#otp">
										<p>
											<button class="btn btn-sm btn-info">Lihat Output</button>

										</p>
									</a>
									<!-- </a> -->
									<div class="navbar navbar-default" role="navigation">
										<!-- Brand and toggle get grouped for better mobile display -->
										<div class="navbar-header">
											<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
												<span class="sr-only">
													Toggle navigation </span>
												<span class="icon-bar">
												</span>
												<span class="icon-bar">
												</span>
												<span class="icon-bar">
												</span>
											</button>
											<a class="navbar" href="javascript:;" style="font-size:13px">
												&nbsp;&nbsp;&nbsp;&nbsp;<b>Login(3). Existing  </b> : (POST) http://android.moratelindo.co.id/app/ott/customerid/Check?phone_number=081510070119&customer_no=20201843
											</a>
										</div>
										<!-- Collect the nav links, forms, and other content for toggling -->
										<!-- /.navbar-collapse -->
									</div>
									<!-- <a data-toggle="modal" href="#large"> -->
									<a data-toggle="modal" href="#customerid">
										<p>
											<button class="btn btn-sm btn-info">Lihat Output</button>

										</p>
									</a>
									<div class="navbar navbar-default" role="navigation">
										<!-- Brand and toggle get grouped for better mobile display -->
										<div class="navbar-header">
											<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
												<span class="sr-only">
													Toggle navigation </span>
												<span class="icon-bar">
												</span>
												<span class="icon-bar">
												</span>
												<span class="icon-bar">
												</span>
											</button>
											<a class="navbar" href="javascript:;" style="font-size:13px">
												&nbsp;&nbsp;&nbsp;&nbsp;<b>Login(3). Trial  </b> : (POST) http://android.moratelindo.co.id/app/ott/customerid/Check?phone_number=081510070119&customer_no=
											</a>
										</div>
										<!-- Collect the nav links, forms, and other content for toggling -->
										<!-- /.navbar-collapse -->
									</div>
									<!-- <a data-toggle="modal" href="#large"> -->
									<a data-toggle="modal" href="#customeridtrial">
										<p>
											<button class="btn btn-sm btn-info">Lihat Output</button>

										</p>
									</a>
								</div>
							</div>


						<?php
						} elseif ($id == 3) {
							?>
							<div class="portlet box green">
								<div class="portlet-title">
									<div class="caption">
										<i class="fa fa-gift"></i>Keycode
									</div>
									<div class="tools">
										<a href="javascript:;" class="collapse">
										</a>
										<a href="#portlet-config" data-toggle="modal" class="config">
										</a>
									</div>
								</div>
								<div class="portlet-body">
									<div class="navbar navbar-default" role="navigation">
										<!-- Brand and toggle get grouped for better mobile display -->
										<div class="navbar-header">
											<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
												<span class="sr-only">
													Toggle navigation </span>
												<span class="icon-bar">
												</span>
												<span class="icon-bar">
												</span>
												<span class="icon-bar">
												</span>
											</button>
											<a class="navbar" href="javascript:;" style="font-size:13px">
												&nbsp;&nbsp;&nbsp;&nbsp; <b>Check Keycode</b> : (POST) http://android.moratelindo.co.id/app/ott/keycode/Check?phone_number=081380602015&keycode=4143659042727897

											</a>
										</div>
										<!-- Collect the nav links, forms, and other content for toggling -->
										<!-- /.navbar-collapse -->
									</div>
									<a data-toggle="modal" href="#keycode">
										<p>
											<button class="btn btn-sm btn-info">Lihat Output</button>

										</p>
									</a>
									<p>

									</p>
									<div class="navbar navbar-default" role="navigation">
										<!-- Brand and toggle get grouped for better mobile display -->
										<div class="navbar-header">
											<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
												<span class="sr-only">
													Toggle navigation </span>
												<span class="icon-bar">
												</span>
												<span class="icon-bar">
												</span>
												<span class="icon-bar">
												</span>
											</button>
											<a class="navbar" href="javascript:;" style="font-size:13px">
												&nbsp;&nbsp;&nbsp;&nbsp;<b>Delete Keycode Trial</b>: (PUT) http://android.moratelindo.co.id/app/ott/keycode/Logout?phone_number=081380602015&customer_no&keycode
											</a>
										</div>
										<!-- Collect the nav links, forms, and other content for toggling -->
										<!-- /.navbar-collapse -->
									</div>
									<div class="navbar navbar-default" role="navigation">
										<!-- Brand and toggle get grouped for better mobile display -->
										<div class="navbar-header">
											<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
												<span class="sr-only">
													Toggle navigation </span>
												<span class="icon-bar">
												</span>
												<span class="icon-bar">
												</span>
												<span class="icon-bar">
												</span>
											</button>
											<a class="navbar" href="javascript:;" style="font-size:13px">
												&nbsp;&nbsp;&nbsp;&nbsp;<b>Delete Keycode Existing</b>: <br>(PUT) http://android.moratelindo.co.id/app/ott/keycode/Logout?phone_number=081380602015&customer_no=20201843&keycode
											</a>
										</div>
										<!-- Collect the nav links, forms, and other content for toggling -->
										<!-- /.navbar-collapse -->
									</div>
									<a data-toggle="modal" href="#delkeycode">
										<p>
											<button class="btn btn-sm btn-info">Lihat Output</button>

										</p>
									</a>
								</div>
							</div>

						<?php
						} elseif ($id == 4) {
							?>

							<div class="portlet box green">
								<div class="portlet-title">
									<div class="caption">
										<i class="fa fa-gift"></i>Firebase Token
									</div>
									<div class="tools">
										<a href="javascript:;" class="collapse">
										</a>
										<a href="#portlet-config" data-toggle="modal" class="config">
										</a>
									</div>
								</div>
								<div class="portlet-body">
									<div class="navbar navbar-default" role="navigation">
										<!-- Brand and toggle get grouped for better mobile display -->
										<div class="navbar-header">
											<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
												<span class="sr-only">
													Toggle navigation </span>
												<span class="icon-bar">
												</span>
												<span class="icon-bar">
												</span>
												<span class="icon-bar">
												</span>
											</button>
											<a class="navbar" href="javascript:;" style="font-size:13px">
												&nbsp;&nbsp;&nbsp;&nbsp;<b>Check Firebase</b> : <br>(POST) http://android.moratelindo.co.id/app/ott/firebaseToken/Check?phone_number=081380602015&firebase_token=da39a3ee5e6b4b0d3255bfef95601890afd80709
											</a>
										</div>
										<!-- Collect the nav links, forms, and other content for toggling -->
										<!-- /.navbar-collapse -->
									</div>
									<a data-toggle="modal" href="#keycode">
										<p>
											<button class="btn btn-sm btn-info">Lihat Output</button>

										</p>
									</a>
								</div>
							</div>

						<?php
						} elseif ($id == 5) {
							?>
							<div class="portlet box green">
								<div class="portlet-title">
									<div class="caption">
										<i class="fa fa-gift"></i>Channel
									</div>
									<div class="tools">
										<a href="javascript:;" class="collapse">
										</a>
										<a href="#portlet-config" data-toggle="modal" class="config">
										</a>
									</div>
								</div>
								<div class="portlet-body">
									<div class="navbar navbar-default" role="navigation">
										<!-- Brand and toggle get grouped for better mobile display -->
										<div class="navbar-header">
											<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
												<span class="sr-only">
													Toggle navigation </span>
												<span class="icon-bar">
												</span>
												<span class="icon-bar">
												</span>
												<span class="icon-bar">
												</span>
											</button>
											<a class="navbar" href="javascript:;" style="font-size:13px">
												&nbsp;&nbsp;&nbsp;&nbsp;<b>Get All</b> : (GET) http://android.moratelindo.co.id/app/ott/channel/Channel
											</a>
										</div>
										<!-- Collect the nav links, forms, and other content for toggling -->
										<!-- /.navbar-collapse -->
									</div>
									<a href="<?php echo base_url() ?>channel/Channel">
										<!-- <a data-toggle="modal" href="#large"> -->
										<button class="btn btn-sm btn-info">Lihat Output</button>
									</a>
									<!-- <a data-toggle="modal" href="#keycode">
									<p>
										<button class="btn btn-sm btn-info">Lihat Output</button>

									</p>
								</a> -->
								</div>
								<div class="portlet-body">
									<div class="navbar navbar-default" role="navigation">
										<!-- Brand and toggle get grouped for better mobile display -->
										<div class="navbar-header">
											<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
												<span class="sr-only">
													Toggle navigation </span>
												<span class="icon-bar">
												</span>
												<span class="icon-bar">
												</span>
												<span class="icon-bar">
												</span>
											</button>
											<a class="navbar" href="javascript:;" style="font-size:13px">
												&nbsp;&nbsp;&nbsp;&nbsp;<b>Get Channel By Id</b> : (GET) http://android.moratelindo.co.id/app/ott/channel/Channel?id=1
											</a>
										</div>
										<!-- Collect the nav links, forms, and other content for toggling -->
										<!-- /.navbar-collapse -->
									</div>
									<a href="<?php echo base_url() ?>channel/Channel?id=1">
										<!-- <a data-toggle="modal" href="#large"> -->
										<button class="btn btn-sm btn-info">Lihat Output</button>
									</a>
									<!-- <a data-toggle="modal" href="#keycode">
									<p>
										<button class="btn btn-sm btn-info">Lihat Output</button>

									</p>
								</a> -->
								</div>
								<div class="portlet-body">
									<div class="navbar navbar-default" role="navigation">
										<!-- Brand and toggle get grouped for better mobile display -->
										<div class="navbar-header">
											<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
												<span class="sr-only">
													Toggle navigation </span>
												<span class="icon-bar">
												</span>
												<span class="icon-bar">
												</span>
												<span class="icon-bar">
												</span>
											</button>
											<a class="navbar" href="javascript:;" style="font-size:13px">
												&nbsp;&nbsp;&nbsp;&nbsp;<b>Get Channel By Category</b> : (GET) http://android.moratelindo.co.id/app/ott/channel/ChannelByCategory?category=1
											</a>
										</div>
										<!-- Collect the nav links, forms, and other content for toggling -->
										<!-- /.navbar-collapse -->
									</div>
									<a href="<?php echo base_url() ?>channel/ChannelByCategory?category=1">
										<!-- <a data-toggle="modal" href="#large"> -->
										<button class="btn btn-sm btn-info">Lihat Output</button>
									</a>
									<!-- <a data-toggle="modal" href="#keycode">
									<p>
										<button class="btn btn-sm btn-info">Lihat Output</button>

									</p>
								</a> -->
								</div>
								<div class="portlet-body">
									<div class="navbar navbar-default" role="navigation">
										<!-- Brand and toggle get grouped for better mobile display -->
										<div class="navbar-header">
											<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
												<span class="sr-only">
													Toggle navigation </span>
												<span class="icon-bar">
												</span>
												<span class="icon-bar">
												</span>
												<span class="icon-bar">
												</span>
											</button>
											<a class="navbar" href="javascript:;" style="font-size:13px">
												&nbsp;&nbsp;&nbsp;&nbsp;<b>Get Channel Berbayar</b> : (GET) http://android.moratelindo.co.id/app/ott/channel/ChannelBerbayar
											</a>
										</div>
										<!-- Collect the nav links, forms, and other content for toggling -->
										<!-- /.navbar-collapse -->
									</div>
									<a href="<?php echo base_url() ?>channel/ChannelBerbayar">
										<!-- <a data-toggle="modal" href="#large"> -->
										<button class="btn btn-sm btn-info">Lihat Output</button>
									</a>
									<!-- <a data-toggle="modal" href="#keycode">
									<p>
										<button class="btn btn-sm btn-info">Lihat Output</button>

									</p>
								</a> -->
								</div>
								<div class="portlet-body">
									<div class="navbar navbar-default" role="navigation">
										<!-- Brand and toggle get grouped for better mobile display -->
										<div class="navbar-header">
											<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
												<span class="sr-only">
													Toggle navigation </span>
												<span class="icon-bar">
												</span>
												<span class="icon-bar">
												</span>
												<span class="icon-bar">
												</span>
											</button>
											<a class="navbar" href="javascript:;" style="font-size:13px">
												&nbsp;&nbsp;&nbsp;&nbsp;<b>Get Channel Free</b> : (GET) http://android.moratelindo.co.id/app/ott/channel/ChannelFree
											</a>
										</div>
										<!-- Collect the nav links, forms, and other content for toggling -->
										<!-- /.navbar-collapse -->
									</div>
									<a href="<?php echo base_url() ?>channel/ChannelFree">
										<!-- <a data-toggle="modal" href="#large"> -->
										<button class="btn btn-sm btn-info">Lihat Output</button>
									</a>
									<!-- <a data-toggle="modal" href="#keycode">
									<p>
										<button class="btn btn-sm btn-info">Lihat Output</button>

									</p>
								</a> -->
								</div>
							</div>


						<?php
						} elseif ($id == 6) {
							?>
							<div class="portlet box green">
								<div class="portlet-title">
									<div class="caption">
										<i class="fa fa-gift"></i>Channel Category
									</div>
									<div class="tools">
										<a href="javascript:;" class="collapse">
										</a>
										<a href="#portlet-config" data-toggle="modal" class="config">
										</a>
									</div>
								</div>
								<div class="portlet-body">
									<div class="navbar navbar-default" role="navigation">
										<!-- Brand and toggle get grouped for better mobile display -->
										<div class="navbar-header">
											<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
												<span class="sr-only">
													Toggle navigation </span>
												<span class="icon-bar">
												</span>
												<span class="icon-bar">
												</span>
												<span class="icon-bar">
												</span>
											</button>
											<a class="navbar" href="javascript:;" style="font-size:13px">
												&nbsp;&nbsp;&nbsp;&nbsp;<b>Get All</b> : (GET) http://android.moratelindo.co.id/app/ott/category/Category
										</div>
										<!-- Collect the nav links, forms, and other content for toggling -->
										<!-- /.navbar-collapse -->
									</div>
									<a href="<?php echo base_url() ?>category/Category">
										<!-- <a data-toggle="modal" href="#large"> -->
										<button class="btn btn-sm btn-info">Lihat Output</button>
									</a>
									<!-- <a data-toggle="modal" href="#keycode">
									<p>
										<button class="btn btn-sm btn-info">Lihat Output</button>

									</p>
								</a> -->
								</div>
								<div class="portlet-body">
									<div class="navbar navbar-default" role="navigation">
										<!-- Brand and toggle get grouped for better mobile display -->
										<div class="navbar-header">
											<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
												<span class="sr-only">
													Toggle navigation </span>
												<span class="icon-bar">
												</span>
												<span class="icon-bar">
												</span>
												<span class="icon-bar">
												</span>
											</button>
											<a class="navbar" href="javascript:;" style="font-size:13px">
												&nbsp;&nbsp;&nbsp;&nbsp;<b>Get Category Channel By Id</b> : (GET) http://android.moratelindo.co.id/app/ott/category/Category?id=1
											</a>
										</div>
										<!-- Collect the nav links, forms, and other content for toggling -->
										<!-- /.navbar-collapse -->
									</div>
									<a href="<?php echo base_url() ?>category/Category?id=1">
										<!-- <a data-toggle="modal" href="#large"> -->
										<button class="btn btn-sm btn-info">Lihat Output</button>
									</a>
									<!-- <a data-toggle="modal" href="#keycode">
									<p>
										<button class="btn btn-sm btn-info">Lihat Output</button>

									</p>
								</a> -->
								</div>
							</div>


						<?php
						} elseif ($id == 7) {
							?>
							<div class="portlet box green">
								<div class="portlet-title">
									<div class="caption">
										<i class="fa fa-gift"></i>Channel Schedule
									</div>
									<div class="tools">
										<a href="javascript:;" class="collapse">
										</a>
										<a href="#portlet-config" data-toggle="modal" class="config">
										</a>
									</div>
								</div>
								<div class="portlet-body">
									<div class="navbar navbar-default" role="navigation">
										<!-- Brand and toggle get grouped for better mobile display -->
										<div class="navbar-header">
											<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
												<span class="sr-only">
													Toggle navigation </span>
												<span class="icon-bar">
												</span>
												<span class="icon-bar">
												</span>
												<span class="icon-bar">
												</span>
											</button>
											<a class="navbar" href="javascript:;" style="font-size:13px">
												&nbsp;&nbsp;&nbsp;&nbsp;<b>Get All</b> : (GET) http://android.moratelindo.co.id/app/ott/schedule/Schedule
												<!-- Collect the nav links, forms, and other content for toggling -->
												<!-- /.navbar-collapse -->
										</div>
									</div>
									<a href="<?php echo base_url() ?>schedule/Schedule">
										<!-- <a data-toggle="modal" href="#large"> -->
										<button class="btn btn-sm btn-info">Lihat Output</button>
									</a>
									<!-- <a data-toggle="modal" href="#keycode">
									<p>
										<button class="btn btn-sm btn-info">Lihat Output</button>

									</p>
								</a> -->
								</div>

								<div class="portlet-body">
									<div class="navbar navbar-default" role="navigation">
										<!-- Brand and toggle get grouped for better mobile display -->
										<div class="navbar-header">
											<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
												<span class="sr-only">
													Toggle navigation </span>
												<span class="icon-bar">
												</span>
												<span class="icon-bar">
												</span>
												<span class="icon-bar">
												</span>
											</button>
											<a class="navbar" href="javascript:;" style="font-size:13px">
												&nbsp;&nbsp;&nbsp;&nbsp;<b>Get Schedule Channel By Id</b> : (GET) http://android.moratelindo.co.id/app/ott/schedule/Schedule?id=1
											</a>
										</div>
										<!-- Collect the nav links, forms, and other content for toggling -->
										<!-- /.navbar-collapse -->
									</div>
									<a href="<?php echo base_url() ?>schedule/Schedule?id=1">
										<!-- <a data-toggle="modal" href="#large"> -->
										<button class="btn btn-sm btn-info">Lihat Output</button>
									</a>
									<!-- <a data-toggle="modal" href="#keycode">
									<p>
										<button class="btn btn-sm btn-info">Lihat Output</button>

									</p>
								</a> -->
								</div>
								<div class="portlet-body">
									<div class="navbar navbar-default" role="navigation">
										<!-- Brand and toggle get grouped for better mobile display -->
										<div class="navbar-header">
											<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
												<span class="sr-only">
													Toggle navigation </span>
												<span class="icon-bar">
												</span>
												<span class="icon-bar">
												</span>
												<span class="icon-bar">
												</span>
											</button>
											<a class="navbar" href="javascript:;" style="font-size:13px">
												&nbsp;&nbsp;&nbsp;&nbsp;<b>Get Schedule Channel By Category</b> : (GET) http://android.moratelindo.co.id/app/ott/schedule/ScheduleByCategory?category=1
											</a>
										</div>
										<!-- Collect the nav links, forms, and other content for toggling -->
										<!-- /.navbar-collapse -->
									</div>
									<a href="<?php echo base_url() ?>schedule/ScheduleByCategory?category=1">
										<!-- <a data-toggle="modal" href="#large"> -->
										<button class="btn btn-sm btn-info">Lihat Output</button>
									</a>
									<!-- <a data-toggle="modal" href="#keycode">
									<p>
										<button class="btn btn-sm btn-info">Lihat Output</button>

									</p>
								</a> -->
								</div>
								<div class="portlet-body">
									<div class="navbar navbar-default" role="navigation">
										<!-- Brand and toggle get grouped for better mobile display -->
										<div class="navbar-header">
											<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
												<span class="sr-only">
													Toggle navigation </span>
												<span class="icon-bar">
												</span>
												<span class="icon-bar">
												</span>
												<span class="icon-bar">
												</span>
											</button>
											<a class="navbar" href="javascript:;" style="font-size:13px">
												&nbsp;&nbsp;&nbsp;&nbsp;<b>Get Schedule Channel By Date</b> : (GET) http://android.moratelindo.co.id/app/ott/schedule/ScheduleByDate?date=2019-10-04
											</a>
										</div>
										<!-- Collect the nav links, forms, and other content for toggling -->
										<!-- /.navbar-collapse -->
									</div>
									<a href="<?php echo base_url() ?>schedule/ScheduleByDate?date=2019-10-04">
										<!-- <a data-toggle="modal" href="#large"> -->
										<button class="btn btn-sm btn-info">Lihat Output</button>
									</a>
									<!-- <a data-toggle="modal" href="#keycode">
									<p>
										<button class="btn btn-sm btn-info">Lihat Output</button>

									</p>
								</a> -->
								</div>
								<div class="portlet-body">
									<div class="navbar navbar-default" role="navigation">
										<!-- Brand and toggle get grouped for better mobile display -->
										<div class="navbar-header">
											<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
												<span class="sr-only">
													Toggle navigation </span>
												<span class="icon-bar">
												</span>
												<span class="icon-bar">
												</span>
												<span class="icon-bar">
												</span>
											</button>
											<a class="navbar" href="javascript:;" style="font-size:13px">
												&nbsp;&nbsp;&nbsp;&nbsp;<b>Get Schedule Channel By Time</b> : (GET) http://android.moratelindo.co.id/app/ott/schedule/ScheduleByTime?time=10:00:00
											</a>
										</div>
										<!-- Collect the nav links, forms, and other content for toggling -->
										<!-- /.navbar-collapse -->
									</div>
									<a href="<?php echo base_url() ?>schedule/ScheduleByTime?time=10:00:00">
										<!-- <a data-toggle="modal" href="#large"> -->
										<button class="btn btn-sm btn-info">Lihat Output</button>
									</a>
									<!-- <a data-toggle="modal" href="#keycode">
									<p>
										<button class="btn btn-sm btn-info">Lihat Output</button>

									</p>
								</a> -->
								</div>
								<div class="portlet-body">
									<div class="navbar navbar-default" role="navigation">
										<!-- Brand and toggle get grouped for better mobile display -->
										<div class="navbar-header">
											<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
												<span class="sr-only">
													Toggle navigation </span>
												<span class="icon-bar">
												</span>
												<span class="icon-bar">
												</span>
												<span class="icon-bar">
												</span>
											</button>
											<a class="navbar" href="javascript:;" style="font-size:12px">
												&nbsp;&nbsp;&nbsp;&nbsp;<b>Get Schedule Channel And Date</b> : (GET) http://android.moratelindo.co.id/app/ott/schedule/ScheduleByChannelAndDate?channelid=1&date=2019-10-04
											</a>
										</div>
										<!-- Collect the nav links, forms, and other content for toggling -->
										<!-- /.navbar-collapse -->
									</div>
									<a href="<?php echo base_url() ?>schedule/ScheduleByChannelAndDate?channelid=1&date=2019-10-04">
										<!-- <a data-toggle="modal" href="#large"> -->
										<button class="btn btn-sm btn-info">Lihat Output</button>
									</a>
									<!-- <a data-toggle="modal" href="#keycode">
									<p>
										<button class="btn btn-sm btn-info">Lihat Output</button>

									</p>
								</a> -->
								</div>
								<div class="portlet-body">
									<div class="navbar navbar-default" role="navigation">
										<!-- Brand and toggle get grouped for better mobile display -->
										<div class="navbar-header">
											<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
												<span class="sr-only">
													Toggle navigation </span>
												<span class="icon-bar">
												</span>
												<span class="icon-bar">
												</span>
												<span class="icon-bar">
												</span>
											</button>
											<a class="navbar" href="javascript:;" style="font-size:12px">
												&nbsp;&nbsp;&nbsp;&nbsp;<b>Get Schedule Channel And Time</b> : (GET) http://android.moratelindo.co.id/app/ott/schedule/ScheduleByChannelAndTime?channelid=1&time=10:00:00
											</a>
										</div>
										<!-- Collect the nav links, forms, and other content for toggling -->
										<!-- /.navbar-collapse -->
									</div>
									<a href="<?php echo base_url() ?>schedule/ScheduleByChannelAndTime?channelid=1&time=10:00:00">
										<!-- <a data-toggle="modal" href="#large"> -->
										<button class="btn btn-sm btn-info">Lihat Output</button>
									</a>
									<!-- <a data-toggle="modal" href="#keycode">
									<p>
										<button class="btn btn-sm btn-info">Lihat Output</button>

									</p>
								</a> -->
								</div>
								<div class="portlet-body">
									<div class="navbar navbar-default" role="navigation">
										<!-- Brand and toggle get grouped for better mobile display -->
										<div class="navbar-header">
											<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
												<span class="sr-only">
													Toggle navigation </span>
												<span class="icon-bar">
												</span>
												<span class="icon-bar">
												</span>
												<span class="icon-bar">
												</span>
											</button>
											<a class="navbar" href="javascript:;" style="font-size:13px">
												&nbsp;&nbsp;&nbsp;&nbsp;<b>Get Schedule Channel Tomorrow</b> : (GET) http://android.moratelindo.co.id/app/ott/schedule/TomorrowChannelSchedule?date=2019-10-04
											</a>
										</div>
										<!-- Collect the nav links, forms, and other content for toggling -->
										<!-- /.navbar-collapse -->
									</div>
									<a href="<?php echo base_url() ?>schedule/TomorrowChannelSchedule?date=2019-10-04">
										<!-- <a data-toggle="modal" href="#large"> -->
										<button class="btn btn-sm btn-info">Lihat Output</button>
									</a>
									<!-- <a data-toggle="modal" href="#keycode">
									<p>
										<button class="btn btn-sm btn-info">Lihat Output</button>

									</p>
								</a> -->
								</div>
								<div class="portlet-body">
									<div class="navbar navbar-default" role="navigation">
										<!-- Brand and toggle get grouped for better mobile display -->
										<div class="navbar-header">
											<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
												<span class="sr-only">
													Toggle navigation </span>
												<span class="icon-bar">
												</span>
												<span class="icon-bar">
												</span>
												<span class="icon-bar">
												</span>
											</button>
											<a class="navbar" href="javascript:;" style="font-size:13px">
												&nbsp;&nbsp;&nbsp;&nbsp;<b>Get Schedule Channel Yesterday</b> : (GET) http://android.moratelindo.co.id/app/ott/schedule/YesterdayChannelSchedule?date=2019-10-04
											</a>
										</div>
										<!-- Collect the nav links, forms, and other content for toggling -->
										<!-- /.navbar-collapse -->
									</div>
									<a href="<?php echo base_url() ?>schedule/YesterdayChannelSchedule?date=2019-10-04">
										<!-- <a data-toggle="modal" href="#large"> -->
										<button class="btn btn-sm btn-info">Lihat Output</button>
									</a>
									<!-- <a data-toggle="modal" href="#keycode">
									<p>
										<button class="btn btn-sm btn-info">Lihat Output</button>

									</p>
								</a> -->
								</div>
							</div>

						<?php
						} else {
							?>
							<div class="portlet box green">
								<div class="portlet-title">
									<div class="caption">
										<i class="fa fa-gift"></i>Package
									</div>
									<div class="tools">
										<a href="javascript:;" class="collapse">
										</a>
										<a href="#portlet-config" data-toggle="modal" class="config">
										</a>
									</div>
								</div>
								<div class="portlet-body">
									<div class="navbar navbar-default" role="navigation">
										<!-- Brand and toggle get grouped for better mobile display -->
										<div class="navbar-header">
											<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
												<span class="sr-only">
													Toggle navigation </span>
												<span class="icon-bar">
												</span>
												<span class="icon-bar">
												</span>
												<span class="icon-bar">
												</span>
											</button>
											<a class="navbar" href="javascript:;" style="font-size:13px">
												&nbsp;&nbsp;&nbsp;&nbsp;<b>Get All Package</b>: (GET) http://android.moratelindo.co.id/app/ott/package/Package
												<!-- Collect the nav links, forms, and other content for toggling -->
												<!-- /.navbar-collapse -->
										</div>
										<!-- <a data-toggle="modal" href="#keycode">
									<p>
										<button class="btn btn-sm btn-info">Lihat Output</button>

									</p>
								</a> -->
									</div>
									<a href="<?php echo base_url() ?>package/Package">
										<!-- <a data-toggle="modal" href="#large"> -->
										<button class="btn btn-sm btn-info">Lihat Output</button>
									</a>
								</div>
								<div class="portlet-body">
									<div class="navbar navbar-default" role="navigation">
										<!-- Brand and toggle get grouped for better mobile display -->
										<div class="navbar-header">
											<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
												<span class="sr-only">
													Toggle navigation </span>
												<span class="icon-bar">
												</span>
												<span class="icon-bar">
												</span>
												<span class="icon-bar">
												</span>
											</button>
											<a class="navbar" href="javascript:;" style="font-size:13px">
												&nbsp;&nbsp;&nbsp;&nbsp;<b>Get Package By Id</b> : (GET) http://android.moratelindo.co.id/app/ott/package/Package?id=1
											</a>
										</div>
										<!-- Collect the nav links, forms, and other content for toggling -->
										<!-- /.navbar-collapse -->
									</div>
									<a href="<?php echo base_url() ?>package/Package?id=1">
										<!-- <a data-toggle="modal" href="#large"> -->
										<button class="btn btn-sm btn-info">Lihat Output</button>
									</a>
									<!-- <a data-toggle="modal" href="#keycode">
									<p>
										<button class="btn btn-sm btn-info">Lihat Output</button>

									</p>
								</a> -->
								</div>
								<div class="portlet-body">
									<div class="navbar navbar-default" role="navigation">
										<!-- Brand and toggle get grouped for better mobile display -->
										<div class="navbar-header">
											<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
												<span class="sr-only">
													Toggle navigation </span>
												<span class="icon-bar">
												</span>
												<span class="icon-bar">
												</span>
												<span class="icon-bar">
												</span>
											</button>
											<a class="navbar" href="javascript:;" style="font-size:13px">
												&nbsp;&nbsp;&nbsp;&nbsp;<b>Get Channel By Package</b> : (GET) http://android.moratelindo.co.id/app/ott/package/ChannelByPackage?id=1
											</a>
										</div>
										<!-- Collect the nav links, forms, and other content for toggling -->
										<!-- /.navbar-collapse -->
									</div>
									<a href="<?php echo base_url() ?>package/ChannelByPackage?id=1">
										<!-- <a data-toggle="modal" href="#large"> -->
										<button class="btn btn-sm btn-info">Lihat Output</button>
									</a>
									<!-- <a data-toggle="modal" href="#keycode">
									<p>
										<button class="btn btn-sm btn-info">Lihat Output</button>

									</p>
								</a> -->
								</div>
								<div class="portlet-body">
									<div class="navbar navbar-default" role="navigation">
										<!-- Brand and toggle get grouped for better mobile display -->
										<div class="navbar-header">
											<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
												<span class="sr-only">
													Toggle navigation </span>
												<span class="icon-bar">
												</span>
												<span class="icon-bar">
												</span>
												<span class="icon-bar">
												</span>
											</button>
											<a class="navbar" href="javascript:;" style="font-size:13px">
												&nbsp;&nbsp;&nbsp;&nbsp;<b>Get Package Channel</b> : (GET) http://android.moratelindo.co.id/app/ott/package/PackageChannel
											</a>
										</div>
										<!-- Collect the nav links, forms, and other content for toggling -->
										<!-- /.navbar-collapse -->
									</div>
									<a href="<?php echo base_url() ?>package/PackageChannel">
										<!-- <a data-toggle="modal" href="#large"> -->
										<button class="btn btn-sm btn-info">Lihat Output</button>
									</a>
									<!-- <a data-toggle="modal" href="#keycode">
									<p>
										<button class="btn btn-sm btn-info">Lihat Output</button>

									</p>
								</a> -->
								</div>
							</div>

						<?php
						}
						?>


					</div>
				</div>

				<!-- END PAGE CONTENT INNER -->

				<!-- BEGIN QUICK SIDEBAR -->
				<a href="javascript:;" class="page-quick-sidebar-toggler"><i class="icon-login"></i></a>
				<div class="page-quick-sidebar-wrapper">
					<div class="page-quick-sidebar">
						<div class="nav-justified">
							<ul class="nav nav-tabs nav-justified">
								<li class="active">
									<a href="#quick_sidebar_tab_1" data-toggle="tab">
										Users <span class="badge badge-danger">2</span>
									</a>
								</li>
								<li>
									<a href="#quick_sidebar_tab_2" data-toggle="tab">
										Alerts <span class="badge badge-success">7</span>
									</a>
								</li>
								<li class="dropdown">
									<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
										More<i class="fa fa-angle-down"></i>
									</a>
									<ul class="dropdown-menu pull-right" role="menu">
										<li>
											<a href="#quick_sidebar_tab_3" data-toggle="tab">
												<i class="icon-bell"></i> Alerts </a>
										</li>
										<li>
											<a href="#quick_sidebar_tab_3" data-toggle="tab">
												<i class="icon-info"></i> Notifications </a>
										</li>
										<li>
											<a href="#quick_sidebar_tab_3" data-toggle="tab">
												<i class="icon-speech"></i> Activities </a>
										</li>
										<li class="divider">
										</li>
										<li>
											<a href="#quick_sidebar_tab_3" data-toggle="tab">
												<i class="icon-settings"></i> Settings </a>
										</li>
									</ul>
								</li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane active page-quick-sidebar-chat" id="quick_sidebar_tab_1">
									<div class="page-quick-sidebar-chat-users" data-rail-color="#ddd" data-wrapper-class="page-quick-sidebar-list">
										<h3 class="list-heading">Staff</h3>
										<ul class="media-list list-items">
											<li class="media">
												<div class="media-status">
													<span class="badge badge-success">8</span>
												</div>
												<img class="media-object" src="<?php echo base_url() ?>assets/admin/layout/img/avatar3.jpg" alt="...">
												<div class="media-body">
													<h4 class="media-heading">Bob Nilson</h4>
													<div class="media-heading-sub">
														Project Manager
													</div>
												</div>
											</li>
											<li class="media">
												<img class="media-object" src="<?php echo base_url() ?>assets/admin/layout/img/avatar1.jpg" alt="...">
												<div class="media-body">
													<h4 class="media-heading">Nick Larson</h4>
													<div class="media-heading-sub">
														Art Director
													</div>
												</div>
											</li>
											<li class="media">
												<div class="media-status">
													<span class="badge badge-danger">3</span>
												</div>
												<img class="media-object" src="<?php echo base_url() ?>assets/admin/layout/img/avatar4.jpg" alt="...">
												<div class="media-body">
													<h4 class="media-heading">Deon Hubert</h4>
													<div class="media-heading-sub">
														CTO
													</div>
												</div>
											</li>
											<li class="media">
												<img class="media-object" src="<?php echo base_url() ?>assets/admin/layout/img/avatar2.jpg" alt="...">
												<div class="media-body">
													<h4 class="media-heading">Ella Wong</h4>
													<div class="media-heading-sub">
														CEO
													</div>
												</div>
											</li>
										</ul>
										<h3 class="list-heading">Customers</h3>
										<ul class="media-list list-items">
											<li class="media">
												<div class="media-status">
													<span class="badge badge-warning">2</span>
												</div>
												<img class="media-object" src="<?php echo base_url() ?>assets/admin/layout/img/avatar6.jpg" alt="...">
												<div class="media-body">
													<h4 class="media-heading">Lara Kunis</h4>
													<div class="media-heading-sub">
														CEO, Loop Inc
													</div>
													<div class="media-heading-small">
														Last seen 03:10 AM
													</div>
												</div>
											</li>
											<li class="media">
												<div class="media-status">
													<span class="label label-sm label-success">new</span>
												</div>
												<img class="media-object" src="<?php echo base_url() ?>assets/admin/layout/img/avatar7.jpg" alt="...">
												<div class="media-body">
													<h4 class="media-heading">Ernie Kyllonen</h4>
													<div class="media-heading-sub">
														Project Manager,<br>
														SmartBizz PTL
													</div>
												</div>
											</li>
											<li class="media">
												<img class="media-object" src="<?php echo base_url() ?>assets/admin/layout/img/avatar8.jpg" alt="...">
												<div class="media-body">
													<h4 class="media-heading">Lisa Stone</h4>
													<div class="media-heading-sub">
														CTO, Keort Inc
													</div>
													<div class="media-heading-small">
														Last seen 13:10 PM
													</div>
												</div>
											</li>
											<li class="media">
												<div class="media-status">
													<span class="badge badge-success">7</span>
												</div>
												<img class="media-object" src="<?php echo base_url() ?>assets/admin/layout/img/avatar9.jpg" alt="...">
												<div class="media-body">
													<h4 class="media-heading">Deon Portalatin</h4>
													<div class="media-heading-sub">
														CFO, H&D LTD
													</div>
												</div>
											</li>
											<li class="media">
												<img class="media-object" src="<?php echo base_url() ?>assets/admin/layout/img/avatar10.jpg" alt="...">
												<div class="media-body">
													<h4 class="media-heading">Irina Savikova</h4>
													<div class="media-heading-sub">
														CEO, Tizda Motors Inc
													</div>
												</div>
											</li>
											<li class="media">
												<div class="media-status">
													<span class="badge badge-danger">4</span>
												</div>
												<img class="media-object" src="<?php echo base_url() ?>assets/admin/layout/img/avatar11.jpg" alt="...">
												<div class="media-body">
													<h4 class="media-heading">Maria Gomez</h4>
													<div class="media-heading-sub">
														Manager, Infomatic Inc
													</div>
													<div class="media-heading-small">
														Last seen 03:10 AM
													</div>
												</div>
											</li>
										</ul>
									</div>
									<div class="page-quick-sidebar-item">
										<div class="page-quick-sidebar-chat-user">
											<div class="page-quick-sidebar-nav">
												<a href="javascript:;" class="page-quick-sidebar-back-to-list"><i class="icon-arrow-left"></i>Back</a>
											</div>
											<div class="page-quick-sidebar-chat-user-messages">
												<div class="post out">
													<img class="avatar" alt="" src="<?php echo base_url() ?>assets/admin/layout/img/avatar3.jpg" />
													<div class="message">
														<span class="arrow"></span>
														<a href="javascript:;" class="name">Bob Nilson</a>
														<span class="datetime">20:15</span>
														<span class="body">
															When could you send me the report ? </span>
													</div>
												</div>
												<div class="post in">
													<img class="avatar" alt="" src="<?php echo base_url() ?>assets/admin/layout/img/avatar2.jpg" />
													<div class="message">
														<span class="arrow"></span>
														<a href="javascript:;" class="name">Ella Wong</a>
														<span class="datetime">20:15</span>
														<span class="body">
															Its almost done. I will be sending it shortly </span>
													</div>
												</div>
												<div class="post out">
													<img class="avatar" alt="" src="<?php echo base_url() ?>assets/admin/layout/img/avatar3.jpg" />
													<div class="message">
														<span class="arrow"></span>
														<a href="javascript:;" class="name">Bob Nilson</a>
														<span class="datetime">20:15</span>
														<span class="body">
															Alright. Thanks! :) </span>
													</div>
												</div>
												<div class="post in">
													<img class="avatar" alt="" src="<?php echo base_url() ?>assets/admin/layout/img/avatar2.jpg" />
													<div class="message">
														<span class="arrow"></span>
														<a href="javascript:;" class="name">Ella Wong</a>
														<span class="datetime">20:16</span>
														<span class="body">
															You are most welcome. Sorry for the delay. </span>
													</div>
												</div>
												<div class="post out">
													<img class="avatar" alt="" src="<?php echo base_url() ?>assets/admin/layout/img/avatar3.jpg" />
													<div class="message">
														<span class="arrow"></span>
														<a href="javascript:;" class="name">Bob Nilson</a>
														<span class="datetime">20:17</span>
														<span class="body">
															No probs. Just take your time :) </span>
													</div>
												</div>
												<div class="post in">
													<img class="avatar" alt="" src="<?php echo base_url() ?>assets/admin/layout/img/avatar2.jpg" />
													<div class="message">
														<span class="arrow"></span>
														<a href="javascript:;" class="name">Ella Wong</a>
														<span class="datetime">20:40</span>
														<span class="body">
															Alright. I just emailed it to you. </span>
													</div>
												</div>
												<div class="post out">
													<img class="avatar" alt="" src="<?php echo base_url() ?>assets/admin/layout/img/avatar3.jpg" />
													<div class="message">
														<span class="arrow"></span>
														<a href="javascript:;" class="name">Bob Nilson</a>
														<span class="datetime">20:17</span>
														<span class="body">
															Great! Thanks. Will check it right away. </span>
													</div>
												</div>
												<div class="post in">
													<img class="avatar" alt="" src="<?php echo base_url() ?>assets/admin/layout/img/avatar2.jpg" />
													<div class="message">
														<span class="arrow"></span>
														<a href="javascript:;" class="name">Ella Wong</a>
														<span class="datetime">20:40</span>
														<span class="body">
															Please let me know if you have any comment. </span>
													</div>
												</div>
												<div class="post out">
													<img class="avatar" alt="" src="<?php echo base_url() ?>assets/admin/layout/img/avatar3.jpg" />
													<div class="message">
														<span class="arrow"></span>
														<a href="javascript:;" class="name">Bob Nilson</a>
														<span class="datetime">20:17</span>
														<span class="body">
															Sure. I will check and buzz you if anything needs to be corrected. </span>
													</div>
												</div>
											</div>
											<div class="page-quick-sidebar-chat-user-form">
												<div class="input-group">
													<input type="text" class="form-control" placeholder="Type a message here...">
													<div class="input-group-btn">
														<button type="button" class="btn blue"><i class="icon-paper-clip"></i></button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane page-quick-sidebar-alerts" id="quick_sidebar_tab_2">
									<div class="page-quick-sidebar-alerts-list">
										<h3 class="list-heading">General</h3>
										<ul class="feeds list-items">
											<li>
												<div class="col1">
													<div class="cont">
														<div class="cont-col1">
															<div class="label label-sm label-info">
																<i class="fa fa-shopping-cart"></i>
															</div>
														</div>
														<div class="cont-col2">
															<div class="desc">
																New order received with <span class="label label-sm label-danger">
																	Reference Number: DR23923 </span>
															</div>
														</div>
													</div>
												</div>
												<div class="col2">
													<div class="date">
														30 mins
													</div>
												</div>
											</li>
											<li>
												<div class="col1">
													<div class="cont">
														<div class="cont-col1">
															<div class="label label-sm label-success">
																<i class="fa fa-user"></i>
															</div>
														</div>
														<div class="cont-col2">
															<div class="desc">
																You have 5 pending membership that requires a quick review.
															</div>
														</div>
													</div>
												</div>
												<div class="col2">
													<div class="date">
														24 mins
													</div>
												</div>
											</li>
											<li>
												<div class="col1">
													<div class="cont">
														<div class="cont-col1">
															<div class="label label-sm label-danger">
																<i class="fa fa-bell-o"></i>
															</div>
														</div>
														<div class="cont-col2">
															<div class="desc">
																Web server hardware needs to be upgraded. <span class="label label-sm label-warning">
																	Overdue </span>
															</div>
														</div>
													</div>
												</div>
												<div class="col2">
													<div class="date">
														2 hours
													</div>
												</div>
											</li>
											<li>
												<a href="javascript:;">
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																<div class="label label-sm label-default">
																	<i class="fa fa-briefcase"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc">
																	IPO Report for year 2013 has been released.
																</div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date">
															20 mins
														</div>
													</div>
												</a>
											</li>
										</ul>
										<h3 class="list-heading">System</h3>
										<ul class="feeds list-items">
											<li>
												<div class="col1">
													<div class="cont">
														<div class="cont-col1">
															<div class="label label-sm label-info">
																<i class="fa fa-shopping-cart"></i>
															</div>
														</div>
														<div class="cont-col2">
															<div class="desc">
																New order received with <span class="label label-sm label-success">
																	Reference Number: DR23923 </span>
															</div>
														</div>
													</div>
												</div>
												<div class="col2">
													<div class="date">
														30 mins
													</div>
												</div>
											</li>
											<li>
												<div class="col1">
													<div class="cont">
														<div class="cont-col1">
															<div class="label label-sm label-success">
																<i class="fa fa-user"></i>
															</div>
														</div>
														<div class="cont-col2">
															<div class="desc">
																You have 5 pending membership that requires a quick review.
															</div>
														</div>
													</div>
												</div>
												<div class="col2">
													<div class="date">
														24 mins
													</div>
												</div>
											</li>
											<li>
												<div class="col1">
													<div class="cont">
														<div class="cont-col1">
															<div class="label label-sm label-warning">
																<i class="fa fa-bell-o"></i>
															</div>
														</div>
														<div class="cont-col2">
															<div class="desc">
																Web server hardware needs to be upgraded. <span class="label label-sm label-default ">
																	Overdue </span>
															</div>
														</div>
													</div>
												</div>
												<div class="col2">
													<div class="date">
														2 hours
													</div>
												</div>
											</li>
											<li>
												<a href="javascript:;">
													<div class="col1">
														<div class="cont">
															<div class="cont-col1">
																<div class="label label-sm label-info">
																	<i class="fa fa-briefcase"></i>
																</div>
															</div>
															<div class="cont-col2">
																<div class="desc">
																	IPO Report for year 2013 has been released.
																</div>
															</div>
														</div>
													</div>
													<div class="col2">
														<div class="date">
															20 mins
														</div>
													</div>
												</a>
											</li>
										</ul>
									</div>
								</div>
								<div class="tab-pane page-quick-sidebar-settings" id="quick_sidebar_tab_3">
									<div class="page-quick-sidebar-settings-list">
										<h3 class="list-heading">General Settings</h3>
										<ul class="list-items borderless">
											<li>
												Enable Notifications <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF">
											</li>
											<li>
												Allow Tracking <input type="checkbox" class="make-switch" data-size="small" data-on-color="info" data-on-text="ON" data-off-color="default" data-off-text="OFF">
											</li>
											<li>
												Log Errors <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF">
											</li>
											<li>
												Auto Sumbit Issues <input type="checkbox" class="make-switch" data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF">
											</li>
											<li>
												Enable SMS Alerts <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF">
											</li>
										</ul>
										<h3 class="list-heading">System Settings</h3>
										<ul class="list-items borderless">
											<li>
												Security Level
												<select class="form-control input-inline input-sm input-small">
													<option value="1">Normal</option>
													<option value="2" selected>Medium</option>
													<option value="e">High</option>
												</select>
											</li>
											<li>
												Failed Email Attempts <input class="form-control input-inline input-sm input-small" value="5" />
											</li>
											<li>
												Secondary SMTP Port <input class="form-control input-inline input-sm input-small" value="3560" />
											</li>
											<li>
												Notify On System Error <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF">
											</li>
											<li>
												Notify On SMTP Error <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF">
											</li>
										</ul>
										<div class="inner-content">
											<button class="btn btn-success"><i class="icon-settings"></i> Save Changes</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- END QUICK SIDEBAR -->
			</div>
		</div>
		<!-- END CONTENT -->
	</div>
	<div class="modal fade bs-modal-lg" id="phonenumber" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<h4 class="modal-title">Output</h4>
				</div>
				<div class="modal-body">
					{<br>
					"success": "true",<br>
					"message": "success",<br>
					"customer_id": "1",<br>
					"phone_number": "081380602015",<br>
					"fullname": "",<br>
					"email": null,<br>
					"otp": "6049"<br>
					}
				</div>
				<div class="modal-footer">
					<button type="button" class="btn default" data-dismiss="modal">Close</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>

	<div class="modal fade bs-modal-lg" id="otp" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<h4 class="modal-title">Output</h4>
				</div>
				<div class="modal-body">
					{<br>
					"success": "true",<br>
					"message": "success",<br>
					"keycode": "7484390581401409"<br>
					}
				</div>
				<div class="modal-footer">
					<button type="button" class="btn default" data-dismiss="modal">Close</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>

	<div class="modal fade bs-modal-lg" id="trial" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<h4 class="modal-title">Output</h4>
				</div>
				<div class="modal-body">
					{<br>
					"success": "true",<br>
					"message": "success",<br>
					}
				</div>
				<div class="modal-footer">
					<button type="button" class="btn default" data-dismiss="modal">Close</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>

	<div class="modal fade bs-modal-lg" id="delkeycode" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<h4 class="modal-title">Output</h4>
				</div>
				<div class="modal-body">
					{<br>
					"success": "true",<br>
					"message": "success",<br>
					}
				</div>
				<div class="modal-footer">
					<button type="button" class="btn default" data-dismiss="modal">Close</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<div class="modal fade bs-modal-lg" id="keycode" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<h4 class="modal-title">Output</h4>
				</div>
				<div class="modal-body">
					{<br>
					"success": "true",<br>
					"message": "success",<br>
					}
				</div>
				<div class="modal-footer">
					<button type="button" class="btn default" data-dismiss="modal">Close</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>

	<div class="modal fade bs-modal-lg" id="customerid" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<h4 class="modal-title">Output</h4>
				</div>
				<div class="modal-body" style="font-size:12px;">
					<b>Customer Existing</b><br>
					{<br>
					"success": "true",<br>
					"message": "success",<br>
					"status": "existing",<br>
					"keycode": "0858262028293623",<br>
					"CUSTOMER_ID": "33353",<br>
					"CUSTOMERTIPE_NAME": "Perumahan",<br>
					"CUSTOMER_NAME": "ARMAN ABDUL ROHMAN ST",<br>
					"CUSTOMER_NO": "20201843",<br>
					"CUSTOMER_BILL": null,<br>
					"CUSTOMER_IDEN_TYPE": "KTP",<br>
					"CUSTOMER_IDEN_NO": "3271031806740011",<br>
					"CUSTOMER_GENDER": "L",<br>
					"CUSTOMER_BIRTH_DATE": "18-JUN-84",<br>
					"CUSTOMER_BIRTH_PLACE": "BOGOR",<br>
					"CUSTOMER_PROFESSION": null,<br>
					"CUSTOMER_RELIGION": "Islam",<br>
					"CUSTOMER_EMAIL": "arman.abdul74@yahoo.com",<br>
					"CUSTOMER_TELEPON": "081510070119",<br>
					"CUSTOMER_MOBILE": "08158090844",<br>
					"CUSTOMER_ADDRESS": "JL BURANGRANG GUNUNG GEDE NO 20 RT 04/03 BABAKAN BOGOR TENGAH BOGOR JAWA BARAT",<br>
					"PACKAGE_TV": "FTA"<br>
					}
				</div>
				<div class="modal-footer">
					<button type="button" class="btn default" data-dismiss="modal">Close</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>

	<div class="modal fade bs-modal-lg" id="customeridtrial" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<h4 class="modal-title">Output</h4>
				</div>
				<div class="modal-body" style="font-size:12px;">
					<b>Customer Trial</b><br>
					{<br>
					"success": "true",<br>
					"message": "success",<br>
					"status": "trial",<br>
					"keycode": "0858262028293623",<br>
					"CUSTOMER_ID": "",<br>
					"CUSTOMERTIPE_NAME": "",<br>
					"CUSTOMER_NAME": "",<br>
					"CUSTOMER_NO": "",<br>
					"CUSTOMER_BILL": "",<br>
					"CUSTOMER_IDEN_TYPE": "",<br>
					"CUSTOMER_IDEN_NO": "",<br>
					"CUSTOMER_GENDER": "",<br>
					"CUSTOMER_BIRTH_DATE": "",<br>
					"CUSTOMER_BIRTH_PLACE": "",<br>
					"CUSTOMER_PROFESSION": ,<br>
					"CUSTOMER_RELIGION": "",<br>
					"CUSTOMER_EMAIL": "",<br>
					"CUSTOMER_TELEPON": "081510070119",<br>
					"CUSTOMER_MOBILE": "",<br>
					"CUSTOMER_ADDRESS": "",<br>
					"PACKAGE_TV": ""<br>
					}
				</div>
				<div class="modal-footer">
					<button type="button" class="btn default" data-dismiss="modal">Close</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>

	<!-- END CONTAINER -->
	<!-- BEGIN FOOTER -->
	<div class="page-footer">
		<div class="page-footer-inner">
			2019 &copy; API OTT
		</div>
		<div class="scroll-to-top">
			<i class="icon-arrow-up"></i>
		</div>
	</div>
	<!-- END FOOTER -->
	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
	<!-- BEGIN CORE PLUGINS -->
	<!--[if lt IE 9]>
<script src="<?php echo base_url() ?>assets/global/plugins/respond.min.js"></script>
<script src="<?php echo base_url() ?>assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
	<script src="<?php echo base_url() ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
	<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
	<script src="<?php echo base_url() ?>assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script src="<?php echo base_url() ?>assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
	<!-- IMPORTANT! fullcalendar depends on jquery-ui.min.js for drag & drop support -->
	<script src="<?php echo base_url() ?>assets/global/plugins/morris/morris.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>assets/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="<?php echo base_url() ?>assets/global/scripts/metronic.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>assets/admin/layout4/scripts/layout.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>assets/admin/layout2/scripts/quick-sidebar.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>assets/admin/layout4/scripts/demo.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>assets/admin/pages/scripts/index3.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
	<!-- END PAGE LEVEL SCRIPTS -->
	<script>
		jQuery(document).ready(function() {
			Metronic.init(); // init metronic core componets
			Layout.init(); // init layout
			Demo.init(); // init demo features
			QuickSidebar.init(); // init quick sidebar
			Index.init(); // init index page
			Tasks.initDashboardWidget(); // init tash dashboard widget  
		});
	</script>
	<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->

</html>