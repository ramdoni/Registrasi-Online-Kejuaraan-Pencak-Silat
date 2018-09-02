<?php 
	session_start();
	$id = $_SESSION['userID']; 
	if(isset($_SESSION["userID"]) ) {
	include "config/conn.php";

	//cari data peserta
	$sqlkelastanding = "SELECT * FROM kelastanding";
	$carikelastanding = mysql_query($sqlkelastanding);

	//cari pengundian data
	$sqlhasilundian = "SELECT * FROM undian 
						INNER JOIN peserta ON peserta.ID_peserta=undian.id_peserta 
						INNER JOIN kelastanding ON peserta.kelas_tanding_FK=kelastanding.ID_kelastanding
						ORDER BY undian.id_undian DESC ";
	$carihasilundian = mysql_query($sqlhasilundian);
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BACKEND REGISTRASI SILAT</title>
<!-- CSS Files -->
    <link href="css/reset.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/stylesheet.css" rel="stylesheet" type="text/css" media="all" />

    <script type="text/javascript" src="js/jquery-1.9.1.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.10.3.custom.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.10.3.custom.min.js"></script>
	<script type="text/javascript" src="js/tanggal.js"></script>
	<script type="text/javascript" src="js/tanggals.js"></script>

    <!-- DELETE Confirm Function -->	
	<script>
		function cek_delete()
		{
			if(confirm('Yakin Peserta Dengan Nomor Undiannya Akan dihapus?')){
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
  
<h1>Bagan Pertandingan</h1>
<div align="center">
	<form name="mengundi" id="_form_bagan" method="POST" action="admin_do_bagan.php">
	<table border="0">
	<tr class="printable">
		<td>
			<select name="golongan" id="golongan">
				<option value="">--- Pilih Golongan ---</option>
				<option value="Usia Dini">Usia Dini</option>
				<option value="Pra Remaja">Pra Remaja</option>
				<option value="Remaja">Remaja</option>
				<option value="Dewasa">Dewasa</option>
			</select>
		</td>
		<td>
			<select name="jenis_kelamin" id="jenis_kelamin">
				<option value="">--- Pilih Putra/Putri ---</option>
				<option value="Laki-laki">Putra</option>
				<option value="Perempuan">Putri</option>
			</select>
		</td>
		<td>
			<select name="kelas_tanding" id="kelas_tanding">
				<option value="">--- Pilih Kelas Tanding ---</option>
				<?php while($kelastanding = mysql_fetch_array($carikelastanding)) { ?>
				<option value="<?php echo $kelastanding[0]; ?>"><?php echo $kelastanding[1]; ?></option>
				<?php } ?>
			</select>
		</td>
	</tr>
	<tr class="non-printable">
		<td colspan="3"><input type="submit" name="bagan" value="GENERATE CHART"></td>
	</tr>
	</table>
	</form>
</div>
<button class="non-printable" onclick="window.print()">Cetak Bagan</button>
<div id="_bagan" class="printable"></div>
    
	<style style="text/css">
	@media print
    {
    	.non-printable { display: none; }
    	.printable { display: block; }
    }
	</style>

<!-- start: footer -->
<div id="footer">
	<p>&copy; 2016 <?php echo " - ".date("Y"); ?> IPSI Kabupaten Tangerang </p>
	<!-- end: footer -->
</div>
<!-- end: footer -->
</div>
	<script type="text/javascript" src="js/jquery.bracket-world.min.js"></script>
	<link href="css/jquery.bracket-world.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/index.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript">
	$(document).ready(function(){
		$("#_form_bagan").submit(function(){
			$.ajax({
				url: $(this).attr('action'),
				data:$(this).serialize(),
				type: 'POST',
				datatype:'json',
				success: function (data) {
				jsondata=$.parseJSON(data);
				$('#_bagan').bracket(
					{
						teams:jsondata.teams,
						topOffset:35,
						scale:0.50,
						scaleDelta:0.01,
						horizontal:0,
						height:'1300px',
						icons:true,
						teamNames:jsondata.teamNames
					});
				}
				// console.log(data.teamNames);
			});
			return false;
		})
	})
</script>
</div>
  </body>
</html>
<?php 
	}
	else { 
		header("location:index.php");
	}
?>