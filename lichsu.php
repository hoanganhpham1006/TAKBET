<!DOCTYPE html>
<html>
<head>
	<title>Lịch sử</title>
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
		<b style = "font-family: arial; font-size: 30px;">LỊCH SỬ NHỮNG TRẬN ĐẤU ĐÃ CƯỢC</b><br>
		<br> <br> <br>
		<div class="row">
		 	<div class="col-md-2"></div>
		 	<div class="col-md-8">
		 		<table class="table table-hover">
					<thead>
						<tr>
							<th style="text-align: center;">Thời gian</th>
							<th style="text-align: center;">Trận đấu (Kết quả)</th>
							<th style="text-align: center;">Team cược</th>
							<th style="text-align: center;">Số Tiền</th>
						</tr>
					</thead>
					<tbody>
						<?php
		
		
						include("db.php");
						$result = mysqli_query($conn, "SELECT bet.MatchID, matches.time, bet.CustomerID, bet.whichTeam, bet.money, matches.team1, matches.team2, matches.point1, matches.time, matches.point2, matches.heso1, matches.heso2, matches.hesoT, matches.hesoX, matches.isEnd FROM bet INNER JOIN matches ON bet.MatchID = matches.MatchID WHERE bet.CustomerID = '$id' && matches.isEnd = 1 ORDER BY matches.time DESC ");
				
						while ($bet = mysqli_fetch_assoc($result)) {
								$isWin = 0;
								if ($bet['whichTeam'] == 1) {
									if ($bet['point1'] > $bet['point2']) {echo "<tr class = 'success'>";$isWin = 1;}
									if ($bet['point1'] < $bet['point2']) {echo "<tr class = 'danger'>";$isWin = 0;}
								}
								if ($bet['whichTeam'] == 2) {
									if ($bet['point1'] < $bet['point2']) {echo "<tr class = 'success'>";$isWin = 2;}
									if ($bet['point1'] > $bet['point2']) {echo "<tr class = 'danger'>";$isWin = 0;}
								}
								echo "<td>".$bet['time']."</td>";					
								echo "<td>".$bet['team1']." &nbsp &nbsp ".$bet['point1']." : ".$bet['point2']." &nbsp &nbsp ".$bet['team2']."</td>";
								if ($bet['whichTeam'] == 1) echo "<td>".$bet['team1']." (".$bet['heso1'].")"."</td>";
								else echo "<td>".$bet['team2']." (".$bet['heso2'].")"."</td>";

								if ($isWin == 0) {
									if($bet['point1'] - $bet['point2'] == 0.25 || $bet['point1'] - $bet['point2'] == -0.25 ) $bet['money'] = $bet['money']/2;
									echo "<td>".$bet['money']."</td>";
								}
								else {
									if ($isWin == 1) {
										if($bet['point1'] - $bet['point2'] == 0.25 || $bet['point1'] - $bet['point2'] == -0.25 ) $bet['money'] = $bet['money']*$bet['heso1']/2;
										echo "<td>".$bet['money']*$bet['heso1']."</td>";
									}
									else {
										if($bet['point1'] - $bet['point2'] == 0.25 || $bet['point1'] - $bet['point2'] == -0.25 ) $bet['money'] = $bet['money']*$bet['heso2']/2;
										echo "<td>".$bet['money']*$bet['heso2']."</td>";
									}
								}
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
						<tr>
							<th style="text-align: center;">Thời gian</th>
							<th style="text-align: center;">Trận đấu (Kết quả/Kèo)</th>
							<th style="text-align: center;">Đặt cược</th>
							<th style="text-align: center;">Số Tiền</th>
						</tr>
					</thead>
					<tbody>
						<?php

						include("db.php");
						$result = mysqli_query($conn, "SELECT bett.MatchID, bett.CustomerID, bett.isT, bett.moneyT, matches.team1, matches.team2, matches.haveT, matches.time,matches.heso1, matches.heso2, matches.hesoT, matches.hesoX, matches.isEnd, matches.res FROM bett INNER JOIN matches ON bett.MatchID = matches.MatchID WHERE bett.CustomerID = '$id' && matches.isEnd = 1 ORDER BY matches.time DESC");
				
						while ($bet = mysqli_fetch_assoc($result)) {
								$isWin = 0;
								if ($bet['isT'] == 1) {
									if ($bet['res'] > $bet['haveT']) {echo "<tr class = 'success'>";$isWin = 2;}
									if ($bet['res'] < $bet['haveT']) {echo "<tr class = 'danger' >";$isWin = 0;}
								}
								if ($bet['isT'] == 0) {
									if ($bet['res'] < $bet['haveT']) {echo "<tr class = 'success'>";$isWin = 1;}
									if ($bet['res'] > $bet['haveT']) {echo "<tr class = 'danger'>";$isWin = 0;}
								}
								echo "<td>".$bet['time']."</td>";					
								echo "<td>".$bet['team1']." &nbsp &nbsp ".$bet['res']."/".$bet['haveT']." &nbsp &nbsp ".$bet['team2']."</td>";
								if ($bet['isT'] == 1) echo "<td> Tài (".$bet['hesoT'].")"."</td>";
								else echo "<td> Xỉu (".$bet['hesoX'].")"."</td>";

								if ($isWin == 0) {
									if($bet['res'] - $bet['haveT'] == 0.25 || $bet['res'] - $bet['haveT'] == -0.25 ) $bet['moneyT'] = $bet['moneyT']/2;
									else echo "<td>".$bet['moneyT']."</td>";
								}

								else {
									if ($isWin == 1) {
										if($bet['res'] - $bet['haveT'] == 0.25 || $bet['res'] - $bet['haveT'] == -0.25 ) $bet['moneyT'] = $bet['moneyT']*$bet['hesoX']/2;
										else echo "<td>".$bet['moneyT']*$bet['hesoX']."</td>";
									}
									else {
										if($bet['res'] - $bet['haveT'] == 0.25 || $bet['res'] - $bet['haveT'] == -0.25 ) $bet['moneyT'] = $bet['moneyT']*$bet['hesoT']/2;
										else echo "<td>".$bet['moneyT']*$bet['hesoT']."</td>";
									}
								}

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
