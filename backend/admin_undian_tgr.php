<?php 
	session_start();
	$id = $_SESSION['userID']; 
	if(isset($_SESSION["userID"]) ) {
	include "config/conn.php";


	//cari pengundian data
	$sqlhasilundian = "SELECT * FROM undian_tgr
						INNER JOIN peserta ON peserta.kode_gr=undian_tgr.idpesertatgr
						ORDER BY undian_tgr.id_undiantgr DESC";
	$carihasilundian = mysql_query($sqlhasilundian);
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BACKEND REGISTRASI SILAT</title>
<!-- CSS Files -->
    <link href="css/reset.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/spinner.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/stylesheet.css" rel="stylesheet" type="text/css" media="all" />

    <!-- DELETE Confirm Function -->	
	<script>
		function cek_delete()
		{
			if(confirm('Yakin Nomor Undian Peserta Akan dihapus?')){
				return true;
			} else {
				return false;
			}
		}
	</script>
	<script>
		function cek_clear()
		{
			if(confirm('SEMUA hasil pengundian akan TERHAPUS. Yakin?')){
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
  
<h1>Pengundian TGR</h1>
<div align="center">
	<form name="UndianPeserta" id="UndianPeserta" method="POST" action="admin_do_undian_tgr.php">
	<table border="0">
	<tr>
		<td>
			<select name="golongan" id="golongan">
				<option value="">--- Pilih Golongan ---</option>
				<option value="Usia Dini">Usia Dini</option>
				<option value="Pra Remaja">Pra Remaja</option>
				<option value="Remaja">Remaja</option>
				<option value="Dewasa">Dewasa</option>
			</select>
		</td>
		<td>
			<select name="jenis_kelamin" id="jenis_kelamin">
				<option value="">--- Pilih Putra/Putri ---</option>
				<option value="Laki-laki">Putra</option>
				<option value="Perempuan">Putri</option>
			</select>
		</td>
		<td>
			<select name="kategori_tanding" id="kategori_tanding">
				<option value="">--- Pilih Kategori ---</option>
				<option value="Tunggal">Tunggal</option>
				<option value="Ganda">Ganda</option>
				<option value="Regu">Regu</option>
			</select>
		</td>
	</tr>
	<tr>
		<td colspan="3"><input type="submit" name="kocok" value="SHUFFLE"></td>
	</tr>
	</table>
	</form>
</div>

<div id="spinner" style="visibility: hidden;"class="spinner">
	<h1>...Mengundi Peserta...</h1>
	<div class="bounce1"></div>
	<div class="bounce2"></div> 
	<div class="bounce3"></div>
</div>

<script type="text/javascript">
	$('#UndianPeserta').submit(function() {
	    $('#spinner').css('visibility', 'visible');
	    return true;
	});
</script>

<h1>Hasil Pengundian TGR</h1>
<A HREF ="admin_do_clear_undian_tgr.php" onclick="return cek_clear();">CLEAR ALL - HASIL UNDIAN</A>

<div id="hasilpengundian" align="center">
	<table>
		<tr bgcolor="#99CCFF">
			<td>#</td>
			<td>NAMA PESILAT</td>
			<td>GOLONGAN</td>
			<td>KATEGORI</td>
			<td>KONTINGEN</td>
			<td>NO UNDIAN</td>
			<td>CONTROL</td>
		</tr>
		<?php $no=0; while($hasilundian = mysql_fetch_array($carihasilundian)) { ; ?>
		<tr bgcolor="#eeeeee">
			<td><?php echo $no+1; ?></td>
			<td><?php echo $hasilundian['nm_lengkap']; ?></td>
			<td><?php echo $hasilundian['golongan'] ?></td>
			<td><?php echo $hasilundian['kategori_tanding']." / "; 
						if($hasilundian['jenis_kelamin']=='Laki-laki') { echo "Putra"; } else { echo "Putri" ;} ?></td>
			<td><?php echo $hasilundian['kontingen'] ?></td>
			<td><?php echo $hasilundian['no_undian'] ?></td>
			<td><a href=admin_do_del_undianTGR.php?id_undiantgr=<?php echo $hasilundian['id_undiantgr']; ?> onclick="return cek_delete();"><img src="images/delete.png"></a></td>
		</tr>
		<?php $no++; } ?>
	</table>
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