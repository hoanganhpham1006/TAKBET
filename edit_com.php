<?php  
	include ("db.php"); //Connect
	$x = $_POST["money"];

	$z = $_GET["id1"];

	$sql = "UPDATE customers SET `moneyS` = '$x' WHERE CustomerID = '$z'";
	
	if (mysqli_query($conn, $sql)) { //Check 
		header("location: quanlyC.php");

	}

	else {
		echo "Haven't Editted";
	}

	mysqli_close($conn);
?>