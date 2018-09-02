<?php
	session_start();
	include 'config/conn.php';
	
	$ID_peserta = mysql_real_escape_string($_GET["ID_peserta"]);

	if($ID_peserta == '') {
		?>
		<script type="text/javascript">
			alert('Update Data Gagal!');
			document.location='home.php';
		</script>
		<?php
		exit;
	}
	
	$paidstatus = mysql_query(" UPDATE peserta SET status='PAID' WHERE ID_peserta='$ID_peserta'");
	?>
		<script type="text/javascript">
			alert('DATA APPROVED!');
			document.location='home.php';
		</script>
		<?php
?>