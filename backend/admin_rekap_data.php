<?php 
	session_start();
	$id = $_SESSION['userID']; 
	if(isset($_SESSION["userID"]) ) {
	include "config/conn.php";
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BACKEND REGISTRASI SILAT</title>
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
  
  <h1>Rekap Data Peserta - Tanding</h1>
<div>
	<form name="CariPeserta" id="CariPeserta" method="POST" action="admin_do_rekap.php">
	<table border="0">
	<tr>
		<td>
			<select name="golongan" id="golongan">
				<option value="Usia Dini">Usia Dini</option>
				<option value="Pra Remaja">Pra Remaja</option>
				<option value="Remaja">Remaja</option>
				<option value="Dewasa">Dewasa</option>
			</select>
		</td>
		<td>
			<select name="jenis_kelamin" id="jenis_kelamin">
				<option value="">-- Pilih Jenis Kelamin --</option>
				<option value="Laki-laki">Laki-laki</option>
				<option value="Perempuan">Perempuan</option>
			</select>
		</td>
		<td>
			<select name="kelas_tanding_FK" id="kelas_tanding_FK">
				<option value="">-- Pilih Kelas Tanding --</option>
				<option value="1">Kelas A</option>
				<option value="2">Kelas B</option>
				<option value="3">Kelas C</option>
				<option value="4">Kelas D</option>
				<option value="5">Kelas E</option>
				<option value="6">Kelas F</option>
				<option value="7">Kelas G</option>
				<option value="8">Kelas H</option>
				<option value="9">Kelas I</option>
				<option value="10">Kelas J</option>
			</select>
		</td>
		<td><input type="submit" name="cari" value="DOWNLOAD"></td>
	</tr>
	</table>
	</form>
</div>

  <h1>Rekap Data Peserta - TGR</h1>
<div>
	<form name="CariPeserta" id="CariPeserta" method="POST" action="admin_do_rekap_tgr.php">
	<table border="0">
	<tr>
		<td>
			<select name="golongan" id="golongan">
				<option value="Usia Dini">Usia Dini</option>
				<option value="Pra Remaja">Pra Remaja</option>
				<option value="Remaja">Remaja</option>
				<option value="Dewasa">Dewasa</option>
			</select>
		</td>
		<td>
			<select name="jenis_kelamin" id="jenis_kelamin">
				<option value="">-- Pilih Jenis Kelamin --</option>
				<option value="Laki-laki">Laki-laki</option>
				<option value="Perempuan">Perempuan</option>
			</select>
		</td>
		<td>
			<select name="kategori_tanding" id="kategori_tanding">
				<option value="">-- Pilih Kategori Tanding --</option>
				<option value="Tunggal">Tunggal</option>
				<option value="Ganda">Ganda</option>
				<option value="Regu">Regu</option>
			</select>
		</td>
		<td><input type="submit" name="cari" value="DOWNLOAD"></td>
	</tr>
	</table>
	</form>
</div>

<!-- start: footer -->
<div id="footer">
	<p>Copyleft 2016 <?php echo " - ".date("Y"); ?> IPSI Kabupaten Tangerang </p>
	<!-- end: footer -->
</div>
<!-- end: footer -->
</div>
  </body>
</html>
<?php 
	}
	else { 
		header("location:index.php");
	}
?>