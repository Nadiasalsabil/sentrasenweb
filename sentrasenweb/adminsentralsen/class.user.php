<?php
require_once("conndb.php");

class USER
{	

	private $conn;
	
	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }
	
	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}
	
	public function doLogin($uname,$upass)
	{
		try
		{
			$user_cek = $uname;
			$stmt = $this->conn->prepare("SELECT noid,usrname,pass,sts FROM tbllogin WHERE usrname='$user_cek'");
			$stmt->execute(array(':user_cek'=> $user_cek));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() == 1){
			if($userRow['sts'] == 1){
				$enkrip_p = md5(md5($upass)); 
				if($enkrip_p == $userRow['pass']){
					$nologin = $userRow['noid'];
					try{
						
//$ip = $_SERVER['HTTP_CLIENT_IP']?$_SERVER['HTTP_CLIENT_IP']:($_SERVER['HTTP_X_FORWARDE‌​D_FOR']?$_SERVER['HTTP_X_FORWARDED_FOR']:$_SERVER['REMOTE_ADDR']);
// Get user IP address
if ( isset($_SERVER['HTTP_CLIENT_IP']) && ! empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif ( isset($_SERVER['HTTP_X_FORWARDED_FOR']) && ! empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = (isset($_SERVER['REMOTE_ADDR'])) ? $_SERVER['REMOTE_ADDR'] : '0.0.0.0';
}

$ip = filter_var($ip, FILTER_VALIDATE_IP);
$ip = ($ip === false) ? '0.0.0.0' : $ip; //ip
$browser = $_SERVER['HTTP_USER_AGENT']; //browser
//$ip = $_SERVER['REMOTE_ADDR']; //ip
						
					$servernamex = "localhost";
					$dbx = "sentrasen";
					$usernamex = "root";
					$passwordx = "";
					$use_pdo = new ConnectionManagerPDO("mysql:host=$servernamex;dbname=$dbx", $usernamex, $passwordx);	
					$use_pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$query_in = "UPDATE tbllogin SET logtime = now() WHERE noid = '$nologin'";
					$exe_query_in = $use_pdo -> prepare($query_in);
					$exe_query_in -> execute();
					} catch(PDOException  $e ){
					echo "Error: ".$e;
					die();
					}				
					$_SESSION['user_session'] = $userRow['noid'];
					return true;
				}else{
					return false;
					}
			}else{
				echo '<script>alert("status anda tidak diijinkan.");</script>';
				return false;
				}	
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	
	public function is_loggedin()
	{
		if(isset($_SESSION['user_session']))
		{
			return true;
		}
	}
	
	public function redirect($url)
	{
		header("Location: $url");
	}
	
	public function doLogout()
	{
		session_destroy();
		unset($_SESSION['user_session']);
		return true;
	}
}
?>