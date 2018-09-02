<link rel="stylesheet" type="text/css" href="css/jquery-ui.css" />
<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.10.3.custom.js"></script>
<style type="text/css">
<!--
.stylesum {color: #00CCFF}
-->
</style>

	<?php
	include "config/conn.php";
	$uID = $_SESSION['userID'];
	$NOW = date("Y-m-d");
	
	?>
    <!-- begin: head -->
	<div id="head" class="non-printable">
	  <!-- logo --><h1 id="logo" name="logo"><a href="index.php"></a><a href="index.php"><img src="images/logo_jawara.png" height="85px" /></a></h1>
        <!-- Main menu -->
        <ul id="navigation">
            <li class="highlighted"><a href="home.php">Home</a></li>
            <li class="highlighted"><a href="admin_konfirmasi.php">Konfirmasi</a></li>
            <li class="highlighted"><a href="admin_rekap_data.php">Rekap Data</a></li>
            <li class="highlighted"><a href="admin_undian.php">Undian</a></li>
            <li class="highlighted"><a href="admin_bagan.php">Bagan</a></li>
            <li class="highlighted"><a href="admin_idcard.php">ID Card</a></li>
            <li class="highlighted"><a href="admin_jadwal.php">Jadwal Tanding</a></li>
            <li class="highlighted"><a href="admin_jadwal_tgr.php">Jadwal TGR</a></li>
        	<li class="highlighted"><a href="admin_nilai.php">Form Nilai</a></li>
        </ul>
    <!-- end: head -->
	</div>
	<!-- begin: promo-box -->
	<div id="promo-box" class="non-printable">
		<div align="right" class="inner">
		Hai <a href="admin_ubah_pass.php"><?php echo $_SESSION['username']; ?></a>, <a href="logout.php">Logout</a>
		</div>
	</div>