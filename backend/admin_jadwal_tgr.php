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
	$sqljadwaltgr = "SELECT * FROM jadwal_tgr ORDER BY id_partai DESC limit $posisi,$batas";
	$jadwaltgr = mysql_query($sqljadwaltgr);
	
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
			if(confirm('Semua jadwal TGR akan terhapus. YAKIN ?')){
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
  
<h1>Upload Jadwal Tunggal</h1>
<?php
if (isset($_POST['submit'])) {//Script akan berjalan jika di tekan tombol submit..
 
//Script Upload File..
    if (is_uploaded_file($_FILES['filenametunggal']['tmp_name'])) {
        echo "<h1>" . "File ". $_FILES['filenametunggal']['name'] ." Berhasil di Upload" . "</h1>";
        echo "<h2>Menampilkan Hasil Upload:</h2>";
        readfile($_FILES['filenametunggal']['tmp_name']);
    }
 		
    //Import uploaded file to Database, Letakan dibawah sini..
    $handle = fopen($_FILES['filenametunggal']['tmp_name'], "r"); //Membuka file dan membacanya
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $import = "INSERT into jadwal_tgr (id_partai, kategori, golongan, noundian, nama, kontingen) 
        			VALUES (NULL,'$data[0]','$data[1]','$data[2]','$data[3]','$data[4]')"; //data array sesuaikan dengan jumlah kolom pada CSV anda mulai dari “0” bukan “1”
        mysql_query($import) or die(mysql_error()); //Melakukan Import
    }
 
    fclose($handle); //Menutup CSV file
    echo "<br><strong>Import data selesai.</strong>";
    
}else { //Jika belum menekan tombol submit, form dibawah akan muncul.. ?>
 
<!-- Form Untuk Upload File CSV-->
    <p>
    Format kolom data pada csv harus sesuai dengan contoh. 
    Download sample csv <A HREF="sample_jadwal_tunggal.csv">disini</A>.
    </p>
   <div>
	<form enctype='multipart/form-data' action='' method='post'>
		<table>
		<tr>
			<td>
			<input type='file' name='filenametunggal' size='100'>
		   	<input type='submit' name='submit' value='Upload'>
		   	</td>
		</tr>
		</table>
	</form>
   </div>
 <A HREF ="admin_do_clearjadwal_tgr.php" onclick="return cek_delete();">CLEAR ALL JADWAL & PENILAIAN JURI KELAS TGR</A>
<?php } //mysql_close(); //Menutup koneksi SQL
?>
<br><br><br>

<!-- KODE UPLOAD GANDA -->
<h1>Upload Jadwal Ganda</h1>
<?php
if (isset($_POST['submitganda'])) {//Script akan berjalan jika di tekan tombol submit..
 
//Script Upload File..
    if (is_uploaded_file($_FILES['filenameganda']['tmp_name'])) {
        echo "<h1>" . "File ". $_FILES['filenameganda']['name'] ." Berhasil di Upload" . "</h1>";
        echo "<h2>Menampilkan Hasil Upload:</h2>";
        readfile($_FILES['filenameganda']['tmp_name']);
    }
 		
    //Import uploaded file to Database, Letakan dibawah sini..
    $handleganda = fopen($_FILES['filenameganda']['tmp_name'], "r"); //Membuka file dan membacanya
    while (($data = fgetcsv($handleganda, 1000, ",")) !== FALSE) {
    		$namaganda = $data[3].'<br>'.$data[4];
        $import = "INSERT into jadwal_tgr (id_partai, kategori, golongan, noundian, nama, kontingen) 
        			VALUES (NULL,'$data[0]','$data[1]','$data[2]','$namaganda','$data[5]')"; //data array sesuaikan dengan jumlah kolom pada CSV anda mulai dari “0” bukan “1”
        mysql_query($import) or die(mysql_error()); //Melakukan Import
    }
 
    fclose($handleganda); //Menutup CSV file
    echo "<br><strong>Import data ganda selesai.</strong>";
    
}else { //Jika belum menekan tombol submit, form dibawah akan muncul.. ?>
 
<!-- Form Untuk Upload File CSV-->
    <p>
    Format kolom data pada csv harus sesuai dengan contoh. 
    Download sample csv <A HREF="sample_jadwal_ganda.csv">disini</A>.
    </p>
   <div>
	<form enctype='multipart/form-data' action='' method='post'>
		<table>
		<tr>
			<td>
			<input type='file' name='filenameganda' size='100'>
		   	<input type='submit' name='submitganda' value='Upload'>
		   	</td>
		</tr>
		</table>
	</form>
   </div>
<?php } //mysql_close(); //Menutup koneksi SQL
?>

