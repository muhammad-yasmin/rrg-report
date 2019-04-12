<?php
	require_once 'db_connect.php';
	if (!isset($_SESSION)) {
		session_start();
	} else {}

	$user = $_POST['username'];
	$pass = $_POST['password'];

	$query = "SELECT * FROM user WHERE username = '$user' AND password = '$pass'";
	$res = $connect->query($query);
	if ($res->num_rows == 1) {
		$rows = $res->fetch_assoc();
		$_SESSION['usernya'] = $rows['username'];
		$_SESSION['namanya'] = $rows['nama'];
		header('Location: ../apps/app/em/');
		// print_r($rows);
	} else {
		echo "Maaf, anda salah memasukkan usernmae";
	}