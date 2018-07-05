<?php
/**/
session_start();
require_once("class.user.php");
$login = new USER();
if($login->is_loggedin()!="")
{
	echo '<script>
		location.replace("http://kitabikinin.esy.es/jasapengiriman/sentralsen/");
		</script>';
}
?>
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
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Login</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
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

        <div class="unix-login">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="login-content card">
                            <div class="login-form">
                                <h4>Login</h4>
                                <form id="loginform" action="proses" method="post" enctype="multipart/form-data" autocomplete="off" >
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="username" class="form-control" placeholder="username">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="password">
                                    </div>
									<input type="hidden" name="logindong" value="logindong" readonly />
                                    <button type="submit" name="logindong" class="btn btn-primary btn-flat m-b-30 m-t-30">Sign in</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
$("#loginform").on('submit',(function(e) {	
		e.preventDefault();
		$.ajax({
        	url: "proses",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			beforeSend : function()
			{
				//$("#preview").fadeOut();
				//$("#err").fadeOut();
				//$("#div_btn_group").fadeOut()
				//$('#logindong').prop('disabled', true);
				//$(".loadingmessage").fadeIn()
			},
			success: function(data)
		    {
				if(data=='invalid')
				{
					// invalid file format.
					$("#err").html("Invalid File !").fadeIn();
				}
				else
				{
					$("#preview").html(data).fadeIn();
					$("#form")[0].reset();	
					$("#norepair_div").html(msg);
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