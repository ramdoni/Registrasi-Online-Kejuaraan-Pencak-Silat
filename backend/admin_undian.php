<?php 
	session_start();
	$id = $_SESSION['userID']; 
	if(isset($_SESSION["userID"]) ) {
	include "config/conn.php";

	//cari data kelas tanding
	$sqlkelastanding = "SELECT * FROM kelastanding";
	$carikelastanding = mysql_query($sqlkelastanding);

	//PAGING - Tentukan batas, cek halaman dan posisi data.
	$batas = 30;
	$halaman = @$_GET['halaman'];
	if (empty($halaman)) {
	    $posisi = 0;
	    $halaman = 1;
	} else {
	    $posisi = ($halaman - 1) * $batas;
	}

	//cari pengundian data
	$sqlhasilundian = "SELECT * FROM undian 
						INNER JOIN peserta ON peserta.ID_peserta=undian.id_peserta 
						INNER JOIN kelastanding ON peserta.kelas_tanding_FK=kelastanding.ID_kelastanding
						ORDER BY undian.id_undian DESC limit $posisi,$batas";
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

<h1><A HREF="admin_undian_tgr.php">Pengundian TGR</A></h1>
<h1><A HREF="admin_undian.php">Pengundian Nomor Peserta Tanding</A></h1>
<div align="center">
	<form name="UndianPeserta" id="UndianPeserta" method="POST" action="admin_do_undian.php">
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
				<option value="">--- Pilih Putra/Putri ---</option>
				<option value="Laki-laki">Putra</option>
				<option value="Perempuan">Putri</option>
			</select>
		</td>
		<td>
			<select name="kelas_tanding" id="kelas_tanding">
				<option value="">--- Pilih Kelas Tanding ---</option>
				<?php while($kelastanding = mysql_fetch_array($carikelastanding)) { ?>
				<option value="<?php echo $kelastanding[0]; ?>"><?php echo $kelastanding[1]; ?></option>
				<?php } ?>
		</select>
		</td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" name="kocok" value="SHUFFLE"></td>
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

<h1>Hasil Pengundian Peserta Tanding</h1>
<A HREF ="admin_do_clear_undian.php" onclick="return cek_clear();">CLEAR ALL - HASIL UNDIAN</A>
<div id="hasilpengundian" align="center">
	<table>
		<tr bgcolor="#99CCFF">
			<td>#</td>
			<td>NAMA PESILAT</td>
			<td>GOLONGAN</td>
			<td>KELAS TANDING</td>
			<td>KONTINGEN</td>
			<td>NO UNDIAN</td>
			<td>CONTROL</td>
		</tr>
		<?php $no=1+$posisi; while($hasilundian = mysql_fetch_array($carihasilundian)) { ; ?>
		<tr bgcolor="#eeeeee">
			<td><?php echo $no; ?></td>
			<td><?php echo $hasilundian['nm_lengkap']; ?></td>
			<td><?php echo $hasilundian['golongan'] ?></td>
			<td><?php echo $hasilundian['nm_kelastanding']." / "; 
						if($hasilundian['jenis_kelamin']=='Laki-laki') { echo "Putra"; } else { echo "Putri" ;} ?></td>
			<td><?php echo $hasilundian['kontingen'] ?></td>
			<td><?php echo $hasilundian['no_undian'] ?></td>
			<td><a href=admin_do_del_undian.php?id_undian=<?php echo $hasilundian['id_undian']; ?> onclick="return cek_delete();"><img src="images/delete.png"></a></td>
		</tr>
		<?php $no++; } ?>
	</table>
	<?php
		// Paging - Hitung Total data dan halaman serta link 1,2,3..
		$paging2 = mysql_query("SELECT * FROM undian");
		$jmldata = mysql_num_rows($paging2);
		$jmlhalaman = ceil($jmldata/$batas);
		 
		echo"<br \> Halaman : ";
		for($i=1; $i<=$jmlhalaman; $i++){
		    if($i != $halaman){
		        echo"<a href=\"admin_undian.php?halaman=$i#hasilpengundian\">$i</a> | ";
		    }else{
		        echo"<b>$i</b> | ";
		    }
		} 
		    echo "Total Data : <b>$jmldata</b>";
	?>
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