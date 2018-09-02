<?php
	include '../backend/config/conn.php';

	$pemenang = mysql_real_escape_string($_POST["pemenang"]);
	$id_partai = mysql_real_escape_string($_POST["id_partai"]);
	
	$skorakhirmerah = mysql_real_escape_string($_POST["skorakhirmerah"]);
	$skorakhirbiru = mysql_real_escape_string($_POST["skorakhirbiru"]);
	$skorakhir = "( ".$skorakhirmerah."-".$skorakhirbiru." )";
	

	if($pemenang == '' OR $id_partai == '')
	{
		?>
		<script type="text/javascript">
			alert('Gagal!');
			document.location='index.php';
		</script>
		<?php
		exit; 
	}
	
	$update = mysql_query("UPDATE jadwal_tanding SET status='$skorakhir', pemenang='$pemenang' WHERE id_partai='$id_partai'");

	?>
		<script type="text/javascript">
			alert('Nilai berhasil tersimpan.');
			document.location='index.php';
		</script>
	<?php
?>