<?php
	session_start();
	include 'config/conn.php';
	
	$oldpass = mysql_real_escape_string($_POST["oldpass"]);
	$newpass = mysql_real_escape_string($_POST["newpass"]);
	$confirmnewpass = mysql_real_escape_string($_POST["confirmnewpass"]);


	if($oldpass == '' OR $newpass == '' OR $confirmnewpass =='') {
		?>
		<script type="text/javascript">
			alert('Data harus diisi semua!');
			document.location='admin_ubah_pass.php';
		</script>
		<?php
		exit;
	}

	$oldpass = md5($oldpass);
	$newpass = md5($newpass);
	$confirmnewpass = md5($confirmnewpass);

	//kueri ke DB, cek kebenaran data password terdahulu
	$kueripass = "SELECT * FROM admin";
	$pass = mysql_query($kueripass);
	$datapass = mysql_fetch_array($pass);

	if($oldpass <> $datapass['password']) {
		?>
		<script type="text/javascript">
			alert('Password Lama Tidak Sesuai!');
			document.location='admin_ubah_pass.php';
		</script>
		<?php
		exit;	
	}

	if($newpass <> $confirmnewpass) {
		?>
		<script type="text/javascript">
			alert('Password Baru Tidak Sesuai!');
			document.location='admin_ubah_pass.php';
		</script>
		<?php
		exit;	
	}

	
	$updatepass = mysql_query(" UPDATE admin SET password='$newpass' WHERE userID=1");
	?>
		<script type="text/javascript">
			alert('Password berhasil diubah! Aplikasi akan Logout otomatis. Silakan, login kembali.');
			document.location='logout.php';
		</script>
		<?php
?>