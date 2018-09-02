<?php
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
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registrasi Pencak Silat</title>
<!-- CSS Files -->
    <link href="css/reset.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/stylesheet.css" rel="stylesheet" type="text/css" media="all" />
	
</head>
<body>
<!-- Start Wrapper -->
<div id="wrapper">
  <?php 
	include "headmenu.php";
  ?>

<h1>INSTALLASI</h1>
<p>
ISI DENGAN BENAR DATA DIBAWAH INI. JIKA TIDAK MEMAHAMINYA, SILAKAN KONTAK ADMINISTRATOR ANDA.
</p>
<p>
JIKA MENGALAMI KESULITAN DALAM PROSES INSTALASI, SILAKAN MENGHUBUNGI TIM PENGEMBANG MELALUI KONTAK YANG TERSEDIA DI TAUTAN <A HREF="developer.php">BERIKUT INI</A>.
</p>
<div align="center">
<form name="install" id="install" method="POST" action="do_install.php">
<table>
	<tr>
		<td>Hostname</td>
		<td>: <input type="text" name="hostname" id="hostname" value="localhost"></td>
	</tr>
	<tr>
		<td>User Database</td>
		<td>: <input type="text" name="db_user" id="db_user"></td>
	</tr>
	<tr>
		<td>Password Database</td>
		<td>: <input type="password" name="db_password" id="db_password"></td>
	</tr>
	<tr>
		<td>Nama Database</td>
		<td>: <input type="text" name="database_name" id="database_name"></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" name="install" value="INSTALL NOW"></td>
	</tr>
</table>
</form>
</div>


<!-- start: footer -->
<div id="footer">
	<p>Copyleft 2016 <?php echo " - ".date("Y"); ?> <a href="developer.php">IPSI Kabupaten Tangerang</a> </p>
	<!-- end: footer -->
</div>
<!-- end: footer -->
</div>
  </body>
</html>