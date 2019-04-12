<?php
	$db = "rrgplcom_project";
	$user = "rrgplcom_rrgplcom";
	$password = "rrg29985";
	$host = "localhost";

	$connect = new mysqli($host,$user,$password,$db);
	if ($connect->connect_errno) {
		echo $connect->connect_error;
	}