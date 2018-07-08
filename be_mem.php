<?php 
	include ("db.php");
	
	$customerid = $_GET["id"];
	
	if ($customerid !=32) {
		$sql = "UPDATE `customers` SET `isAdmin`= '0' WHERE `CustomerID`='$customerid'";

		if (mysqli_query($conn, $sql)) { //Check 
			header("location: quanlyC.php");
		}

		else {
			echo "Haven't Editted";
		}
	}
	else {
		header("location: quanlyC.php");
	}
	mysqli_close($conn); //Disconnect

?>