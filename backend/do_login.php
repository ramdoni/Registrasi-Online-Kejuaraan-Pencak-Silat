<?php
include "config/conn.php";
session_start();
// deklarasi variabel
$username = mysql_real_escape_string($_POST["username"]);
$password = $_POST["password"];
$encrip = md5($password);

// jika user mengosongkan Username
if (empty($username)) {
	echo "Anda harus mengisi Username... <br /><br />";
	echo "[ <a href=\"javascript:history.go(-1)\"> Kembali</a> ]";
}
// jika user mengosongkan Password
else if (empty($password)) {
	echo "Anda harus mengisi Password... <br /><br />";
	echo "[ <a href=\"javascript:history.go(-1)\">Kembali </a> ]";
}
// jika semua telah diisi dengan benar
else {
	// buat session "user"
	// misal md5 aktif $password di dolar $sql dan if ganti $encrypt
	$sql=mysql_query("SELECT * FROM admin WHERE username='$username' AND password='$encrip'");
	$temp = mysql_fetch_array($sql);
	if($temp['username']!=$username && $temp['password']!=$encrip)
	{
		?>
		<script type="text/javascript">
			alert('Login Gagal!');
			document.location='index.php';
		</script>
		<?php
		//header("location: index.php?err=Account tidak terdaftar");
	} else {
		$_SESSION['userID'] = $temp['userID'];
		$_SESSION["username"] = $username;
		
		header("location: home.php");
	
	}
}
?>