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
                        <li class="breadcrumb-item active">Master Ongkir</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">			
                <!-- Start Page Content -->
                <div class="row">
				   <div class="col-lg-6">
				   <input type="button" class="btn btn-primary" id="showbtn" onclick="showinputform(1)" value="input data ongkir">
                        <div id="div_input" class="card" style="display:none;">
                            <div class="card-title">
                                <h4>Input Master Ongkir</h4>
								<hr>
                            </div>
                            <div class="card-body">
                                <div class="basic-elements">
                                    <form id="form_in" name="form_in" action="action_iud" method="post" enctype="multipart/form-data" autocomplete="off">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Paket Pengiriman:</label>
                                                    <input type="text" id="tujuan" name="tujuan" class="form-control" placeholder="isi tujuan..." required >
                                                </div>
												<div class="form-group">
                                                    <label>Ongkir:</label>
                                                    <input type="number" id="hargaongkir" name="hargaongkir" class="form-control" placeholder="isi harga ongkos kirim..." required >
                                                </div>
												<center>
												<input type="hidden" name="sbmt_ongkir" >
												<input type="submit" id="sbmt_ongkir" class="btn btn-success" value="submit">
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
				
					<div class="col-lg-6">
                        <div id="div_update" class="card" style="display:none;">
                            <div class="card-title">
                                <h4>Update Master Ongkir</h4>
								<hr>
                            </div>
                            <div class="card-body">
                                <div class="basic-elements">
                                    <form id="form_up" name="form_up" action="action_iud" method="post" enctype="multipart/form-data" autocomplete="off">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Paket Pengiriman:</label>
                                                    <input type="text" id="uptujuan" name="uptujuan" class="form-control" placeholder="isi tujuan..." required >
                                                </div>
												<div class="form-group">
                                                    <label>Ongkir:</label>
                                                    <input type="number" id="uphargaongkir" name="uphargaongkir" class="form-control" placeholder="isi harga ongkos kirim..." required >
                                                </div>
												<center>
												<input type="hidden" id="noaxcust" name="token" >
												<input type="hidden" name="updt_ongkir" >
												<input type="submit" id="updt_ongkir" class="btn btn-success" value="update">
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
                                <h4 class="card-title">Data Ongkir</h4>
								<hr>
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
												<th>No</th>
                                                <th>Nama Paket Pengiriman</th>
												<th>Ongkir</th>
												<th>Tanggal</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
	$no = 0;
	$query = "SELECT * FROM mstharga ORDER BY tujuan ASC";
	$exe_query = $use_pdo -> prepare($query);
	$exe_query -> execute();
	$baris = $exe_query -> fetchAll(PDO::FETCH_ASSOC);
	while($rt = array_shift($baris)){
	$no++;
	$tgl = date('d/m/Y',strtotime($rt['createddate']));
	echo '<tr id="row'.$no.'">
	<td style="color:black;">'.$no.'</td>
	<td style="color:black;">'.$rt["tujuan"].'</td>
	<td style="color:black;">Rp.'.number_format($rt["harga"]).'</td>
	<td style="color:black;">'.$tgl.'</td>
	<td><div class="button-list">
        <button type="button" class="btn btn-info m-b-10 m-l-5" onclick="updatex(\'1\',\''.$rt["noharga"].'\',\''.$rt["tujuan"].'\',\''.$rt["harga"].'\')">update</button>
		<button type="button" class="btn btn-danger m-b-10 m-l-5" onclick="del_row(\''.$rt["noharga"].'\',\''.$no.'\')">delete</button>
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
function updatex(num,nocst,nmcst,notelp){
	if(num == 1){
		$("#div_table").hide();
		$("#div_update").fadeIn();
		$("#noaxcust").val(nocst);
		$("#uptujuan").val(nmcst);
		$("#uphargaongkir").val(notelp);
	} else if(num == 2){
		$("#div_update").hide();
		$("#div_table").fadeIn();
		$("#noaxcust").val("");
		$("#uptujuan").val("");
		$("#uphargaongkir").val("");
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
				$("#sbmt_ongkir").prop("disabled",true);
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
					$("#sbmt_ongkir").prop("disabled",false);
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
				$("#sbmt_ongkir").prop("disabled",true);
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
					$("#sbmt_ongkir").prop("disabled",false);
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
        data: {'del_ongkir':oke,"token":norow},
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