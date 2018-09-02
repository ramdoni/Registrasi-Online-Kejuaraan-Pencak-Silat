<?php 
	include "../backend/config/conn.php";

	//dapatkan ID jadwal pertandingan
	$id_partai = mysql_real_escape_string($_GET["id_partai"]);

	//Mencari data jadwal pertandingan
	$sqljadwal = "SELECT * FROM jadwal_tanding 
					WHERE id_partai='$id_partai'";
	$jadwal_tanding = mysql_query($sqljadwal);
	$jadwal = mysql_fetch_array($jadwal_tanding);

	
	//----------------- WASIT JURI 1 MERAH
	//Kueri nilai wasit juri 1, babak 1, sudut merah
	$sqljuri1babak1merah = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='1' AND
							babak='1' AND
							sudut='MERAH'";
	$juri1babak1merah = mysql_query($sqljuri1babak1merah);
	$nilaijuri1babak1merah = mysql_fetch_array($juri1babak1merah);

	//Kueri nilai wasit juri 1, babak 2, sudut merah
	$sqljuri1babak2merah = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='1' AND
							babak='2' AND
							sudut='MERAH'";
	$juri1babak2merah = mysql_query($sqljuri1babak2merah);
	$nilaijuri1babak2merah = mysql_fetch_array($juri1babak2merah);

	//Kueri nilai wasit juri 1, babak 3, sudut merah
	$sqljuri1babak3merah = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='1' AND
							babak='3' AND
							sudut='MERAH'";
	$juri1babak3merah = mysql_query($sqljuri1babak3merah);
	$nilaijuri1babak3merah = mysql_fetch_array($juri1babak3merah);
	//----------------- END WASIT JURI 1 MERAH

	//----------------- WASIT JURI 2 MERAH
	//Kueri nilai wasit juri 2, babak 1, sudut merah
	$sqljuri2babak1merah = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='2' AND
							babak='1' AND
							sudut='MERAH'";
	$juri2babak1merah = mysql_query($sqljuri2babak1merah);
	$nilaijuri2babak1merah = mysql_fetch_array($juri2babak1merah);

	//Kueri nilai wasit juri 2, babak 2, sudut merah
	$sqljuri2babak2merah = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='2' AND
							babak='2' AND
							sudut='MERAH'";
	$juri2babak2merah = mysql_query($sqljuri2babak2merah);
	$nilaijuri2babak2merah = mysql_fetch_array($juri2babak2merah);

	//Kueri nilai wasit juri 2, babak 3, sudut merah
	$sqljuri2babak3merah = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='2' AND
							babak='3' AND
							sudut='MERAH'";
	$juri2babak3merah = mysql_query($sqljuri2babak3merah);
	$nilaijuri2babak3merah = mysql_fetch_array($juri2babak3merah);
	//----------------- END WASIT JURI 2 MERAH


	//----------------- WASIT JURI 3 MERAH
	//Kueri nilai wasit juri 3, babak 1, sudut merah
	$sqljuri3babak1merah = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='3' AND
							babak='1' AND
							sudut='MERAH'";
	$juri3babak1merah = mysql_query($sqljuri3babak1merah);
	$nilaijuri3babak1merah = mysql_fetch_array($juri3babak1merah);

	//Kueri nilai wasit juri 3, babak 2, sudut merah
	$sqljuri3babak2merah = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='3' AND
							babak='2' AND
							sudut='MERAH'";
	$juri3babak2merah = mysql_query($sqljuri3babak2merah);
	$nilaijuri3babak2merah = mysql_fetch_array($juri3babak2merah);

	//Kueri nilai wasit juri 3, babak 3, sudut merah
	$sqljuri3babak3merah = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='3' AND
							babak='3' AND
							sudut='MERAH'";
	$juri3babak3merah = mysql_query($sqljuri3babak3merah);
	$nilaijuri3babak3merah = mysql_fetch_array($juri3babak3merah);
	//----------------- END WASIT JURI 3 MERAH


	//----------------- WASIT JURI 4 MERAH
	//Kueri nilai wasit juri 4, babak 1, sudut merah
	$sqljuri4babak1merah = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='4' AND
							babak='1' AND
							sudut='MERAH'";
	$juri4babak1merah = mysql_query($sqljuri4babak1merah);
	$nilaijuri4babak1merah = mysql_fetch_array($juri4babak1merah);

	//Kueri nilai wasit juri 4, babak 2, sudut merah
	$sqljuri4babak2merah = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='4' AND
							babak='2' AND
							sudut='MERAH'";
	$juri4babak2merah = mysql_query($sqljuri4babak2merah);
	$nilaijuri4babak2merah = mysql_fetch_array($juri4babak2merah);

	//Kueri nilai wasit juri 4, babak 3, sudut merah
	$sqljuri4babak3merah = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='4' AND
							babak='3' AND
							sudut='MERAH'";
	$juri4babak3merah = mysql_query($sqljuri4babak3merah);
	$nilaijuri4babak3merah = mysql_fetch_array($juri4babak3merah);
	//----------------- END WASIT JURI 4 MERAH


	//----------------- WASIT JURI 5 MERAH
	//Kueri nilai wasit juri 5, babak 1, sudut merah
	$sqljuri5babak1merah = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='5' AND
							babak='1' AND
							sudut='MERAH'";
	$juri5babak1merah = mysql_query($sqljuri5babak1merah);
	$nilaijuri5babak1merah = mysql_fetch_array($juri5babak1merah);

	//Kueri nilai wasit juri 5, babak 2, sudut merah
	$sqljuri5babak2merah = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='5' AND
							babak='2' AND
							sudut='MERAH'";
	$juri5babak2merah = mysql_query($sqljuri5babak2merah);
	$nilaijuri5babak2merah = mysql_fetch_array($juri5babak2merah);

	//Kueri nilai wasit juri 5, babak 3, sudut merah
	$sqljuri5babak3merah = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='5' AND
							babak='3' AND
							sudut='MERAH'";
	$juri5babak3merah = mysql_query($sqljuri5babak3merah);
	$nilaijuri5babak3merah = mysql_fetch_array($juri5babak3merah);
	//----------------- END WASIT JURI 5 MERAH


	//----------------- AREA BIRU --------------------------
	//------------------------------------------------------

	//----------------- WASIT JURI 1 BIRU
	//Kueri nilai wasit juri 1, babak 1, sudut biru
	$sqljuri1babak1biru = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='1' AND
							babak='1' AND
							sudut='BIRU'";
	$juri1babak1biru = mysql_query($sqljuri1babak1biru);
	$nilaijuri1babak1biru = mysql_fetch_array($juri1babak1biru);

	//Kueri nilai wasit juri 1, babak 2, sudut biru
	$sqljuri1babak2biru = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='1' AND
							babak='2' AND
							sudut='BIRU'";
	$juri1babak2biru = mysql_query($sqljuri1babak2biru);
	$nilaijuri1babak2biru = mysql_fetch_array($juri1babak2biru);

	//Kueri nilai wasit juri 1, babak 3, sudut biru
	$sqljuri1babak3biru = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='1' AND
							babak='3' AND
							sudut='BIRU'";
	$juri1babak3biru = mysql_query($sqljuri1babak3biru);
	$nilaijuri1babak3biru = mysql_fetch_array($juri1babak3biru);
	//----------------- END WASIT JURI 1 biru

	//----------------- WASIT JURI 2 biru
	//Kueri nilai wasit juri 2, babak 1, sudut biru
	$sqljuri2babak1biru = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='2' AND
							babak='1' AND
							sudut='BIRU'";
	$juri2babak1biru = mysql_query($sqljuri2babak1biru);
	$nilaijuri2babak1biru = mysql_fetch_array($juri2babak1biru);

	//Kueri nilai wasit juri 2, babak 2, sudut biru
	$sqljuri2babak2biru = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='2' AND
							babak='2' AND
							sudut='BIRU'";
	$juri2babak2biru = mysql_query($sqljuri2babak2biru);
	$nilaijuri2babak2biru = mysql_fetch_array($juri2babak2biru);

	//Kueri nilai wasit juri 2, babak 3, sudut biru
	$sqljuri2babak3biru = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='2' AND
							babak='3' AND
							sudut='BIRU'";
	$juri2babak3biru = mysql_query($sqljuri2babak3biru);
	$nilaijuri2babak3biru = mysql_fetch_array($juri2babak3biru);
	//----------------- END WASIT JURI 2 biru


	//----------------- WASIT JURI 3 biru
	//Kueri nilai wasit juri 3, babak 1, sudut biru
	$sqljuri3babak1biru = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='3' AND
							babak='1' AND
							sudut='BIRU'";
	$juri3babak1biru = mysql_query($sqljuri3babak1biru);
	$nilaijuri3babak1biru = mysql_fetch_array($juri3babak1biru);

	//Kueri nilai wasit juri 3, babak 2, sudut biru
	$sqljuri3babak2biru = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='3' AND
							babak='2' AND
							sudut='BIRU'";
	$juri3babak2biru = mysql_query($sqljuri3babak2biru);
	$nilaijuri3babak2biru = mysql_fetch_array($juri3babak2biru);

	//Kueri nilai wasit juri 3, babak 3, sudut biru
	$sqljuri3babak3biru = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='3' AND
							babak='3' AND
							sudut='BIRU'";
	$juri3babak3biru = mysql_query($sqljuri3babak3biru);
	$nilaijuri3babak3biru = mysql_fetch_array($juri3babak3biru);
	//----------------- END WASIT JURI 3 biru


	//----------------- WASIT JURI 4 biru
	//Kueri nilai wasit juri 4, babak 1, sudut biru
	$sqljuri4babak1biru = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='4' AND
							babak='1' AND
							sudut='BIRU'";
	$juri4babak1biru = mysql_query($sqljuri4babak1biru);
	$nilaijuri4babak1biru = mysql_fetch_array($juri4babak1biru);

	//Kueri nilai wasit juri 4, babak 2, sudut biru
	$sqljuri4babak2biru = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='4' AND
							babak='2' AND
							sudut='BIRU'";
	$juri4babak2biru = mysql_query($sqljuri4babak2biru);
	$nilaijuri4babak2biru = mysql_fetch_array($juri4babak2biru);

	//Kueri nilai wasit juri 4, babak 3, sudut biru
	$sqljuri4babak3biru = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='4' AND
							babak='3' AND
							sudut='BIRU'";
	$juri4babak3biru = mysql_query($sqljuri4babak3biru);
	$nilaijuri4babak3biru = mysql_fetch_array($juri4babak3biru);
	//----------------- END WASIT JURI 4 biru


	//----------------- WASIT JURI 5 biru
	//Kueri nilai wasit juri 5, babak 1, sudut biru
	$sqljuri5babak1biru = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='5' AND
							babak='1' AND
							sudut='BIRU'";
	$juri5babak1biru = mysql_query($sqljuri5babak1biru);
	$nilaijuri5babak1biru = mysql_fetch_array($juri5babak1biru);

	//Kueri nilai wasit juri 5, babak 2, sudut biru
	$sqljuri5babak2biru = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='5' AND
							babak='2' AND
							sudut='BIRU'";
	$juri5babak2biru = mysql_query($sqljuri5babak2biru);
	$nilaijuri5babak2biru = mysql_fetch_array($juri5babak2biru);

	//Kueri nilai wasit juri 5, babak 3, sudut biru
	$sqljuri5babak3biru = "SELECT SUM(nilai) FROM nilai_tanding
							WHERE id_jadwal='$id_partai' AND 
							id_juri='5' AND
							babak='3' AND
							sudut='BIRU'";
	$juri5babak3biru = mysql_query($sqljuri5babak3biru);
	$nilaijuri5babak3biru = mysql_fetch_array($juri5babak3biru);
	//----------------- END WASIT JURI 5 biru
