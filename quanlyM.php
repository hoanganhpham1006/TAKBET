<!DOCTYPE html>
<html>
<head>
	<title>Matches</title>
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
		include("nav.php");

	?>
	

	<div style="text-align: center" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<b style = "font-family: arial; font-size: 30px;">QUẢN LÝ MATCHES</b><br>
		
		<table class="table table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>Thời gian</th>
					<th>Team1</th>
					<th>Point1</th>
					<th>Point2</th>
					<th>Team2</th>
					<th>X/T</th>
					<th>KQ</th>
					<th></th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody style="text-align: left;">
				<?php
				include("db.php");
				$table = mysqli_query($conn, "SELECT * FROM `matches`  WHERE `isEnd` = 0");
		
				while ($matches = mysqli_fetch_assoc($table)) {
				
						if ($matches['isStart'] == 1) echo "<tr class = 'success'>";
						else echo "<tr>";			
						echo "<td>".$matches['MatchID']."</td>";
						echo "<td>".$matches['time']."</td>";
						echo "<td>".$matches['team1']." (".$matches['heso1'].") "."</td>";
						echo "<td>".$matches['point1']."</td>";
						echo "<td>".$matches['point2']."</td>";
						echo "<td>".$matches['team2']." (".$matches['heso2'].") "."</td>";
						echo "<td>"."(".$matches['hesoX'].") ".$matches['haveT']." (".$matches['hesoT'].") "."</td>";
						echo "<td>".$matches['res']."</td>";
						echo "<td> <a onclick='return confirm(\"Bạn có chắc chắn muốn END?\");' style ='text-decoration: none' href = 'end.php?idM=".$matches['MatchID']."'> END </a> </td>";
						echo "<td> <a style ='text-decoration: none' href = 'editM.php?idM=".$matches['MatchID']."'> UPDATE </a> </td>";
						echo "<td> <a onclick='return confirm(\"Bạn có chắc chắn muốn DELETE?\");' style ='text-decoration: none' href = 'deleteM.php?idM=".$matches['MatchID']."'> DELETE </a> </td>";
						echo "</tr>";
			
						
					
				}
				?>
			</tbody>
		</table>
		<br><br>
		<b style="font-size: 14px">Add Match</b> <br><br>

		<form  method="post" class="form-inline" role="form" action = "newmatch.php">
			<div class="form-group">
					<input type="datetime" class="form-control" id="time" name = "time" placeholder="YYYY-MM-DD HH:MM:SS">
			</div>
      <br><br>
			<div class="form-group">
			    <input type="text" class="form-control" id="team1" name="team1" placeholder="Team 1">
			</div>
			<div class="form-group">
			    <input type="text" class="form-control" id="hs1" name="hs1" placeholder="Hệ Số 1">
			</div>
			<div class="form-group">
			    <input type="text" class="form-control" id="point1" name="point1" placeholder="Point 1">
			</div>
			<div class="form-group">
			    <input type="text" class="form-control" id="ponit2" name="point2" placeholder="Point 2">
			</div>
			<div class="form-group">
			    <input type="text" class="form-control" id="hs2" name="hs2" placeholder="Hệ Số 2">
			</div>
			<div class="form-group">
			    <input type="text" class="form-control" id="team2" name="team2" placeholder="Team2">
			</div>
      <br>
			<div class="form-group">
			    <input type="text" class="form-control" id="haveT" name="haveT" placeholder="Tài xỉu">
			</div>
			<div class="form-group">
			    <input type="text" class="form-control" id="hsT" name="hsT" placeholder="Hệ Số Tài">
			</div>
			<div class="form-group">
			    <input type="text" class="form-control" id="hsX" name="hsX" placeholder="Hệ Số Xỉu">
			</div>
      <br><br>
			<input type="submit" class="btn btn-primary" value="Submit">
		</form>
	</div>

	<?php  
		include ("foot.php");
	?>

</body>

</html>