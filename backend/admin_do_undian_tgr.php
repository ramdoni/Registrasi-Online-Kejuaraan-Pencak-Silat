<?php
session_start();
$id = $_SESSION['userID']; 
if(isset($_SESSION["userID"]) ) {

	include 'config/conn.php';
	
	$golongan = mysql_real_escape_string($_POST["golongan"]);
	$jenis_kelamin = mysql_real_escape_string($_POST["jenis_kelamin"]);
	$kategori_tanding = mysql_real_escape_string($_POST["kategori_tanding"]);

	//Tidur dulu ah 7 detik
	sleep(7);
	
	if($golongan == '' OR $jenis_kelamin == '' OR $kategori_tanding == '') {
		?>
		<script type="text/javascript">
			alert('GAGAL. Filter Data Tidak Lengkap!');
			document.location='admin_undian_tgr.php';
		</script>
		<?php
		exit;
	}

	//QUERY PERIKSA DATA PESERTA SUDAH DIUNDI ATAU BELUM PADA TABEL UNDIAN
	$sqlcaripeserta = "SELECT * FROM undian_tgr
						INNER JOIN peserta ON undian_tgr.idpesertatgr=peserta.kode_gr
						WHERE golongan = '$golongan' 
						AND jenis_kelamin = '$jenis_kelamin'
						AND kategori_tanding = '$kategori_tanding'";
	$caripeserta = mysql_query($sqlcaripeserta);
	
	while($peserta = mysql_fetch_array($caripeserta)) {
		if ($peserta['idpesertatgr'] == $peserta['kode_gr']) {
				?>
				<script type="text/javascript">
					alert('GAGAL. Ditemukan data peserta sudah pernah diundi.');
					document.location='admin_undian_tgr.php';
				</script>
				<?php
				exit;
			}
	}
	
	// ***************************************** //
	//hitung jumlah peserta kelas
	$sqlcountputraA = "SELECT DISTINCT(kode_gr) FROM peserta 
					WHERE golongan = '$golongan' 
					AND jenis_kelamin = '$jenis_kelamin'
					AND kategori_tanding = '$kategori_tanding' 
					AND status = 'PAID'";
	$countputraA = mysql_query($sqlcountputraA);
	$jumlahputraA = mysql_num_rows($countputraA);	
	
	//BLOCK JIKA PESERTA PADA KELOMPOK TIDAK DITEMUKAN
	if ($jumlahputraA == 0) {
				?>
				<script type="text/javascript">
					alert('GAGAL. Peserta tidak ditemukan pada kelompok tersebut.');
					document.location='admin_undian_tgr.php';
				</script>
				<?php
				exit;
	}

	//mulai mengundi (shuffle)
	$numbersputraA = range(1, $jumlahputraA);
	shuffle($numbersputraA);
	
	
	//cari data peserta kelas & INSERT NO UNDIAN KE TABEL UNDIAN
	$sqlpesertaAputra = "SELECT DISTINCT(kode_gr) FROM peserta
						WHERE golongan = '$golongan' 
						AND jenis_kelamin = '$jenis_kelamin'
						AND kategori_tanding = '$kategori_tanding'
						AND status = 'PAID'
						ORDER BY ID_peserta ASC";
	$pesertaAputra = mysql_query($sqlpesertaAputra);
	$arundian = 0; 
	
	while($undianAputra = mysql_fetch_array($pesertaAputra)) {
		//echo $arundian;
		//echo $undianAputra['id_peserta'];
		//MULAI INSERT DATA UNDIAN UNTUK SETIAP PESERTA
		$insertundian = mysql_query("INSERT INTO undian_tgr(idpesertatgr,no_undian)
						VALUES('$undianAputra[kode_gr]','$numbersputraA[$arundian]')");
		$arundian++;
	}
	// UNDIAN BERAKHIR SAMPAI DISINI
	// ############################################### //
	
	
	?>
	<script type="text/javascript">
		alert('Data peserta berhasil diundi.');
		document.location='admin_undian_tgr.php';
	</script>
	<?php
	
} else { 
	header("location:index.php");
}	
?>