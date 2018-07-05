<?php if(isset($_GET['token']) && $_GET['token'] != ''){ ?>
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
	<style>
@page { size: auto;  margin: 5mm; }
</style>
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
                    <h3 class="text-primary">Laporan</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Detail Invoice</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                   <!-- isi disini brow --> 
				   <div class="col-lg-12">
				   <?php
				   /*
$query = "SELECT 
	transpengiriman.noinvoice,transpengiriman.nominal,transpengiriman.payment,transpengiriman.tipebarang,transpengiriman.createddate,
	transpengiriman.service,transpengiriman.createddate,transpengiriman.noresi,transpengiriman.jumbrg,transpengiriman.total,
	mstcust.nmcust,msttujuan.namatujuan,
	msttruck.merktrk,msttruck.jenistrk,msttruck.platnotrk,
	mstsupir.nmsupir,mstsupir.notelpsupir,
	mstharga.tujuan,mstharga.harga 
	FROM transpengiriman,mstcust,mstharga,mstsupir,msttruck,msttujuan 
	WHERE 
	transpengiriman.notrans = '$_GET[token]' AND 
	transpengiriman.nocust = mstcust.nocust AND 
	transpengiriman.notujuan = msttujuan.notujuan AND 
	transpengiriman.notruck = msttruck.notruck AND 
	transpengiriman.nosupir = mstsupir.nosupir AND 
	transpengiriman.noongkir = mstharga.noharga";
	*/
	
	$query ="select * from transpengiriman_cust tc, mstcust mc where tc.notransc = '$_GET[token]' AND tc.nocust=mc.nocust  order by notransc desc";
	$exe_query = $use_pdo -> prepare($query);
	$exe_query -> execute();
	$rt = $exe_query -> fetch(PDO::FETCH_ASSOC);
				   ?>
                        <div id="div_print" class="card">
                            <div class="card-title">
                                <center><h4>INVOICE #<?php echo $rt['noinvoice']; ?></h4></center>
								<hr>
								PT SENTRALSEN<br>
								notelp: 02169J055<br>
								Jln Jalan no.10, Planet Bekasi
                            </div>
							<hr>
                            <div class="card-body">
                                <div class="basic-elements">
                                        <div class="row">
										<div class="col-lg-12">
										<div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
												<th style="background-color:#B9DCFF;text-align:center;">Tgl Transaksi</th>
                                                <th style="background-color:#B9DCFF;text-align:center;">Invoice</th>
                                                <th style="background-color:#B9DCFF;text-align:center;">Customer</th>
												<th style="background-color:#B9DCFF;text-align:center;">Tujuan</th>
												<th style="background-color:#B9DCFF;text-align:center;">Kota Asal</th>
												<th style="background-color:#B9DCFF;text-align:center;">Tipe Barang</th>
												<th style="background-color:#B9DCFF;text-align:center;">Payment</th>
												<th style="background-color:#B9DCFF;text-align:center;">Ongkir</th>
                                            </tr>
                                        </thead>
											<tbody>
											<tr>
											<td style="background-color:white;color:black;text-align:left;"><?php echo date('d/m/Y',strtotime($rt['createddate'])); ?></td>
											<td style="background-color:white;color:black;text-align:left;"><?php echo $rt['noinvoice']; ?></td>
											<td style="background-color:white;color:black;text-align:left;"><?php echo $rt['nmcust']; ?></td>
											<td style="background-color:white;color:black;text-align:left;"><?php echo $rt['kotatujuan']; ?></td>
											<td style="background-color:white;color:black;text-align:left;"><?php echo $rt['areaasal']; ?></td>
											
											<td style="background-color:white;color:black;text-align:left;"><?php echo $rt['tipebarang']; ?></td>
											<td style="background-color:white;color:black;text-align:left;"><?php echo $rt['payment']; ?></td>
											<td style="background-color:white;color:black;text-align:left;">
											Tujuan: <?php echo $rt['kotatujuan']; ?><br>
											Biaya: Rp.<?php echo number_format(str_replace(',','',$rt['tarif'])); ?></td>
											</tr>
											<tr>
											<td colspan="8" style="background-color:white;color:black;text-align:right;">-</td>
											</tr>
											<tr>
											<td colspan="7" style="background-color:white;color:black;text-align:right;">Jumlah Barang</td>
											<td style="background-color:white;color:black;text-align:right;"><?php echo $rt['jumbrg']; ?></td>
											</tr>
											<tr>
											<td colspan="7" style="background-color:white;color:black;text-align:right;">Total</td>
											<td style="background-color:white;color:black;text-align:right;">Rp.<?php echo number_format(str_replace(',','',$rt['total'])); ?></td>
											</tr>
											<tr>
											<td colspan="7" style="background-color:white;color:black;text-align:right;">Service</td>
											<td style="background-color:white;color:black;text-align:right;"><?php echo $rt['service']; ?></td>
											</tr>
											<tr>
											<td colspan="7" style="background-color:white;color:black;text-align:right;">Nomor Resi</td>
											<td style="background-color:white;color:black;text-align:right;"><?php echo $rt['noresi']; ?></td>
											</tr>
													</tbody>
												</table>
											</div>
										</div>
                                        </div>
                                </div>
                            </div>							
                        </div>
						<div class="col-lg-12">
											<center>
											<br>
												<input type="button" onclick="printdong()" class="btn btn-success" value="print">
												<input type="button" onclick="window.history.back();" class="btn btn-warning" value="back">
												</center>
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
<script>
function printdong(){
	var printContents = document.getElementById("div_print").innerHTML;
     var originalContents = document.body.innerHTML;
     document.body.innerHTML = printContents;
	 
	var originalTitle = document.title;
	document.title = "-";
	 
	 window.focus();
     window.print();
	 //window.close();
	 document.title = originalTitle;
     document.body.innerHTML = originalContents;

}
</script>
</body>
</html>
<?php }else{
	echo '<script>location.replace("http://kitabikinin.esy.es/jasapengiriman/sentralsen/transaksi_invoice");</script>';
} ?>