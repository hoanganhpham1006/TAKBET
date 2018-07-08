<?php 
	include ("db.php");
	
	$customerid = $_GET["id"];
	
	
	$sql = "UPDATE `customers` SET `isActive`= '1' WHERE `CustomerID`='$customerid'";

	if (mysqli_query($conn, $sql)) { //Check 
		header("location: quanlyC.php");
	}

	else {
		echo "Haven't Editted";
	}


	mysqli_close($conn); //Disconnect

?>