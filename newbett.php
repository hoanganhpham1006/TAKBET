<script>
function goBack() {
    window.history.back()
}
</script>

<link rel="stylesheet" href="css/bootstrap.min.css">

<?php 
	include ("db.php");
	session_start();
	$isT = $_POST["isT"];
	$moneyT= $_POST["moneyT"];
	$matchid = $_GET["matchid"];
	$customerid = $_SESSION["id"];

	$result = mysqli_query($conn, "SELECT * FROM `bett` WHERE `CustomerID`='$customerid' && `MatchID` = '$matchid'");
	$rows = mysqli_num_rows($result);
	$table= mysqli_query($conn, "SELECT * FROM `matches` WHERE `MatchID`='$matchid'");
	if ($matches = mysqli_fetch_assoc($table)) {
		if ("Xỉu" == $isT) $isT = 0;
		else $isT = 1;
	}

	if ($rows) {
		$sql = "UPDATE `bett` SET `isT`= '$isT',`moneyT`='$moneyT'  WHERE `CustomerID`='$customerid' && `MatchID` = $matchid";

			if (mysqli_query($conn, $sql)) { //Check 
				header("location: vsT.php?matchid=$matchid");
			}

			else {
				echo "Haven't Editted";
			}

	}
	else {
		$sql = "INSERT INTO `bett`(`MatchID`, `CustomerID`, `isT`, `moneyT` ) VALUES ('$matchid','$customerid', '$isT', '$moneyT')"; //Add value	
		if (mysqli_query($conn, $sql)) { //CHECK  
		    header("location: vsT.php?matchid=$matchid");
		} 
		else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		
	}
	mysqli_close($conn); //Disconnect

?>