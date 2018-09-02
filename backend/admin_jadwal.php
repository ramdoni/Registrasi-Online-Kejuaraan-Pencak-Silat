<?php 
	session_start();
	$id = $_SESSION['userID']; 
	if(isset($_SESSION["userID"]) ) {
	include "config/conn.php";

	//PAGING - Tentukan batas, cek halaman dan posisi data.
	$batas = 30;
	$halaman = @$_GET['halaman'];
	if (empty($halaman)) {
	    $posisi = 0;
	    $halaman = 1;
	} else {
	    $posisi = ($halaman - 1) * $batas;
	}


	//Mencari data jadwal pertandingan
	$sqljadwal = "SELECT * FROM jadwal_tanding ORDER BY id_partai DESC limit $posisi,$batas";
	$jadwal_tanding = mysql_query($sqljadwal);
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BACKEND REGISTRASI SILAT</title>
<!-- CSS Files -->
    <link href="css/reset.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/stylesheet.css" rel="stylesheet" type="text/css" media="all" />
	
	<!-- DELETE Confirm Function -->	
	<script>
		function cek_delete()
		{
			if(confirm('Semua jadwal pertandingan akan terhapus. YAKIN ?')){
				return true;
			} else {
				return false;
			}
		}
	</script>
	<script>
		function cek_delpartai()
		{
			if(confirm('Partai ini akan terhapus. Yakin?')){
				return true;
			} else {
				return false;
			}
		}
	</script>
</head>
<body>
<!-- Start Wrapper -->
<div id="wrapper">
  <?php 
	include "headmenu.php";
  ?>
  
<h1>Upload Jadwal Tanding</h1>
<?php
if (isset($_POST['submit'])) {//Script akan berjalan jika di tekan tombol submit..
 
//Script Upload File..
    if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
        echo "<h1>" . "File ". $_FILES['filename']['name'] ." Berhasil di Upload" . "</h1>";
        echo "<h2>Menampilkan Hasil Upload:</h2>";
        readfile($_FILES['filename']['tmp_name']);
    }
 		
    //Import uploaded file to Database, Letakan dibawah sini..
    $handle = fopen($_FILES['filename']['tmp_name'], "r"); //Membuka file dan membacanya
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $import = "INSERT into jadwal_tanding (id_partai, tgl, kelas, gelanggang, partai, nm_merah, kontingen_merah,
        										nm_biru, kontingen_biru) 
        			VALUES (NULL,'$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]',
        						'$data[6]','$data[7]')"; //data array sesuaikan dengan jumlah kolom pada CSV anda mulai dari “0” bukan “1”
        mysql_query($import) or die(mysql_error()); //Melakukan Import
    }
 
    fclose($handle); //Menutup CSV file
    echo "<br><strong>Import data selesai.</strong>";
    
}else { //Jika belum menekan tombol submit, form dibawah akan muncul.. ?>
 
<!-- Form Untuk Upload File CSV-->
    <p>
    Format kolom data pada csv harus sesuai dengan contoh. 
    Download sample csv <A HREF="sample_jadwal.csv">disini</A>.
    <br><strong>Format tanggal wajib (YYYY-MM-DD)</strong>.
    </p>
   <div>
	<form enctype='multipart/form-data' action='' method='post'>
		<table>
		<tr>
			<td>
			<input type='file' name='filename' size='100'>
		   	<input type='submit' name='submit' value='Upload'>
		   	</td>
		</tr>
		</table>
	</form>
   </div>
 <A HREF ="admin_do_clearjadwal.php" onclick="return cek_delete();">CLEAR ALL JADWAL & PENILAIAN JURI KELAS TANDING</A>
<?php } //mysql_close(); //Menutup koneksi SQL
?>

<br><br><br>

<h1>Cetak Jadwal Tanding</h1>
<form name="CetakJadwal" id="CetakJadwal" method="POST" target="_blank" action="admin_do_jadwal.php">
	<table border="0">
	<tr>
		<td><input type="text" name="judul" id="judul" value="INPUT JUDUL HEADER..."></td>
		<td><input type="text" name="tgl" id="tgl" value=<?php echo date("Y-m-d"); ?>></td>
		<td>
			<select name="gelanggang" id="gelanggang">
				<option value="">-- Pilih Gelanggang --</option>
				<option value="A">A</option>
				<option value="B">B</option>
				<option value="C">C</option>
			</select>
		</td>
		<td><input type="submit" name="cari" value="Generate"></td>
	</tr>
	</table>
</form>

<h1>Data Jadwal Tanding</h1>
<div id="datajadwaltanding" align="center">
<table>
	<thead>
	<tr bgcolor="#99CCFF">
		<td>NO</td>
		<td>GELANGGANG</td>
		<td>PARTAI</td>
		<td>KELOMPOK</td>
		<td>SUDUT MERAH</td>
		<td>SUDUT BIRU</td>
		<td>CONTROL</td>
	</tr>
	</thead>
	<?php $no=1+$posisi; while($jadwal = mysql_fetch_array($jadwal_tanding)) { ;?>
	<tr bgcolor="#eeeeee">
		<td rowspan="2"><?php echo $no; ?></td>
		<td rowspan="2"><center><?php echo $jadwal['gelanggang']; ?></center></td>
		<td rowspan="2"><center><?php echo $jadwal['partai']; ?></center></td>
		<td rowspan="2"><?php echo $jadwal['kelas']; ?></td>
		<td><?php echo $jadwal['nm_merah']; ?></td>
		<td><?php echo $jadwal['nm_biru']; ?></td>
		<td rowspan="2"><center><a href=admin_do_del_partai.php?id_partai=<?php echo $jadwal['id_partai']; ?> onclick="return cek_delete();"> <img src="images/delete.png"></a></center></td>
	</tr>
	<tr bgcolor="#eeeeee">
		<td><?php echo $jadwal['kontingen_merah']; ?></td>
		<td><?php echo $jadwal['kontingen_biru']; ?></td>
	</tr>
	<?php $no++; } ?>
</table>
	<?php
		// Paging - Hitung Total data dan halaman serta link 1,2,3..
		$paging2 = mysql_query("SELECT * FROM jadwal_tanding");
		$jmldata = mysql_num_rows($paging2);
		$jmlhalaman = ceil($jmldata/$batas);
		 
		echo"<br \> Halaman : ";
		for($i=1; $i<=$jmlhalaman; $i++){
		    if($i != $halaman){
		        echo"<a href=\"admin_jadwal.php?halaman=$i#datajadwaltanding\">$i</a> | ";
		    }else{
		        echo"<b>$i</b> | ";
		    }
		}
		    echo "Total Data : <b>$jmldata</b>";
	?>
</div>

<!-- start: footer -->
<div id="footer">
	<p>Copyleft 2016 <?php echo " - ".date("Y"); ?> IPSI Kabupaten Tangerang </p>
	<!-- end: footer -->
</div>
<!-- end: footer -->
</div>
  </body>
</html>
<?php 
	}
	else { 
		header("location:index.php");
	}
?>