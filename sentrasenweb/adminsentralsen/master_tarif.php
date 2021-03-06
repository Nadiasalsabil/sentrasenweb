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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
                    <h3 class="text-primary">Master</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Master Tarif</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">			
                <!-- Start Page Content -->
                <div class="row">
				   <div class="col-lg-12">
				   <input type="button" class="btn btn-primary" id="showbtn" onclick="showinputform(1)" value="input data tarif">
                        <div id="div_input" class="card" style="display:none;">
                            <div class="card-title">
                                <h4>Input Master Tarif</h4>
								<hr>
                            </div>
                            <div class="card-body">
                                <div class="basic-elements">
                                    <form id="form_in" name="form_in" action="action_iud" method="post" enctype="multipart/form-data" autocomplete="off">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Dari:</label>
                                                    <input type="text" id="dari" name="dari" class="form-control" placeholder="isi tarif ke..." required >
                                                </div>
                                                <div class="form-group">
                                                    <label>Layanan:</label>
                                                    <input type="text" id="layanan" name="layanan" class="form-control" placeholder="isi layanan..." required >
                                                </div>
												<div class="form-group">
                                                    <label>Min Per-Kg:</label>
                                                    <input type="number" id="minperkg" name="minperkg" class="form-control" placeholder="isi minimal per-Kg..." required >
                                                </div>
                                            </div>
											<div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Ke:</label>
                                                    <input type="text" id="ke" name="ke" class="form-control" placeholder="isi tarif dari..." required >
                                                </div>
                                                <div class="form-group">
                                                    <label>Dikirim Dalam:</label>
                                                    <input type="text" id="dikirimdlm" name="dikirimdlm" class="form-control" placeholder="isi dikirim dalam..." required >
                                                </div>
												<div class="form-group">
                                                    <label>Harga:</label>
                                                    <input type="number" id="tarif" name="tarif" class="form-control" placeholder="isi tarif..." required >
                                                </div>
                                            </div>
											<div class="col-lg-12">
												<center>
												<label>pengiriman via:</label>
												<select class="form-control" id="via" name="via">
												    <option value="darat">darat</option>
												    <option value="laut">laut</option>
												    <option value="udara">udara</option>
												</select>
												<br>
												<input type="hidden" name="sbmt_tarif" >
												<input type="submit" id="sbmt_tarif" class="btn btn-success" value="submit">
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
					<div class="col-lg-12">
                        <div id="div_update" class="card" style="display:none;">
                            <div class="card-title">
                                <h4>Update Master Tarif</h4>
								<hr>
                            </div>
                            <div class="card-body">
                                <div class="basic-elements">
                                    <form id="form_up" name="form_up" action="action_iud" method="post" enctype="multipart/form-data" autocomplete="off">
                                        <div class="row">
										<div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Dari:</label>
                                                    <input type="text" id="updari" name="updari" class="form-control" placeholder="isi tarif ke..." required >
                                                </div>
                                                <div class="form-group">
                                                    <label>Layanan:</label>
                                                    <input type="text" id="uplayanan" name="uplayanan" class="form-control" placeholder="isi layanan..." required >
                                                </div>
												<div class="form-group">
                                                    <label>Min Per-Kg:</label>
                                                    <input type="number" id="upminperkg" name="upminperkg" class="form-control" placeholder="isi minimal per-Kg..." required >
                                                </div>
                                            </div>
											<div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Ke:</label>
                                                    <input type="text" id="upke" name="upke" class="form-control" placeholder="isi tarif dari..." required >
                                                </div>
                                                <div class="form-group">
                                                    <label>Dikirim Dalam:</label>
                                                    <input type="text" id="updikirimdlm" name="updikirimdlm" class="form-control" placeholder="isi dikirim dalam..." required >
                                                </div>
												<div class="form-group">
                                                    <label>Harga:</label>
                                                    <input type="number" id="uptarif" name="uptarif" class="form-control" placeholder="isi tarif..." required >
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
												<center>
												<label>pengiriman via:</label>
												<select class="form-control" id="upvia" name="upvia">
												    <option value="darat">darat</option>
												    <option value="laut">laut</option>
												    <option value="udara">udara</option>
												</select>
												<br>
												<input type="hidden" id="noxtrf" name="token" >
												<input type="hidden" name="updt_tarif" >
												<input type="submit" id="updt_tarif" class="btn btn-success" value="update">
												<input type="button" class="btn btn-warning" onclick="updatex(2)" value="close">
												</center>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>							
                        </div>
                    </div>
				<div id="div_table" class="card">
                            <div class="card-body">
                                <h4 class="card-title">Data Customer</h4>
								<hr>
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
												<th>No</th>
                                                <th>Dari</th>
                                                <th>Ke</th>
												<th>Layanan</th>
												<th>Dikirm Dalam</th>
												<th>Min/perKg</th>
												<th>Pengiriman Via</th>
												<th>Harga</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
	$no = 0;
	$query = "SELECT * FROM msttarif ORDER BY dari ASC";
	$exe_query = $use_pdo -> prepare($query);
	$exe_query -> execute();
	$baris = $exe_query -> fetchAll(PDO::FETCH_ASSOC);
	while($rt = array_shift($baris)){
	$no++;
	$tgl = date('d/m/Y',strtotime($rt['createddate']));
	echo '<tr id="row'.$no.'">
	<td style="color:black;">'.$no.'</td>
	<td style="color:black;">'.$rt["dari"].'</td>
	<td style="color:black;">'.$rt["ke"].'</td>
	<td style="color:black;">'.$rt["layanan"].'</td>
	<td style="color:black;">'.$rt["dikirimdlm"].'</td>
	<td style="color:black;">'.$rt["minperkg"].'</td>
	<td style="color:black;">'.$rt["via"].'</td>
	<td style="color:black;">'.$rt["tarif"].'</td>
	<td><div class="button-list">
        <button type="button" class="btn btn-info m-b-10 m-l-5" onclick="updatex(\'1\',\''.$rt["notarif"].'\',\''.$rt["dari"].'\',
		\''.$rt["ke"].'\',\''.$rt["layanan"].'\',\''.$rt["dikirimdlm"].'\',\''.$rt["minperkg"].'\',\''.$rt["tarif"].'\',\''.$rt["via"].'\')">update</button>
		<button type="button" class="btn btn-danger m-b-10 m-l-5" onclick="del_row(\''.$rt["notarif"].'\',\''.$no.'\')">delete</button>
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
//SHOW
function showinputform(num){
	if(num == 1){
		$("#div_input").fadeIn();
	} else if (num == 2){
		$("#div_input").hide();
	}
}
function updatex(num,notrf,dari,ke,layanan,dikirimdlm,minperkg,tarif,via){
	if(num == 1){
		$("#div_table").hide();
		$("#div_update").fadeIn();
		$("#noxtrf").val(notrf);
		$("#updari").val(dari);
		$("#upke").val(ke);
		$("#uplayanan").val(layanan);
		$("#updikirimdlm").val(dikirimdlm);
		$("#upminperkg").val(minperkg);
		$("#uptarif").val(tarif);
		$("#upvia").val(via);
	} else if(num == 2){
		$("#div_update").hide();
		$("#div_table").fadeIn();
		$("#noxtrf").val("");
		$("#updari").val("");
		$("#upke").val("");
		$("#uplayanan").val("");
		$("#updikirimdlm").val("");
		$("#upminperkg").val("");
		$("#uptarif").val("");
		$("#upvia").val("");
	}
}
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
				$("#sbmt_customer").prop("disabled",true);
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
					$("#sbmt_customer").prop("disabled",false);
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
				$("#sbmt_customer").prop("disabled",true);
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
					$("#sbmt_customer").prop("disabled",false);
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
        data: {'del_tarif':oke,"token":norow},
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