<?php
	session_start();
	$id = $_SESSION['userID']; 
	if(isset($_SESSION["userID"]) ) {
	
	include "config/conn.php";

	$datetime = gmdate("Y-m-d H_i_s", time()+60*60*7);

	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Hasil_Rekap_TGR.xls");
	
	$nama = '';
	$golongan = mysql_real_escape_string($_POST["golongan"]);
	$jenis_kelamin = mysql_real_escape_string($_POST["jenis_kelamin"]);
	$kategori_tanding = mysql_real_escape_string($_POST["kategori_tanding"]);

	//kueri data peserta
	$sqlpeserta ="SELECT * FROM peserta
					WHERE peserta.nm_lengkap LIKE '%$nama%'
					AND peserta.kategori_tanding LIKE '%$kategori_tanding%'
					AND peserta.kategori_tanding <> 'Tanding'
					AND peserta.golongan LIKE '%$golongan%'
					AND peserta.jenis_kelamin LIKE '%$jenis_kelamin%'
					ORDER BY peserta.kode_gr,peserta.kontingen ASC";
	$datapeserta = mysql_query($sqlpeserta);
	
?>

<center><h1>REKAP DATA PESERTA TGR</h1>
<h2>
	<?php 
	if($kategori_tanding == '') {
			echo ""; 
		} else {
			echo strtoupper($kategori_tanding); 
		} 

	if($jenis_kelamin == 'Laki-laki') {
			echo " PUTRA "; 
		} elseif($jenis_kelamin == 'Perempuan') { 
			echo " PUTRI "; 
		} else {

		}

	if($golongan == '') { 
		echo ""; 
		} else {
		echo "(".strtoupper($golongan).")"; 
		}
	?>
</h2>
</center>
	<table border="1">
		<thead>
		<tr bgcolor="#99CCFF">
			<td>No.</td>
			<td>Nama Lengkap</td>
			<td>Jenis Kelamin</td>
			<td>Tempat Lahir</td>
			<td>Tanggal Lahir</td>
			<td>TB</td>
			<td>BB</td>
			<td>Keterangan</td>
			<td>Kontingen</td>
			<td>Kategori</td>
			<td>ID Pasangan</td>
			<td>Golongan</td>
			<td>Biaya Registrasi</td>
		</tr>
		</thead>
		<?php $no=0; $paid=0; while($peserta = mysql_fetch_array($datapeserta)) { $no++; ?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $peserta['nm_lengkap']; ?></td>
			<td><?php echo $peserta['jenis_kelamin']; ?></td>
			<td><?php echo $peserta['tpt_lahir']; ?></td>
			<td><?php echo $peserta['tgl_lahir']; ?></td>
			<td><?php echo $peserta['tb']; ?></td>
			<td><?php echo $peserta['bb']; ?></td>
			<td><?php echo $peserta['asal_sekolah'];
						if($peserta['asal_sekolah']<>'') { echo ", Kelas ";}
					  echo $peserta['kelas']; ?>
			</td>
			<td><?php echo $peserta['kontingen']; ?></td>
			<td><?php echo $peserta['kategori_tanding']; ?></td>
			<td><?php echo $peserta['kode_gr']; ?></td>
			<td><?php echo $peserta['golongan']; ?></td>
			<td><?php echo $peserta['status']; if($peserta['status']=='PAID') { $paid=$paid+1; } ?></td>
		</tr>
		<?php } ?>
	</table>

	<p>Generate data : Sebanyak <?php echo $no; ?> Peserta. Yang telah melunasi biaya pendaftaran sebanyak <?php echo $paid; ?> Peserta. </p>

	
<div id="footer">
	<p>Copyleft 2016 <?php echo " - ".date("Y"); ?> IPSI Kabupaten Tangerang </p>

<?php 
	}
	else { 
		header("location:index.php");
	}
?>