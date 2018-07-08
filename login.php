<!DOCTYPE html>
<html>
<head>

	<title>Đăng nhập</title>

	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="css/bootstrap.min.css" >
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js" ></script>
	<script src="js/jquery-2.1.1.min.js" ></script>
</head>

<?php  
	if (isset($_COOKIE['acc']) and isset($_COOKIE['pass'])) {
		$acc = $_COOKIE['acc'];
		$pass = $_COOKIE['pass'];
		session_start();
		include ("db.php");
		$result = mysqli_query($conn, "SELECT * FROM `customers` WHERE `acc`='$acc' && `pass`= '$pass'");
		$rows = mysqli_num_rows($result);
		$check = mysqli_fetch_array($result);
		if ($rows == 1 || $check[7] == 1) {
			$_SESSION["id"] = $check[0];
			header("location: index.php");
		}

	}
?>

<body style="margin-top: 50px; text-align: center;">

	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" >
		<!-- Can le -->
	</div>
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" >
			<b style="font-size: 26px; color: blue; font-family: verdana"> ĐĂNG NHẬP TAK BET </b>
			<form action = "checklogin.php" method="post" class="form-horizontal" style="margin-top: 50px;">
				  <div class="form-group">
				    <label class="col-sm-2 control-label">Tài khoản</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="acc" name = "acc" placeholder="Tên tài khoản">
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="col-sm-2 control-label">Password</label>
				    <div class="col-sm-10">
				      <input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
				    </div>
				  </div>
				  <div class="form-group">
				   
				     <div class="checkbox">
				       <label>
				         <input type="checkbox" id="remember" name="remember" value="YES"> Remember me
				       </label>
				   
				    </div>
				  </div>
				  <div class="form-group">
				   
				     <input type="submit" class="btn btn-primary" id="login" name="login" value="Đăng nhập">
				     <a class="btn btn-primary" href="Register.php">Đăng ký</a>
				   </div>
				

			</form>

	</div>
	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

	</div>	<!-- Can le -->


	
</body>
	<div style="text-align: left;">
	 <?php  
	 	include ("foot.php");
	 ?>
	 </div>
</html>