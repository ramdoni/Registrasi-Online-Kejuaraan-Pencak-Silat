<?php
	$username = 'root'; //nama user database
	$password = ''; //password database
	$nama_database = 'simulasi'; //nama database

	$koneksi = mysql_connect("localhost", $username, $password);

	if (!$koneksi) die ("Tidak bisa terhubung ke database: " . mysql_error());
	mysql_select_db($nama_database, $koneksi);
?>
