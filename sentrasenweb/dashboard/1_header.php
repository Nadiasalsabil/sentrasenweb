<?php 
require_once('session.php'); 
$user_id = $_SESSION['user_session'];

$queryhead = "SELECT nmcust,lvl FROM mstcust WHERE nocust='$user_id'";
$exe_queryhead = $use_pdo -> prepare($queryhead);
$exe_queryhead -> execute();
$rh = $exe_queryhead -> fetch(PDO::FETCH_ASSOC);
$namauser = $rh['nmcust'];
$level = $rh['lvl'];
if($level != 3){
    //echo '<script>location.replace("index");</script>';
}
?>
<div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- Logo -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">
                        <!-- Logo icon --
                        <b><img src="images/logo.png" alt="homepage" class="dark-logo" /></b>
                        <!--End Logo icon -->
                        <span>USER PANEL</span>
                    </a>
                </div>
                <!-- End Logo -->
                <div class="navbar-collapse">
                    <!-- toggle and nav items -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                    </ul>
                    <!-- User profile and search -->
                    <ul class="navbar-nav my-lg-0">
					<li class="nav-item">
					<input type="text" class="form-control" placeholder="nomor resi..." style="height:35px;margin-top:10px;" ></li>
					<li class="nav-item">
					<input type="button" class="btn btn-sm btn-primary" value="lacak pengiriman" style="height:35px;margin-top:10px;margin-right:300px;" ></li>
                        <!-- Profile -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<?php echo $namauser; ?>
							<img src="images/users/5.jpg" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="#" onclick="logoutdong()"><i class="fa fa-power-off"></i> Logout</a></li>
									<script>
//LOGOUT
function logoutdong(){
	if (confirm("logout sekarang?")){
 var truevar = "true";
 var myData={"values":truevar};
 $.ajax({
    url : "logout",
    type: "POST",
    data : myData,
	beforeSend : function()
			{		
			$("#menu_utama").hide();
			},
    success: function(msg)
     {
		//$("#preview").html(data).fadeIn();
		$("#preview").html(msg);
	
         },
	error: function(req, status, error) {
	alert(req.responseText);      
		}  
	}); 
	}
	return false;
}
</script>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>