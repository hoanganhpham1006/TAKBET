<?php 
	include ("db.php");
	$max = $_POST["max"];
	$DCNN = $_POST["DCNN"];

	$sql = "UPDATE `thongso` SET `max`='$max', `DCNN` = '$DCNN' WHERE 1";

	if (mysqli_query($conn, $sql)) { //CHECK
	    
	    header("location: quanlyTS.php");
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
		

	mysqli_close($conn); //Disconnect

?>