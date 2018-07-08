<?php

	include "../koneksi.php";

	$tujuan = $_GET["tujuan"];
	$query = "SELECT * FROM mstharga WHERE tujuan = '$tujuan'";
	$sql = mysqli_query($con,$query)or die(mysqli_error($con));

	while ($row = mysqli_fetch_array($sql)) { ?>
		<option value="<?php echo $row['tujuan']; ?>"><?php echo $row["tujuan"] ?> </option>
	<?php
	}
	?>
?>