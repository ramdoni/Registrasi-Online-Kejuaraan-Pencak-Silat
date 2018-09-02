<?php 
	session_start();
	$id = $_SESSION['userID']; 
	if(isset($_SESSION["userID"]) ) {
	
	include "config/conn.php";

	//PAGING - Tentukan batas, cek halaman dan posisi data.
	$batas = 10;
	$halaman = @$_GET['halaman'];
	if (empty($halaman)) {
	    $posisi = 0;
	    $halaman = 1;
	} else {
	    $posisi = ($halaman - 1) * $batas;
	}

	//query data konfirmasi
	$sqlkonfirmasi = "SELECT * FROM konfirmasi ORDER BY status DESC limit $posisi,$batas";
	$datakonfirmasi = mysql_query("$sqlkonfirmasi");
	
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

<h1>Data Konfirmasi Pembayaran</h1>
<div id="datakonfirmasi" align="center">
	<table>
		<tr bgcolor="#99CCFF">
			<td>No.</td>
			<td>INFO BANK TUJUAN</td>
			<td>INFO PENGIRIM</td>
			<td>STATUS</td>
			<td>CONTROL</td>
		</tr>
		<?php $no=1+$posisi; while($konfirmasi = mysql_fetch_array($datakonfirmasi)) { ; ?>
		<tr bgcolor="#eeeeee">
			<td><?php echo $no; ?></td>
			<td>
				<strong>Bank Tujuan:</strong></br> <?php echo $konfirmasi['bank_tujuan']; ?>
			</td>
			<td>
			<strong>Bank Pengirim:</strong> <?php echo $konfirmasi['bank_pengirim']."</br>"; ?>
			<strong>Rek. Pengirim:</strong> <?php echo $konfirmasi['norek_pengirim']."</br>"; ?>
			<strong>Pengirim:</strong> <?php echo $konfirmasi['nm_pengirim']."/".$konfirmasi['kontak']."</br>"; ?>
			<strong>Tgl. TRF:</strong> <?php echo $konfirmasi['tgl_transfer']."</br>"; ?>
			<strong>Jumlah :</strong> <?php echo $konfirmasi['jumlah']; ?>
			</td>
			<td><?php echo $konfirmasi['status']; ?></td>
			<td><a href=detail_konfirmasi.php?ID_konfirmasi=<?php echo $konfirmasi['ID_konfirmasi']; ?>>Detail</a></td>
		</tr>
		<?php $no++; } ?>
	</table>
	<?php
		// Paging - Hitung Total data dan halaman serta link 1,2,3..
		$paging2 = mysql_query("SELECT * FROM konfirmasi");
		$jmldata = mysql_num_rows($paging2);
		$jmlhalaman = ceil($jmldata/$batas);
		 
		echo"<br \> Halaman : ";
		for($i=1; $i<=$jmlhalaman; $i++){
		    if($i != $halaman){
		        echo"<a href=\"admin_konfirmasi.php?halaman=$i#datakonfirmasi\">$i</a> | ";
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