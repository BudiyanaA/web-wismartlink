<script>
</script>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<!-- BEGIN CONTENT BODY -->
	<div class="page-content">
		<!-- BEGIN PAGE HEAD-->
		<div class="page-head">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>Dashboard
					<small>dashboard & statistics</small>
				</h1>
			</div>
			<!-- END PAGE TITLE -->
			<!-- BEGIN PAGE TOOLBAR -->
			<div class="page-toolbar">
				<!-- BEGIN THEME PANEL -->

				<!-- END THEME PANEL -->
			</div>
			<!-- END PAGE TOOLBAR -->
		</div>
		<!-- END PAGE HEAD-->
		<!-- BEGIN PAGE BREADCRUMB -->
		<ul class="page-breadcrumb breadcrumb">
			<li>
				<a href="index.html">Home</a>
				<i class="fa fa-circle"></i>
			</li>
			<li>
				<span class="active">Dashboard</span>
			</li>
		</ul>
		<!-- END PAGE BREADCRUMB -->
		<!-- BEGIN PAGE BASE CONTENT -->
		<!-- BEGIN DASHBOARD STATS 1-->
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<a class="dashboard-stat dashboard-stat-v2 blue" href="#">
					<div class="visual">
						<i class="fa fa-comments"></i>
					</div>
					<div class="details">
						<div class="number">
							<span data-counter="counterup" data-value="1349"><?= $user ?></span>
						</div>
						<div class="desc"> Total User </div>
					</div>
				</a>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<a class="dashboard-stat dashboard-stat-v2 red" href="#">
					<div class="visual">
						<i class="fa fa-bar-chart-o"></i>
					</div>
					<div class="details">
						<div class="number">
							<span data-counter="counterup" data-value="12,5"><?= $unit ?></span>
                        </div>
						<div class="desc"> Total Unit </div>
					</div>
				</a>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<a class="dashboard-stat dashboard-stat-v2 green" href="#">
					<div class="visual">
						<i class="fa fa-shopping-cart"></i>
					</div>
					<div class="details">
						<div class="number">
							<span data-counter="counterup" data-value="549"><?= $toko ?></span>
						</div>
						<div class="desc"> Total Toko </div>
					</div>
				</a>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<a class="dashboard-stat dashboard-stat-v2 purple" href="#">
					<div class="visual">
						<i class="fa fa-globe"></i>
					</div>
					<div class="details">
						<div class="number">
							<span data-counter="counterup" data-value="89"><?= $resto ?></span>
                        </div>
						<div class="desc"> Total Restoran </div>
					</div>
				</a>
			</div>
		</div>
		<div class="clearfix"></div>
		<!-- END DASHBOARD STATS 1-->

		<!-- END PAGE BASE CONTENT -->
	</div>
	<!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->

<script>
	$(document).ready(function() {

		//datatables
		$('#device_type').DataTable({
			// "scrollX": true,
			"pageLength": 5,
			"order": [],

			"columnDefs": [{
				"targets": [0],
				"orderable": false,
			}, ],

		});

	});
</script>