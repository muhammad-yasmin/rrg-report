<?php 
	include '../../../../config/db_connect.php';
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
		// $tahun = date("Y");
		// $bulan = date("m");
		// $sql = "SELECT namaItem, count(namaItem) AS totalSale FROM tbl_cm AND tanggal <= '".$tahun."-".$bulan."-31' AND tanggal >= '".$tahun."-".$bulan."-01' GROUP BY namaItem";
		// $ex = mysqli_query($connect, $sql);
		// foreach ($ex as $key) {
			?>
				<tr>
					<td><?php //echo $key['namaItem']; ?></td>
					<td><?php //echo $key['totalSale']; ?></td>
					<td><button class="btn btn-xs btn-pure" title="Lihat Grafik" onclick="preview(0);"><i class="icon md-eye"></i></button></td>
				</tr>
			<?php
		//}
		?>
	</tbody>
</table>