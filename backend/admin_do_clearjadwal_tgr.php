<?php
	session_start();
	include 'config/conn.php';
	
	$clearTableJadwalTGR = mysql_query("TRUNCATE TABLE jadwal_tgr");
	$clearNilaiTunggal = mysql_query("TRUNCATE TABLE nilai_tunggal");
	$clearNilaiGanda = mysql_query("TRUNCATE TABLE nilai_ganda");
	$clearNilaiRegu = mysql_query("TRUNCATE TABLE nilai_regu");
	
	?>
		<script type="text/javascript">
			alert('Data Terhapus.');
			document.location='admin_jadwal_tgr.php';
		</script>
		<?php
?>