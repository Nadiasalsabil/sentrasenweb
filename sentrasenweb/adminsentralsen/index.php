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
                    <div class="col-md-4">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-usd f-s-40 color-primary"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2>Rp.<?php echo number_format($rt['total_income']); ?></h2>
                                    <p class="m-b-0">Total Income</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-shopping-cart f-s-40 color-success"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php echo $rt['total_transaksi']; ?></h2>
                                    <p class="m-b-0">Total Transaksi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-user f-s-40 color-danger"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php echo $rt['total_customer']; ?></h2>
                                    <p class="m-b-0">Total Customer</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-title">
                                <h4>Status Terkini </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
												<th>resi</th>
                                                <th>customer</th>
                                                <th>tujuan</th>
                                                <th>Status terkini</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php
	// $querytbl = "SELECT
	// transpengiriman.createddate,transpengiriman.noresi,transpengiriman.sts,transpengiriman.statusterkini,
	// mstcust.nmcust,msttujuan.namatujuan
	// FROM transpengiriman,mstcust,msttujuan 
	// WHERE 
	// transpengiriman.nocust = mstcust.nocust AND 
	// transpengiriman.notujuan = msttujuan.notujuan 
	// ORDER BY transpengiriman.createddate DESC LIMIT 3";
	// $exe_querytbl = $use_pdo -> prepare($querytbl);
	// $exe_querytbl -> execute();
	// $baristbl = $exe_querytbl -> fetchAll(PDO::FETCH_ASSOC);
	// while($rttbl = array_shift($baristbl)){
	// $tgltbl = date('d/m/Y',strtotime($rttbl['createddate']));
	// if($rttbl['sts'] == 2){
	// 	$status = '<span class="badge badge-success">Done</span>';
	// }else{
	// 	$status = '<span class="badge badge-warning">.'.$rttbl['statusterkini'].'</span>';
	// }
	// echo '<tr>
	// <td><div class="round-img"><a href=""><img src="images/avatar/4.jpg" alt=""></a></div></td>
	// <td><span>'.$rttbl["noresi"].'</span></td>
	// <td><span>'.$rttbl["nmcust"].'</span></td>
	// <td><span>'.$rttbl["namatujuan"].'</span></td>
	// <td>'.$status.'</td>
	// </tr>';
	// };
										?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="col-lg-4">
							<div class="card">
								<div class="card-body">
									<div class="year-calendar"></div>
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
	
	<script src="js/lib/calendar-2/moment.latest.min.js"></script>
    <!-- scripit init-->
    <script src="js/lib/calendar-2/semantic.ui.min.js"></script>
    <!-- scripit init-->
    <script src="js/lib/calendar-2/prism.min.js"></script>
    <!-- scripit init-->
    <script src="js/lib/calendar-2/pignose.calendar.min.js"></script>
    <!-- scripit init-->
    <script src="js/lib/calendar-2/pignose.init.js"></script>

</body>
</html>