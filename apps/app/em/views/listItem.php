<?php 
	include '../../../config/db_connect.php';
?>
<div class="container-fluid row">
	<div class="col-md-12">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">Daftar Item</h3>
			</div>
			<div class="panel-body">
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
						$sql = "SELECT itemID, namaItem, count(namaItem) AS totalSale FROM tbl_em WHERE type='Sale' GROUP BY namaItem";
						// echo $sql;
						$ex = mysqli_query($connect, $sql);
						foreach ($ex as $key) {
							?>
								<tr>
									<td><?php echo $key['namaItem']; ?></td>
									<td><?php echo $key['totalSale']; ?></td>
									<td><button class="btn btn-xs btn-pure" title="Lihat Grafik" onclick="preview(<?php echo $key['itemID']; ?>);"><i class="icon md-eye"></i></button></td>
								</tr>
							<?php
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$("#tabelnya").dataTable();
	});
</script>