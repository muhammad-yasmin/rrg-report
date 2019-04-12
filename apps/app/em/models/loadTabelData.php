<?php 
	include '../../../../config/db_connect.php';
	$from = $_POST['dari'];
	$to = $_POST['hingga'];

	$realFrom = date("Y-m-d", strtotime($from));
	$realTo = date("Y-m-d", strtotime($to));
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
		$sql = "SELECT itemID, namaItem, count(namaItem) AS totalSale 
				FROM tbl_em 
				WHERE type='Sale' 
				AND tanggal <= '".$realTo."' 
				AND tanggal >= '".$realFrom."' 
				GROUP BY namaItem
				ORDER BY totalSale DESC";
		//echo $sql;
		$ex = mysqli_query($connect, $sql);
		foreach ($ex as $key) {
			?>
				<tr>
					<td><?php echo $key['namaItem']; ?></td>
					<td><?php echo $key['totalSale']; ?></td>
					<td>
						<button class="btn btn-xs btn-pure" title="Lihat Grafik" data-target=".example-modal-lg" data-toggle="modal" onclick="preview(<?php echo $key['itemID']; ?>,0,'<?php echo $from; ?>','<?php echo $to; ?>');">
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