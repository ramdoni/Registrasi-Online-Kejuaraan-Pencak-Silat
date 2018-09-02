<?php 

include "../backend/config/conn.php";

// REQUIRED 
// agar bisa di akses oleh android API
header('Access-Control-Allow-Origin: *');

// get ACTION 
$param = isset($_GET['a']) ? $_GET['a'] : ''; 

if("" != $param)
{
	switch($param)
	{

		case "ceksettingan":
 
			if($username !== $_GET['username'])
			{
				echo json_encode(['status' => 'error', 'messages' => 'Settingan username salah silahkan dicoba kembali']);

				return false;
			}

			if($password !== $_GET['password'])
			{
				echo json_encode(['status' => 'error', 'messages' => 'Settingan Password salah silahkan dicoba kembali']);

				return false;
			}

			if($nama_database !== $_GET['database'])
			{
				echo json_encode(['status' => 'error', 'messages' => 'Settingan Database salah silahkan dicoba kembali']);

				return false;
			}

			echo json_encode(['status' => 'success']);

		break;
		case "partai":
			echo partai();
		break;

		case "juri":
			echo juri();
		break;

		case "login":


			$id_juri = $_GET['id'];
			$password = md5($_GET['password']);

			$sql = "SELECT * FROM wasit_juri WHERE id_juri='{$id_juri}' and pass_juri='{$password}'";

			$exec = mysql_query($sql);

			$row = mysql_fetch_row($exec);
			
			if($row){
				echo json_encode(['status' => 'success']);
			}else{
				echo json_encode(['status' => 'error']);
			}
		break;
		case "jadwal":

			$id = $_GET['id_partai'];

			$sql = "SELECT * FROM jadwal_tanding WHERE id_partai='{$id}'";

			$exec = mysql_query($sql);

			$row = mysql_fetch_assoc($exec);

			if($row)
				echo json_encode($row);
			else
				echo json_encode([]);
		break;
		case "history":

			$id_juri 	= $_GET['id_juri'];
			$id_jadwal 	= $_GET['id_jadwal'];
			$sudut 		= $_GET['sudut'];
			$babak 		= $_GET['babak'];
			
			$sql = mysql_query("SELECT nilai_tanding.*, w.nm_juri FROM nilai_tanding inner join wasit_juri w on w.id_juri=nilai_tanding.id_juri  WHERE id_jadwal='{$id_jadwal}' AND nilai_tanding.id_juri='{$id_juri}' AND sudut='{$sudut}' AND babak='{$babak}' ORDER BY id_nilai DESC");

			$key= 0;
			$data = [];
			while($result = mysql_fetch_array($sql))
			{
				$data[$key] = $result;
				$key++;
			}

			if($data)
				echo json_encode($data);
			else
				echo json_encode([]);
		break;
		case "submit_skor":
			
			$id_jadwal 	= $_POST['id_jadwal'];
			$id_juri 	= $_POST['id_juri'];
			$button 	= $_POST['button'];
			$nilai		= $_POST['nilai'];
			$sudut 		= $_POST['sudut'];
			$babak 		= $_POST['babak'];
			
			// INSERT INTO `nilai_tanding` (`id_nilai`, `id_jadwal`, `id_juri`, `button`, `nilai`, `sudut`, `babak`) VALUES (NULL, 'idpartaisaatlogin', 'juriyglogin', '1+1', '2', 'MERAH/BIRU', 'babakygaktif');
			$result = mysql_query("INSERT INTO nilai_tanding (id_nilai, id_jadwal, id_juri, button, nilai, sudut, babak) VALUES (NULL, '{$id_jadwal}','{$id_juri}','{$button}',{$nilai}, '{$sudut}','{$babak}')");

			if($result)
				echo json_encode(['message' => 'success']);
			else
				echo json_encode(['message' => 'error']);
		break;
		case "delete_nilai":
			// get id_nilai
			$id_nilai = $_GET['id_nilai'];

			$result = mysql_query("DELETE FROM nilai_tanding WHERE id_nilai={$id_nilai}");

			if($result)
				echo json_encode(['status' => 'success']);
			else
				echo json_encode(['status' => 'error']);
		break;
		case "get_data_view_tanding":
			get_data_view_tanding();
		break;
		case "get_data_view_monitoring":
			get_data_view_monitoring();
		break;
	}
}

/**
 * [partai description]
 * @return [type] [description]
 */
