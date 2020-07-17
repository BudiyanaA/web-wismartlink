<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
	<meta charset="utf-8" />
	<title>WiSmartLink</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery-1.9.1.js" type="text/javascript"></script>
	<!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
	<script src="<?php echo base_url(); ?>assets/js/highcharts.js" type="text/javascript"></script>
	<!-- <script src="js/exporting.js" type="text/javascript"></script> -->
	<script src="<?php echo base_url(); ?>assets/js/modules/series-label.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/modules/exporting.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/modules/export-data.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/modules/data.js"></script>


	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
	<link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
	<link href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />


	<link href="<?php echo base_url() ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
	<!-- END GLOBAL MANDATORY STYLES -->
	<link href="<?php echo base_url() ?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
	<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
	<!-- <link href="<?php echo base_url() ?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" /> -->
	<link href="<?php echo base_url() ?>assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css">

	<link href="<?php echo base_url() ?>assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>assets/global/plugins/bootstrap-summernote/summernote.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>assets/global/plugins/summernote/summernote-bs4.css" rel="stylesheet" type="text/css" />

	<!-- END PAGE LEVEL PLUGIN STYLES -->
	<!-- BEGIN PAGE STYLES -->
	<link href="<?php echo base_url() ?>assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>assets/global/plugins/select2/css/select2.css" rel="stylesheet" />

	<!-- END PAGE STYLES -->
	<!-- BEGIN THEME STYLES -->
	<!-- DOC: To use 'rounded corners' style just load 'components-rounded.css' stylesheet instead of 'components.css' in the below style tag -->
	<link href="<?php echo base_url() ?>assets/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>assets/global/css/plugins.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>assets/admin/layout4/css/layout.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>assets/admin/layout4/css/themes/light.css" rel="stylesheet" type="text/css" id="style_color" />
	<link href="<?php echo base_url() ?>assets/admin/layout4/css/custom.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-toastr/toastr.css" rel="stylesheet" type="text/css" />
	<!-- END THEME STYLES -->
	<link rel="shortcut icon" href="favicon.ico" />
</head>
<!-- END HEAD -->

<body class="page-container-bg-solid page-header-fixed page-sidebar-fixed page-footer-fixed page-sidebar-closed-hide-logo page-md">
	<!-- BEGIN HEADER -->
	<div class="page-header navbar navbar-fixed-top">
		<!-- BEGIN HEADER INNER -->
		<?php $this->load->view('template/header'); ?>
	</div>
	<!-- END HEADER -->
	<!-- BEGIN HEADER & CONTENT DIVIDER -->
	<div class="clearfix"> </div>
	<!-- END HEADER & CONTENT DIVIDER -->
	<!-- BEGIN CONTAINER -->
	<div class="page-container">
		<!-- BEGIN SIDEBAR -->
		<?php $this->load->view('template/sidebar'); ?>
		<!-- BEGIN CONTENT -->
		<?php $this->load->view($folder . '/' . $page_name); ?>
		<!-- END CONTENT -->
		<!-- BEGIN QUICK SIDEBAR -->
		<!-- <a href="javascript:;" class="page-quick-sidebar-toggler">
            <i class="icon-login"></i>
        </a> -->
		<a href="javascript:;" class="page-quick-sidebar-toggler">
			<i class="icon-login"></i>
		</a>
		<div class="page-quick-sidebar-wrapper" data-close-on-body-click="false">
			<div class="page-quick-sidebar">
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="javascript:;" data-target="#quick_sidebar_tab_1" data-toggle="tab"> Users
						</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active page-quick-sidebar-chat" id="quick_sidebar_tab_1">
						<div class="page-quick-sidebar-chat-users" data-rail-color="#ddd" data-wrapper-class="page-quick-sidebar-list">
							<ul class="media-list list-items">
								<?php
								$get_user = $this->db->query("select * from user where user_id !='" . $this->session->userdata('adminid') . "'order by user_id desc")->result();
								foreach ($get_user as $row) {
									if ($row->img != '' || $row->img != NULL) {
										$img = base_url() . $row->img;
									} else {
										$img = base_url() . '/assets/img/user/887779c6d3711981dbc9.jpg';
									}
								?>
									<li class="media" onclick="chat('<?php echo $row->user_id ?>')">
										<?php
										$get_msg = $this->db->query("select * from messages where sentby = '$row->user_id' AND is_read = '0'")->num_rows();
										if ($get_msg > 0) {
										?>
											<div class="media-status" id="div_notif_<?php echo $row->user_id ?>">
												<span class="badge badge-info" id="jml_notifikasi_<?php echo $row->user_id ?>"><?php echo $get_msg ?></span>
											</div>
										<?php
										}
										?>
										<img class="media-object" src="<?php echo $img ?>" alt="...">
										<div class="media-body">
											<h4 class="media-heading"><?php echo $row->nama ?></h4>
											<div class="media-heading-sub"> <?php echo $row->email ?> </div>
											<div class="media-heading-small"> <?php echo $row->phone_number ?> </div>
										</div>
									</li>
								<?php
								}
								?>
							</ul>
						</div>

						<!-- CHAT DASHBOARD -->
						<div class="page-quick-sidebar-item">
							<div class="page-quick-sidebar-chat-user">
								<div class="page-quick-sidebar-nav">
									<a href="javascript:;" class="page-quick-sidebar-back-to-list">
										<i class="icon-arrow-left"></i>Back</a>
								</div>
								<div class="page-quick-sidebar-chat-user-messages" id="chat_user">

								</div>
								<div class="page-quick-sidebar-chat-user-form">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="Type a message here...">
										<div class="input-group-btn">
											<button type="button" class="btn green">
												<i class="icon-paper-clip"></i>
											</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END CONTAINER -->
	<!-- BEGIN FOOTER -->
	<!-- <div class="page-footer">
		<div class="page-footer-inner">
			Copyright © WiSmartLink 2020
		</div>
		<div class="scroll-to-top">
			<i class="icon-arrow-up"></i>
		</div>
	</div> -->
	<!-- END FOOTER -->
	</div>
	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
	<!-- BEGIN CORE PLUGINS -->
	<!--[if lt IE 9]>
