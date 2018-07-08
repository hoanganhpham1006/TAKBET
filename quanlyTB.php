
<!DOCTYPE html>
<html>
<head>
	<title>Thông báo</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="css/bootstrap.min.css" >
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js" ></script>
	<script src="js/jquery-2.1.1.min.js" ></script>
</head>
<body>
	<?php  
		include ("global.php");
		include("globalAdmin.php");
		include ("nav.php");

	?>



	<div style="text-align: center" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<b style = "font-family: arial; font-size: 30px;">QUẢN LÝ THÔNG BÁO</b><br>
		<b style="font-size: 14px">Add Notice</b> <br><br>

		<form  method="post" class="form-inline" role="form" action = "newnotice.php">
			
			<div class="form-group">
			    <input type="text" class="form-control" id="notice" name="notice" placeholder="Notice">
			</div>
			<input type="submit" class="btn btn-primary" value="Submit">


		</form>

	</div>

			<?php  
				include ("foot.php");
			?>

</body>

</html>
