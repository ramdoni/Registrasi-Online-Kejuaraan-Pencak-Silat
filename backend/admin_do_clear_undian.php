<?php
	session_start();
	include 'config/conn.php';
	
	$clearTableUndian = mysql_query("TRUNCATE TABLE undian");
	?>
		<script type="text/javascript">
			alert('Data Hasil Pengundian Berhasil Dihapus Seluruhnya.');
			document.location='admin_undian.php';
		</script>
		<?php
?>