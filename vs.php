<!DOCTYPE html>
<html>
<head>
	<title>Đặt cược</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="css/bootstrap.min.css" >
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js" ></script>
	<script src="js/jquery-2.1.1.min.js" ></script>
</head>

<body>
	<?php  
		include ("global.php");
		include ("nav.php");
		$matchid = $_GET['matchid'];
	?>


	<?php
		include("db.php");
		$table = mysqli_query($conn, "SELECT * FROM `matches` WHERE `MatchID` = '$matchid' ");
		while ($matches = mysqli_fetch_assoc($table)) {
	?>
		<br>
		<div style="font-family:'Book Antiqua'; font-size: 30px;text-align: center" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<b>
				<div class="row">
				  <div class="col-md-1"></div>
				  <div class="col-md-4">
				  	<?php  
				  		echo $matches['team1']." (".$matches['heso1'].")";
				  	?>
				  </div>
				  <div class="col-md-2">
				  	<?php  
				  		echo "<i style = 'color:red'>".$matches['point1']." &nbsp  &nbsp &nbsp : &nbsp &nbsp &nbsp  ".$matches['point2']."</i>";
				  		
				  	?>
				  </div>
				  <div class="col-md-4">
				  	<?php  
				  		echo "(".$matches['heso2'].") ".$matches['team2'];
				  	?>
				  </div>
				  <div class="col-md-1"></div>
				</div>
			</b><br>
		</div>

	<?php
		}
		$sql = mysqli_query($conn, "SELECT bet.CustomerID, bet.whichTeam, bet.money, customers.name, customers.isAdmin FROM bet INNER JOIN customers ON bet.CustomerID = customers.CustomerID WHERE bet.MatchID = '$matchid' ");
		// $sql = mysqli_query($conn, "SELECT * FROM `bet` WHERE `MatchID` = '$matchid' ");
		while ($bet = mysqli_fetch_assoc($sql)) {
	?>

		<div class="row">
		  <div class="col-md-2"></div>
		  <div class="col-md-8" style="height: 37px;">
		  		<table class="table table-hover">
		  			<tbody style="text-align: center;">
		  				<?php if( $bet['isAdmin'] == 0) { ?>
		  				<tr>
		  					<td width="30%">
		  						<?php  
		  							if ($bet['whichTeam'] == 1 ) echo $bet['name'];
		  						
		  						?>
		  					</td width="20%">
		  					<td style="border-right: solid 1px ">
		  						<?php  
		  							if ($bet['whichTeam'] == 1) echo $bet['money'];
		  					
		  						?>

		  					</td>
		  					<td width="30%">
		  						<?php  
		  							if ($bet['whichTeam'] == 2) echo $bet['name'];
		  					
		  						?>
		  					</td>
		  					<td width="20%">
		  						<?php  
		  							if ($bet['whichTeam'] == 2) echo $bet['money'];
		  		
		  						?>
		  					</td>
		  				</tr>
		  				<br><br>
		  				<?php  } ?>
		  			</tbody>
		  		</table>
		  </div>
		  <div class="col-md-2"></div>
		</div>

	<?php  
		}
	?>
	<br><br><br><br>
	<?php if($admin == 0) { ?>
	<div class="row">
	  <div class="col-md-5"></div>
	  <div class="col-md-2" style="text-align: center;">
	  	<a class = "btn btn-danger" style="font-family:verdana; text-decoration: none; color: white;" href="bet.php?matchid=<?php echo $matchid ?>"><b>ĐẶT CƯỢC </b></a>
	  </div>
	  <div class="col-md-5"></div>
	</div>
	<?php } ?>

	<?php  
		include ("foot.php");
	?>

</body>

</html>