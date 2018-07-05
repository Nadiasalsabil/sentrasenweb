<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <!--<link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">-->
    <title>SENTRALSEN ADMIN PANEL</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
	<link href="css/lib/calendar2/semantic.ui.min.css" rel="stylesheet">
    <link href="css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar">
<div id="preview"></div>
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <!-- header -->
		<?php include('1_header.php'); ?>
        <!-- End header header -->
        <!-- Left Sidebar  -->
        <?php include('1_leftsidebar.php'); ?>
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3>
					</div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
			<?php
	// $query = "SELECT (SELECT COUNT(*) FROM mstcust) AS total_customer,
	// (SELECT COUNT(*) FROM transpengiriman) AS total_transaksi,
	// (SELECT SUM(nominal) FROM transpengiriman) AS total_income";
	// $exe_query = $use_pdo -> prepare($query);
	// $exe_query -> execute();
	// $rt = $exe_query -> fetch(PDO::FETCH_ASSOC);
			?>
                <!-- Start Page Content -->
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-body media-text-left">
                                    <h2>pengiriman via</h2>
                                    <p class="m-b-0">
									<select id="jenispeng" name="jenispeng" class="form-control" required >
										<option value="darat">darat</option>
										<option value="laut">laut</option>
										<option value="udara">udara</option>
									</select>
									</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-body media-text-left">
                                    <h2>asal</h2>
                                    <p class="m-b-0">
									<select id="asal" name="asal" class="form-control" required >
<?php
// try{
// 	$query = "SELECT dari FROM msttarif GROUP BY dari ORDER BY dari ASC";
// 	$exe_query = $use_pdo -> prepare($query);
// 	$exe_query -> execute();
// 	$baris = $exe_query -> fetchAll(PDO::FETCH_ASSOC);	
// 	while($rt = array_shift($baris)){
// 	echo '<option value="'.$rt['dari'].'">'.$rt['dari'].'</option>';	
// 		}
// 	}catch(PDOException  $e ){
// 		echo "Error: ".$e;
// 		die();
// 		}
?>
									</select>
									</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-body media-text-left">
                                    <h2>tujuan</h2>
                                    <p class="m-b-0">
									<select id="tujuan" name="tujuan" class="form-control" required >
<?php
// try{
// 	$query2 = "SELECT ke FROM msttarif GROUP BY ke ORDER BY ke ASC";
// 	$exe_query2 = $use_pdo -> prepare($query2);
// 	$exe_query2 -> execute();
// 	$baris2 = $exe_query2 -> fetchAll(PDO::FETCH_ASSOC);	
// 	while($rt2 = array_shift($baris2)){
// 	echo '<option value="'.$rt2['ke'].'">'.$rt2['ke'].'</option>';	
// 		}
// 	}catch(PDOException  $e ){
// 		echo "Error: ".$e;
// 		die();
// 		}
?>
									</select>
									</p>
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-body media-text-left">
                                    <h2>lihat estimasi</h2>
                                    <p class="m-b-0">
									<input type="button" class="btn btn-primary" style="height:35px;width:100px;" value="cari" onclick="cektarif()" >
									</select>
									</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" >
                    <div class="col-lg-12">
                        <div class="card" id="tabeltarif" >
                        </div>
                    </div>
                </div>
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->
            <?php include('1_footer.php'); ?>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
	
	<script src="js/lib/calendar-2/moment.latest.min.js"></script>
    <!-- scripit init-->
    <script src="js/lib/calendar-2/semantic.ui.min.js"></script>
    <!-- scripit init-->
    <script src="js/lib/calendar-2/prism.min.js"></script>
    <!-- scripit init-->
    <script src="js/lib/calendar-2/pignose.calendar.min.js"></script>
    <!-- scripit init-->
    <script src="js/lib/calendar-2/pignose.init.js"></script>
<script>
//CEK TARIF
function cektarif(){
	var tipe = "tabel";
	var jenispeng = $("#jenispeng").val();
	var asal = $("#asal").val();
	var tujuan = $("#tujuan").val();
	//alert(jenispeng+asal+tujuan);
	$.ajax({
        url: 'tarif_pengiriman',
        type: 'POST',
        data: {'tipe':tipe,'jenispengiriman':jenispeng,"dari":asal,"ke":tujuan},
        success: function (msg) {
			$("#tabeltarif").html(msg);
        }
    }); 
	
}
</script>
</body>
</html>