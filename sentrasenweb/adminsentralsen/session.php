<?php
session_start();
require_once 'class.user.php';
$session = new USER();

date_default_timezone_set('Asia/Jakarta');

// if user session is not active(not loggedin) this page will help 'home.php and profile.php' to redirect to login page
// put this file within secured pages that users (users can't access without login)

if(!$session->is_loggedin())
{
	// session no set redirects to login page
	//$session->redirect('login');
	echo '<script>window.location.href = "login"</script>';
	//echo '<script>window.location.href = "http://localhost/sentralsen-sc/sentralsen%20sc/sentralsen230518/sentralsen230518/sentralsen"</script>';
}