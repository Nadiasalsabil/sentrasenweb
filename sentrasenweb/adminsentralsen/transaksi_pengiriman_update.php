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
                        <li class="breadcrumb-item active">Update Transaksi Pengiriman</li>
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
                        <div id="div_input" class="card">
                            <div class="card-title">
                                <h4>Update Pengiriman</h4>
								<hr>
                            </div>
                            <div class="card-body">
                                <div class="basic-elements">
                                <!-- FORM-->
								<?php
								$query ="select *,tc.sts as stat from transpengiriman_cust tc, mstcust mc where tc.notransc = '$_GET[token]' AND tc.nocust=mc.nocust";
								$exe_query = $use_pdo -> prepare($query);
								$exe_query -> execute();
								$rtdata = $exe_query -> fetch(PDO::FETCH_ASSOC);
								
								?>
								<form id="form_up" name="form_up" action="" method="post" enctype="multipart/form-data" autocomplete="off">
                                        <div class="row">
						<div class="col-lg-6">
							<div class="form-group">
                                 <label>Invoice :</label>
                                  <textarea name="invoice" class="form-control" rows="3" placeholder="" readonly ><?=$rtdata['noinvoice']?></textarea>
                            </div>
                            <div class="form-group">
                                 <label>deskripsi barang:</label>
                                  <textarea name="deskbrg" class="form-control" rows="3" placeholder=""><?=$rtdata['deskripsibrg']?></textarea>
                            </div>
							<div class="form-group">
                                 <label>tanggal pengiriman:</label>
                            <input type="text" id="tglpengiriman" name="tglpengiriman" placeholder="tanggal pengiriman.." class="form-control" value="<?=$rtdata['tglpeng']?>" required >
							</div>
							<div class="form-group">
                                 <label>waktu pengambilan barang:</label>
                            <input type="text" id="waktupengbrg" name="waktupengbrg" placeholder="waktu pengambilan barang.." value="<?=$rtdata['waktupeng']?>" class="form-control" required >
							</div>
							<div class="form-group">
                                 <label>kota asal:</label>
                            <input type="text" id="kotaasal" name="kotaasal" placeholder="kota asal.." class="form-control" value="<?=$rtdata['kotaasal']?>" required >
							</div>
							<div class="form-group">
                                 <label>kota tujuan:</label>
                            <input type="text" id="kotatujuan" name="kotatujuan" placeholder="kota tujuan.." class="form-control" value="<?=$rtdata['kotatujuan']?>" required >
							</div>
							<div class="form-group">
                                 <label>area asal:</label>
                            <input type="text" id="areaasal" name="areaasal" placeholder="area asal.."  value="<?=$rtdata['areaasal']?>" class="form-control" required >
							</div>
							<div class="form-group">
                                 <label>detail tujuan:</label>
                            <input type="text" id="detailtujuan" name="detailtujuan" placeholder="detail tujuan.."  value="<?=$rtdata['detailtujuan']?>"  class="form-control" required >
							</div>
							<div class="form-group">
                                 <label>lokasi pengambilan:</label>
                            <input type="text" id="lokasipeng" name="lokasipeng" placeholder="lokasi pengambilan.."  value="<?=$rtdata['lokasipeng']?>" class="form-control" required >
							</div>
                           </div>
									
							<div class="col-lg-6">
							<div class="form-group">
                                 <label>Resi :</label>
                                  <textarea name="resi" class="form-control" rows="3" placeholder="" readonly> <?=$rtdata['noresi']?> </textarea>
                            </div>
							<div class="form-group">
                                 <label>jumlah barang:</label>
                            <input type="number" id="jumbrg" name="jumbrg" placeholder="jumlah barang.."  value="<?=$rtdata['jumbrg']?>" class="form-control" required >
							</div>
							<div class="form-group">
                                 <label>total berat barang (Kg):</label>
                            <input type="number" id="berat" name="berat" placeholder="total berat barang.."  value="<?=$rtdata['beratbrg']?>" class="form-control" required >
							</div>
								<div class="form-group">
                                        <label>tipe service:</label>
                                        <input type="text" id="service" name="service" value="door to door" class="form-control" readonly >
										</div>
								<div class="form-group">
                                        <label>payment:</label>
                                        <select class="form-control" style="height:42px;" id="payment" name="payment" required >
										<option value="cash" <?php if($rtdata['payment']=='cash'){ echo "selected"; } ?>>cash</option>
										<option value="kredit" <?php if($rtdata['payment']=='kredit'){ echo "selected"; } ?>>kredit</option>
										</select>
                                    </div>
									<div class="form-group">
                                        <label>tipe barang:</label>
                                        <select class="form-control" style="height:42px;" id="tipebrg" name="tipebrg" required >
										<option value="elektronik" <?php if($rtdata['tipebarang']=='elektronik'){ echo "selected"; } ?>>elektronik</option>
										<option value="furniture" <?php if($rtdata['tipebarang']=='furniture'){ echo "selected"; } ?>>furniture</option>
										<option value="fashion" <?php if($rtdata['tipebarang']=='fashion'){ echo "selected"; } ?>>fashion</option>
										</select>
                                    </div>
                                    <div class="form-group">
                                                    <label>jenis pengiriman:</label>
                                                    <select id="jenispeng" style="height:42px;" name="jenispeng" class="form-control" required >
													<option value="darat">darat</option>
													<option value="laut">laut</option>
													<option value="udara">udara</option>
													</select>
                                    </div>
												<div class="form-group">
                                                    <label>asal:</label>
