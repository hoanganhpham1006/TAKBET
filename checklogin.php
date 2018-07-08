<script>
function goBack() {
    window.history.back()
}
</script>

<link rel="stylesheet" href="css/bootstrap.min.css">

<?php  

	session_start();
	include ("db.php");
	$acc = $_POST["acc"];
	$pass = $_POST["pass"];
	$remember = isset($_POST["remember"]);

	if ($remember) {
        $timeNow = time() + 60*60*24*365*30; 
		setcookie('acc', $acc, $timeNow);
		setcookie('pass', $pass, $timeNow);
	}
	$result = mysqli_query($conn, "SELECT * FROM `customers` WHERE `acc`='$acc' && `pass`= '$pass'");
	$rows = mysqli_num_rows($result);

	$check = mysqli_fetch_array($result);
	if ($rows == 0 || $check[7] == 0) {

		$message = "Đăng nhập thất bại!";
		echo "<script type='text/javascript'>alert('$message');</script>";
		echo "Tài khoản hoặc mật khẩu không chính xác hoặc tài khoản chưa được xác thực, vui lòng liên hệ admin hoặc đăng nhập lại"."<br> <br>"."<button class='btn btn-primary' onclick='goBack()'>Quay trở lại</button>";

	}
	else {
		$message = "Đăng nhập thành công!";
		$_SESSION["id"] = $check[0];
		echo "<script type='text/javascript'>alert('$message');</script>";
		header("location: index.php");
	}
	mysqli_close($conn); //Disconnect

?>