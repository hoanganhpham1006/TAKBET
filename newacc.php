<script>
function goBack() {
    window.history.back()
}
</script>

<link rel="stylesheet" href="css/bootstrap.min.css">

<?php 
	include ("db.php");
	$acc = $_POST["acc"];
	$pass = $_POST["pass"];
	$phone = $_POST["phone"];
	$name = $_POST["name"];
	
	$result = mysqli_query($conn, "SELECT * FROM `customers` WHERE `acc`='$acc'");
	$rows = mysqli_num_rows($result);
	
	if ($rows) {

		$message = "Tên tài khoản đã có người sử dụng";
		echo "<script type='text/javascript'>alert('$message');</script>";
		echo "Tài khoản đã có người sử dụng, vui lòng đăng ký lại ^^"."<br> <br>"."<button class='btn btn-primary' onclick='goBack()'>Quay trở lại</button>";

	}
	else if ($name =="") {
		header("location: index.php");
	}
	else {
		$sql = "INSERT INTO `customers`(`acc`, `pass`, `phone`, `name` ) VALUES ('$acc','$pass', '$phone', '$name')"; //Add value	
		if (mysqli_query($conn, $sql)) { //CHECK
		    
		    echo "Đăng ký thành công, vui lòng liên hệ Admin để xác thực đăng ký"."<br> <br>"."<a href = 'login.php'><button class='btn btn-primary'>Đăng nhập</button></a>";
		} else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		
	}
	mysqli_close($conn); //Disconnect

?>