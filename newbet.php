<script>
function goBack() {
    window.history.back()
}
</script>

<link rel="stylesheet" href="css/bootstrap.min.css">

<?php 
	include ("db.php");
	session_start();
	$whichTeam = $_POST["team"];
	$money= $_POST["money"];
	$matchid = $_GET["matchid"];
	$customerid = $_SESSION["id"];

	$result = mysqli_query($conn, "SELECT * FROM `bet` WHERE `CustomerID`='$customerid' && `MatchID` = '$matchid'");
	$rows = mysqli_num_rows($result);
	$table= mysqli_query($conn, "SELECT * FROM `matches` WHERE `MatchID`='$matchid'");
	if ($matches = mysqli_fetch_assoc($table)) {
		if (trim($matches['team1']) == $whichTeam) $whichTeam = 1;
		else $whichTeam = 2;
	}

	if ($rows) {
		$sql = "UPDATE `bet` SET `whichTeam`= '$whichTeam',`money`='$money'  WHERE `CustomerID`='$customerid' && `MatchID` = $matchid";

			if (mysqli_query($conn, $sql)) { //Check 
				header("location: vs.php?matchid=$matchid");
			}

			else {
				echo "Haven't Editted";
			}

	}
	else {
		$sql = "INSERT INTO `bet`(`MatchID`, `CustomerID`, `whichTeam`, `money` ) VALUES ('$matchid','$customerid', '$whichTeam', '$money')"; //Add value	
		if (mysqli_query($conn, $sql)) { //CHECK  
		    header("location: vs.php?matchid=$matchid");
		} 
		else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		
	}
	mysqli_close($conn); //Disconnect

?>