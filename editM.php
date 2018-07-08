<!DOCTYPE html>
<html>
<head>
	<title>Edit Match</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="css/bootstrap.min.css" >
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js" ></script>
	<script src="js/jquery-2.1.1.min.js" ></script>
</head>

<body>
	<?php
		$idM = $_GET["idM"];
		include ("global.php");
		include("globalAdmin.php");
	?>
	<div class="row">
	  <div class="col-md-12" style="text-align: center;">
	  <b>EDIT MATCH ID: <?php echo $idM ?>	</b> <br><br>
	  </div>
	</div>
	<?php 
		include("db.php");
		$matches = mysqli_query($conn, "SELECT * FROM `matches`  WHERE `MatchID` = '$idM'");
		$check = mysqli_fetch_array($matches);
	?>
	<form  method="post" class="form-inline" role="form" action = "editM_com.php?idM=<?php echo $idM; ?>" style="text-align: center;">

			<div class="form-group">
			    <?php echo $check['team1'];?>
			</div>
			<div class="form-group">
			    <input type="text" class="form-control" id="point1" name="point1" placeholder="Point 1">
			</div>
			<div class="form-group">
			    <input type="text" class="form-control" id="ponit2" name="point2" placeholder="Point 2">
			</div>
			<div class="form-group">
			    <?php echo $check['team2'];?>
			</div>
			<br><br>

			   
			<input type="submit" class="btn btn-primary" value="Submit">
	</form>


	<?php  
		include ("foot.php");
	?>

</body>
</html>