<script>
function goBack() {
    window.history.back()
}
</script>

<link rel="stylesheet" href="css/bootstrap.min.css">

<?php 
	include ("db.php");
	$time = $_POST["time"];
	$team1 = $_POST["team1"];
	$point1 = $_POST["point1"];
	$point2 = $_POST["point2"];
	$team2 = $_POST["team2"];
	$haveT = $_POST["haveT"];
	$hs1 = $_POST["hs1"];
	$hs2 = $_POST["hs2"];
	$hsT = $_POST["hsT"];
	$hsX = $_POST["hsX"];
	
	$sql = "INSERT INTO `matches`(`time`, `team1`, `team2`, `point1`, `point2`, `haveT`, `heso1`, `heso2`, `hesoT`, `hesoX` ) VALUES ('$time','$team1', '$team2', '$point1', '$point2', '$haveT', '$hs1', '$hs2', '$hsT', '$hsX')";
	$sql = str_replace("''", "NULL", $sql); //Add value	
	if (mysqli_query($conn, $sql)) { //CHECK
	    
	    header("location: quanlyM.php");
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
		

	mysqli_close($conn); //Disconnect

?>