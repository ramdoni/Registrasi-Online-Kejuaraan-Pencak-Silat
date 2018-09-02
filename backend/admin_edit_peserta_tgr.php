<?php
	session_start();
	$id = $_SESSION['userID']; 
	if(isset($_SESSION["userID"]) ) {
	
	include "config/conn.php";

	$ID_peserta = mysql_real_escape_string($_GET["ID_peserta"]);

	//kueri mencari peserta
	$sqlpeserta ="SELECT * FROM peserta
					WHERE peserta.ID_peserta = '$ID_peserta' ";
	$datapeserta = mysql_query($sqlpeserta);
	$peserta = mysql_fetch_array($datapeserta);
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registrasi Pencak Silat</title>
<!-- CSS Files -->
    <link href="css/reset.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/stylesheet.css" rel="stylesheet" type="text/css" media="all" />

    <!-- BAYAR Confirm Function -->	
	<script>
		function cek_paid()
		{
			if(confirm('Yakin Peserta Sudah Melunasi Biaya Pendaftaran ?')){
				return true;
			} else {
				return false;
			}
		}
	</script>

	<!-- DELETE Confirm Function -->	
	<script>
		function cek_delete()
		{
			if(confirm('Yakin Akan Menghapus Data Peserta ?')){
				return true;
			} else {
				return false;
			}
		}
	</script>
	
</head>
<body>
<!-- Start Wrapper -->
<div id="wrapper">
  <?php 
	include "headmenu.php";
  ?>

<h1>EDIT Peserta TGR</h1>
<div>
<form name="EditPeserta" id="EditPeserta" method="POST" action="admin_do_edit_peserta_tgr.php">
	<table border="1">
		<tr>
			<td>Nama Peserta</td>
			<td><input type="text" name="nama" id="nama" maxlength="35" value="<?php echo $peserta["nm_lengkap"]; ?>">
				<input type="hidden" name="ID_peserta" id="ID_peserta" value="<?php echo $ID_peserta; ?>">
			</td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			<td>
				<select name="jenis_kelamin" id="jenis_kelamin">
					<option value="Laki-laki" <?php if($peserta["golongan"]=="Laki-laki") { echo "selected"; } ?>>Laki-laki</option>
					<option value="Perempuan" <?php if($peserta["jenis_kelamin"]=="Perempuan") { echo "selected"; } ?>>Perempuan</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Golongan</td>
			<td>
				<select name="golongan" id="golongan">
					<option value="Usia Dini" <?php if($peserta["golongan"]=="Usia Dini") { echo "selected"; } ?>>Usia Dini</option>
					<option value="Pra Remaja" <?php if($peserta["golongan"]=="Pra Remaja") { echo "selected"; } ?>>Pra Remaja</option>
					<option value="Remaja" <?php if($peserta["golongan"]=="Remaja") { echo "selected"; } ?>>Remaja</option>
					<option value="Dewasa" <?php if($peserta["golongan"]=="Dewasa") { echo "selected"; } ?>>Dewasa</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Kategori</td>
			<td>
				<?php echo $peserta['kategori_tanding']; ?>
			</td>
		</tr>
		<tr>
			<td>Kontingen</td>
			<td><input type="text" name="kontingen" id="kontingen" value="<?php echo $peserta["kontingen"] ?>"></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name="update" value="UPDATE"></td>
		</tr>
	</table>
</form>
</div>
	
	<style style="text/css">
	@media print
    {
    	.non-printable { display: none; }
    	.printable { display: block; }
    }
	</style>


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