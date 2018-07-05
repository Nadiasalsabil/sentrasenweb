<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>PT SENTRASEN</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">
  </head>
  <body>
  <div id="preview"></div>
    <!-- Navigation -->
    <?php
	include "nav.php";
	?>

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Lacak Pesanan</h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Home</a>
        </li>
        <li class="breadcrumb-item active">Lacak Pesanan</li>
      </ol>

      <div class="row">
        <!-- Sidebar Widgets Column -->
        <div class="col-lg-12">

          <!-- Search Widget -->
          <div class="card mb-4">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
			<form id="form_up" name="form_up" action="action_iud" method="post" enctype="multipart/form-data" autocomplete="off" >
              <div class="input-group">
                <input type="text" name="resi" class="form-control" placeholder="isi nomor resi...">
                <span class="input-group-btn">
					<input type="hidden" name="sbmt_cariresi" >
                  <button type="submit" id="sbmt_cariresi" class="btn btn-secondary" type="button">Go!</button>
                </span>
              </div>
			  </form>
            </div>
          </div>

          <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="card-header"><center>Hasil Cari</center></h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12">
				<div id="hasilcari"></div>
                </div>
              </div>
            </div>
          </div>
 

        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; PT. Sentrasen Putri Deswita 2018</p>
      </div>
      <!-- /.container -->
    </footer>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script>
	//UPDATE FORM
$("#form_up").on("submit",(function(e) {
	e.preventDefault();
	$.ajax({
        	url: "action_cari",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			beforeSend : function()
			{
				$("#sbmt_cariresi").prop("disabled",true);
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
					$("#sbmt_cariresi").prop("disabled",false);
					$("#hasilcari").html(data).fadeIn();
					$("#hasilcari").html(msg);
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