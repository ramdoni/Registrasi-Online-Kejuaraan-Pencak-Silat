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
  
<h1>Ubah Password Administrator</h1>
<div>
<form name="UbahPass" id="UbahPass" method="POST" action="admin_do_ubah_pass.php">
	<table border="0">
	<tr>
		<td>Password Lama</td>
		<td><input type="password" name="oldpass" id="oldpass"></td>
	</tr>
	<tr>
		<td>Password Baru</td>
		<td><input type="password" name="newpass" id="newpass"></td>
	</tr>
	<tr>
		<td>Konfirmasi Password Baru</td>
		<td><input type="password" name="confirmnewpass" id="confirmnewpass"></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" name="ubahpass" value="Submit"></td>
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