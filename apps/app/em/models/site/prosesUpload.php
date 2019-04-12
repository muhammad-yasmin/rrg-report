<?php 
	require '../../../../../config/db_connect.php';
	set_time_limit(100);
	$nama = $_POST['name'];
	$site = $_POST['site'];

	$file = $_FILES['inputFile']['name'];
	$tmp = $_FILES['inputFile']['tmp_name'];


	if(isset($file)){
		if(!empty($file)){
			$loc = "../../../../fileUpload/";
			move_uploaded_file($tmp,$loc.$file);

			if($site == "em"){
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
					$hasil1 = mysqli_query($connect,"INSERT INTO site_configuration VALUES(DEFAULT,'".$nama."','".$site."')");
				} else {
					echo "File gagal diimport";
				}
			} else if($site == "cm"){
				if (($handle = fopen($loc.$file, "r")) !== FALSE) {
					while (($col = fgetcsv($handle, 10000, ",")) !== FALSE) {
						$sql = "INSERT INTO tbl_cm(id_data,tanggal,namaItem)
								values (DEFAULT,'".$col[0]."','".$col[1]."')";
						$hasil = mysqli_query($connect, $sql);
						if (!empty($hasil)) {
							header("Location: ../../../cm/");
							// echo "sukses";
						} else {
							echo "gagal";
						}
					}
					$hasil1 = mysqli_query($connect,"INSERT INTO site_configuration VALUES(DEFAULT,'".$nama."','".$site."')");
				} else {
					echo "File gagal diimport";
				}
			} else if($site == "tm"){
				if (($handle = fopen($loc.$file, "r")) !== FALSE) {
					while (($col = fgetcsv($handle, 10000, ",")) !== FALSE) {
						$sql = "INSERT INTO tbl_tm(id_data,itemID,tanggal,namaItem)
								values (DEFAULT,$col[1],'".date('Y-m-d', strtotime(substr($col[0], 0, 12)))."','".$col[2]."')";
						$hasil = mysqli_query($connect, $sql);
						if (!empty($hasil)) {
							header("Location: ../../../tm/");
						} else {
							echo "gagal";
						}
					}
					$hasil1 = mysqli_query($connect,"INSERT INTO site_configuration VALUES(DEFAULT,'".$nama."','".$site."')");
				} else {
					echo "File gagal diimport";
				}
			}
		} else {
			?>
			<script type="text/javascript">alert("FIle Kosong");</script>
			<?php
		}
	} else {
		?>
		<script type="text/javascript">alert("File Tidak ada");</script>
		<?php
	}
?>
<!-- <script>
	alert("<?php //echo $sql; ?>");
</script> -->