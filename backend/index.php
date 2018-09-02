<?php 
	session_start();
	if(!isset($_SESSION["userID"])) {

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
<title>BACKEND REGISTRASI SILAT</title>
<!-- CSS Files -->
    <link href="css/reset.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/stylesheet.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
<!-- Start Wrapper -->
<div id="wrapper">
  <div align="center">
<form id="form1" name="form1" method="post" action="do_login.php">
   <table border="0">
    <tr>
      <td colspan="2" style="font-family: 'Arial Black', Gadget, sans-serif; font-size: 25px; color: #FC6;">
		<div align="center"><img src="images/logo_jawara.png" width="165px">
		</div>
	  </td>
    </tr>
	<tr>
		<td colspan="2" style="font-family: 'Arial Black', Gadget, sans-serif; font-size: 25px; color: #FC6;">
		<div align="center">
			IPSI Kabupaten Tangerang
		</div>
		</td>
	</tr>
    <tr>
      <td><div align="right">Username</div></td>
      <td><label>
        <input name="username" type="text" id="username" size="25" />
      </label>
	  </td>
    </tr>
    <tr>
      <td><div align="right">Password</div></td>
      <td><label>
        <input name="password" type="password" id="password" size="25" />
      </label></td>
    </tr>
    <tr>
      <td colspan="2"><label>
        <div align="center">
          <input type="submit" name="submit" id="submit" value="Submit" />
          <input type="reset" name="reset" id="reset" value="Reset" />
          </label>
      </div></td>
    </tr>
  </table>
</form>
</div>

<!-- start: footer -->
<div id="footer">
	<p>Copyleft 2016 <?php echo " - ".date("Y"); ?> IPSI Kabupaten Tangerang </p>
<!-- end: footer -->
</div>

<!-- end: wrapper -->
</div>
</body>
</html>
<?php 
	} else {
		header("location: home.php");
	}	
?>