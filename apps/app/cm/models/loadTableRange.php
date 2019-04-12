<?php 
	include '../../../../config/db_connect.php';
	$range = $_POST['rangenya'];
	//-------------------------
	$realDate = "";
	$dateBack = "";
	//-------------------------

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
?>
<table class="table table-hover dataTable w-full" data-plugin="dataTable" id="tabelnya">
	<thead>
		<tr>
			<th>Item</th>
			<th>Total Sale(s)</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$sql = "SELECT id_data, namaItem, count(namaItem) AS totalSale
				FROM tbl_cm 
				WHERE tanggal <= '".$realDate."' 
				AND tanggal >= '".$dateBack."' 
				GROUP BY namaItem";
		//echo $sql;
		$ex = mysqli_query($connect, $sql);
		foreach ($ex as $key) {
			?>

				<tr>
					<td><?php echo $key['namaItem']; ?></td>
					<td><?php echo $key['totalSale']; ?></td>
					<td>
						<button class="btn btn-xs btn-pure" title="Lihat Grafik" data-target=".example-modal-lg" data-toggle="modal" onclick="preview('<?php echo $key['namaItem']; ?>',<?php echo $range; ?>,0,0);">
							<i class="icon md-eye"></i>
						</button>
					</td>
				</tr>
			<?php
		}
		?>
	</tbody>
</table>

<script type="text/javascript">
	$(document).ready(function(){
		$("#tabelnya").dataTable();
	});
</script>