?>

<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- SELESAI Confirm Function -->	
	<script>
		function cek_selesai()
		{
			if(confirm('Apakah Anda Yakin Pertandingan Sudah Berakhir?')){
				return true;
			} else {
				return false;
			}
		}
	</script>

</head>
<body>
<div class="container">
<div class="table-responsive">
<table class="table">
  <thead>
    <tr class="text-center">
      <td colspan="11">GELANGGANG : <?php echo $jadwal['gelanggang']; ?></td>
    </tr>
    <tr class="text-center">
      <td colspan="11">PARTAI KE : <?php echo $jadwal['partai']; ?></td>
    </tr>
    <tr class="text-center">
      <td colspan="11"><?php echo $jadwal['kelas']; ?></td>
    </tr>
    <tr>
      <td style="text-align: center;" colspan="11">
      	<h2 class="waktu"></h2>
      	<h1 class="btn btn-success btn-xs" onclick="start_time()" style="margin-bottom:10px;margin-top:0;"> START</h1>
      	<h1 class="btn btn-warning btn-xs btn-stop" onclick="resume_time()" style="margin-bottom:10px;margin-top:0;"> PAUSE</h1>
      	<h1 class="btn btn-danger btn-xs" onclick="stop_time()" style="margin-bottom:10px;margin-top:0;"> STOP</h1>
      </td>
    </tr>
    <tr>
      <td colspan="2">NAMA</td>
      <td colspan="3"><p>: <?php echo $jadwal['nm_merah']; ?></p></td>
      <td>&nbsp;</td>
      <td colspan="2">NAMA</td>
      <td colspan="3">: <?php echo $jadwal['nm_biru']; ?></td>
    </tr>
    <tr>
      <td colspan="2">KONTINGEN</td>
      <td colspan="3"><p>: <?php echo $jadwal['kontingen_merah']; ?></p></td>
      <td>&nbsp;</td>
      <td colspan="2">KONTINGEN</td>
      <td colspan="3"><p>: <?php echo $jadwal['kontingen_biru']; ?></p></td>
    </tr>
    <tr class="text-center">
      <td colspan="5" bgcolor="#FF0000"><font color="white">SUDUT MERAH</font></td>
      <td bgcolor="#F5F5F5">&nbsp;</td>
      <td colspan="5" bgcolor="#1E90FF"><font color="white">SUDUT BIRU</font></td>
    </tr>
    <tr class="text-center" style="font-weight: bold;">
      <td>WASIT</td>
      <td>WASIT</td>
      <td>WASIT</td>
      <td>WASIT</td>
      <td>WASIT</td>
      <td rowspan="2" bgcolor="#F5F5F5">BABAK</td>
      <td>WASIT</td>
      <td>WASIT</td>
      <td>WASIT</td>
      <td>WASIT</td>
      <td>WASIT</td>
    </tr>
    <tr class="text-center" style="font-weight: bold;">
      <td>JURI 1</td>
      <td>JURI 2</td>
      <td>JURI 3</td>
      <td>JURI 4</td>
      <td>JURI 5</td>
      <td>JURI 1</td>
      <td>JURI 2</td>
      <td>JURI 3</td>
      <td>JURI 4</td>
      <td>JURI 5</td>
    </tr>
  </thead>
  <tbody class="content_penilaian">
  	<tr class="text-center" style="font-size: 20px;">
      <td><?php echo $nilaijuri1babak1merah[0]; ?></td>
      <td><?php echo $nilaijuri2babak1merah[0]; ?></td>
      <td><?php echo $nilaijuri3babak1merah[0]; ?></td>
      <td><?php echo $nilaijuri4babak1merah[0]; ?></td>
      <td><?php echo $nilaijuri5babak1merah[0]; ?></td>
      <td bgcolor="#F5F5F5">I</td>
      <td><?php echo $nilaijuri1babak1biru[0]; ?></td>
      <td><?php echo $nilaijuri2babak1biru[0]; ?></td>
      <td><?php echo $nilaijuri3babak1biru[0]; ?></td>
      <td><?php echo $nilaijuri4babak1biru[0]; ?></td>
      <td><?php echo $nilaijuri5babak1biru[0]; ?></td>
    </tr>
    <tr class="text-center" style="font-size: 20px;">
      <td><?php echo $nilaijuri1babak2merah[0]; ?></td>
      <td><?php echo $nilaijuri2babak2merah[0]; ?></td>
      <td><?php echo $nilaijuri3babak2merah[0]; ?></td>
      <td><?php echo $nilaijuri4babak2merah[0]; ?></td>
      <td><?php echo $nilaijuri5babak2merah[0]; ?></td>
      <td bgcolor="#F5F5F5">II</td>
      <td><?php echo $nilaijuri1babak2biru[0]; ?></td>
      <td><?php echo $nilaijuri2babak2biru[0]; ?></td>
      <td><?php echo $nilaijuri3babak2biru[0]; ?></td>
      <td><?php echo $nilaijuri4babak2biru[0]; ?></td>
      <td><?php echo $nilaijuri5babak2biru[0]; ?></td>
    </tr>
    <tr class="text-center" style="font-size: 20px;">
      <td><?php echo $nilaijuri1babak3merah[0]; ?></td>
      <td><?php echo $nilaijuri2babak3merah[0]; ?></td>
      <td><?php echo $nilaijuri3babak3merah[0]; ?></td>
      <td><?php echo $nilaijuri4babak3merah[0]; ?></td>
      <td><?php echo $nilaijuri5babak3merah[0]; ?></td>
      <td bgcolor="#F5F5F5">III</td>
      <td><?php echo $nilaijuri1babak3biru[0]; ?></td>
      <td><?php echo $nilaijuri2babak3biru[0]; ?></td>
      <td><?php echo $nilaijuri3babak3biru[0]; ?></td>
      <td><?php echo $nilaijuri4babak3biru[0]; ?></td>
      <td><?php echo $nilaijuri5babak3biru[0]; ?></td>
    </tr>
    <tr class="text-center" bgcolor="#F5F5F5" style="font-size: 20px; font-weight: bold;">
      <td>
      	<?php 
      		$totalwasitjuri1merah = $nilaijuri1babak1merah[0] + $nilaijuri1babak2merah[0] + $nilaijuri1babak3merah[0];
      		echo $totalwasitjuri1merah;
      	?>
      </td>
      <td>
      	<?php 
      		$totalwasitjuri2merah = $nilaijuri2babak1merah[0] + $nilaijuri2babak2merah[0] + $nilaijuri2babak3merah[0];
      		echo $totalwasitjuri2merah;
      	?>
      </td>
      <td>
      	<?php 
      		$totalwasitjuri3merah = $nilaijuri3babak1merah[0] + $nilaijuri3babak2merah[0] + $nilaijuri3babak3merah[0];
      		echo $totalwasitjuri3merah;
      	?>
      </td>
      <td>
      	<?php 
      		$totalwasitjuri4merah = $nilaijuri4babak1merah[0] + $nilaijuri4babak2merah[0] + $nilaijuri4babak3merah[0];
      		echo $totalwasitjuri4merah;
      	?>
      </td>
      <td>
      	<?php 
      		$totalwasitjuri5merah = $nilaijuri5babak1merah[0] + $nilaijuri5babak2merah[0] + $nilaijuri5babak3merah[0];
      		echo $totalwasitjuri5merah;
      	?>
      </td>
      <td>TOTAL/JURI</td>
      <td>
      	<?php 
      		$totalwasitjuri1biru = $nilaijuri1babak1biru[0] + $nilaijuri1babak2biru[0] + $nilaijuri1babak3biru[0];
      		echo $totalwasitjuri1biru;
      	?>
      </td>
      <td>
      	<?php 
      		$totalwasitjuri2biru = $nilaijuri2babak1biru[0] + $nilaijuri2babak2biru[0] + $nilaijuri2babak3biru[0];
      		echo $totalwasitjuri2biru;
      	?>
      </td>
      <td>
      	<?php 
      		$totalwasitjuri3biru = $nilaijuri3babak1biru[0] + $nilaijuri3babak2biru[0] + $nilaijuri3babak3biru[0];
      		echo $totalwasitjuri3biru;
      	?>
      </td>
      <td>
      	<?php 
      		$totalwasitjuri4biru = $nilaijuri4babak1biru[0] + $nilaijuri4babak2biru[0] + $nilaijuri4babak3biru[0];
      		echo $totalwasitjuri4biru;
      	?>
      </td>
      <td>
      	<?php 
      		$totalwasitjuri5biru = $nilaijuri5babak1biru[0] + $nilaijuri5babak2biru[0] + $nilaijuri5babak3biru[0];
      		echo $totalwasitjuri5biru;
      	?>
      </td>
    </tr>
    <?php 
	  	$skorakhirmerah = 0;
      	$skorakhirbiru = 0;
    ?>
    <tr class="text-center" bgcolor="#16C367" style="font-size: 24px; color: white;">
      <td colspan="5">
      	<b>
      	<?php
      				if($totalwasitjuri1merah > $totalwasitjuri1biru) {
      					$skorakhirmerah = $skorakhirmerah + 1;
      				}
      				if($totalwasitjuri2merah > $totalwasitjuri2biru) {
      					$skorakhirmerah = $skorakhirmerah + 1;
      				}
      				if($totalwasitjuri3merah > $totalwasitjuri3biru) {
      					$skorakhirmerah = $skorakhirmerah + 1;
      				}
      				if($totalwasitjuri4merah > $totalwasitjuri4biru) {
      					$skorakhirmerah = $skorakhirmerah + 1;
      				}
      				if($totalwasitjuri5merah > $totalwasitjuri5biru) {
      					$skorakhirmerah = $skorakhirmerah + 1;
      				}
      				echo $skorakhirmerah;
      	?>
      	</b>
      </td>
      <td><b>SKOR</b></td>
      <td colspan="5">
      	<b>
      	<?php
      				if($totalwasitjuri1biru > $totalwasitjuri1merah) {
      					$skorakhirbiru = $skorakhirbiru + 1;
      				}
      				if($totalwasitjuri2biru > $totalwasitjuri2merah) {
      					$skorakhirbiru = $skorakhirbiru + 1;
      				}
      				if($totalwasitjuri3biru > $totalwasitjuri3merah) {
      					$skorakhirbiru = $skorakhirbiru + 1;
      				}
      				if($totalwasitjuri4biru > $totalwasitjuri4merah) {
      					$skorakhirbiru = $skorakhirbiru + 1;
      				}
      				if($totalwasitjuri5biru > $totalwasitjuri5merah) {
      					$skorakhirbiru = $skorakhirbiru + 1;
      				}
      				echo $skorakhirbiru;
      	?>
      	</b>
      </td>
    </tr>
  </tbody>
