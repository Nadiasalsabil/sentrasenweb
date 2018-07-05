<?php
	require_once('session.php');
	$user_logout = new USER();
	$login = new USER();
	
	if($user_logout->is_loggedin()!="")
	{
		//$user_logout->redirect('index');
		echo '<script>
		location.replace("login");
		</script>';
		
		/*
		echo '<script>
		location.replace("http://localhost/sentralsen-sc/sentralsen%20sc/sentralsen230518/sentralsen230518/sentralsen");
		</script>'; */
	}

if(isset($_POST['logindong'])){
	
	$uname = strip_tags($_POST['username']);
	$upass = strip_tags($_POST['password']);
		
	if($login->doLogin($uname,$upass)){
		//$login->redirect('index');
		echo '<script>
		//alert("selamat datang");
		location.replace("index");
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
		//location.replace("http://localhost/sentralsen");
		</script>';
		$error = "Wrong Details !";
	}	
	
} elseif(isset($_POST['values']) && $_POST['values']=="true")
	{
		$user_logout->doLogout();
		//$user_logout->redirect('login');
		echo '<script>
		//alert("good bye~");
		location.replace("http://localhost/sentralsen");
		</script>';
	}
?>