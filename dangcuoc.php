<!DOCTYPE html>
<html>
<head>
	<title>Đang cược</title>
		<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="css/mycss.css">
	<script src="js/bootstrap.min.js" ></script>
	<script src="js/jquery-2.1.1.min.js" ></script>
	<meta charset="utf-8">
</head>


<body>
	<?php  
		include ("global.php");
		include ("nav.php");
	?>


	<div style="text-align: center" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<b style = "font-family: arial; font-size: 30px;">NHỮNG TRẬN ĐẤU ĐANG CƯỢC</b><br>
		<br> <br> <br>
		<div class="row">
		 	<div class="col-md-2"></div>
		 	<div class="col-md-8">
		 		<table class="table table-hover">
					<thead>
						<tr >
							<th style="text-align: center;">Trận đấu (Tỷ lệ châu Á)</th>
							<th style="text-align: center;">Team cược</th>
							<th style="text-align: center;">Số Tiền</th>
						</tr>
					</thead>
					<tbody>
						<?php

						include("db.php");
						$result = mysqli_query($conn, "SELECT bet.MatchID, bet.CustomerID, bet.whichTeam, bet.money, matches.team1, matches.team2, matches.point1, matches.point2, matches.heso1, matches.heso2, matches.isEnd FROM bet INNER JOIN matches ON bet.MatchID = matches.MatchID WHERE bet.CustomerID = '$id' && matches.isEnd = 0");
				
						while ($bet = mysqli_fetch_assoc($result)) {
								echo "<tr>";						
								echo "<td>".$bet['team1']." &nbsp &nbsp ".$bet['point1']." : ".$bet['point2']." &nbsp &nbsp ".$bet['team2']."</td>";
								if ($bet['whichTeam'] == 1) echo "<td>".$bet['team1']." (".$bet['heso1'].")"."</td>";
								else echo "<td>".$bet['team2']." (".$bet['heso2'].")"."</td>";
								echo "<td>".$bet['money']."</td>";
								echo "</tr>";
								
						}
						?>
					</tbody>
				</table>
		 	</div>
		 	<div class="col-md-2"></div>
		</div>

		<br> <br> <br>
		<div class="row">
		 	<div class="col-md-2"></div>
		 	<div class="col-md-8">
		 		<table class="table table-hover">
					<thead>
						<tr >
							<th style="text-align: center;">Trận đấu (Tỷ lệ tài xỉu)</th>
							<th style="text-align: center;">Đặt cược</th>
							<th style="text-align: center;">Số Tiền</th>
						</tr>
					</thead>
					<tbody>
						<?php

						include("db.php");
						$result1 = mysqli_query($conn, "SELECT bett.MatchID, bett.CustomerID, bett.isT, bett.moneyT, matches.team1, matches.team2, matches.haveT, matches.hesoT, matches.hesoX, matches.isEnd FROM bett INNER JOIN matches ON bett.MatchID = matches.MatchID WHERE bett.CustomerID = '$id' && matches.isEnd = 0");
				
						while ($bett = mysqli_fetch_assoc($result1)) {
								echo "<tr>";						
								echo "<td>".$bett['team1']." &nbsp &nbsp ".$bett['haveT']." &nbsp &nbsp ".$bett['team2']."</td>";
								if ($bett['isT'] == 1) echo "<td> Tài (".$bett['hesoT'].")"."</td>";
								else echo "<td> Xỉu (".$bett['hesoX'].")"."</td>";
								echo "<td>".$bett['moneyT']."</td>";
								echo "</tr>";
								
						}
						?>
					</tbody>
				</table>
		 	</div>
		 	<div class="col-md-2"></div>
		</div>

					
	</div>




	<?php  
		include ("foot.php");
	?>

</body>

</html>
