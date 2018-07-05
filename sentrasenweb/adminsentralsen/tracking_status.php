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
                    <h3 class="text-primary">Tracking</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Tracking Pengiriman</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->               
				<div class="row">
				<div class="col-lg-12">			
				
				
				<div id="div_table" class="card">
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
												<th>Tujuan</th><!--
												<th>Truck</th>
												<th>Supir</th>-->
												<th>Tipe Barang</th>
												<th style="text-align:center;">Pengiriman</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
	$no = 0;
	/*
	$querytbl = "SELECT 
	transpengiriman.statusterkini,transpengiriman.sts,transpengiriman.tipebarang,transpengiriman.createddate,transpengiriman.noresi,
	mstcust.nmcust,msttujuan.namatujuan,
	msttruck.merktrk,msttruck.jenistrk,msttruck.platnotrk,
	mstsupir.nmsupir 
	FROM transpengiriman,mstcust,mstsupir,msttruck,msttujuan 
	WHERE transpengiriman.sts != 2 AND 
	transpengiriman.nocust = mstcust.nocust AND 
	transpengiriman.notujuan = msttujuan.notujuan AND 
	transpengiriman.notruck = msttruck.notruck AND 
	transpengiriman.nosupir = mstsupir.nosupir 
	ORDER BY transpengiriman.createddate DESC";
	*/
	$querytbl ="select *,tc.sts as stat from transpengiriman_cust tc, mstcust mc where tc.sts != 2 AND tc.nocust = mc.nocust  order by notransc desc";
	$exe_querytbl = $use_pdo -> prepare($querytbl);
	$exe_querytbl -> execute();
	$baristbl = $exe_querytbl -> fetchAll(PDO::FETCH_ASSOC);
	while($rttbl = array_shift($baristbl)){
	$no++;
	if($rttbl['stat'] == 1){
		$pengsts = 'on progress';
	}else if($rttbl['stat'] == 2){
		$pengsts = 'done';
	}else{
		$pengsts = '-';
	}
	$tgltbl = date('d/m/Y',strtotime($rttbl['createddate']));
	echo '<tr id="row'.$no.'">
	<td style="color:black;">'.$no.'</td>
	<td style="color:black;">'.$rttbl["noresi"].'</td>
	<td style="color:black;">'.$rttbl["nmcust"].'</td>
	<td style="color:black;">'.$rttbl["kotatujuan"].'</td>
	<td style="color:black;">'.$rttbl["tipebarang"].'</td>
	<td style="color:black;text-align:center;"><b>'.$pengsts.'</b></td>
	</tr>';
	};
										?>                                          
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
	
	<script src="js/lib/datatables/datatables.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="js/lib/datatables/datatables-init.js"></script>
	
</body>
</html>