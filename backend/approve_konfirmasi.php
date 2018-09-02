<?php
	session_start();
	include 'config/conn.php';
	
	$ID_konfirmasi = mysql_real_escape_string($_GET["ID_konfirmasi"]);

	if($ID_konfirmasi == '') {
		?>
		<script type="text/javascript">
			alert('Update Data Gagal!');
			document.location='admin_konfirmasi.php';
		</script>
		<?php
		exit;
	}
	
	$approvekonfirmasi = mysql_query(" UPDATE konfirmasi SET status='CLOSED' WHERE ID_konfirmasi='$ID_konfirmasi'");
	?>
		<script type="text/javascript">
			alert('DATA APPROVED!');
			document.location='admin_konfirmasi.php';
		</script>
		<?php
?>