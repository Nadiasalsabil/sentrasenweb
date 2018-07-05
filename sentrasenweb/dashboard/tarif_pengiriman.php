<?php
require_once("session.php");
$user_id = $_SESSION['user_session'];
try{
if(isset($_POST['jenispengiriman']) && isset($_POST['dari']) && isset($_POST['ke']) && $_POST['tipe'] == 'vals'){
	
	$query = "SELECT tarif FROM msttarif WHERE via='$_POST[jenispengiriman]' AND dari='$_POST[dari]' AND ke='$_POST[ke]'";
	$exe_query = $use_pdo -> prepare($query);
	$exe_query -> execute();
	$rs = $exe_query -> fetch(PDO::FETCH_ASSOC);
	if($rs['tarif'] != ''){
	echo number_format($rs['tarif']);
		}else{
			echo 'tarif tidak tersedia';
		}
	}
elseif(isset($_POST['jenispengiriman']) && isset($_POST['dari']) && isset($_POST['ke']) && $_POST['tipe'] == 'tabel'){
echo '
<div class="card-title"><h4>hasil pencarian estimasi</h4></div>
 <div class="card-body">
  <div class="table-responsive">
   <table class="table">
   <thead>
   <tr>
   <th>Layanan</th>
   <th>Dikirim Dalam</th>
   <th>Min/PerKg</th>
   <th>Harga</th>
   </tr>
   </thead>
   <tbody>
';
	$querytbl = "SELECT layanan,dikirimdlm,minperkg,tarif FROM msttarif WHERE via='$_POST[jenispengiriman]' AND dari='$_POST[dari]' AND ke='$_POST[ke]'";
	$exe_querytbl = $use_pdo -> prepare($querytbl);
	$exe_querytbl -> execute();
	$baristbl = $exe_querytbl -> fetchAll(PDO::FETCH_ASSOC);
	while($rttbl = array_shift($baristbl)){
	echo '<tr>
	<td><strong>'.$rttbl["layanan"].'</strong></td>
	<td><strong>'.$rttbl["dikirimdlm"].'</strong></td>
	<td><strong>'.$rttbl["minperkg"].'</strong></td>
	<td><strong>Rp.'.number_format($rttbl["tarif"]).'</strong></td>
	</tr>';
	};
echo '</tbody>
  </table>
 </div>
</div>';
	}
} catch(PDOException  $e ){
		echo "Error: ".$e;
		die();
	}
?>