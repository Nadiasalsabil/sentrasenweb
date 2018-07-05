<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PT SENTRALSEN</title>
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
      <h1 class="mt-4 mb-3">Login / Daftar
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Home</a>
        </li>
        <li class="breadcrumb-item active">login & daftar</li>
      </ol>

      <!-- Content Row -->
      <div class="row">
        <!-- Map Column -->
        <div class="col-lg-6 mb-6">
    <center><h4>Login</h4></center>
        <form id="loginform" action="" method="post" enctype="multipart/form-data" autocomplete="off" >
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email"  class="form-control" placeholder="email" required >
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password"  class="form-control" placeholder="password" required >
                                    </div>
                  <input type="hidden" name="logindong" value="logindong" readonly />
                                    <button type="submit" name="logindong" class="btn btn-primary" style="width:100%;">Sign in</button>
                                    <br><br><br>
        </form>
        </div>
        <!-- Contact Details Column -->
        <div class="col-lg-6 mb-6">
      <center><h4>Daftar</h4></center>
        <form id="daftarform" action="dashboard/proses" method="post" enctype="multipart/form-data" autocomplete="off" >
             <div class="form-group">
       <label>Email</label>
       <input type="text" name="regemail" class="form-control" placeholder="email aktif.." required >
       </div>
       <div class="form-group">
       <label>Password</label>
       <input type="password" name="regpassword"  class="form-control" placeholder="password.." required >
       </div>
       <div class="form-group">
       <label>nama</label>
       <input type="text" name="regnama"  class="form-control" pattern="[a-zA-Z]+" oninvalid="this.setCustomValidity('Input hanya boleh huruf a-z ')" placeholder="nama.." required >
       </div>
       <div class="form-group">
       <label>alamat</label>
       <input type="text" name="regalamat"  class="form-control" placeholder="alamat.." required >
       </div>
       <div class="form-group">
       <label>nomor telepon</label>
       <input type="text" name="regnotelp"  class="form-control" pattern="^\d{12}$" oninvalid="this.setCustomValidity('Input hanya boleh nomor ')" placeholder="nomor telepon.." required >
       </div>
       <input type="hidden" name="daftardong" value="daftardong" />
       <button type="submit" name="daftardong" class="btn btn-primary" style="width:100%;">Daftar</button>
             <br><br><br>
        </form>
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

    <!-- Contact form JavaScript -->
    <!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>
    <script>
$("#loginform").on('submit',(function(e) {  
    e.preventDefault();
    $.ajax({
          url: "dashboard/proses",
      type: "POST",
      data:  new FormData(this),
      contentType: false,
          cache: false,
      processData:false,
      beforeSend : function()
      {
      },
      success: function(data)
        {
			//alert("sukses");
        if(data=='invalid')
        {
          // invalid file format.
          $("#err").html("Invalid File !").fadeIn();
        }
        else
        {
          $("#preview").html(data).fadeIn();
          $("#form")[0].reset();  
          $("#preview").html(data);
        }
        },
        error: function(e) 
        {
        $("#err").html(e).fadeIn();
        }           
     });
  }));
$("#daftarform").on('submit',(function(e) {
    //alert("1");
    e.preventDefault();
    $.ajax({
          url: "dashboard/proses",
      type: "POST",
      data:  new FormData(this),
      contentType: false,
          cache: false,
      processData:false,
      beforeSend : function()
      {
          //alert("2");
      },
      success: function(data)
        {
        if(data=='invalid')
        {
           // alert("5");
          // invalid file format.
          $("#err").html("Invalid File !").fadeIn();
        }
        else
        {
          $("#preview").html(data);
          //alert("3");
        }
        },
        error: function(e) 
        {
            alert("4");
        $("#err").html(e).fadeIn();
        }           
     });
  }));
  </script>
  </body>
</html>