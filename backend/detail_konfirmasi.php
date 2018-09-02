<?php 
	session_start();
	$id = $_SESSION['userID']; 
	if(isset($_SESSION["userID"]) ) {
	
	include "config/conn.php";

	$ID_konfirmasi = mysql_real_escape_string($_GET["ID_konfirmasi"]);

	//query data konfirmasi
	$sqlkonfirmasi = "SELECT * FROM konfirmasi WHERE ID_konfirmasi='$ID_konfirmasi'";
	$datakonfirmasi = mysql_query("$sqlkonfirmasi");
	$konfirmasi = mysql_fetch_array($datakonfirmasi);
	
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

<strong>BANK TUJUAN :</strong> <?php echo $konfirmasi['bank_tujuan']."</br>"; ?>
<strong>BANK PENGIRIM :</strong> <?php echo $konfirmasi['bank_pengirim']."</br>"; ?>
<strong>NO.REK PENGIRIM :</strong> <?php echo $konfirmasi['norek_pengirim']."</br>"; ?>
<strong>NAMA PENGIRIM :</strong><?php echo $konfirmasi['nm_pengirim']."</br>"; ?>
<strong>KONTAK :</strong><?php echo $konfirmasi['kontak']."</br>"; ?>
<strong>TGL TRANSFER : </strong> <?php echo $konfirmasi['tgl_transfer']."</br>"; ?>
<strong>JUMLAH : </strong><?php echo $konfirmasi['jumlah']."</br>"; ?>
<strong>BUKTI : </strong></br> <img src=../buktibayar/<?php echo $konfirmasi['bukti']; ?> height="500px"></img></br>
<strong>CATATAN : </strong> <p><?php echo $konfirmasi['catatan']; ?></p></BR>
<strong>Date Post: </strong> <?php echo $konfirmasi['datetime']."</br>"; ?>
<strong>STATUS :</strong><?php echo $konfirmasi['status']; ?> </br> <A HREF=approve_konfirmasi.php?ID_konfirmasi=<?php echo $konfirmasi['ID_konfirmasi']; ?>> >>APPROVE DATA<<</A>

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