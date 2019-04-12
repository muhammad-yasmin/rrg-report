<?php 
	include '../../../../../config/db_connect.php';
?>
<table class="table table-hover dataTable w-full" data-plugin="dataTable" id="tabelnya">
	<thead>
		<tr>
			<th>No.</th>
			<th>Site</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$site = mysqli_query($connect,"SELECT * FROM site_configuration");
		$no = 1;
		foreach ($site as $key) {
			?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $key['site']; ?></td>
					<td>
						<button class="btn btn-xs btn-pure" title="Lihat" data-target=".example-modal-lg" data-toggle="modal" onclick="previewSite(<?php echo $key['id_site']; ?>);">
							<i class="icon md-eye"></i>
						</button>
					</td>
				</tr>
			<?php
			//$no++;
		}
		?>
	</tbody>
</table>