<script src="../../assets/global/plugins/respond.min.js"></script>
<script src="../../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
	<script src="<?php echo base_url() ?>assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
	<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
	<script src="<?php echo base_url() ?>assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
	<!-- <script src="<?php echo base_url() ?>assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script> -->
	<script src="<?php echo base_url() ?>assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>assets/global/plugins/morris/morris.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>assets/global/plugins/moment.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>assets/global/scripts/datatable.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-toastr/toastr.js" type="text/javascript"></script>

	<!-- 
    <script src="<?php echo base_url(); ?>assets/global/scripts/datatable.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script> -->
	<script src="<?php echo base_url(); ?>assets/global/scripts/app.min.js" type="text/javascript"></script>
	<!-- END THEME GLOBAL SCRIPTS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="<?php echo base_url(); ?>assets/pages/scripts/table-datatables-buttons.min.js" type="text/javascript"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>

	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script src="<?php echo base_url() ?>assets/global/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>assets/global/plugins/bootstrap-markdown/lib/markdown.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>assets/global/plugins/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>assets/global/plugins/bootstrap-summernote/summernote.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>assets/global/plugins/summernote/summernote-bs4.js" type="text/javascript"></script>

	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="<?php echo base_url() ?>assets/global/scripts/app.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>assets/pages/scripts/table-datatables-managed.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>assets/pages/scripts/components-editors.min.js" type="text/javascript"></script>

	<!-- <script src="<?php echo base_url() ?>assets/global/scripts/metronic.js" type="text/javascript"></script> -->
	<script src="<?php echo base_url() ?>assets/layouts/layout4/scripts/layout.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>assets/layouts/layout4/scripts/demo.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
	<!-- END PAGE LEVEL SCRIPTS -->
	<!-- END THEME GLOBAL SCRIPTS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="<?php echo base_url() ?>assets/pages/scripts/dashboard.min.js" type="text/javascript"></script>
	<!-- END PAGE LEVEL SCRIPTS -->
	<!-- BEGIN THEME LAYOUT SCRIPTS -->
	<script src="<?php echo base_url() ?>assets/apps/scripts/todo-2.min.js" type="text/javascript"></script>

	<!-- <script src="<?php echo base_url() ?>assets/pages/scripts/profile.min.js" type="text/javascript"></script> -->
	<script src="<?php echo base_url() ?>assets/pages/scripts/table-datatables-managed.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>assets/global/plugins/select2/js/select2.min.js"></script>
	<!-- END JAVASCRIPTS -->

	<script>
		$("#site").select2({
			placeholder: 'Select a site'
		});
		$("#device_type_id").select2({
			placeholder: 'Select a Device'
		});
		$("#checking_type").select2({
			placeholder: 'Select a Device'
		});

		<?php if ($this->session->flashdata('success')) { ?>
			toastr.success("<?php echo $this->session->flashdata('success'); ?>", "<?php echo $this->lang->line('success_alert'); ?>", {
				timeOut: 5000
			});
		<?php } else if ($this->session->flashdata('error')) {  ?>
			toastr.error("<?php echo $this->session->flashdata('error'); ?>", "<?php echo $this->lang->line('error_alert'); ?>", {
				timeOut: 5000
			});
		<?php } else if ($this->session->flashdata('warning')) {  ?>
			toastr.warning("<?php echo $this->session->flashdata('warning'); ?>", "<?php echo $this->lang->line('warning_alert'); ?>", {
				timeOut: 5000
			});
		<?php } else if ($this->session->flashdata('info')) {  ?>
			toastr.info("<?php echo $this->session->flashdata('info'); ?>", "<?php echo $this->lang->line('information_alert'); ?>", {
				timeOut: 5000
			});
		<?php } ?>

		function chat(user_id) {
			$.ajax({
				url: '<?php echo base_url(); ?>index.php/Message/msg_user/' + user_id,
				success: function(response) {
					console.log("Ada");

					// elmnt.scrollIntoView();
					$('#chat_user').html(response);
					var elmnt = $("#chat_user");
					// var slimScrollBar = $(".slimScrollBar");
					elmnt.scrollTop(elmnt[0].scrollHeight);
					elmnt.slimScroll({
						// height: '200px',
						start: 'bottom',
						alwaysVisible: true
					});
				}
			});

			$.ajax({
				url: '<?php echo base_url(); ?>index.php/Message/read_message/' + user_id + '',
				success: function(response) {
					$("#belum_dibaca").hide();
					$("#div_notif_" + user_id).remove();
				}
			});

		}
	</script>
</body>
<!-- END BODY -->

</html>