<!-- KODE UPLOAD REGU -->
<h1>Upload Jadwal Regu</h1>
<?php
if (isset($_POST['submitregu'])) {//Script akan berjalan jika di tekan tombol submit..
 
//Script Upload File..
    if (is_uploaded_file($_FILES['filenameregu']['tmp_name'])) {
        echo "<h1>" . "File ". $_FILES['filenameregu']['name'] ." Berhasil di Upload" . "</h1>";
        echo "<h2>Menampilkan Hasil Upload:</h2>";
        readfile($_FILES['filenameregu']['tmp_name']);
    }
 		
    //Import uploaded file to Database, Letakan dibawah sini..
    $handleregu = fopen($_FILES['filenameregu']['tmp_name'], "r"); //Membuka file dan membacanya
    while (($data = fgetcsv($handleregu, 1000, ",")) !== FALSE) {
    		$namaregu = $data[3].'<br>'.$data[4].'<br>'.$data[5];
        $import = "INSERT into jadwal_tgr (id_partai, kategori, golongan, noundian, nama, kontingen) 
        			VALUES (NULL,'$data[0]','$data[1]','$data[2]','$namaregu','$data[6]')"; //data array sesuaikan dengan jumlah kolom pada CSV anda mulai dari “0” bukan “1”
        mysql_query($import) or die(mysql_error()); //Melakukan Import
    }
 
    fclose($handleregu); //Menutup CSV file
    echo "<br><strong>Import data regu selesai.</strong>";
    
}else { //Jika belum menekan tombol submit, form dibawah akan muncul.. ?>
 
<!-- Form Untuk Upload File CSV-->
    <p>
    Format kolom data pada csv harus sesuai dengan contoh. 
    Download sample csv <A HREF="sample_jadwal_regu.csv">disini</A>.
    </p>
   <div>
	<form enctype='multipart/form-data' action='' method='post'>
		<table>
		<tr>
			<td>
			<input type='file' name='filenameregu' size='100'>
		   	<input type='submit' name='submitregu' value='Upload'>
		   	</td>
		</tr>
		</table>
	</form>
   </div>
<?php } //mysql_close(); //Menutup koneksi SQL
?>

<br><br><br>

<h1>Cetak Jadwal TGR</h1>
<form name="CetakJadwal" id="CetakJadwal" method="POST" target="_blank" action="admin_do_jadwal_tgr.php">
	<table border="0">
	<tr>
		<td><input type="text" name="judul" id="judul" value="INPUT JUDUL HEADER..."></td>
		<td><input type="text" name="tgl" id="tgl" value=<?php echo date("Y-m-d"); ?>></td>
		<td>
			<select name="kategori" id="kategori">
				<option value="">-- Pilih Kategori --</option>
				<option value="Tunggal">Tunggal</option>
				<option value="Ganda">Ganda</option>
				<option value="Regu">Regu</option>
			</select>
		</td>
		<td><input type="submit" name="cari" value="Generate"></td>
	</tr>
	</table>
</form>

<h1>Data Jadwal TGR</h1>
<div id="datajadwaltgr" align="center">
<table>
	<thead>
	<tr bgcolor="#99CCFF">
		<td><center>NO</center></td>
		<td><center>KATEGORI</center></td>
		<td><center>GOLONGAN</center></td>
		<td><center>NO UNDIAN</center></td>
		<td><center>NAMA</center></td>
		<td><center>KONTINGEN</center></td>
		<td><center>CONTROL</center></td>
	</tr>
	</thead>
	<?php $no=1+$posisi; while($jadwal = mysql_fetch_array($jadwaltgr)) { ;?>
	<tr bgcolor="#eeeeee">
		<td><?php echo $no; ?></td>
		<td><center><?php echo $jadwal['kategori']; ?></center></td>
		<td><center><?php echo $jadwal['golongan']; ?></center></td>
		<td><center><?php echo $jadwal['noundian']; ?></center></td>
		<td><?php echo $jadwal['nama']; ?></td>
		<td><?php echo $jadwal['kontingen']; ?></td>
		<td><center><a href=admin_do_del_partai_tgr.php?id_partai=<?php echo $jadwal['id_partai']; ?> onclick="return cek_delete();"> <img src="images/delete.png"></a></center></td>
	</tr>
	<?php $no++; } ?>
</table>
	<?php
		// Paging - Hitung Total data dan halaman serta link 1,2,3..
		$paging2 = mysql_query("SELECT * FROM jadwal_tgr");
		$jmldata = mysql_num_rows($paging2);
		$jmlhalaman = ceil($jmldata/$batas);
		 
		echo"<br \> Halaman : ";
		for($i=1; $i<=$jmlhalaman; $i++){
		    if($i != $halaman){
		        echo"<a href=\"admin_jadwal_tgr.php?halaman=$i#datajadwaltgr\">$i</a> | ";
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