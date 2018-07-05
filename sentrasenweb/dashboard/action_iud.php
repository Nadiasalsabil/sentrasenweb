<?php
require_once("session.php");
$user_id = $_SESSION['user_session'];
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
/////////////////////////////////////////////////	
//INSERT MASTER CUSTOMER
if(isset($_POST['sbmt_customer']) && $_POST['namacustomer'] != ''){
	
	$namacustomer = $_POST['namacustomer'];
	$alamat = $_POST['alamat'];
	
	$query = "INSERT INTO mstcust(nmcust,alamatcust,createdby,createddate) VALUES ('$namacustomer','$alamat','$user_id',now())";
	$exe_query = $use_pdo -> prepare($query);
	$exe_query -> execute();
		
	if($exe_query){	
	echo '<script>
		alert("input master customer berhasil");
		location.reload();
		</script>';
	}else{
	echo '<script>
		alert("input master customer gagal");
		location.reload();
		</script>';		
	}
}
//INSERT MASTER TUJUAN
else if(isset($_POST['sbmt_tujuan']) && $_POST['tujuan'] != ''){
	
	$tujuan = $_POST['tujuan'];
	
	$query = "INSERT INTO msttujuan(namatujuan,createdby,createddate) VALUES ('$tujuan','$user_id',now())";
	$exe_query = $use_pdo -> prepare($query);
	$exe_query -> execute();
		
	if($exe_query){	
	echo '<script>
		alert("input master tujuan berhasil");
		location.reload();
		</script>';
	}else{
	echo '<script>
		alert("input master tujuan gagal");
		location.reload();
		</script>';		
	}
}
//INSERT MASTER TRUCK
else if(isset($_POST['sbmt_truck']) && $_POST['merktruck'] != ''){
	
	$merktruck = $_POST['merktruck'];
	$thntruck = $_POST['thntruck'];
	$jnstruck = $_POST['jnstruck'];
	$platnomor = $_POST['platnomor'];
	
	$query = "INSERT INTO msttruck(merktrk,jenistrk,tahuntrk,platnotrk,createdby,createddate) VALUES 
	('$merktruck','$jnstruck','$thntruck','$platnomor','$user_id',now())";
	$exe_query = $use_pdo -> prepare($query);
	$exe_query -> execute();
		
	if($exe_query){	
	echo '<script>
		alert("input master truck berhasil");
		location.reload();
		</script>';
	}else{
	echo '<script>
		alert("input master truck gagal");
		location.reload();
		</script>';		
	}
}
//INSERT MASTER SUPIR
else if(isset($_POST['sbmt_supir']) && $_POST['namasupir'] != ''){
	
	$namasupir = $_POST['namasupir'];
	$notelp = $_POST['notelp'];
	
	$query = "INSERT INTO mstsupir(nmsupir,notelpsupir,createdby,createddate) VALUES ('$namasupir','$notelp','$user_id',now())";
	$exe_query = $use_pdo -> prepare($query);
	$exe_query -> execute();
		
	if($exe_query){	
	echo '<script>
		alert("input master supir berhasil");
		location.reload();
		</script>';
	}else{
	echo '<script>
		alert("input master supir gagal");
		location.reload();
		</script>';		
	}
}
//INSERT MASTER ONGKIR
else if(isset($_POST['sbmt_ongkir']) && $_POST['tujuan'] != ''){
	
	$tujuan = $_POST['tujuan'];
	$hargaongkir = $_POST['hargaongkir'];
	
	$query = "INSERT INTO mstharga(tujuan,harga,createdby,createddate) VALUES ('$tujuan','$hargaongkir','$user_id',now())";
	$exe_query = $use_pdo -> prepare($query);
	$exe_query -> execute();
		
	if($exe_query){	
	echo '<script>
		alert("input master ongkir berhasil");
		location.reload();
		</script>';
	}else{
	echo '<script>
		alert("input master ongkir gagal");
		location.reload();
		</script>';		
	}
}
//INSERT TRANSAKSI PENGIRIMAN
else if(isset($_POST['sbmt_pengiriman'])){
	
	$selectcust = $_POST['selectcust'];
	$selecttujuan = $_POST['selecttujuan'];
	$selecttruck = $_POST['selecttruck'];
	$selectsupir = $_POST['selectsupir'];
	$pengirim = $_POST['pengirim'];
	$service = $_POST['service'];
	$selectpayment = $_POST['selectpayment'];
	$selecttipebarang = $_POST['selecttipebarang'];
	//$selectongkir = $_POST['selectongkir'];
	$selectongkir = explode(',',$_POST['selectongkir']);
	$noongkir = $selectongkir[0];
	$nominal = $selectongkir[1];
	$jumlahbarang = $_POST['jumlahbarang'];
	$total = ($jumlahbarang * $nominal);
	
	$query = "INSERT INTO transpengiriman(nocust,notujuan,notruck,nosupir,noongkir,
	nominal,pengirim,service,payment,tipebarang,statusterkini,
	createdby,createddate,jumbrg,total) VALUES 
	('$selectcust','$selecttujuan','$selecttruck','$selectsupir','$noongkir',
	'$nominal','$pengirim','$service','$selectpayment','$selecttipebarang','-',
	'$user_id',now(),'$jumlahbarang','$total')";
	$exe_query = $use_pdo -> prepare($query);
	$exe_query -> execute();
	$last_id = $use_pdo->lastInsertId();
	
	$tgl = date('d');
	$bln = date('m');
	$thn = date('Y');
	
	$hitchar = strlen($last_id);
	if($hitchar == 0 OR $hitchar == 1){
	$noinv = "INV/".substr($thn, -2)."/".$bln."/A00".$last_id;
	$noresi = substr($thn, -2).$bln."100".$last_id;
	}elseif($hitchar == 2){
	$noinv = "INV/".substr($thn, -2)."/".$bln."/A0".$last_id;
	$noresi = substr($thn, -2).$bln."10".$last_id;
	}else{
	$noinv = "INV/".substr($thn, -2)."/".$bln."/A".$last_id;
	$noresi = substr($thn, -2).$bln."1".$last_id;
	}
	
	$queryup = "UPDATE transpengiriman SET noinvoice='$noinv',noresi='$noresi' WHERE notrans='$last_id'";
	$exe_queryup = $use_pdo -> prepare($queryup);
	$exe_queryup -> execute();
		
	if($exe_query && $exe_queryup){	
	echo '<script>
		alert("transaksi pengiriman berhasil");
		location.reload();
		</script>';
	}else{
	echo '<script>
		alert("transaksi pengiriman gagal");
		location.reload();
		</script>';		
	}
}
//INSERT TRANSAKSI CUSTOMER 
else if(isset($_POST['sbmt_pengirimancustomer'])){
	$user_id = $_SESSION['user_session'];
	$nocust 		= $user_id;
	$deskbrg 		= $_POST['deskbrg'];
	$tglpengiriman 	= $_POST['tglpengiriman'];
	$waktupengbrg 	= $_POST['waktupengbrg'];
	$kotaasal 		= $_POST['kotaasal'];
	$kotatujuan 	= $_POST['kotatujuan'];
	$areaasal 		= $_POST['areaasal'];
	$detailtujuan 	= $_POST['detailtujuan'];
	$lokasipeng 	= $_POST['lokasipeng'];
	$jumbrg 		= $_POST['jumbrg'];
	$berat 			= $_POST['berat'];
	$service 		= $_POST['service'];
	$payment 		= $_POST['payment'];
	$tipebrg 		= $_POST['tipebrg'];
	$jenispeng 		= $_POST['jenispeng'];
	$asal 			= $_POST['asal'];
	$tujuan 		= $_POST['tujuan'];
	$catatan 		= $_POST['catatan'];
	$biayakirim 	= str_replace(',','',$_POST['biayakirim']);
	
	$tarif			=$biayakirim;//"0";
	$total			=$biayakirim;//"0";
	$sts			="0"; //0=pending, 1=approve, 2=on proses, 3=sukses, 4=cancel, 5=gagal, 
	$tgl_now		=date("Y-m-d H:i:s");
	
	//$selectongkir 	= explode(',',$_POST['selectongkir']);
	//$noongkir 		= $selectongkir[0];
	//$nominal 		= $selectongkir[1];
	//$jumlahbarang 	= $_POST['jumlahbarang'];
	//$total 			= ($jumlahbarang * $nominal);
	
	$query = "INSERT INTO transpengiriman_cust(
								nocust,noinvoice,noresi,beratbrg,jumbrg,tarif,total,sts,deskripsibrg,tglpeng,waktupeng,kotaasal,kotatujuan,areaasal,detailtujuan,lokasipeng,service,payment,tipebarang,createddate,catatan
								) VALUES 
								(
								'$nocust',
								'',
								'',
								'$berat',
								'$jumbrg',
								'$tarif',
								'$total',
								'$sts',
								'$deskbrg',
								'$tglpengiriman',
								'$waktupengbrg',
								'$kotaasal',
								'$kotatujuan',
								'$areaasal',
								'$detailtujuan',
								'$lokasipeng',
								'$service',
								'$payment',
								'$tipebrg',
								'$tgl_now',
								'$catatan'
								)";
	
	$exe_query = $use_pdo -> prepare($query);
	$exe_query -> execute();
	$last_id = $use_pdo->lastInsertId();
	
	$tgl = date('d');
	$bln = date('m');
	$thn = date('Y');
	
	$hitchar = strlen($last_id);
	if($hitchar == 0 OR $hitchar == 1){
	$noinv = "INV/".substr($thn, -2)."/".$bln."/A00".$last_id;
	$noresi = substr($thn, -2).$bln."100".$last_id;
	}elseif($hitchar == 2){
	$noinv = "INV/".substr($thn, -2)."/".$bln."/A0".$last_id;
	$noresi = substr($thn, -2).$bln."10".$last_id;
	}else{
	$noinv = "INV/".substr($thn, -2)."/".$bln."/A".$last_id;
	$noresi = substr($thn, -2).$bln."1".$last_id;
	}
	
	$queryup = "UPDATE transpengiriman_cust SET noinvoice='$noinv',noresi='$noresi' WHERE notransc='$last_id'";
	$exe_queryup = $use_pdo -> prepare($queryup);
	$exe_queryup -> execute();
		
	if($exe_query && $exe_queryup){	
	echo '<script>
		alert("transaksi pengiriman berhasil");
		location.reload();
		</script>';
	}else{
	echo '<script>
		alert("transaksi pengiriman gagal");
		location.reload();
		</script>';		
	}
}

