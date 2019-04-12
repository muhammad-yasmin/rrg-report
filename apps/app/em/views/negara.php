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
							<th>Negara</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$country = mysqli_query($connect,"SELECT negara FROM tbl_em WHERE NOT negara = '' GROUP BY negara ORDER BY negara ASC");
						$no = 1;
						foreach ($country as $key) {
							?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $key['negara']; ?></td>
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