<?php
	session_start();
	$id = $_SESSION['userID']; 
	if(isset($_SESSION["userID"]) ) {
	
	include "config/conn.php";

	$idpeserta = mysql_real_escape_string($_GET["ID_peserta"]);
	
	//kueri data peserta
	$sqlpeserta ="SELECT * FROM peserta
					INNER JOIN kelastanding ON peserta.kelas_tanding_FK=kelastanding.ID_kelastanding
					WHERE peserta.ID_peserta='$idpeserta' ";
	$datapeserta = mysql_query($sqlpeserta);
	$data = mysql_fetch_array($datapeserta);
	
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

<h1>Detail Data Peserta Tanding</h1>
<div>
	<table>
	<tr>
		<td colspan="2"><img src="../peserta_foto/<?php echo $data['foto']; ?>" width="120px"></td>
	</tr>
	<tr>
		<td>Nama Lengkap</td>
		<td>: <?php echo $data['nm_lengkap']; ?></td>
	</tr>
	<tr>
		<td>Jenis Kelamin</td>
		<td>: <?php echo $data['jenis_kelamin']; ?></td>
	</tr>
	<tr>
		<td>Tempat / Tgl. Lahir</td>
		<td>: <?php 
		$tanggal = date("j F Y", strtotime($data['tgl_lahir']));
		echo $data['tpt_lahir'].', '.$tanggal; ?>
		</td>
	</tr>
	<tr>
		<td>TB / BB</td>
		<td>: <?php echo $data['tb'].' cm / '.$data['bb'].' kg'; ?></td>
	</tr>
	<tr>
		<td>Keterangan</td>
		<td>: <?php echo $data['asal_sekolah'];
						if($data['asal_sekolah']<>'') { echo ", Kelas ";}
					  echo $data['kelas']; ?> 
		</td>
	</tr>
	<tr>
		<td>Kontingen</td>
		<td>: <?php echo $data['kontingen']; ?></td>
	</tr>
	<tr>
		<td>Kelas Tanding</td>
		<td>: <?php echo $data['nm_kelastanding']; ?></td>
	</tr>
	<tr>
		<td>Golongan</td>
		<td>: <?php echo $data['golongan']; ?></td>
	</tr>
	<tr>
		<td>KTP</td>
		<td>: <img src="../peserta_ktp/<?php echo $data['ktp']; ?>" width="350px"></td>
	</tr>
	<tr>
		<td>Akta Kelahiran</td>
		<td>: <img src="../peserta_akta/<?php echo $data['akta_lahir']; ?>" width="600px"></td>
	</tr>
	<tr>
		<td>Ijazah</td>
		<td>: <img src="../peserta_ijazah/<?php echo $data['ijazah']; ?>" width="600px"></td>
	</tr>
	<tr>
		<td>Status</td>
		<td>: <?php echo $data['status']; ?></td>
	</tr>
	<tr class="non-printable">
		<td>
			<?php 
				if($data['status']<>'PAID') { 
				?> 
				<A HREF=admin_do_paid.php?ID_peserta=<?php echo $data['ID_peserta']; ?> onclick="return cek_paid();"><IMG SRC=images/dollar.png> </A>
				<?php
				} 
			?>
		</td>
		<td><a href=admin_do_del_peserta.php?ID_peserta=<?php echo $data['ID_peserta']; ?> onclick="return cek_delete();"> <img src="images/delete.png"></a></td>
	</tr>
	</table>
</div>

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