<?php 
	session_start();
	$id = $_SESSION['userID']; 
	if(isset($_SESSION["userID"]) ) {

	/*
	*---------------------------------------------------------------
	* E-REGISTRASI PENCAK SILAT Versi 1.0
	*---------------------------------------------------------------
	* This program is free software; you can redistribute it and/or
	* modify it under the terms of the GNU General Public License
	* as published by the Free Software Foundation; either version 2
	* of the License, or (at your option) any later version.
	*
	* This program is distributed in the hope that it will be useful,
	* but WITHOUT ANY WARRANTY; without even the implied warranty of
	* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
	* GNU General Public License for more details.
	*
	* You should have received a copy of the GNU General Public License
	* along with this program; if not, write to the Free Software
	* Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
	*
	* @Author Yudha Yogasara
	* yudha.yogasara@gmail.com
	* @Contributor Sofyan Hadi, Satria Salam
	*
	* IPSI KABUPATEN TANGERANG
	* SALAM OLAHRAGA
	*/

	include "config/conn.php";
	
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
			if(confirm('Anda Yakin?')){
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
  
  <h1>Pencarian Data Peserta - Tanding</h1>
<div>
	<form name="CariPeserta" id="CariPeserta" method="POST" action="admin_do_pencarian.php">
	<table border="0">
	<tr>
		<td><input type="text" name="nama" id="nama" maxlength="35" placeholder="Input Nama Peserta/Kosongkan..."></td>
		<td>
			<select name="golongan" id="golongan">
				<option value="Usia Dini">Usia Dini</option>
				<option value="Pra Remaja">Pra Remaja</option>
				<option value="Remaja">Remaja</option>
				<option value="Dewasa">Dewasa</option>
			</select>
		</td>
		<td>
			<select name="jenis_kelamin" id="jenis_kelamin">
				<option value="">-- Pilih Jenis Kelamin --</option>
				<option value="Laki-laki">Laki-laki</option>
				<option value="Perempuan">Perempuan</option>
			</select>
		</td>
		<td>
			<select name="kelas_tanding_FK" id="kelas_tanding_FK">
				<option value="">-- Pilih Kelas Tanding --</option>
				<option value="1">Kelas A</option>
				<option value="2">Kelas B</option>
				<option value="3">Kelas C</option>
				<option value="4">Kelas D</option>
				<option value="5">Kelas E</option>
				<option value="6">Kelas F</option>
				<option value="7">Kelas G</option>
				<option value="8">Kelas H</option>
				<option value="9">Kelas I</option>
				<option value="10">Kelas J</option>
			</select>
		</td>
	</tr>
	<tr>
		<td colspan="3"><input type="submit" name="cari" value="CARI PESERTA TANDING"></td>
	</tr>
	</table>
	</form>
</div>

  <h1>Pencarian Data Peserta - TGR</h1>
<div>
	<form name="CariPeserta" id="CariPeserta" method="POST" action="admin_do_pencarian_tgr.php">
	<table border="0">
	<tr>
		<td><input type="text" name="nama" id="nama" maxlength="35" placeholder="Input Nama Peserta/Kosongkan..."></td>
		<td>
			<select name="golongan" id="golongan">
				<option value="Usia Dini">Usia Dini</option>
				<option value="Pra Remaja">Pra Remaja</option>
				<option value="Remaja">Remaja</option>
				<option value="Dewasa">Dewasa</option>
			</select>
		</td>
		<td>
			<select name="jenis_kelamin" id="jenis_kelamin">
				<option value="">-- Pilih Jenis Kelamin --</option>
				<option value="Laki-laki">Laki-laki</option>
				<option value="Perempuan">Perempuan</option>
			</select>
		</td>
		<td>
			<select name="kategori_tanding" id="kategori_tanding">
				<option value="">-- Pilih Kategori --</option>
				<option value="Tunggal">Tunggal</option>
				<option value="Ganda">Ganda</option>
				<option value="Regu">Regu</option>
			</select>
		</td>
	</tr>
	<tr>
		<td colspan="4"><input type="submit" name="cari" value="CARI PESERTA TGR"></td>
	</tr>
	</table>
	</form>
</div>

<h1>CLEAR ALL DATABASE</h1>
<div>
	<p>Dengan menekan tombol "Clear DB" di bawah ini, maka seluruh data peserta, undian, bagan dan jadwal pertandingan akan terhapus. Sehingga Aplikasi dapat digunakan kembali dari awal untuk kegiatan kejuaraan lainnya.</p>
	<br>
	<form name="ClearALLDB" id="ClearALLDB" method="POST" action="admin_clear_DB.php" onclick="return cek_delete();">
		<input type="submit" name="clearDB" value="Clear DB">
	</form>
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