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
				$sql = "INSERT INTO tbl_cm(id_data,tanggal,namaItem)
						values (DEFAULT,'".$col[0]."','".$col[1]."')";
				$hasil = mysqli_query($connect, $sql);
				if (!empty($hasil)) {
					header("Location: /apps/app/cm/");
					// echo "sukses";
				} else {
					echo "gagal";
				}
			}
		} else {
			echo "File gagal diimport";
		}
	}
}