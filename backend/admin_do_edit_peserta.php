<?php
	session_start();
	include 'config/conn.php';

	//AMBIL VARIABEL
	$ID_peserta = mysql_real_escape_string($_POST["ID_peserta"]);
	$nama = mysql_real_escape_string($_POST["nama"]);
	$jenis_kelamin = mysql_real_escape_string($_POST["jenis_kelamin"]);
	$golongan = mysql_real_escape_string($_POST["golongan"]);
	$kelas_tanding = mysql_real_escape_string($_POST["kelas_tanding"]);
	$kontingen = mysql_real_escape_string(strtoupper($_POST["kontingen"]));

	/*
	echo $ID_peserta;
	echo $nama;
	echo $jenis_kelamin;
	echo $golongan;
	echo $kelas_tanding;
	echo $kontingen;
	*/

	//UPDATE DATA PESERTA
	if($ID_peserta == '' OR $nama == '' OR $jenis_kelamin == '' OR $golongan == '' OR $kelas_tanding == '' OR $kontingen == '')
	{
		?>
		<script type="text/javascript">
			alert('Data harus diisi semua!');
			document.location='home.php';
		</script>
		<?php
		exit;
	}
	
	$ubahpeserta = mysql_query("UPDATE peserta SET nm_lengkap='$nama', jenis_kelamin='$jenis_kelamin',
									golongan='$golongan', kelas_tanding_FK='$kelas_tanding', 
									kontingen='$kontingen'
									WHERE ID_peserta='$ID_peserta'");

	?>
		<script type="text/javascript">
			alert('Database berhasil diubah.');
			document.location='home.php';
		</script>
	<?php
?>