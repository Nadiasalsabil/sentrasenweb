<?php
	include "../koneksi.php";

    $tujuan = $_GET["tujuan"];
	$berat = $_GET["berat"];

	$query = "SELECT * FROM mstharga where tujuan = '$tujuan'";
	$sql = mysqli_query($con,$query)or die(mysqli_error($con));
	$row = mysqli_fetch_array($sql);

	$total = $row["harga"] * $berat;

	echo $total;
	
?>