</table>
</div>
<div class="table-responsive">
	<table class="table">
		<tr>
			<td class="text-left">
				<a href="index.php" class="btn btn-warning" role="button">KEMBALI</a>
			</td>
			<td class="text-right">
				<form name="SetorNilai" id="SetorNilai" method="POST" action="setor_nilai.php" onclick="return cek_selesai();">
					<?php
						if($skorakhirmerah > $skorakhirbiru) {
							$pemenang = $jadwal['nm_merah']." (".$jadwal['kontingen_merah'].")";
						} else {
							$pemenang = $jadwal['nm_biru']." (".$jadwal['kontingen_biru'].")";
						}
						//echo $pemenang;
					?>
					<input type="hidden" name="skorakhirmerah" id="skorakhirmerah" value="<?php echo $skorakhirmerah; ?>">
					<input type="hidden" name="skorakhirbiru" id="skorakhirbiru" value="<?php echo $skorakhirbiru; ?>">
					<input type="hidden" name="pemenang" id="pemenang" value="<?php echo $pemenang; ?>">
					<input type="hidden" name="id_partai" id="id_partai" value="<?php echo $id_partai; ?>">
					<input type="submit" class="btn btn-info" value="SELESAI">
				</form>
			</td>
		</tr>
	</table>
</div>
</div>
<script type="text/javascript">
	setInterval(function(){
		$.ajax({
            url: 'http://192.168.0.100/simulasi/nilai/api.php', 
            data : {'a' : 'get_data_view_tanding', 'id_partai': <?=$_GET["id_partai"]?>},
            type: "GET",
            success: function(obj){
            	$('.content_penilaian').html(obj);

            	console.log('Request ... Done');
            }
        });
	}, 1000);

    var var_start_timer = true;
    var var_stop = false;
	var resume_time = function(){
		if(var_stop)
    	{
    		return false;
    	}
        if(var_start_timer)
        {
            $('.btn-stop').removeClass('btn-danger').addClass('btn-success').html(' RESUME');
            var_start_timer = false;
        }
        else
        {
            var_start_timer = true;
            $('.btn-stop').removeClass('btn-success').addClass('btn-danger').html(' PAUSE');
        }
    }
    function stop_time()
    {	
    	var_stop = true;
        $(".waktu").html("00:00");
    }
    function start_time(duration) 
    {
        var duration = 60 * 5; // 5 Menit         
        var timer = duration, minutes, seconds;

        setInterval(function () {
        	if(var_stop)
	    	{
	    		return false;
	    	}

            if(var_start_timer == false)
            {
                return false;
            }

            minutes = parseInt(timer / 60, 10)
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            if (--timer < 0) {
                alert('Waktu Pertandingan selesai !');
            }
            else
            {
                $(".waktu").html(minutes + ":" + seconds);
            }
        }, 1000);
    }

</script>
</body>
</html>


