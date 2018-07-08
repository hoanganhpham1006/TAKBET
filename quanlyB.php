<!DOCTYPE html>
<html>
<head>
	<title>Bets</title>
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
		<b style = "font-family: arial; font-size: 30px;">QUẢN LÝ BETS</b><br>
		
		<table class="table table-hover">
			<thead>
				<tr>
					<th style="text-align: center;">BetID</th>
					<th style="text-align: center;">Match</th>
					<th style="text-align: center;">CustomerID</th>
					<th style="text-align: center;">Name</th>
					<th style="text-align: center;">Team</th>
					<th style="text-align: center;">Money</th>
					<th></th>
				</tr>
			</thead>

			<tbody>
						<?php
						include("db.php");
						$result = mysqli_query($conn, "SELECT bet.BetID, bet.MatchID, bet.CustomerID, bet.whichTeam, bet.money, bet.isCount, matches.team1, matches.team2, matches.point1, matches.point2, matches.isEnd, customers.name FROM ((`bet` INNER JOIN matches ON bet.MatchID = matches.MatchID) INNER JOIN customers ON bet.CustomerID = customers.CustomerID ) WHERE matches.isEnd = 0 ORDER BY bet.MatchID, bet.BetID ");
				
						while ($bet = mysqli_fetch_assoc($result)) {
								if($bet['money'] == 0) echo "<tr class ='danger';>";
								else echo "<tr>";
								echo "<td>".$bet['BetID']."</td>";					
								echo "<td>".$bet['team1']." &nbsp &nbsp ".$bet['point1']." : ".$bet['point2']." &nbsp &nbsp ".$bet['team2']."</td>";
								echo "<td>".$bet['CustomerID']."</td>";
								echo "<td>".$bet['name']."</td>";
								if ($bet['whichTeam'] == 1) echo "<td>".$bet['team1']."</td>";
								else echo "<td>".$bet['team2']."</td>";
								echo "<td>".$bet['money']."</td>";
								echo "<td> <a onclick='return confirm(\"Bạn có chắc chắn muốn DELETE?\");' style ='text-decoration: none' href = 'deleteB.php?idB=".$bet['BetID']."'> DELETE </a> </td>";
								echo "</tr>";
								
						}

						$result = mysqli_query($conn, "SELECT bett.BetTID, bett.MatchID, bett.CustomerID, bett.isT, bett.moneyT, matches.team1, matches.team2, matches.haveT, matches.isEnd, customers.name FROM ((`bett` INNER JOIN matches ON bett.MatchID = matches.MatchID) INNER JOIN customers ON bett.CustomerID = customers.CustomerID ) WHERE matches.isEnd = 0 ORDER BY bett.MatchID, bett.BetTID ");
				
						while ($bet = mysqli_fetch_assoc($result)) {
								if($bet['moneyT'] == 0) echo "<tr class ='danger';>";
								else echo "<tr>";
								echo "<td>".$bet['BetTID']."</td>";					
								echo "<td>".$bet['team1']." &nbsp &nbsp ".$bet['haveT']." &nbsp &nbsp ".$bet['team2']."</td>";
								echo "<td>".$bet['CustomerID']."</td>";
								echo "<td>".$bet['name']."</td>";
								if ($bet['isT'] == 1) echo "<td> Tài </td>";
								else echo "<td>Xỉu</td>";
								echo "<td>".$bet['moneyT']."</td>";
								echo "<td> <a style ='text-decoration: none' href = 'deleteB.php?idBT=".$bet['BetTID']."'> DELETE </a> </td>";
								echo "</tr>";
								
						}
						?>
			</tbody>
		</table>
	</div>

	<?php  
		include ("foot.php");
	?>

</body>

</html>