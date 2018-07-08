<?php  
	session_start();
	if ($_SESSION["id"] ==  "") {
		header("location: login.php");
	}
	else {
		$id = $_SESSION["id"];
		include ("db.php");
		$result = mysqli_query($conn, "SELECT * FROM `customers` WHERE `CustomerID`='$id'");

		$check = mysqli_fetch_array($result);
		$name = $check[4];
		$admin  = $check[8];
	}
?>