function partai()
{
	$sql = "SELECT * FROM jadwal_tanding WHERE status='-' ORDER BY id_partai ASC";

	$exec = mysql_query($sql);

	$result = [];
	
	$key = 0;
	while($item = mysql_fetch_array($exec)):
		$result[$key]['id'] = $item['id_partai'];
		$result[$key]['name'] = $item['partai'];
		$result[$key]['gelanggang'] = $item['gelanggang'];
		$key++;
	endwhile;

	return json_encode($result);
}

function juri()
{
	$sql = "SELECT * FROM wasit_juri";

	$exec = mysql_query($sql);

	$result = [];
	
	$key = 0;
	while($item = mysql_fetch_array($exec)):
		$result[$key]['id'] = $item['id_juri'];
		$result[$key]['name'] = $item['nm_juri'];
		$key++;
	endwhile;

	return json_encode($result);
}

/**
 * [get_data_view_monitoring description]
 * @return [type] [description]
 */
function get_data_view_monitoring()
{
	//dapatkan ID jadwal pertandingan
	$id_partai = mysql_real_escape_string($_GET["id_partai"]);

	ob_start();
	?>
		
	<table class="table">
		<tr class="text-center" bgcolor="#FFFF00">
			<td colspan="10"> BABAK 1</td>
		</tr>
		<tr class="text-center">
			<td colspan="2">JURI 1</td>
			<td colspan="2">JURI 2</td>
			<td colspan="2">JURI 3</td>
			<td colspan="2">JURI 4</td>
			<td colspan="2">JURI 5</td>
		</tr>
		<tr class="text-center">
			<td bgcolor="#ff4d4d">M</td>
			<td bgcolor="#4d94ff">B</td>
			<td bgcolor="#ff4d4d">M</td>
			<td bgcolor="#4d94ff">B</td>
			<td bgcolor="#ff4d4d">M</td>
			<td bgcolor="#4d94ff">B</td>
			<td bgcolor="#ff4d4d">M</td>
			<td bgcolor="#4d94ff">B</td>
			<td bgcolor="#ff4d4d">M</td>
			<td bgcolor="#4d94ff">B</td>
		</tr>
		<tr class="text-center">
			<td>
				<table style="width: 100%;">
					<?php 
						$sqljadwal = "SELECT id_nilai,id_jadwal,button FROM nilai_tanding WHERE id_jadwal={$id_partai} AND babak=1 AND id_juri=1 AND sudut='merah' ORDER BY id_nilai DESC";
						$jadwal_tanding = mysql_query($sqljadwal);
						while($item = mysql_fetch_array($jadwal_tanding)):
					?>
						<tr>
							<th class="text-center"><?=$item['button']?></th>
						</tr>
					<?php endwhile;?>
				</table>
			</td>
			<td>
				<table style="width: 100%;">
					<?php 
						$sqljadwal = "SELECT id_nilai,id_jadwal,button FROM nilai_tanding WHERE id_jadwal={$id_partai} AND babak=1 AND id_juri=1 AND sudut='biru' ORDER BY id_nilai DESC";
						$jadwal_tanding = mysql_query($sqljadwal);
						while($item = mysql_fetch_array($jadwal_tanding)):
					?>
						<tr>
							<th class="text-center"><?=$item['button']?></th>
						</tr>
					<?php endwhile;?>
				</table>
			</td>

			<td>
				<table style="width: 100%;">
					<?php 
						$sqljadwal = "SELECT id_nilai,id_jadwal,button FROM nilai_tanding WHERE id_jadwal={$id_partai} AND babak=1 AND id_juri=2 AND sudut='merah' ORDER BY id_nilai DESC";
						$jadwal_tanding = mysql_query($sqljadwal);
						while($item = mysql_fetch_array($jadwal_tanding)):
					?>
						<tr>
							<th class="text-center"><?=$item['button']?></th>
						</tr>
					<?php endwhile;?>
				</table>
			</td>
			<td>
				<table style="width: 100%;">
					<?php 
						$sqljadwal = "SELECT id_nilai,id_jadwal,button FROM nilai_tanding WHERE id_jadwal={$id_partai} AND babak=1 AND id_juri=2 AND sudut='biru' ORDER BY id_nilai DESC";
						$jadwal_tanding = mysql_query($sqljadwal);
						while($item = mysql_fetch_array($jadwal_tanding)):
					?>
						<tr>
							<th class="text-center"><?=$item['button']?></th>
						</tr>
					<?php endwhile;?>
				</table>
			</td>
			
			<td>
				<table style="width: 100%;">
					<?php 
						$sqljadwal = "SELECT id_nilai,id_jadwal,button FROM nilai_tanding WHERE id_jadwal={$id_partai} AND babak=1 AND id_juri=3 AND sudut='merah' ORDER BY id_nilai DESC";
						$jadwal_tanding = mysql_query($sqljadwal);
						while($item = mysql_fetch_array($jadwal_tanding)):
					?>
						<tr>
							<th class="text-center"><?=$item['button']?></th>
						</tr>
					<?php endwhile;?>
				</table>
			</td>
			<td>
				<table style="width: 100%;">
					<?php 
						$sqljadwal = "SELECT id_nilai,id_jadwal,button FROM nilai_tanding WHERE id_jadwal={$id_partai} AND babak=1 AND id_juri=3 AND sudut='biru' ORDER BY id_nilai DESC";
						$jadwal_tanding = mysql_query($sqljadwal);
						while($item = mysql_fetch_array($jadwal_tanding)):
					?>
						<tr>
							<th class="text-center"><?=$item['button']?></th>
						</tr>
					<?php endwhile;?>
				</table>
			</td>

			<td>
				<table style="width: 100%;">
					<?php 
						$sqljadwal = "SELECT id_nilai,id_jadwal,button FROM nilai_tanding WHERE id_jadwal={$id_partai} AND babak=1 AND id_juri=4 AND sudut='merah' ORDER BY id_nilai DESC";
						$jadwal_tanding = mysql_query($sqljadwal);
						while($item = mysql_fetch_array($jadwal_tanding)):
					?>
						<tr>
							<th class="text-center"><?=$item['button']?></th>
						</tr>
					<?php endwhile;?>
				</table>
			</td>
			<td>
				<table style="width: 100%;">
					<?php 
						$sqljadwal = "SELECT id_nilai,id_jadwal,button FROM nilai_tanding WHERE id_jadwal={$id_partai} AND babak=1 AND id_juri=4 AND sudut='biru' ORDER BY id_nilai DESC";
						$jadwal_tanding = mysql_query($sqljadwal);
						while($item = mysql_fetch_array($jadwal_tanding)):
					?>
						<tr>
							<th class="text-center"><?=$item['button']?></th>
						</tr>
					<?php endwhile;?>
				</table>
			</td>

			<td>
				<table style="width: 100%;">
					<?php 
						$sqljadwal = "SELECT id_nilai,id_jadwal,button FROM nilai_tanding WHERE id_jadwal={$id_partai} AND babak=1 AND id_juri=5 AND sudut='merah' ORDER BY id_nilai DESC";
						$jadwal_tanding = mysql_query($sqljadwal);
						while($item = mysql_fetch_array($jadwal_tanding)):
					?>
						<tr>
							<th class="text-center"><?=$item['button']?></th>
						</tr>
					<?php endwhile;?>
				</table>
			</td>
			<td>
				<table style="width: 100%;">
					<?php 
						$sqljadwal = "SELECT id_nilai,id_jadwal,button FROM nilai_tanding WHERE id_jadwal={$id_partai} AND babak=1 AND id_juri=5 AND sudut='biru' ORDER BY id_nilai DESC";
						$jadwal_tanding = mysql_query($sqljadwal);
						while($item = mysql_fetch_array($jadwal_tanding)):
					?>
						<tr>
							<th class="text-center"><?=$item['button']?></th>
						</tr>
					<?php endwhile;?>
				</table>
			</td>

		</tr>
	</table>

	<table class="table">
		<tr class="text-center" bgcolor="#FFFF00">
			<td colspan="10"> BABAK 2</td>
		</tr>
		<tr class="text-center">
			<td colspan="2">JURI 1</td>
			<td colspan="2">JURI 2</td>
			<td colspan="2">JURI 3</td>
			<td colspan="2">JURI 4</td>
			<td colspan="2">JURI 5</td>
		</tr>
		<tr class="text-center">
			<td bgcolor="#ff4d4d">M</td>
			<td bgcolor="#4d94ff">B</td>
			<td bgcolor="#ff4d4d">M</td>
			<td bgcolor="#4d94ff">B</td>
			<td bgcolor="#ff4d4d">M</td>
			<td bgcolor="#4d94ff">B</td>
			<td bgcolor="#ff4d4d">M</td>
			<td bgcolor="#4d94ff">B</td>
			<td bgcolor="#ff4d4d">M</td>
			<td bgcolor="#4d94ff">B</td>
		</tr>
		<tr class="text-center">
			
			<td>
				<table style="width: 100%;">
					<?php 
						$sqljadwal = "SELECT id_nilai,id_jadwal,button FROM nilai_tanding WHERE id_jadwal={$id_partai} AND babak=2 AND id_juri=1 AND sudut='merah' ORDER BY id_nilai DESC";
						$jadwal_tanding = mysql_query($sqljadwal);
						while($item = mysql_fetch_array($jadwal_tanding)):
					?>
						<tr>
							<th class="text-center"><?=$item['button']?></th>
						</tr>
					<?php endwhile;?>
				</table>
			</td>
			<td>
				<table style="width: 100%;">
					<?php 
						$sqljadwal = "SELECT id_nilai,id_jadwal,button FROM nilai_tanding WHERE id_jadwal={$id_partai} AND babak=2 AND id_juri=1 AND sudut='biru' ORDER BY id_nilai DESC";
						$jadwal_tanding = mysql_query($sqljadwal);
						while($item = mysql_fetch_array($jadwal_tanding)):
					?>
						<tr>
							<th class="text-center"><?=$item['button']?></th>
						</tr>
					<?php endwhile;?>
				</table>
			</td>

			<td>
				<table style="width: 100%;">
					<?php 
						$sqljadwal = "SELECT id_nilai,id_jadwal,button FROM nilai_tanding WHERE id_jadwal={$id_partai} AND babak=2 AND id_juri=2 AND sudut='merah' ORDER BY id_nilai DESC";
						$jadwal_tanding = mysql_query($sqljadwal);
						while($item = mysql_fetch_array($jadwal_tanding)):
					?>
						<tr>
							<th class="text-center"><?=$item['button']?></th>
						</tr>
					<?php endwhile;?>
				</table>
			</td>
			<td>
				<table style="width: 100%;">
					<?php 
						$sqljadwal = "SELECT id_nilai,id_jadwal,button FROM nilai_tanding WHERE id_jadwal={$id_partai} AND babak=2 AND id_juri=2 AND sudut='biru' ORDER BY id_nilai DESC";
						$jadwal_tanding = mysql_query($sqljadwal);
						while($item = mysql_fetch_array($jadwal_tanding)):
					?>
						<tr>
							<th class="text-center"><?=$item['button']?></th>
						</tr>
					<?php endwhile;?>
				</table>
			</td>
			
			<td>
				<table style="width: 100%;">
					<?php 
						$sqljadwal = "SELECT id_nilai,id_jadwal,button FROM nilai_tanding WHERE id_jadwal={$id_partai} AND babak=2 AND id_juri=3 AND sudut='merah' ORDER BY id_nilai DESC";
						$jadwal_tanding = mysql_query($sqljadwal);
						while($item = mysql_fetch_array($jadwal_tanding)):
					?>
						<tr>
							<th class="text-center"><?=$item['button']?></th>
						</tr>
					<?php endwhile;?>
				</table>
			</td>
			<td>
				<table style="width: 100%;">
					<?php 
						$sqljadwal = "SELECT id_nilai,id_jadwal,button FROM nilai_tanding WHERE id_jadwal={$id_partai} AND babak=2 AND id_juri=3 AND sudut='biru' ORDER BY id_nilai DESC";
						$jadwal_tanding = mysql_query($sqljadwal);
						while($item = mysql_fetch_array($jadwal_tanding)):
					?>
						<tr>
							<th class="text-center"><?=$item['button']?></th>
						</tr>
					<?php endwhile;?>
				</table>
			</td>

			<td>
				<table style="width: 100%;">
					<?php 
						$sqljadwal = "SELECT id_nilai,id_jadwal,button FROM nilai_tanding WHERE id_jadwal={$id_partai} AND babak=2 AND id_juri=4 AND sudut='merah' ORDER BY id_nilai DESC";
						$jadwal_tanding = mysql_query($sqljadwal);
						while($item = mysql_fetch_array($jadwal_tanding)):
					?>
						<tr>
							<th class="text-center"><?=$item['button']?></th>
						</tr>
					<?php endwhile;?>
				</table>
			</td>
			<td>
				<table style="width: 100%;">
					<?php 
						$sqljadwal = "SELECT id_nilai,id_jadwal,button FROM nilai_tanding WHERE id_jadwal={$id_partai} AND babak=2 AND id_juri=4 AND sudut='biru' ORDER BY id_nilai DESC";
						$jadwal_tanding = mysql_query($sqljadwal);
						while($item = mysql_fetch_array($jadwal_tanding)):
					?>
						<tr>
							<th class="text-center"><?=$item['button']?></th>
						</tr>
					<?php endwhile;?>
				</table>
			</td>

			<td>
				<table style="width: 100%;">
					<?php 
						$sqljadwal = "SELECT id_nilai,id_jadwal,button FROM nilai_tanding WHERE id_jadwal={$id_partai} AND babak=2 AND id_juri=5 AND sudut='merah' ORDER BY id_nilai DESC";
						$jadwal_tanding = mysql_query($sqljadwal);
						while($item = mysql_fetch_array($jadwal_tanding)):
					?>
						<tr>
							<th class="text-center"><?=$item['button']?></th>
						</tr>
					<?php endwhile;?>
				</table>
			</td>
			<td>
				<table style="width: 100%;">
					<?php 
						$sqljadwal = "SELECT id_nilai,id_jadwal,button FROM nilai_tanding WHERE id_jadwal={$id_partai} AND babak=2 AND id_juri=5 AND sudut='biru' ORDER BY id_nilai DESC";
						$jadwal_tanding = mysql_query($sqljadwal);
						while($item = mysql_fetch_array($jadwal_tanding)):
					?>
						<tr>
							<th class="text-center"><?=$item['button']?></th>
						</tr>
					<?php endwhile;?>
				</table>
			</td>

		</tr>
	</table>

	<table class="table">
		<tr class="text-center" bgcolor="#FFFF00">
			<td colspan="10"> BABAK 3</td>
		</tr>
		<tr class="text-center">
			<td colspan="2">JURI 1</td>
			<td colspan="2">JURI 2</td>
			<td colspan="2">JURI 3</td>
			<td colspan="2">JURI 4</td>
			<td colspan="2">JURI 5</td>
		</tr>
		<tr class="text-center">
			<td bgcolor="#ff4d4d">M</td>
			<td bgcolor="#4d94ff">B</td>
			<td bgcolor="#ff4d4d">M</td>
			<td bgcolor="#4d94ff">B</td>
			<td bgcolor="#ff4d4d">M</td>
			<td bgcolor="#4d94ff">B</td>
			<td bgcolor="#ff4d4d">M</td>
			<td bgcolor="#4d94ff">B</td>
			<td bgcolor="#ff4d4d">M</td>
			<td bgcolor="#4d94ff">B</td>
		</tr>
		<tr class="text-center">
			<td>
				<table style="width: 100%;">
					<?php 
						$sqljadwal = "SELECT id_nilai,id_jadwal,button FROM nilai_tanding WHERE id_jadwal={$id_partai} AND babak=3 AND id_juri=1 AND sudut='merah' ORDER BY id_nilai DESC";
						$jadwal_tanding = mysql_query($sqljadwal);
						while($item = mysql_fetch_array($jadwal_tanding)):
					?>
						<tr>
							<th class="text-center"><?=$item['button']?></th>
						</tr>
					<?php endwhile;?>
				</table>
			</td>
			<td>
				<table style="width: 100%;">
					<?php 
						$sqljadwal = "SELECT id_nilai,id_jadwal,button FROM nilai_tanding WHERE id_jadwal={$id_partai} AND babak=3 AND id_juri=1 AND sudut='biru' ORDER BY id_nilai DESC";
						$jadwal_tanding = mysql_query($sqljadwal);
						while($item = mysql_fetch_array($jadwal_tanding)):
					?>
						<tr>
							<th class="text-center"><?=$item['button']?></th>
						</tr>
					<?php endwhile;?>
				</table>
			</td>

			<td>
				<table style="width: 100%;">
					<?php 
						$sqljadwal = "SELECT id_nilai,id_jadwal,button FROM nilai_tanding WHERE id_jadwal={$id_partai} AND babak=3 AND id_juri=2 AND sudut='merah' ORDER BY id_nilai DESC";
						$jadwal_tanding = mysql_query($sqljadwal);
						while($item = mysql_fetch_array($jadwal_tanding)):
					?>
						<tr>
							<th class="text-center"><?=$item['button']?></th>
						</tr>
					<?php endwhile;?>
				</table>
			</td>
			<td>
				<table style="width: 100%;">
					<?php 
						$sqljadwal = "SELECT id_nilai,id_jadwal,button FROM nilai_tanding WHERE id_jadwal={$id_partai} AND babak=3 AND id_juri=2 AND sudut='biru' ORDER BY id_nilai DESC";
						$jadwal_tanding = mysql_query($sqljadwal);
						while($item = mysql_fetch_array($jadwal_tanding)):
					?>
						<tr>
							<th class="text-center"><?=$item['button']?></th>
						</tr>
					<?php endwhile;?>
				</table>
			</td>
			
			<td>
				<table style="width: 100%;">
					<?php 
						$sqljadwal = "SELECT id_nilai,id_jadwal,button FROM nilai_tanding WHERE id_jadwal={$id_partai} AND babak=3 AND id_juri=3 AND sudut='merah' ORDER BY id_nilai DESC";
						$jadwal_tanding = mysql_query($sqljadwal);
						while($item = mysql_fetch_array($jadwal_tanding)):
					?>
						<tr>
							<th class="text-center"><?=$item['button']?></th>
						</tr>
					<?php endwhile;?>
				</table>
			</td>
			<td>
				<table style="width: 100%;">
					<?php 
						$sqljadwal = "SELECT id_nilai,id_jadwal,button FROM nilai_tanding WHERE id_jadwal={$id_partai} AND babak=3 AND id_juri=3 AND sudut='biru' ORDER BY id_nilai DESC";
						$jadwal_tanding = mysql_query($sqljadwal);
						while($item = mysql_fetch_array($jadwal_tanding)):
					?>
						<tr>
							<th class="text-center"><?=$item['button']?></th>
						</tr>
					<?php endwhile;?>
				</table>
			</td>

			<td>
				<table style="width: 100%;">
					<?php 
						$sqljadwal = "SELECT id_nilai,id_jadwal,button FROM nilai_tanding WHERE id_jadwal={$id_partai} AND babak=3 AND id_juri=4 AND sudut='merah' ORDER BY id_nilai DESC";
						$jadwal_tanding = mysql_query($sqljadwal);
						while($item = mysql_fetch_array($jadwal_tanding)):
					?>
						<tr>
							<th class="text-center"><?=$item['button']?></th>
						</tr>
					<?php endwhile;?>
				</table>
			</td>
			<td>
				<table style="width: 100%;">
					<?php 
						$sqljadwal = "SELECT id_nilai,id_jadwal,button FROM nilai_tanding WHERE id_jadwal={$id_partai} AND babak=3 AND id_juri=4 AND sudut='biru' ORDER BY id_nilai DESC";
						$jadwal_tanding = mysql_query($sqljadwal);
						while($item = mysql_fetch_array($jadwal_tanding)):
					?>
						<tr>
							<th class="text-center"><?=$item['button']?></th>
						</tr>
					<?php endwhile;?>
				</table>
			</td>

			<td>
				<table style="width: 100%;">
					<?php 
						$sqljadwal = "SELECT id_nilai,id_jadwal,button FROM nilai_tanding WHERE id_jadwal={$id_partai} AND babak=3 AND id_juri=5 AND sudut='merah' ORDER BY id_nilai DESC";
						$jadwal_tanding = mysql_query($sqljadwal);
						while($item = mysql_fetch_array($jadwal_tanding)):
					?>
						<tr>
							<th class="text-center"><?=$item['button']?></th>
						</tr>
					<?php endwhile;?>
				</table>
			</td>
			<td>
				<table style="width: 100%;">
					<?php 
						$sqljadwal = "SELECT id_nilai,id_jadwal,button FROM nilai_tanding WHERE id_jadwal={$id_partai} AND babak=3 AND id_juri=5 AND sudut='biru' ORDER BY id_nilai DESC";
						$jadwal_tanding = mysql_query($sqljadwal);
						while($item = mysql_fetch_array($jadwal_tanding)):
					?>
						<tr>
							<th class="text-center"><?=$item['button']?></th>
						</tr>
					<?php endwhile;?>
				</table>
			</td>
		</tr>
	</table>
	<?php 
	
	$out1 = ob_get_contents();

	ob_end_clean();

	echo $out1;
}

/**
 * [get_data_view_tanding description]
 * @return [type] [description]
 */
function get_data_view_tanding()
{

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
	//
	ob_start();
	?>

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

	<?php 

	$out1 = ob_get_contents();

	ob_end_clean();

	echo $out1;
}
?>