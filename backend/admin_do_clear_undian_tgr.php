<?php
	session_start();
	include 'config/conn.php';
	
	$clearTableUndian = mysql_query("TRUNCATE TABLE undian_tgr");
	?>
		<script type="text/javascript">
			alert('Data Hasil Pengundian TGR Berhasil Dihapus Seluruhnya.');
			document.location='admin_undian_tgr.php';
		</script>
		<?php
?>