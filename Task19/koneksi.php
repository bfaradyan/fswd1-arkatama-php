<?php
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db = '';

	$conn = mysqli_connect($host, $user, $pass, $db);
	
	if(!$conn){
		echo "Koneksi gagal";
	}

	mysqli_select_db($conn, $db);
?>
