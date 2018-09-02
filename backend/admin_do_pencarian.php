<?php
	session_start();
	$id = $_SESSION['userID']; 
	if(isset($_SESSION["userID"]) ) {
	
	include "config/conn.php";

	$nama = mysql_real_escape_string($_POST["nama"]);
	//$sort = mysql_real_escape_string($_POST["sort"]);
	$golongan = mysql_real_escape_string($_POST["golongan"]);
	$jenis_kelamin = mysql_real_escape_string($_POST["jenis_kelamin"]);
	$kelas_tanding_FK = mysql_real_escape_string($_POST["kelas_tanding_FK"]);

	//Ragam Sortir Data
	//peserta.nm_lengkap
	//peserta.perguruan_FK
	//peserta.kelas_tanding_FK

	//kueri data peserta
	$sqlpeserta ="SELECT * FROM peserta
					INNER JOIN kelastanding ON peserta.kelas_tanding_FK=kelastanding.ID_kelastanding
					WHERE peserta.nm_lengkap LIKE '%$nama%'
					AND peserta.kategori_tanding='Tanding'
					AND peserta.golongan LIKE '%$golongan%'
					AND peserta.jenis_kelamin LIKE '%$jenis_kelamin%'
					AND peserta.kelas_tanding_FK LIKE '%$kelas_tanding_FK'
					ORDER BY peserta.jenis_kelamin,peserta.kelas_tanding_FK ASC";
	$datapeserta = mysql_query($sqlpeserta);
	
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

<h1>Hasil Pencarian Data Peserta Tanding</h1>
<div align="center">
	<table border="1">
	<thead>
		<tr bgcolor="#99CCFF">
			<td>No.</td>
			<td>Nama</td>
			<td>Jenis Kelamin</td>
			<td>TB</td>
			<td>BB</td>
			<td>Keterangan</td>
			<td>Kontingen</td>
			<td>Kelas Tanding</td>
			<td>Golongan</td>
			<td>Lunas</td>
			<td class="non-printable">Control</td>
		</tr>
	</thead>
		<?php $no=0; $paid=0; while($peserta = mysql_fetch_array($datapeserta)) { $no++; ?>
		<tr bgcolor="#eeeeee">
			<td><?php echo $no; ?></td>
			<td><A HREF="admin_detail_tanding.php?ID_peserta=<?php echo $peserta['ID_peserta']; ?>" target="_blank"><?php echo $peserta['nm_lengkap']; ?></A></td>
			<td><?php echo $peserta['jenis_kelamin']; ?></td>
			<td><?php echo $peserta['tb']; ?></td>
			<td><?php echo $peserta['bb']; ?></td>
			<td><?php echo $peserta['asal_sekolah'];
						if($peserta['asal_sekolah']<>'') { echo ", Kelas ";}
					  echo $peserta['kelas']; ?>
			</td>
			<td><?php echo $peserta['kontingen']; ?></td>
			<td><?php echo $peserta['nm_kelastanding']; ?></td>
			<td><?php echo $peserta['golongan']; ?></td>
			<td><?php if($peserta['status']=='PAID') { echo "<IMG SRC=images/check.png></IMG>"; $paid=$paid+1; } ?></td>
			<td class="non-printable">
				<?php 
					if($peserta['status']<>'PAID') { 
						?> 
						<A HREF=admin_do_paid.php?ID_peserta=<?php echo $peserta['ID_peserta']; ?> onclick="return cek_paid();"><IMG SRC=images/dollar.png> </A>
						<?php
					} 
				?>
				<a href=admin_do_del_peserta.php?ID_peserta=<?php echo $peserta['ID_peserta']; ?> onclick="return cek_delete();"> <img src="images/delete.png"></a>
				<a href=admin_edit_peserta.php?ID_peserta=<?php echo $peserta['ID_peserta']; ?> > <img src="images/edit.png"></a>
			</td>
		</tr>
		<?php } ?>
	</table>
	</div>
	<p>Generate data : Sebanyak <?php echo $no; ?> Peserta. Yang telah melunasi biaya pendaftaran sebanyak <?php echo $paid; ?> Peserta. </p>

	<div class="non-printable"><button onclick="window.print()">Cetak Halaman</button></div>
	
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