<?php 
	include '../../../../config/db_connect.php';
	$range = $_POST['rangenya'];
	//-------------------------
	$realDate = "";
	$dateBack = "";
	$twoWeek = "";
	//-------------------------

	$exe = mysqli_query($connect, "SELECT tanggal FROM tbl_em ORDER BY tanggal DESC LIMIT 1");
	foreach ($exe as $key) {
		$realDate = $key['tanggal'];
		$twoWeek = date("Y-m-d", strtotime("-2 weeks", strtotime($realDate)));
	}
	if ($range == 30) {
		$dateBack = date("Y-m-d", strtotime("-1 month", strtotime($realDate)));
	} else if ($range == 90) {
		$dateBack = date("Y-m-d", strtotime("-3 months", strtotime($realDate)));
	} else if ($range == 1) {
		$dateBack = date("Y-m-d", strtotime("-1 year", strtotime($realDate)));
	}

	$totalSales = mysqli_query($connect,"SELECT COUNT(namaItem) AS total FROM tbl_em WHERE type='Sale' AND tanggal <= '".$realDate."' AND tanggal >= '".$dateBack."'");
	$country = mysqli_query($connect,"SELECT negara, count(*) AS total FROM tbl_em WHERE NOT negara = '' AND tanggal <= '".$realDate."' AND tanggal >= '".$dateBack."' GROUP BY negara ORDER BY Total DESC LIMIT 1");
	$bestSales = mysqli_query($connect,"SELECT namaItem, count(*) AS total FROM tbl_em WHERE type='Sale' AND tanggal <= '".$realDate."' AND tanggal >= '".$dateBack."' GROUP BY namaItem ORDER BY Total DESC LIMIT 1");
	$saleReversal = mysqli_query($connect,"SELECT COUNT(namaItem) AS total FROM tbl_em WHERE type='Sale Reversal' AND tanggal <= '".$realDate."' AND tanggal >= '".$dateBack."'");
	$bestTwo = mysqli_query($connect, "SELECT namaItem, COUNT(namaItem) AS total FROM tbl_em WHERE type='Sale' AND tanggal <= '".$realDate."' AND tanggal >= '".$twoWeek."' GROUP BY namaItem ORDER BY Total DESC LIMIT 1");
?>
<div class="row" data-plugin="matchHeight" data-by-row="true">
	<div class="col-xl-3 col-md-6">
		<!-- Widget Linearea One-->
		<div class="card card-shadow" id="widgetLineareaOne">
			<div class="card-block p-20 pt-10">
				<?php
					foreach ($totalSales as $key) {
						foreach ($saleReversal as $key2) {
							?>
							<div class="clearfix">
								<div class="grey-800 float-left py-10">
									<i class="icon md-shopping-cart grey-600 font-size-24 vertical-align-bottom mr-5"></i>Total Sales
								</div>
								<span class="float-right grey-700 font-size-30"><?php echo $key['total'] - $key2['total']; ?></span>
							</div>
							<?php 
						}
					}
				?>
			</div>
		</div>
		<!-- End Widget Linearea One -->
	</div>
	<div class="col-xl-3 col-md-6">
		<!-- Widget Linearea Four -->
		<div class="card card-shadow" id="widgetLineareaFour">
			<div class="card-block p-20 pt-10">
				<?php 
					foreach ($country as $key) {
						?>
						<div class="clearfix">
							<div class="grey-800 float-left py-10">
								<i class="icon md-map grey-600 font-size-24 vertical-align-bottom mr-5"></i>Country
							</div>
							<span class="float-right grey-700 font-size-30"><?php echo $key['total']; ?></span>
						</div>
						<div class="mb-20 grey-500">
							<?php echo $key['negara']; ?>
						</div>
						<?php
					}
					?>
			</div>
			<div class="card-footer card-footer-transparent card-footer-bordered">
				<a href="?halaman=country" class="btn btn-xs btn-success waves-effect">Detail <i class="icon md-square-right"></i></a>
			</div>
		</div>
		<!-- End Widget Linearea Four -->
	</div>
	<div class="col-xl-3 col-md-6">
		<!-- Widget Linearea Two -->
		<div class="card card-shadow" id="widgetLineareaTwo">
			<div class="card-block p-20 pt-10">
				<?php 
					foreach ($bestSales as $key) {
						?>
						<div class="clearfix">
							<div class="grey-800 float-left py-10">
								<i class="icon md-flash grey-600 font-size-24 vertical-align-bottom mr-5"></i>Best Sales
							</div>
							<span class="float-right grey-700 font-size-30"><?php echo $key['total']; ?></span>
						</div>
						<div class="mb-20 grey-500">
							<?php echo $key['namaItem']; ?>
						</div>
					<?php } ?>
			</div>
		</div>
		<!-- End Widget Linearea Two -->
	</div>
	<div class="col-xl-3 col-md-6">
		<!-- Widget Linearea Four -->
		<div class="card card-shadow" id="widgetLineareaFour">
			<div class="card-block p-20 pt-10">
				<?php 
					foreach ($bestTwo as $key) {
				?>
				<div class="clearfix">
					<div class="grey-800 float-left py-10">
						<i class="icon md-flash grey-600 font-size-24 vertical-align-bottom mr-5"></i>Best Sales 2 Weeks
					</div>
					<span class="float-right grey-700 font-size-30"><?php echo $key['total']; ?></span>
				</div>
				<div class="mb-20 grey-500">
					<?php echo $key['namaItem']; ?>
				</div>
				<?php } ?>
			</div>
		</div>
		<!-- End Widget Linearea Four -->
	</div>
	<div class="col-xl-3 col-md-6">
		<!-- Widget Linearea Four -->
		<div class="card card-shadow" id="widgetLineareaFour">
			<div class="card-block p-20 pt-10">
				<?php 
				foreach ($saleReversal as $key) {
				?>
				<div class="clearfix">
					<div class="grey-800 float-left py-10">
						<i class="icon md-replay grey-600 font-size-24 vertical-align-bottom mr-5"></i>Sale Reversal(s)
					</div>
					<span class="float-right grey-700 font-size-30"><?php echo $key['total']; ?></span>
				</div>
				<div class="mb-20 grey-500">
					
				</div>
				<?php } ?>
			</div>
			<div class="card-footer card-footer-transparent card-footer-bordered">
				<a href="?halaman=salereversal" class="btn btn-xs btn-success waves-effect">Detail <i class="icon md-square-right"></i></a>
			</div>
		</div>
		<!-- End Widget Linearea Four -->
	</div>
