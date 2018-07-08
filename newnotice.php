<?php 
	include ("db.php");
	$notice = $_POST["notice"];

	$sql = "UPDATE `notice` SET `notice`='$notice' WHERE 1";
	$sql = str_replace("''", "NULL", $sql); //Add value	
	if (mysqli_query($conn, $sql)) { //CHECK
	    
	    header("location: quanlyTB.php");
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
		

	mysqli_close($conn); //Disconnect

?>