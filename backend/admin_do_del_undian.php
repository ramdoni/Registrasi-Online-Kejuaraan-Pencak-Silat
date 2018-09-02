<?php
	session_start();
	include 'config/conn.php';
	
	$id_undian = mysql_real_escape_string($_GET["id_undian"]);
	
	$hapuspesertaundian = mysql_query("DELETE FROM undian WHERE id_undian='$id_undian'");
	?>
			<script type="text/javascript">
				alert('Berhasil! Nomor Undian Terhapus.');
				document.location='admin_undian.php';
			</script>
	<?php
?>