<?php
include '../../../../config/db_connect.php';
set_time_limit(300);
$file = $_FILES['inputFile']['name'];
$tmp = $_FILES['inputFile']['tmp_name'];
//$ID = $_POST['id'];


if (isset($file)) {
	if (!empty($file)) {
		$loc = "../../../fileUpload/";
		move_uploaded_file($tmp, $loc.$file);

		if (($handle = fopen($loc.$file, "r")) !== FALSE) {
			while (($col = fgetcsv($handle, 10000, ",")) !== FALSE) {
				$sql = "INSERT INTO tbl_tm(id_data,itemID,tanggal,namaItem)
						values (DEFAULT,$col[1],'".date('Y-m-d', strtotime(substr($col[0], 0, 12)))."','".$col[2]."')";
				$hasil = mysqli_query($connect, $sql);
				if (!empty($hasil)) {
					header("Location: /apps/app/tm/");
				} else {
					echo "gagal";
				}
			}
		} else {
			echo "File gagal diimport";
		}
	}
}