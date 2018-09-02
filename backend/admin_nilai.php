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
  
<h1>Cetak Form Nilai - Tanding</h1>
<form name="CetakFormNilai" id="CetakFormNilai" method="POST" target="_blank" action="admin_do_nilai.php">
	<table border="0">
	<tr>
		<td><input type="text" name="tgl" id="tgl" value=<?php echo date("Y-m-d"); ?>></td>
		<td>
			<select name="gelanggang" id="gelanggang">
				<option value="">-- Pilih Gelanggang --</option>
				<option value="A">A</option>
				<option value="B">B</option>
				<option value="C">C</option>
			</select>
		</td>
		<td><input type="submit" name="cari" value="Generate"></td>
	</tr>
	</table>
</form>

<h1>Cetak Form Nilai - Tunggal</h1>
<form name="CetakFormNilaiTunggal" id="CetakFormNilaiTunggal" method="POST" target="_blank" action="admin_do_nilai_tunggal.php">
	<table border="0">
	<tr>
		<td><input type="text" name="tgl" id="tgl" value=<?php echo date("Y-m-d"); ?>></td>
		<td><input type="submit" name="cari" value="Generate"></td>
	</tr>
	</table>
</form>

<h1>Cetak Form Nilai - Ganda</h1>
<form name="CetakFormNilaiGanda" id="CetakFormNilaiGanda" method="POST" target="_blank" action="admin_do_nilai_ganda.php">
	<table border="0">
	<tr>
		<td><input type="text" name="nm_kejuaraan" id="nm_kejuaraan" value="Nama Kejuaraan...."></td>
		<td><input type="text" name="tgl" id="tgl" value=<?php echo date("Y-m-d"); ?>></td>
		<td><input type="submit" name="cari" value="Generate"></td>
	</tr>
	</table>
</form>

<h1>Cetak Form Nilai - Regu</h1>
<form name="CetakFormNilaiRegu" id="CetakFormNilaiRegu" method="POST" target="_blank" action="admin_do_nilai_regu.php">
	<table border="0">
	<tr>
		<td><input type="text" name="tgl" id="tgl" value=<?php echo date("Y-m-d"); ?>></td>
		<td><input type="submit" name="cari" value="Generate"></td>
	</tr>
	</table>
</form>


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