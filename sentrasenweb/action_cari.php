<?php
try{
	
	function clean_1($string) {
	$string = str_replace(array('[\', \']'), '', $string);
	$string = str_replace('"', ' ', $string); // Replaces all spaces with hyphens.
	$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
	return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
	}

	function clean_2($string){
    $string = str_replace(array('[\', \']'), ' ', $string);
    $string = preg_replace('/\[.*\]/U', '', $string);
    $string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', ' ', $string);
    $string = htmlentities($string, ENT_COMPAT, 'utf-8');
    $string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $string );
    $string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/') , ' ', $string);
    return strtolower(trim($string, ' '));
	}

	function clean_number($string){
    $string = str_replace(array('[\', \']'), '', $string);
    $string = preg_replace('/\[.*\]/U', '', $string);
    $string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '', $string);
    $string = htmlentities($string, ENT_COMPAT, 'utf-8');
    $string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $string );
    $string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/') , '', $string);
    return strtolower(trim($string, ''));
	}
	
	$database = "u663877139_sen";
	$servername = "localhost";
	$username = "u663877139_sen";
	$password = "on3L0ve44Ll";

    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

/////////////////////////////////////////////////	
//INSERT MASTER CUSTOMER
if(isset($_POST['sbmt_cariresi']) && $_POST['resi'] != ''){
	
	$resi = $_POST['resi'];
	
	echo '<div id="div_table" class="card">
                            <div class="card-body">
                                <h4 class="card-title">Status Pengiriman</h4>
								<hr>
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
												<th>No</th>
												<th>Resi</th>
                                                <th>Customer</th>
												<th>Tujuan</th>
												<th>Truck</th>
												<th>Supir</th>
												<th>Tipe Barang</th>
												<th>Status Terkini</th>
												<th>Pengiriman</th>
                                            </tr>
                                        </thead>
                                        <tbody>';
										
	$no = 0;
	$querytbl = "SELECT 
	transpengiriman.statusterkini,transpengiriman.sts,transpengiriman.tipebarang,transpengiriman.createddate,transpengiriman.noresi,
	mstcust.nmcust,msttujuan.namatujuan,
	msttruck.merktrk,msttruck.jenistrk,msttruck.platnotrk,
	mstsupir.nmsupir 
	FROM transpengiriman,mstcust,mstsupir,msttruck,msttujuan 
	WHERE transpengiriman.noresi = '$resi' AND 
	transpengiriman.nocust = mstcust.nocust AND 
	transpengiriman.notujuan = msttujuan.notujuan AND 
	transpengiriman.notruck = msttruck.notruck AND 
	transpengiriman.nosupir = mstsupir.nosupir 
	ORDER BY transpengiriman.createddate DESC";
	$exe_querytbl = $conn -> prepare($querytbl);
	$exe_querytbl -> execute();
	$baristbl = $exe_querytbl -> fetchAll(PDO::FETCH_ASSOC);
	while($rttbl = array_shift($baristbl)){
	$no++;
	if($rttbl['sts'] == 1){
		$pengsts = 'on progress';
	}else if($rttbl['sts'] == 2){
		$pengsts = 'done';
	}else{
		$pengsts = '-';
	}
	$tgltbl = date('d/m/Y',strtotime($rttbl['createddate']));
	echo '<tr id="row'.$no.'">
	<td style="color:black;">'.$no.'</td>
	<td style="color:black;">'.$rttbl["noresi"].'</td>
	<td style="color:black;">'.$rttbl["nmcust"].'</td>
	<td style="color:black;">'.$rttbl["namatujuan"].'</td>
	<td style="color:black; width:130px;">Merk: '.$rttbl["merktrk"].'<br>Jenis: '.$rttbl["jenistrk"].'<br>Plat: '.$rttbl["platnotrk"].'</td>
	<td style="color:black;">'.$rttbl["nmsupir"].'</td>
	<td style="color:black;">'.$rttbl["tipebarang"].'</td>
	<td style="color:black;">'.$rttbl["statusterkini"].'</td>
	<td style="color:black;"><b>'.$pengsts.'</b></td>
	</tr>';
	};                                    
    echo '                              </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>';
}
} catch(PDOException  $e ){
		echo "Error: ".$e;
		die();
	}	
?>