<?php
	require_once('session.php');
	require_once('class.user.php');
	$user_logout = new USER();
	$login = new USER();
	$user_logout->doLogout();
	echo '<script>
		location.replace("../login");
		</script>';
		
	/*
	if($user_logout->is_loggedin()!="")
	{
		//$user_logout->redirect('index');
		echo '<script>
		location.replace("http://kitabikinin.esy.es/jasapengiriman/sentralsen/");
		</script>';
	}

if(isset($_POST['logindong']))
{
	$uname = strip_tags($_POST['username']);
	$telp = strip_tags($_POST['username']);
	$upass = strip_tags($_POST['password']);
		
	if($login->doLogin($uname,$telp,$upass))
	{
		//$login->redirect('index');
		echo '<script>
		location.replace("http://kitabikinin.esy.es/jasapengiriman/sentralsen/login");
		</script>';
	}
	else
	{
		echo '<script>
		//alert("data anda salah.");
		location.replace("login");
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
	} */
?>