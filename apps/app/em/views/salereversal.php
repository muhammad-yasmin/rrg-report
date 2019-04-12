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
							<th>No.</th>
							<th>Nama Item</th>
							<th>tanggal</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$saleReversal = mysqli_query($connect,"SELECT namaItem, tanggal FROM tbl_em WHERE type='Sale Reversal' ORDER BY tanggal ASC");
						$no = 1;
						foreach ($saleReversal as $key) {
							?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $key['namaItem']; ?></td>
									<td><?php echo date("l, d - M - Y", strtotime($key['tanggal'])); ?></td>
								</tr>
							<?php
							//$no++;
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