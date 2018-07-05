<?php
require_once('session.php');
require_once('class.user.php');
$user_logout = new USER();
$login = new USER();

if(isset($_POST['logindong'])) {
	$uname = strip_tags($_POST['email']);
	$upass = strip_tags($_POST['password']);
	
	//echo '<script>alert("login '.$uname. $upass.'");</script>'; 
	if($login->doLogin($uname,$upass)){
		//$login->redirect('index');
		echo '<script>
		alert("selamat datang");
		location.replace("dashboard/");
		</script>';
	}
	else
	{
		echo '<script>
		alert("data anda salah.");
		$("#text_inform").html("data anda salah");
		$("#icon_update").fadeIn();
		setTimeout(function(){
			$("#icon_update").fadeOut();
             },3000); 
		location.replace("login");
		</script>';
		$error = "Wrong Details !";
	}	
	
} else if(isset($_POST['daftardong'])){
	
	$email 		= strip_tags($_POST['regemail']);
	$upass 		= strip_tags($_POST['regpassword']);
	$regnama 	= $_POST['regnama'];
	$regalamat 	= $_POST['regalamat'];
	$regnotelp 	= $_POST['regnotelp'];
		
	if($login->doDaftar($email,$upass,$regnama,$regalamat,$regnotelp)){
		//$login->redirect('index');
		echo '<script>
		//alert("Pendaftaran berhasil, silahkan LOGIN untuk melakukan order");
		location.replace("dashboard/");
		</script>';
	}
	else
	{
		echo '<script>
		//alert("data anda salah.");
		$("#text_inform").html("data anda salah");
		$("#icon_update").fadeIn();
		setTimeout(function(){
			$("#icon_update").fadeOut();
             },3000); 
		//location.replace("login");
		</script>';
		$error = "Wrong Details !";
	}	
	
} elseif(isset($_POST['values']) && $_POST['values']=="true")
	{
		$user_logout->doLogout();
		//$user_logout->redirect('login');
		echo '<script>
		//alert("good bye~");
		location.replace("login");
		</script>';
	}
?>