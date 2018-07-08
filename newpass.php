<script>
function goBack() {
    window.history.back()
}
</script>

<link rel="stylesheet" href="css/bootstrap.min.css">

<?php 
	include ("db.php");
	session_start();
	$customerid = $_SESSION["id"];
	$npass = $_POST["npass"];
	
	$sql = "UPDATE `customers` SET `pass`= '$npass' WHERE `CustomerID`='$customerid'";

	if (mysqli_query($conn, $sql)) { //Check 
		$message = "Mật khẩu mới đã cập nhật, vui lòng đăng nhập lại";
		$_SESSION["id"] ="";
		echo "<script type='text/javascript'>alert('$message');</script>";
		echo "<button class='btn btn-primary' onclick='goBack()'>Đăng nhập</button>";
	}

	else {
		echo "Haven't Editted";
	}


	mysqli_close($conn); //Disconnect

?>