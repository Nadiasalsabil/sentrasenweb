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
	
	public function doLogin($email,$upass)
	{
		try
		{
			$user_cek = $email;
			$stmt = $this->conn->prepare("SELECT nocust,email,pwd2,sts FROM mstcust WHERE email='$user_cek'");
			$stmt->execute(array(':user_cek'=> $user_cek));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() == 1){
			if($userRow['sts'] == 1){
				$enkrip_p = md5(md5($upass)); 
				if($enkrip_p == $userRow['pwd2']){
					$nologin = $userRow['nocust'];		
					$_SESSION['user_session'] = $userRow['nocust'];
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
	public function doDaftar($email,$upass,$regnama,$regalamat,$regnotelp)
	{
	    
		try
		{
			$enkrip_p = md5(md5($upass)); 
			
			$stmt = $this->conn->prepare("INSERT INTO mstcust (email,pwd1,pwd2,nmcust,telpcust,alamatcust,lvl,sts) VALUES 
			('$email','$upass','$enkrip_p','$regnama','$regnotelp','$regalamat',3,1)");
			$stmt->execute();
		
			if($stmt){
			echo '<script>alert("Pendaftaran berhasil, silahkan LOGIN untuk melakukan order.");
			window.location.href = "login";
			//location.reload();</script>';	
			}else{
			echo '<script>alert("pendaftaran gagal!");
			//location.reload();</script>';	
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