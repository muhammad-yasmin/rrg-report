<?php 
	include '../../../../config/db_connect.php';
	$twoWeek = "";

	$sql = mysqli_query($connect, "SELECT tanggal FROM tbl_tm ORDER BY tanggal DESC LIMIT 1");
	foreach ($sql as $key) {
		$lastDate = $key['tanggal'];
		$twoWeek = date("Y-m-d", strtotime("-2 weeks", strtotime($lastDate)));
		//echo $lastDate." - ".$twoWeek;
	}

	$totalSales = mysqli_query($connect,"SELECT COUNT(namaItem) AS total FROM tbl_tm");
	//$country = mysqli_query($connect,"SELECT negara, count(*) AS total FROM tbl_tm WHERE NOT negara = '' GROUP BY negara ORDER BY Total DESC LIMIT 1");
	$bestSales = mysqli_query($connect,"SELECT namaItem, count(*) AS total FROM tbl_tm GROUP BY namaItem ORDER BY Total DESC LIMIT 1");
	//$saleReversal = mysqli_query($connect,"SELECT COUNT(namaItem) AS total FROM tbl_tm WHERE type='Sale Reversal'");
	$ssss = "SELECT namaItem, COUNT(namaItem) AS total FROM tbl_tm WHERE tanggal <= '".$lastDate."' AND tanggal >= '".$twoWeek."' GROUP BY namaItem ORDER BY Total DESC LIMIT 1";
	$bestTwo = mysqli_query($connect, $ssss);

?>
<div class="row" data-plugin="matchHeight" data-by-row="true">
	<div class="col-xl-3 col-md-6">
		<!-- Widget Linearea One-->
		<div class="card card-shadow" id="widgetLineareaOne">
			<div class="card-block p-20 pt-10">
				<?php
					foreach ($totalSales as $key) {
						// foreach ($saleReversal as $key2) {
							?>
							<div class="clearfix">
								<div class="grey-800 float-left py-10">
									<i class="icon md-shopping-cart grey-600 font-size-24 vertical-align-bottom mr-5"></i>Total Sales
								</div>
								<span class="float-right grey-700 font-size-30"><?php echo $key['total']; ?></span>
							</div>
							<?php 
						// }
					}
				?>
			</div>
		</div>
		<!-- End Widget Linearea One -->
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
						<i class="icon md-flash grey-600 font-size-24 vertical-align-bottom mr-5"></i>Best Sales Last 2 Weeks
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