<?php
	session_start();
	include 'config/conn.php';
	
	$ID_peserta = mysql_real_escape_string($_GET["ID_peserta"]);
	
	$hapuspeserta = mysql_query("DELETE FROM peserta WHERE ID_peserta='$ID_peserta'");
	?>
			<script type="text/javascript">
				alert('Berhasil! Data Peserta Telah Dihapus dari Sistem.');
				document.location='home.php';
			</script>
	<?php
?>