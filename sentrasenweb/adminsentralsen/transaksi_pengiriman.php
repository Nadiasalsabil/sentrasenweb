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
                    <h3 class="text-primary">Transaksi</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Transaksi Pengiriman</li>
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
				   <!--<input type="button" class="btn btn-primary" id="showbtn" onclick="showinputform(1)" value="input pengiriman">-->
                        <div id="div_input" class="card" style="display:none;">
                            <div class="card-title">
                                <h4>Input Pengiriman</h4>
								<hr>
                            </div>
                            <div class="card-body">
                                <div class="basic-elements">
                                    <form id="form_in" name="form_in" action="action_iud" method="post" enctype="multipart/form-data" autocomplete="off" >
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Customer:</label>
													<select class="form-control" id="selectcust" name="selectcust" required >
                                            <?php
	$query1 = "SELECT nocust,nmcust FROM mstcust ORDER BY nmcust ASC";
	$exe_query1 = $use_pdo -> prepare($query1);
	$exe_query1 -> execute();
	$baris1 = $exe_query1 -> fetchAll(PDO::FETCH_ASSOC);
	while($rt1 = array_shift($baris1)){
	echo '<option value="'.$rt1['nocust'].'">'.$rt1['nmcust'].'</option>';
	};
											?>
													</select>
                                                </div>
												<div class="form-group">
                                                    <label>Tujuan:</label>
													<select class="form-control" id="selecttujuan" name="selecttujuan" required >
											<?php
	$query2 = "SELECT notujuan,namatujuan FROM msttujuan ORDER BY namatujuan ASC";
	$exe_query2 = $use_pdo -> prepare($query2);
	$exe_query2 -> execute();
	$baris2 = $exe_query2 -> fetchAll(PDO::FETCH_ASSOC);
	while($rt2 = array_shift($baris2)){
	echo '<option value="'.$rt2['notujuan'].'">'.$rt2['namatujuan'].'</option>';
	};
											?>
											</select>
													</div>
												<div class="form-group">
                                                    <label>Truck:</label>
													<select class="form-control" id="selecttruck" name="selecttruck" required >
											<?php
	$query3 = "SELECT notruck,merktrk,jenistrk,tahuntrk,platnotrk FROM msttruck ORDER BY jenistrk ASC";
	$exe_query3 = $use_pdo -> prepare($query3);
	$exe_query3 -> execute();
	$baris3 = $exe_query3 -> fetchAll(PDO::FETCH_ASSOC);
	while($rt3 = array_shift($baris3)){
	echo '<option value="'.$rt3['notruck'].'">'.$rt3['merktrk'].' '.$rt3['jenistrk'].' - '.$rt3['platnotrk'].'</option>';
	};
											?>
											</select>
                                                </div>
												<div class="form-group">
                                                    <label>Supir:</label>
													<select class="form-control" id="selectsupir" name="selectsupir" required >
											<?php
	$query4 = "SELECT nosupir,nmsupir,notelpsupir FROM mstsupir ORDER BY nmsupir ASC";
	$exe_query4 = $use_pdo -> prepare($query4);
	$exe_query4 -> execute();
	$baris4 = $exe_query4 -> fetchAll(PDO::FETCH_ASSOC);
	while($rt4 = array_shift($baris4)){
	echo '<option value="'.$rt4['nosupir'].'">'.$rt4['nmsupir'].' / '.$rt4['notelpsupir'].'</option>';
	};
											?>
											</select>
													</div>
												<div class="form-group">
                                                    <label>Ongkir:</label>
													<select class="form-control" onchange="sendval(this.value)" id="selectongkir" name="selectongkir" required >
													    <option selected disabled >pilih</option>
											<?php
	$query5 = "SELECT noharga,tujuan,harga FROM mstharga ORDER BY tujuan ASC";
	$exe_query5 = $use_pdo -> prepare($query5);
	$exe_query5 -> execute();
	$baris5 = $exe_query5 -> fetchAll(PDO::FETCH_ASSOC);
	while($rt5 = array_shift($baris5)){
	echo '<option value="'.$rt5['noharga'].','.$rt5['harga'].'">'.$rt5['tujuan'].' - Rp.'.number_format($rt5['harga']).'</option>';
	};
											?>
											</select>
                                                </div>
                                            </div>
											<div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Pengirim:</label>
                                                    <input type="text" class="form-control" name="pengirim" value="PT Sentrasen" readonly >
                                                </div>
												<div class="form-group">
                                                    <label>Tipe Service:</label>
                                                    <input type="text" class="form-control" name="service" value="door to door" readonly >
                                                </div>
												<div class="form-group">
                                                    <label>Payment:</label>
                                                    <select class="form-control" id="selectpayment" name="selectpayment" required >
															<option value="cash">Cash</option>
															<option value="kredit">Kredit</option>
													</select>
                                                </div>
												<div class="form-group">
                                                    <label>Tipe Barang:</label>
                                                    <select class="form-control" id="selecttipebarang" name="selecttipebarang" required >
															<option value="elektronik">Elektronik</option>
															<option value="furniture">Furniture</option>
															<option value="fashion">Fashion</option>
													</select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Jumlah Barang:</label>
                                                    <input type="number" class="form-control" id="jumlahbarang" name="jumlahbarang" onchange="hitungdong2(this.value)" placeholder="0" required >
                                                </div>
                                            </div>
											<div class="col-lg-12">
											<center>
											 <div class="form-group">
                                                    <label>Total:</label>
                                                    <input type="hidden" class="form-control" id="ongkirvalsementara" >
                                                    <input type="text" class="form-control" id="totalbayar" placeholder="0" readonly required >
                                                </div>
                                            <br>
												<input type="hidden" name="sbmt_pengiriman" >
												<input type="submit" id="sbmt_pengiriman" class="btn btn-success" value="submit" disabled >
												<input type="button" class="btn btn-warning" onclick="showinputform(2)" value="close">
												</center>
											</div>
                                        </div>
                                    </form>
                                </div>
                            </div>							
                        </div>
                    </div>
                </div>
				
				<div class="row">
				<div class="col-lg-12">				
				<div id="div_table" class="card">
                            <div class="card-body">
                                <h4 class="card-title">Data Transaksi</h4>
								<hr>
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
												<th>No</th>
												<th>No Resi</th>
                                                <th>Customer</th>
												<th>Tujuan</th> <!--
												<th>Truck</th>
												<th>Supir</th>-->
												<th>Tipe Barang</th>
												<th>Payment</th>
												<th>Ongkir</th>
												<th>Jumlah</th>
												<th>Total (Rp)</th>
												<th>Tanggal</th>
												<th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
	$no = 0;
	/*
	$querytbl = "SELECT 
	transpengiriman.notrans,transpengiriman.nocust,transpengiriman.notujuan,transpengiriman.notruck,transpengiriman.nosupir,transpengiriman.noongkir,
	transpengiriman.noresi,transpengiriman.nominal,transpengiriman.payment,transpengiriman.tipebarang,transpengiriman.createddate,transpengiriman.jumbrg,transpengiriman.total,
	mstcust.nmcust,msttujuan.namatujuan,
	msttruck.merktrk,msttruck.jenistrk,msttruck.platnotrk,
	mstsupir.nmsupir,
	mstharga.tujuan,mstharga.harga 
	FROM 
		transpengiriman,
		mstcust,
		mstharga,
		mstsupir,
		msttruck,
		msttujuan 
	WHERE 
		transpengiriman.sts = 0 AND 
		transpengiriman.nocust = mstcust.nocust AND 
		transpengiriman.notujuan = msttujuan.notujuan AND 
		transpengiriman.notruck = msttruck.notruck AND 
		transpengiriman.nosupir = mstsupir.nosupir AND 
		transpengiriman.noongkir = mstharga.noharga 
	ORDER BY transpengiriman.createddate DESC"; */
	
	$querytbl ="select *,tc.sts as stat from transpengiriman_cust tc, mstcust mc where tc.sts not in ('2','4','5') and tc.nocust = mc.nocust order by notransc desc";
	$exe_querytbl = $use_pdo -> prepare($querytbl);
	$exe_querytbl -> execute();
	$baristbl = $exe_querytbl -> fetchAll(PDO::FETCH_ASSOC);
	while($rttbl = array_shift($baristbl)){
	$no++;
	
	if($rttbl['stat'] == 0){ //pending
		$pengsts = '<span style="color:gray;">Pending</span>';
	}else if($rttbl['stat'] == 1){ //on progress
		$pengsts = '<span style="color:orange;">On Progress</span>';
	}else if($rttbl['stat'] == 2){ //selesai
		$pengsts = '<span style="color:green;">Selesai</span>';
	}else if($rttbl['stat'] == 3){
		$pengsts = '<span style="color:green;">Approved</span>';
	}else if($rttbl['stat'] == 4){
		$pengsts = '<span style="color:yellow;">Cancel</span>';
	}else if($rttbl['stat'] == 5){
		$pengsts = '<span style="color:red;">Gagal</span>';
	}else{
		$pengsts = '-';
	}
	
	$tgltbl = date('d/m/Y',strtotime($rttbl['createddate']));
	echo '<tr id="row'.$no.'">
	<td style="color:black;">'.$no.'</td>
	<td style="color:black;">'.$rttbl["noresi"].'</td>
	<td style="color:black;"><div style="width:100px">'.$rttbl["nmcust"].'</div></td>
	<td style="color:black;"><div style="width:100px">'.$rttbl["kotatujuan"].'</div></td>
	<td style="color:black;">'.$rttbl["tipebarang"].'</td>
	<td style="color:black;">'.$rttbl["payment"].'</td>
	<td style="color:black;"><div style="width:120px">'.$rttbl["kotatujuan"].' - Rp.'.number_format(str_replace(',','',$rttbl["tarif"])).'</div></td>
	<td style="color:black;">'.$rttbl["jumbrg"].'</td>
	<td style="color:black;"><div style="width:100px">Rp.'.number_format(str_replace(',','',$rttbl["total"])).'</div></td>
	<td style="color:black;">'.$tgltbl.'</td>
	<td style="color:black;"><b>'.$pengsts.'<b></td>
	<td><div class="button-list">
        <button type="button" class="btn btn-info m-b-10 m-l-5" onclick="gotoupdatemode(\''.$rttbl["notransc"].'\',\''.$rttbl["nocust"].'\')">update</button>
    <button type="button" class="btn btn-danger m-b-10 m-l-5" onclick="del_row(\''.$rttbl["notransc"].'\',\''.$no.'\')">delete</button>
	</div></td>
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
	
<script>
$(document).ready(function() {
    var table = $('#myTables').DataTable();

    new $.fn.dataTable.FixedHeader(table);
});
/**
$('#myTable').DataTable({
    scrollY: 400,
    scrollCollapse: true,
    paging: true,
    searching: true,
    ordering: false,
    info: false
});
**/
//SHOW
function showinputform(num){
	if(num == 1){
		$("#div_input").fadeIn();
	} else if (num == 2){
		$("#div_input").hide();
	}
}
function gotoupdatemode(token,customer,tujuan,truck,supir,ongkir,payment,tipebarang,barang,total,nominal){
	window.location.href = 'transaksi_pengiriman_update?token='+token+'&customer='+customer+
	'&tujuan='+tujuan+"&truck="+truck+"&supir="+supir+"&ongkir="+ongkir+"&payment="+payment+"&tipebarang="+tipebarang+"&barang="+barang+"&total="+total+"&nominal="+nominal;
}
function sendval(noh){
    var array = noh.split(",");
    $("#ongkirvalsementara").val(array[1]);
    hitungdong1(array[1]);
}
function hitungdong1(valharga){
    $("#sbmt_pengiriman").prop('disabled', false);
    var jumorder = $("#jumlahbarang").val();
    var hit = Number(valharga) * Number(jumorder);
    var yes = hit.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    $("#totalbayar").val("Rp."+yes);
}
function hitungdong2(jumorder){
    var valharga = $("#ongkirvalsementara").val();
    var hit = Number(valharga) * Number(jumorder);
    var yes = hit.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    $("#totalbayar").val("Rp."+yes);
}
//////////////////
//SUBMIT FORM
$("#form_in").on("submit",(function(e) {
	e.preventDefault();
	$.ajax({
        	url: "action_iud",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			beforeSend : function()
			{
				$("#sbmt_pengiriman").prop("disabled",true);
			},
			success: function(data)
		    {
				if(data=="invalid")
				{
					// invalid file format.
					$("#err").html("Invalid File !").fadeIn();
				}
				else
				{
					$("#sbmt_pengiriman").prop("disabled",false);
					$("#preview").html(data).fadeIn();
					$("#preview").html(msg);
					//location.reload();
				}
		    },
		  	error: function(e) 
	    	{
				$("#err").html(e).fadeIn();
	    	} 	        
	   }); 
}));
//UPDATE FORM
$("#form_up").on("submit",(function(e) {
	e.preventDefault();
	$.ajax({
        	url: "action_iud",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			beforeSend : function()
			{
				$("#sbmt_pengiriman").prop("disabled",true);
			},
			success: function(data)
		    {
				if(data=="invalid")
				{
					// invalid file format.
					$("#err").html("Invalid File !").fadeIn();
				}
				else
				{
					$("#sbmt_pengiriman").prop("disabled",false);
					$("#preview").html(data).fadeIn();
					$("#preview").html(msg);
					//location.reload();
				}
		    },
		  	error: function(e) 
	    	{
				$("#err").html(e).fadeIn();
	    	} 	        
	   }); 
}));
//DELETE
function del_row(norow,row){
	var oke = "oke";
	if (confirm("anda yakin ingin menghapus?")) {
    $.ajax({
        url: 'action_iud',
        type: 'POST',
        data: {'del_trans':oke,"token":norow},
        success: function (msg) {
			$("#preview").html(msg);
			$('#row'+row).remove();
        }
    }); 
	}
	return false;
}
</script>
</body>
</html>