/////////////////////////////////////////////////
//UPDATE MASTER CUSTOMER
else if(isset($_POST['updt_customer']) && $_POST['token'] != ''){
	
	$uptcustomer = $_POST['uptcustomer'];
	$upalamat = $_POST['upalamat'];
	$token = $_POST['token'];
	
	$query = "UPDATE mstcust SET nmcust='$uptcustomer',alamatcust='$upalamat',modifiedby='$user_id',modifieddate = now() WHERE nocust='$token'";
	$exe_query = $use_pdo -> prepare($query);
	$exe_query -> execute();
		
	if($exe_query){	
	echo '<script>
		alert("update master customer berhasil");
		location.reload();
		</script>';
	}else{
	echo '<script>
		alert("update master customer gagal");
		location.reload();
		</script>';		
	}
}
//UPDATE MASTER TUJUAN
else if(isset($_POST['updt_tujuan']) && $_POST['token'] != ''){
	
	$upttujuan = $_POST['upttujuan'];
	$token = $_POST['token'];
	
	$query = "UPDATE msttujuan SET namatujuan = '$upttujuan', modifiedby = '$user_id', modifieddate = now() WHERE notujuan = '$token'";
	$exe_query = $use_pdo -> prepare($query);
	$exe_query -> execute();
		
	if($exe_query){	
	echo '<script>
		alert("update master tujuan berhasil");
		location.reload();
		</script>';
	}else{
	echo '<script>
		alert("update master tujuan gagal");
		location.reload();
		</script>';		
	}
}
//UPDATE MASTER TRUCK
else if(isset($_POST['updt_truck']) && $_POST['token'] != ''){
	
	$token = $_POST['token'];
	$upmerktruck = $_POST['upmerktruck'];
	$upthntruck = $_POST['upthntruck'];
	$upjnstruck = $_POST['upjnstruck'];
	$upplatnomor = $_POST['upplatnomor'];
	
	$query = "UPDATE msttruck SET merktrk = '$upmerktruck',tahuntrk = '$upthntruck',jenistrk = '$upjnstruck',
	platnotrk = '$upplatnomor',modifiedby = '$user_id',modifieddate = now() WHERE notruck = '$token'";
	$exe_query = $use_pdo -> prepare($query);
	$exe_query -> execute();
		
	if($exe_query){	
	echo '<script>
		alert("update master truck berhasil");
		location.reload();
		</script>';
	}else{
	echo '<script>
		alert("update master truck gagal");
		location.reload();
		</script>';		
	}
}
//UPDATE MASTER SUPIR
else if(isset($_POST['updt_supir']) && $_POST['token'] != ''){
	
	$upsupir = $_POST['upsupir'];
	$upnotelp = $_POST['upnotelp'];
	$token = $_POST['token'];
	
	$query = "UPDATE mstsupir SET nmsupir='$upsupir',notelpsupir='$upnotelp',modifiedby='$user_id',
	modifieddate=now() WHERE nosupir = '$token'";
	$exe_query = $use_pdo -> prepare($query);
	$exe_query -> execute();
		
	if($exe_query){	
	echo '<script>
		alert("update master supir berhasil");
		location.reload();
		</script>';
	}else{
	echo '<script>
		alert("update master supir gagal");
		location.reload();
		</script>';		
	}
}
//UPDATE MASTER ONGKIR
else if(isset($_POST['updt_ongkir']) && $_POST['token'] != ''){
	
	$uptujuan = $_POST['uptujuan'];
	$uphargaongkir = $_POST['uphargaongkir'];
	$token = $_POST['token'];
	
	$query = "UPDATE mstharga SET tujuan='$uptujuan',harga='$uphargaongkir',modifiedby='$user_id',
	modifieddate=now() WHERE noharga = '$token'";
	$exe_query = $use_pdo -> prepare($query);
	$exe_query -> execute();
		
	if($exe_query){	
	echo '<script>
		alert("update master ongkir berhasil");
		location.reload();
		</script>';
	}else{
	echo '<script>
		alert("update master ongkir gagal");
		location.reload();
		</script>';		
	}
}
//UPDATE TRANSAKSI PENGIRIMAN
else if(isset($_POST['updt_pengiriman'])){
	
	$token = $_POST['token'];
	$upselectcust = $_POST['upselectcust'];
	$upselecttujuan = $_POST['upselecttujuan'];
	$upselecttruck = $_POST['upselecttruck'];
	$upselectsupir = $_POST['upselectsupir'];
	$uppengirim = $_POST['uppengirim'];
	$upservice = $_POST['upservice'];
	$upselectpayment = $_POST['upselectpayment'];
	$upselecttipebarang = $_POST['upselecttipebarang'];
	//$selectongkir = $_POST['selectongkir'];
	$upselectongkir = explode(',',$_POST['upselectongkir']);
	$noongkir = $upselectongkir[0];
	$nominal = $upselectongkir[1];
	$jumlahbarang = $_POST['jumlahbarang'];
	$total = ($jumlahbarang * $nominal);
	
	$query = "UPDATE transpengiriman SET nocust='$upselectcust',notujuan='$upselecttujuan',nosupir='$upselectsupir',notruck='$upselecttruck',
	noongkir='$noongkir',nominal='$nominal',pengirim='$uppengirim',service='$upservice',payment='$upselectpayment',
	tipebarang='$upselecttipebarang',modifiedby='$user_id',modifieddate=now(),jumbrg='$jumlahbarang',total='$total' WHERE notrans='$token'";
	$exe_query = $use_pdo -> prepare($query);
	$exe_query -> execute();
		
	if($exe_query){	
	echo '<script>
		alert("update transaksi pengiriman berhasil");
		window.history.back();
		</script>';
	}else{
	echo '<script>
		alert("update transaksi pengiriman gagal");
		location.reload();
		</script>';		
	}
}
/////////////////////////////////////////////////
//DELETE MASTER CUSTOMER
else if(isset($_POST['del_customer']) && $_POST['token'] != ''){
	
	$token = $_POST['token'];
	
	$query = "DELETE FROM mstcust WHERE nocust = '$token'";
	$exe_query = $use_pdo -> prepare($query);
	$exe_query -> execute();
		
	if($exe_query){	
	echo '<script>
		alert("delete master customer berhasil");
		//location.reload();
		</script>';
	}else{
	echo '<script>
		alert("delete master customer gagal");
		//location.reload();
		</script>';		
	}
}
//DELETE MASTER TUJUAN
else if(isset($_POST['del_tujuan']) && $_POST['token'] != ''){
	
	$token = $_POST['token'];
	
	$query = "DELETE FROM msttujuan WHERE notujuan = '$token'";
	$exe_query = $use_pdo -> prepare($query);
	$exe_query -> execute();
		
	if($exe_query){	
	echo '<script>
		alert("delete master tujuan berhasil");
		//location.reload();
		</script>';
	}else{
	echo '<script>
		alert("delete master tujuan gagal");
		//location.reload();
		</script>';		
	}
}
//DELETE MASTER TRUCK
else if(isset($_POST['del_truck']) && $_POST['token'] != ''){
	
	$token = $_POST['token'];
	
	$query = "DELETE FROM msttruck WHERE notruck = '$token'";
	$exe_query = $use_pdo -> prepare($query);
	$exe_query -> execute();
		
	if($exe_query){	
	echo '<script>
		alert("delete master truck berhasil");
		//location.reload();
		</script>';
	}else{
	echo '<script>
		alert("delete master truck gagal");
		//location.reload();
		</script>';		
	}
}
//DELETE MASTER SUPIR
else if(isset($_POST['del_supir']) && $_POST['token'] != ''){
	
	$token = $_POST['token'];
	
	$query = "DELETE FROM mstsupir WHERE nosupir = '$token'";
	$exe_query = $use_pdo -> prepare($query);
	$exe_query -> execute();
		
	if($exe_query){	
	echo '<script>
		alert("delete master supir berhasil");
		//location.reload();
		</script>';
	}else{
	echo '<script>
		alert("delete master supir gagal");
		//location.reload();
		</script>';		
	}
}
//DELETE MASTER ONGKIR
else if(isset($_POST['del_ongkir']) && $_POST['token'] != ''){
	
	$token = $_POST['token'];
	
	$query = "DELETE FROM mstharga WHERE noharga = '$token'";
	$exe_query = $use_pdo -> prepare($query);
	$exe_query -> execute();
		
	if($exe_query){	
	echo '<script>
		alert("delete master ongkir berhasil");
		//location.reload();
		</script>';
	}else{
	echo '<script>
		alert("delete master ongkir gagal");
		//location.reload();
		</script>';		
	}
}
//DELETE TRANSAKSI PENGIRIMAN
else if(isset($_POST['del_trans']) && $_POST['token'] != ''){
	
	$token = $_POST['token'];
	
	$query = "DELETE FROM transpengiriman WHERE notrans = '$token'";
	$exe_query = $use_pdo -> prepare($query);
	$exe_query -> execute();
		
	if($exe_query){	
	echo '<script>
		alert("delete transaksi pengiriman berhasil");
		//location.reload();
		</script>';
	}else{
	echo '<script>
		alert("delete transaksi pengiriman gagal");
		//location.reload();
		</script>';		
	}
}
/////////////////////////////
//UPDATE STATUS TERKINI
else if(isset($_POST['sbmt_status']) && $_POST['ststerkini'] != ''){
	
	$token = $_POST['token'];
	$ststerkini = $_POST['ststerkini'];
	$stspengiriman = $_POST['stspengiriman'];
	
	$query = "INSERT INTO logstatuspengiriman(notrans,lokasi,createdby,logtime) VALUES ('$token','$ststerkini','$user_id',now())";
	$exe_query = $use_pdo -> prepare($query);
	$exe_query -> execute();
	
	$queryup = "UPDATE transpengiriman SET statusterkini='$ststerkini',sts='$stspengiriman' WHERE notrans='$token'";
	$exe_queryup = $use_pdo -> prepare($queryup);
	$exe_queryup -> execute();
		
	if($exe_query && $exe_queryup){	
	echo '<script>
		alert("update status pengiriman berhasil");
		location.reload();
		</script>';
	}else{
	echo '<script>
		alert("update status pengiriman gagal");
		location.reload();
		</script>';		
	}
}
} catch(PDOException  $e ){
		echo "Error: ".$e;
		die();
	}	
?>