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
					<li class="start active ">
						<a href="<?php echo base_url() ?>index.php/api/home/Home">
							<i class="icon-home"></i>
							<span class="title">Dashboard</span>
						</a>
					</li>
					<li class="tooltips" data-container="body" data-placement="right" data-html="true" data-original-title="AngularJS version demo">
						<a href="<?php echo base_url() ?>index.php/api/Home/">
							<i class="icon-diamond"></i>
							<span class="title">
								All API </span>
						</a>
					</li>
					<!-- BEGIN ANGULARJS LINK -->
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
						<h1>Dashboard </h1>
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
				<div class="row margin-top-10">
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="dashboard-stat2">
							<div class="display">
								<div class="number">
									<h4 class="font-green-sharp">Customer</h4>
									<small></small>
								</div>
								<div class="icon">
									<i class="icon-pie-chart"></i>
								</div>
							</div>
							<div class="progress-info">
								<div class="progress">
									<span style="width: 76%;" class="progress-bar progress-bar-success green-sharp">
										<span class="sr-only">76% progress</span>
									</span>
								</div>
								<div class="status">
									<div class="status-title">
										<a href="<?php echo base_url() ?>index.php/api/Home/detail/1">
											view detail
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="dashboard-stat2">
							<div class="display">
								<div class="number">
									<h4 class="font-red-haze">Login</h4>
									<!-- <small>NEW FEEDBACKS</small> -->
								</div>
								<div class="icon">
									<i class="icon-like"></i>
								</div>
							</div>
							<div class="progress-info">
								<div class="progress">
									<span style="width: 85%;" class="progress-bar progress-bar-success red-haze">
										<span class="sr-only">85% change</span>
									</span>
								</div>
								<div class="status">
									<div class="status-title">
										<a href="<?php echo base_url() ?>index.php/api/Home/detail/2">
											view detail
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="dashboard-stat2">
							<div class="display">
								<div class="number">
									<h4 class="font-blue-sharp">Keycode</h4>
									<!-- <small>NEW ORDERS</small> -->
								</div>
								<div class="icon">
									<i class="icon-basket"></i>
								</div>
							</div>
							<div class="progress-info">
								<div class="progress">
									<span style="width: 45%;" class="progress-bar progress-bar-success blue-sharp">
										<span class="sr-only">45% grow</span>
									</span>
								</div>
								<div class="status">
									<div class="status-title">
										<a href="<?php echo base_url() ?>index.php/api/Home/detail/3">
											view detail
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="dashboard-stat2">
							<div class="display">
								<div class="number">
									<h4 class="font-purple-soft">Firebase Token</h4>
									<!-- <small>NEW USERS</small> -->
								</div>
								<div class="icon">
									<i class="icon-user"></i>
								</div>
							</div>
							<div class="progress-info">
								<div class="progress">
									<span style="width: 57%;" class="progress-bar progress-bar-success purple-soft">
										<span class="sr-only">56% change</span>
									</span>
								</div>
								<div class="status">
									<div class="status-title">
										<a href="<?php echo base_url() ?>index.php/api/Home/detail/4">
											view detail
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="dashboard-stat2">
							<div class="display">
								<div class="number">
									<h4 class="font-green-sharp">Channel</h4>
									<!-- <small>TOTAL PROFIT</small> -->
								</div>
								<div class="icon">
									<i class="icon-pie-chart"></i>
								</div>
							</div>
							<div class="progress-info">
								<div class="progress">
									<span style="width: 76%;" class="progress-bar progress-bar-success green-sharp">
										<span class="sr-only">76% progress</span>
									</span>
								</div>
								<div class="status">
									<div class="status-title">
										<a href="<?php echo base_url() ?>index.php/api/Home/detail/5">
											view detail
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="dashboard-stat2">
							<div class="display">
								<div class="number">
									<h4 class="font-red-haze">Channel Category</h4>
									<!-- <small>NEW FEEDBACKS</small> -->
								</div>
								<div class="icon">
									<i class="icon-like"></i>
								</div>
							</div>
							<div class="progress-info">
								<div class="progress">
									<span style="width: 85%;" class="progress-bar progress-bar-success red-haze">
										<span class="sr-only">85% change</span>
									</span>
								</div>
								<div class="status">
									<div class="status-title">
										<a href="<?php echo base_url() ?>index.php/api/Home/detail/6">
											view detail
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="dashboard-stat2">
							<div class="display">
								<div class="number">
									<h4 class="font-blue-sharp">Channel Schedule</h4>
									<!-- <small>NEW ORDERS</small> -->
								</div>
								<div class="icon">
									<i class="icon-basket"></i>
								</div>
							</div>
							<div class="progress-info">
								<div class="progress">
									<span style="width: 45%;" class="progress-bar progress-bar-success blue-sharp">
										<span class="sr-only">45% grow</span>
									</span>
								</div>
								<div class="status">
									<div class="status-title">
										<a href="<?php echo base_url() ?>index.php/api/Home/detail/7">
											view detail
										</a>
									</div>
									<!-- <div class="status-number">
										45%
									</div> -->
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="dashboard-stat2">
							<div class="display">
								<div class="number">
									<h4 class="font-purple-soft">Package</h4>
									<!-- <small>NEW USERS</small> -->
								</div>
								<div class="icon">
									<i class="icon-user"></i>
								</div>
							</div>
							<div class="progress-info">
								<div class="progress">
									<span style="width: 57%;" class="progress-bar progress-bar-success purple-soft">
										<span class="sr-only">56% change</span>
									</span>
								</div>
								<div class="status">
									<div class="status-title">
										<a href="<?php echo base_url() ?>index.php/api/Home/detail/8">
											view detail
										</a>
									</div>
									<!-- <div class="status-number">
										57%
									</div> -->
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- END PAGE CONTENT INNER -->

				<!-- BEGIN QUICK SIDEBAR -->
				<!-- END QUICK SIDEBAR -->
			</div>
		</div>
		<!-- END CONTENT -->
	</div>
	<!-- END CONTAINER -->
	<!-- BEGIN FOOTER -->
	<div class="page-footer">
		<div class="page-footer-inner">
			2019 &copy; API OTT. 
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