<?php
	session_start();
	include 'config/conn.php';

	// Clear/ TRUNCATE ALL DATABASE except Table admin , kelastanding & wasit_juri
	$clearJadwalTanding = mysql_query("TRUNCATE TABLE jadwal_tanding");
	$clearJadwalTGR = mysql_query("TRUNCATE TABLE jadwal_tgr");

	$clearKonfirmasi = mysql_query("TRUNCATE TABLE konfirmasi");
	
	$clearNilaiTanding = mysql_query("TRUNCATE TABLE nilai_tanding");
	$clearNilaiTunggal = mysql_query("TRUNCATE TABLE nilai_tunggal");
	$clearNilaiGanda = mysql_query("TRUNCATE TABLE nilai_ganda");
	$clearNilaiRegu = mysql_query("TRUNCATE TABLE nilai_regu");
	
	$clearPeserta = mysql_query("TRUNCATE TABLE peserta");
	$clearUndianTanding = mysql_query("TRUNCATE TABLE undian");
	$clearUndiangTGR = mysql_query("TRUNCATE TABLE undian_tgr");




	//Hapus file gambar dari folder  peserta_akta
	$filesakta = glob('../peserta_akta/*'); //get all file names
	foreach($filesakta as $fileakta) {
    	if(is_file($fileakta))
    	unlink($fileakta); //delete file
	}

	//Hapus file gambar dari folder  peserta_foto
	$filesfoto = glob('../peserta_foto/*'); //get all file names
	foreach($filesfoto as $filefoto) {
    	if(is_file($filefoto))
    	unlink($filefoto); //delete file
	}

	//Hapus file gambar dari folder  peserta_ijazah
	$filesijazah = glob('../peserta_ijazah/*'); //get all file names
	foreach($filesijazah as $fileijazah) {
    	if(is_file($fileijazah))
    	unlink($fileijazah); //delete file
	}

	//Hapus file gambar dari folder  peserta_ktp
	$filesktp = glob('../peserta_ktp/*'); //get all file names
	foreach($filesktp as $filektp) {
    	if(is_file($filektp))
    	unlink($filektp); //delete file
	}

	//Hapus file gambar dari folder buktibayar
	$filesbuktibayar = glob('../buktibayar/*'); //get all file names
	foreach($filesbuktibayar as $filebuktibayar) {
    	if(is_file($filebuktibayar))
    	unlink($filebuktibayar); //delete file
	}


	?>
		<script type="text/javascript">
			alert('Database Berhasil terhapus Seluruhnya.');
			document.location='home.php';
		</script>
		<?php
?>