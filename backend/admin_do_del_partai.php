<?php
	session_start();
	include 'config/conn.php';
	
	$id_partai = mysql_real_escape_string($_GET["id_partai"]);
	
	$hapuspartai = mysql_query("DELETE FROM jadwal_tanding WHERE id_partai='$id_partai'");
	?>
			<script type="text/javascript">
				alert('Berhasil! Data Partai Telah Dihapus dari Sistem.');
				document.location='admin_jadwal.php';
			</script>
	<?php
?>