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
    <title>SENTRALSEN DASHBOARD</title>
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
                    <h3 class="text-primary">buat order</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">dashboard</a></li>
                        <li class="breadcrumb-item active">buat order</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">			
                <!-- Start Page Content -->
                <div class="row">
				   <div class="col-lg-12">
				   <input type="button" class="btn btn-primary" id="showbtn" onclick="showinputform(1)" value="input data order">
                        <div id="div_input" class="card" style="display:none;">
                            <div class="card-title">
                                <h4>Input Order</h4>
								<hr>
                            </div>
                            <div class="card-body">
                                <div class="basic-elements">
                                    <form id="form_in" name="form_in" action="" method="post" enctype="multipart/form-data" autocomplete="off">
                                        <div class="row">
						<div class="col-lg-6">
						<div class="form-group">
                                 <label>Nama Pengirim:</label>
                                  <textarea name="namapengirim" pattern="[a-zA-Z]+" class="form-control" rows="3" placeholder="Nama Pengirim.."></textarea>
                            </div>
							<div class="form-group">
                                 <label>No Telepon Pengirim:</label>
                                  <textarea name="notlppengirim" pattern="[a-zA-Z]+" class="form-control" rows="3" placeholder="No Telepon Pengirim.."></textarea>
                            </div>
							<div class="form-group">
                                 <label>Nama Penerima:</label>
                                  <textarea name="namapenerima" pattern="[a-zA-Z]+" class="form-control" rows="3" placeholder="Nama Penerima.."></textarea>
                            </div>
							<div class="form-group">
                                 <label>No Telepon Penerima:</label>
                                  <textarea name="notlppenerima" pattern="[a-zA-Z]+" class="form-control" rows="3" placeholder="No Telepon Penerima.."></textarea>
                            </div>
                            <div class="form-group">
                                 <label>deskripsi barang:</label>
                                  <textarea name="deskbrg" pattern="[a-zA-Z]+" class="form-control" rows="3" placeholder="deskripsi barang.."></textarea>
                            </div>
							<div class="form-group">
                                 <label>tanggal pengiriman:</label>
                            <input type="date" id="tglpengiriman"  name="tglpengiriman" placeholder="d-m-Y" class="form-control" required >
							</div>
							<div class="form-group">
                                 <label>waktu pengambilan barang:</label>
                            <input name="pickup_time" id="id_pickup_time" type="text" placeholder="Waktu Pengambilan" class="form-control loading" data-parsley-required="false" data-dtp="dtp_nenK9">
							</div>
							<div class="form-group">
                                 <label>kota asal:</label>
                            <input type="text" id="kotaasal" pattern="[a-zA-Z]+" name="kotaasal" placeholder="kota asal.." class="form-control" required >
							</div>
							<div class="form-group">
                                 <label>kota tujuan:</label>
                            <input type="text" id="kotatujuan" pattern="[a-zA-Z]+" name="kotatujuan" placeholder="kota tujuan.." class="form-control" required >
							</div>
							<div class="form-group">
                                 <label>area asal:</label>
                            <input type="text" id="areaasal" pattern="[a-zA-Z]+" name="areaasal" placeholder="area asal.." class="form-control" required >
							</div>
							<div class="form-group">
                                 <label>detail tujuan:</label>
                            <input type="text" id="detailtujuan"  pattern="[a-zA-Z]+" name="detailtujuan" placeholder="detail tujuan.." class="form-control" required >
							</div>
							<div class="form-group">
                                 <label>lokasi pengambilan:</label>
                            <input type="text" id="lokasipeng" pattern="[a-zA-Z]+" name="lokasipeng" placeholder="lokasi pengambilan.." class="form-control" required >
							</div>
                           </div>
									
							<div class="col-lg-6">
							<div class="form-group">
                                 <label>jumlah barang:</label>
                            <input type="number" id="jumbrg" name="jumbrg" min="0" oninvalid="this.setCustomValidity('jangan minus ')"  placeholder="jumlah barang.." class="form-control" required >
							</div>
							<div class="form-group">
                                 <label>total berat barang (Kg):</label>
                            <input type="number" id="berat" name="berat" min="0" oninvalid="this.setCustomValidity('jangan minus ')"  placeholder="total berat barang.." class="form-control" required >
							</div>
								<div class="form-group">
                                        <label>tipe service:</label>
                                        <input type="text" id="service" pattern="[a-zA-Z]+" name="service" value="door to door" class="form-control" readonly >
										</div>
								<div class="form-group">
                                        <label>payment:</label>
                                        <select class="form-control"  id="payment" name="payment" required >
										<option value="cash">cash</option>
										<option value="kredit">kredit</option>
										</select>
                                    </div>
									<div class="form-group">
                                        <label>tipe barang:</label>
                                        <select class="form-control" id="tipebrg" name="tipebrg" required >
										<option value="elektronik">elektronik</option>
										<option value="furniture">furniture</option>
										<option value="fashion">fashion</option>
										</select>
                                    </div>
                                    <div class="form-group">
                                                    <label>jenis pengiriman:</label>
                                                    <select id="jenispeng" name="jenispeng" class="form-control" required >
													<option value="darat">darat</option>
													<option value="laut">laut</option>
													<option value="udara">udara</option>
													</select>
                                    </div>
												<div class="form-group">
                                                    <label>asal:</label>
