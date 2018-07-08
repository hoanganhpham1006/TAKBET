<?php 
	include ("db.php");
	
	$customerid = $_GET["id"];
	if ($customerid !=32 && $customerid != 14) {
	
		$sql = "DELETE FROM `customers`  WHERE `CustomerID`='$customerid'";

		if (mysqli_query($conn, $sql)) { //Check 
			header("location: quanlyC.php");
		}

		else {
			echo "Haven't Deleted";
		}
	}
	else {
		header("location: quanlyC.php");
	}
	mysqli_close($conn); //Disconnect

?>