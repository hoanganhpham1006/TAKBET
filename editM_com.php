S<?php  
	include ("db.php"); //Connect

	$point1 = $_POST["point1"];
	$point2 = $_POST["point2"];
	$res = $point1 + $point2;

	$z = $_GET["idM"];

  $result = mysqli_query($conn, "SELECT * FROM `matches` WHERE MatchID='$z' ");
  $check = mysqli_fetch_array($result);

  $point1 = $point1 + $check['point1'];
  $point2 = $point2 + $check['point2'];

	$sql = "UPDATE matches SET `point1` = '$point1', `point2` = '$point2', `res` = '$res' WHERE MatchID = '$z'";
	$sql = str_replace("''", "NULL", $sql); 
	
	if (mysqli_query($conn, $sql)) { //Check 
		header("location: quanlyM.php");

	}

	else {
		echo "Haven't Editted";
	}

	mysqli_close($conn);
?>