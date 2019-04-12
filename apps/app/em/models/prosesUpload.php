<?php
include '../../../../config/db_connect.php';
set_time_limit(300);
$file = $_FILES['inputFile']['name'];
$tmp = $_FILES['inputFile']['tmp_name'];

if (isset($file)) {
	if (!empty($file)) {
		$loc = "../../../fileUpload/";
		move_uploaded_file($tmp, $loc.$file);

		if (($handle = fopen($loc.$file, "r")) !== FALSE) {
			while (($col = fgetcsv($handle, 10000, ",")) !== FALSE) {
				$sql = "INSERT INTO tbl_em(id_data,itemID,type,tanggal,namaItem,negara)
						values (DEFAULT,$col[4],'".$col[2]."','".substr($col[0], 0, 10)."','".$col[3]."','".$col[15]."')";
				$hasil = mysqli_query($connect, $sql);
				if (!empty($hasil)) {
					header("Location: /apps/app/em/");
				} else {
					echo "gagal";
				}
			}
		} else {
			echo "File gagal diimport";
		}
	}
}