<?php
	/*
	*---------------------------------------------------------------
	* E-REGISTRASI PENCAK SILAT Versi 18.07
	*---------------------------------------------------------------
	* This program is free software; you can redistribute it and/or
	* modify it under the terms of the GNU General Public License
	* as published by the Free Software Foundation; either version 2
	* of the License, or (at your option) any later version.
	*
	* This program is distributed in the hope that it will be useful,
	* but WITHOUT ANY WARRANTY; without even the implied warranty of
	* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
	* GNU General Public License for more details.
	*
	* You should have received a copy of the GNU General Public License
	* along with this program; if not, write to the Free Software
	* Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
	*
	* @Author Yudha Yogasara
	* yudha.yogasara@gmail.com
	* @Contributor Sofyan Hadi, Satria Salam
	*
	* IPSI KABUPATEN TANGERANG
	* SALAM OLAHRAGA
	*/


	$hostname = mysql_real_escape_string($_POST["hostname"]);
	$db_user = mysql_real_escape_string($_POST["db_user"]);
	$db_password = mysql_real_escape_string($_POST["db_password"]);
	$database_name = mysql_real_escape_string($_POST["database_name"]);

	if($hostname == "" OR $db_user == "" OR $database_name == "") {
		?>
		<script type="text/javascript">
			alert('INSTALLASI GAGAL. Data Wajib Dilengkapi semua!');
			document.location='index.php';
		</script>
		<?php
		exit;
	}

  	$sqlErrorCode = 0;
  	$sqlFileToExecute = 'simulasi.sql';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registrasi Pencak Silat</title>
<!-- CSS Files -->
    <link href="css/reset.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/stylesheet.css" rel="stylesheet" type="text/css" media="all" />
	
</head>
<body>
<!-- Start Wrapper -->
<div id="wrapper">
  <?php 
	include "headmenu.php";
  ?>

<h1>PROSES INSTALASI</h1>
<?php

	$link = mysql_connect($hostname, $db_user, $db_password);
  if (!$link) {
    die ("Koneksi gagal! Database tidak dapat terhubung.");
  }
   
  // Make database_name the current database
  $db_selected = mysql_select_db($database_name, $link);

  if (!$db_selected) {
    // If we couldn't, then it either doesn't exist, or we can't see it.
    $sql = 'CREATE DATABASE '.$database_name;

    if (mysql_query($sql, $link)) {
        echo "Database ".$database_name." berhasil dibuat. <br/>";
    } else {
        echo 'Terjadi error saat pembuatan database: ' . mysql_error() . "<br/>";
    }
  }

  mysql_select_db($database_name, $link) or die ("Gagal! Nama database tidak ditemukan. <br/>");
   
  // read the sql file
  $f = fopen($sqlFileToExecute,"r+");
  $sqlFile = fread($f, filesize($sqlFileToExecute));
  $sqlArray = explode(';',$sqlFile);
  foreach ($sqlArray as $stmt) {
    if (strlen($stmt)>3 && substr(ltrim($stmt),0,2)!='/*') {
      $result = mysql_query($stmt);
      if (!$result) {
        $sqlErrorCode = mysql_errno();
        $sqlErrorText = mysql_error();
        $sqlStmt = $stmt;
        break;
      }
    }
  }

  if ($sqlErrorCode == 0) {
    echo "<br/>Installasi Sukses! Demi keamanan sistem, segera hapus folder <strong>install</strong>.<br/>";
  } else {
    echo "An error occured during installation!<br/>";
    echo "Error code: $sqlErrorCode<br/>";
    echo "Error text: $sqlErrorText<br/>";
    echo "Statement:<br/> $sqlStmt<br/>";
  }

mysql_close($link);

?>

<!-- start: footer -->
<div id="footer">
	<p>Copyleft 2016 <?php echo " - ".date("Y"); ?> <a href="developer.php">IPSI Kabupaten Tangerang</a> </p>
	<!-- end: footer -->
</div>
<!-- end: footer -->
</div>
  </body>
</html>