<select id="asal" name="asal" class="form-control" required >
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
<select id="tujuan" name="tujuan" class="form-control" required >
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
<hr><input type="button" class="btn btn-sm btn-primary" style="width:200px;" value="cari" onclick="cektarif()" ><hr>
                                                </div>
                            </div>
                                            <div class="col-lg-12">
											<div class="form-group">
                                 <label>catatan (optional):</label>
                            <input type="text" id="catatan" name="catatan" placeholder="catatan tambahan.." class="form-control" >
							</div>
                                                <div class="form-group">
                                                    <label>Biaya (Rp):</label>
                                                    <input type="text" id="biayakirim" name="biayakirim" class="form-control" placeholder="biaya pengiriman (Rp)" required readonly >
                                                </div>
												<center>
												<input type="hidden" name="sbmt_pengirimancustomer" >
												<input type="submit" id="sbmt_pengirimancustomer" class="btn btn-success" value="submit">
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
                                <h4>Update Order</h4>
								<hr>
                            </div>
                            <div class="card-body">
                                <div class="basic-elements">
                                    <form id="form_up" name="form_up" action="action_iud" method="post" enctype="multipart/form-data" autocomplete="off">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Tujuan:</label>
													<input type="hidden" id="noaxcust" name="token" >
                                                    <input type="text" id="upttujuan" name="upttujuan" class="form-control" placeholder="isi tujuan..." required >
                                                </div>
												<center>
												<input type="hidden" name="updt_pengirimancustomer1" >
												<input type="submit" id="updt_pengirimancustomer" class="btn btn-success" value="update">
												<input type="button" class="btn btn-warning" onclick="updatex(2)" value="close">
												</center>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>							
                        </div>
                    </div>
				<!--
				<div id="div_table" class="card">
                            <div class="card-body">
                                <h4 class="card-title">Data Transaksi</h4>
								<hr>
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
												<th>No</th>
                                                <th>Tujuan</th>
												<th>Tanggal</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
	$no = 0;
	$query = "SELECT * FROM msttujuan ORDER BY namatujuan ASC";
	$exe_query = $use_pdo -> prepare($query);
	$exe_query -> execute();
	$baris = $exe_query -> fetchAll(PDO::FETCH_ASSOC);
	while($rt = array_shift($baris)){
	$no++;
	$tgl = date('d/m/Y',strtotime($rt['createddate']));
	echo '<tr id="row'.$no.'">
	<td style="color:black;">'.$no.'</td>
	<td style="color:black;">'.$rt["namatujuan"].'</td>
	<td style="color:black;">'.$tgl.'</td>
	<td><div class="button-list">
        <button type="button" class="btn btn-info m-b-10 m-l-5" onclick="updatex(\'1\',\''.$rt["notujuan"].'\',\''.$rt["namatujuan"].'\')">update</button>
		<button type="button" class="btn btn-danger m-b-10 m-l-5" onclick="del_row(\''.$rt["notujuan"].'\',\''.$no.'\')">delete</button>
    </div></td>
	</tr>';
	};
										?>                                         
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> -->
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
//CEK TARIF
function cektarif(){
    var tipe = "vals";
    var berat = $("#berat").val();
	var jenispeng = $("#jenispeng").val();
	var asal = $("#asal").val();
	var tujuan = $("#tujuan").val();
	//alert(jenispeng+asal+tujuan);
	$.ajax({
        url: 'tarif_pengiriman',
        type: 'POST',
        data: {'tipe':tipe,'jenispengiriman':jenispeng,"dari":asal,"ke":tujuan},
        success: function (msg) {
			$("#biayakirim").val(msg);
        }
    }); 
	
}
//SHOW
function showinputform(num){
	if(num == 1){
		$("#div_input").fadeIn();
	} else if (num == 2){
		$("#div_input").hide();
	}
}
function updatex(num,nocst,nmcst){
	if(num == 1){
		$("#div_table").hide();
		$("#div_update").fadeIn();
		$("#noaxcust").val(nocst);
		$("#upttujuan").val(nmcst);
	} else if(num == 2){
		$("#div_update").hide();
		$("#div_table").fadeIn();
		$("#noaxcust").val("");
		$("#upttujuan").val("");
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
				$("#sbmt_pengirimancustomer").prop("disabled",true);
			},
			success: function(data)
		    {
				//alert('sukses');
				if(data=="invalid")
				{
					// invalid file format.
					$("#err").html("Invalid File !").fadeIn();
				}
				else
				{
					$("#sbmt_pengirimancustomer").prop("disabled",false);
					$("#preview").html(data).fadeIn();
					$("#preview").html(msg);
					//location.reload();
				}
		    },
		  	error: function(e) 
	    	{
				$("#err").html(e).fadeIn();
				alert('error');
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
				$("#updt_pengirimancustomer").prop("disabled",true);
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
					$("#updt_pengirimancustomer").prop("disabled",false);
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
        data: {'del_tujuan':oke,"token":norow},
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