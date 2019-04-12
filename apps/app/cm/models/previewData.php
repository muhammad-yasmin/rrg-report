<?php 
	include '../../../../config/db_connect.php';
	$name = $_POST['nameItem'];
	$range = $_POST['rangenya'];

	//-------------------------
	$from = $_POST['dari'];
	$to = $_POST['hingga'];
	//-------------------------

	//-------------------------
	$realDate = "";
	$dateBack = "";

	$data = array();
	$bulan = array();
	$minggu = array();
	//-------------------------

	if ($range == 0) {
		$realDate = date("Y-m-d", strtotime($to));
		$dateBack = date("Y-m-d", strtotime($from));
	} else {
		$exe = mysqli_query($connect, "SELECT tanggal FROM tbl_cm ORDER BY tanggal DESC LIMIT 1");
		foreach ($exe as $key) {
			$realDate = $key['tanggal'];
		}
		if ($range == 30) {
			$dateBack = date("Y-m-d", strtotime("-1 month", strtotime($realDate)));
		} else if ($range == 90) {
			$dateBack = date("Y-m-d", strtotime("-3 months", strtotime($realDate)));
		} else if ($range == 1) {
			$dateBack = date("Y-m-d", strtotime("-1 year", strtotime($realDate)));
		}
	}
	
	$query = "SELECT namaItem, month(tanggal) AS bulan, count(namaItem) AS totalSale
				FROM tbl_cm
				WHERE namaItem = '".$name."'
				AND tanggal <= '".$realDate."' 
				AND tanggal >= '".$dateBack."' 
				GROUP BY YEARWEEK(tanggal)";
	//-------------------------
	$ming = 0;
	$loop = 1;
	//-------------------------

	$ex = mysqli_query($connect, $query);
	foreach ($ex as $key) {
		$data[] = $key['totalSale'];
		//$bulan[] = date("F", mktime(0, 0, 0, $key['bulan'], 10));
		$minggu[] = date("F", mktime(0, 0, 0, $key['bulan'], 10))." - minggu ke - ".++$ming;
	}
?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<canvas id="myChart" width="300px" height="150px"></canvas>
			<?php //echo $query; ?>
		</div>
		<div class="col-md-6 offset-md-3"><!-- Lorem --></div>
	</div>
</div>

<?php require '../controller/chart.controller.php'; ?>