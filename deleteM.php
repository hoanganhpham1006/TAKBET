<?php 
	include ("db.php");
	
	$matchid = $_GET["idM"];
	
	
	$sql = "DELETE FROM `matches`  WHERE `MatchID`='$matchid'";

	if (mysqli_query($conn, $sql)) { //Check 
		header("location: quanlyM.php");
	}

	else {
		echo "Haven't Deleted";
	}


	mysqli_close($conn); //Disconnect

?>