<select id="asal" name="asal" class="form-control"  style="height:42px;" required >
<?php
try{
	$query = "SELECT dari FROM msttarif GROUP BY dari ORDER BY dari ASC";
	$exe_query = $use_pdo -> prepare($query);
	$exe_query -> execute();
	$baris = $exe_query -> fetchAll(PDO::FETCH_ASSOC);	
	while($rt = array_shift($baris)){
	echo '<option value="'.$rt['dari'].'">'.$rt['dari'].'</option>';	
		}
	}catch(PDOException  $e ){
		echo "Error: ".$e;
		die();
		}
?>
</select>
                                                </div>
												<div class="form-group">
                                                    <label>tujuan:</label>
<select id="tujuan" name="tujuan" class="form-control" style="height:42px;" required >
<?php
try{
	$query2 = "SELECT ke FROM msttarif GROUP BY ke ORDER BY ke ASC";
	$exe_query2 = $use_pdo -> prepare($query2);
	$exe_query2 -> execute();
	$baris2 = $exe_query2 -> fetchAll(PDO::FETCH_ASSOC);	
	while($rt2 = array_shift($baris2)){
	echo '<option value="'.$rt2['ke'].'">'.$rt2['ke'].'</option>';	
		}
	}catch(PDOException  $e ){
		echo "Error: ".$e;
		die();
		}
?>
</select>

                                                </div>
                            </div>
                                            <div class="col-lg-12">
											<div class="form-group">
                                 <label>catatan (optional):</label>
                            <input type="text" id="catatan" name="catatan"  value="<?=$rtdata['catatan']?>" class="form-control" >
							</div>
                                                <div class="form-group">
                                                    <label>Biaya (Rp):</label>
                                                    <input type="text" id="biayakirim" name="biayakirim" class="form-control" placeholder="biaya pengiriman (Rp)"  value="<?=$rtdata['tarif']?>"  readonly >
                                                </div>
												
												<div class="form-group">
                                                    <label>Status:</label>
                                                    <select id="status" style="height:42px;" name="status" class="form-control" required >
													<option value="0" <?php if($rtdata['stat']=='0'){ echo "selected"; }else { echo "";} ?>>Pending</option>
													<option value="1" <?php if($rtdata['stat']=='1'){ echo "selected"; }else { echo "";} ?>>On Progress</option>
													<option value="2" <?php if($rtdata['stat']=='2'){ echo "selected"; }else { echo "";} ?>>Selesai</option>
													<option value="3" <?php if($rtdata['stat']=='3'){ echo "selected"; }else { echo "";} ?>>Approve</option>
													<option value="4" <?php if($rtdata['stat']=='4'){ echo "selected"; }else { echo "";} ?>>Cancel</option>
													<option value="5" <?php if($rtdata['stat']=='5'){ echo "selected"; }else { echo "";} ?>>Gagal</option>
													</select>
												</div>
												<center>
												<input type="hidden" name="sbmt_pengirimancustomerupdate" >
												<input type="hidden" name="notransc" value='<?=$_GET['token']?>'>
												<input type="submit" id="sbmt_pengirimancustomerupdate" class="btn btn-success" value="submit">
												<input type="button" onclick="window.history.back();" class="btn btn-warning" value="back">
												</center>
                                            </div>
                                        </div>
                                    </form>
                                <!-- END FORM-->
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
function sendval(noh){
    var array = noh.split(",");
    $("#ongkirvalsementara").val(array[1]);
    hitungdong1(array[1]);
}
function hitungdong1(valharga){
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
				$("#updt_pengiriman").prop("disabled",true);
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
					$("#updt_pengiriman").prop("disabled",false);
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
</script>
</body>
</html>
<?php }else{
	echo '<script>location.replace("transaksi_pengiriman");</script>';
} ?>