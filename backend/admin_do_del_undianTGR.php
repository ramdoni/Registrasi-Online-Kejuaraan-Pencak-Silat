<?php
	session_start();
	include 'config/conn.php';
	
	$id_undiantgr = mysql_real_escape_string($_GET["id_undiantgr"]);
	
	$hapuspesertaundian = mysql_query("DELETE FROM undian_tgr WHERE id_undiantgr='$id_undiantgr'");
	?>
			<script type="text/javascript">
				alert('Berhasil! Nomor Undian Terhapus.');
				document.location='admin_undian_tgr.php';
			</script>
	<?php
?>