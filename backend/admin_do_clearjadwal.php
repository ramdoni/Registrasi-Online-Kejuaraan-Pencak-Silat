<?php
	session_start();
	include 'config/conn.php';
	
	$clearTableJadwal = mysql_query("TRUNCATE TABLE jadwal_tanding");
	$clearNilaiTanding = mysql_query("TRUNCATE TABLE nilai_tanding");
	
	?>
		<script type="text/javascript">
			alert('Data Terhapus.');
			document.location='admin_jadwal.php';
		</script>
		<?php
?>