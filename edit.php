<!DOCTYPE html>
<html>
<head>
	<title> Edit Info </title>
</head>

<body>
	<?php
		$id1 = $_GET["id"];
		include ("global.php");
		include("globalAdmin.php");
	?>
	<div class="row">
	  <div class="col-md-12" style="text-align: center;">
	  <b>EDIT CUSTOMERS ID: <?php echo $id1 ?>	</b> <br><br>

	  </div>
	</div>

	<div class="row">

		<div class="col-md-12" style="text-align: center;">
		  	<form class="form-horizontal"  method="post" action ="edit_com.php?id1=<?php echo $id1; ?>">

			  	<div class="form-group">
				    <label>Số dư</label>
		
				    <input type="text" class="form-control" name = "money" id="money" placeholder="MONEY">
	
			  	</div>
			  	<br>
			  	<div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <input type="submit" class="btn btn-primary" value="Save">
				    </div>
				</div>

			</form>
		</div>

	</div>


	<?php  
		include("foot.php");
	?>

</body>
</html>