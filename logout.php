<?php  
	session_start();
	if ($_SESSION["id"] ==  "") {
		header("location: login.php");
	}
	else {
		$_SESSION["id"] = "";
		session_destroy();
		$timeNow = time() - 60*60*24*365*30; 
		setcookie('acc', $acc, $timeNow);
		setcookie('pass', $pass, $timeNow);
		header("location: login.php");
	}
		
?>