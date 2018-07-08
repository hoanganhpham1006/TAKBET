<!DOCTYPE html>
<html>
<head>
	<title>Lịch Thi Đấu</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="css/bootstrap.min.css" >
	<link rel="stylesheet" href="css/mycss.css" >
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js" ></script>
	<script src="js/jquery-2.1.1.min.js" ></script>
</head>

<body>
	<?php  
		include ("global.php");
		include ("nav.php");
	?>


	<div style="text-align: center" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<b style = "font-family: arial; font-size: 30px;">LỊCH THI ĐẤU</b><br>
		<i style = "font-family: arial; font-size: 13px;">Sẽ luôn được cập nhật ngay sau khi chúng tôi tính toán kèo thành công</i><br><br>
		
	</div>

	<?php
		include("db.php");
		$table = mysqli_query($conn, "SELECT * FROM `matches` WHERE `isStart` = 0 ");
		while ($matches = mysqli_fetch_assoc($table)) {
			if($matches['point1'] != "") {
	?>
		<div class="row" style="padding: 10px 0px 10px 0px; width: 100%">
			<div class="col-md-2"></div>
			<div class="col-md-2" style="font-size: 16px; text-align: left; font-family:'Book Antiqua' "><?php echo $matches['time'] ?></div>
			<div class="col-md-8"></div>
		</div>

		<div class="row" style="padding: 0px 0px 10px 0px;width: 100%; text-align: center; ">
			<div class="col-md-2"></div>
			<div class="col-md-3" style="font-size: 20px; background-color: lightblue;font-family:'Book Antiqua'"><b><?php echo $matches['team1'] ?></b></div>
			<div class="col-md-2" style="font-size: 20px; background-color: lightblue;font-family:'Book Antiqua'"><b><a href="vs.php?matchid=<?php echo $matches['MatchID']?>" class="error">VS</a></b></div>
			<div class="col-md-3" style="font-size: 20px; background-color: lightblue;font-family:'Book Antiqua'"><b><?php echo $matches['team2'] ?></b></div>
			<div class="col-md-2"></div>
		</div>
	<?php 
		}
		if($matches['haveT'] != "") {
	?>
		<div class="row" style="padding: 10px 0px 10px 0px; width: 100%">
			<div class="col-md-2"></div>
			<div class="col-md-2" style="font-size: 16px; text-align: left; font-family:'Book Antiqua' "><?php echo $matches['time'] ?></div>
			<div class="col-md-8"></div>
		</div>

		<div class="row" style="padding: 0px 0px 10px 0px;width: 100%; text-align: center; ">
			<div class="col-md-2"></div>
			<div class="col-md-3" style="font-size: 20px; background-color: yellow;font-family:'Book Antiqua'"><b><?php echo $matches['team1'] ?></b></div>
			<div class="col-md-2" style="font-size: 20px; background-color: yellow;font-family:'Book Antiqua'"><b><a href="vsT.php?matchid=<?php echo $matches['MatchID']?>" class="error">VS</a></b></div>
			<div class="col-md-3" style="font-size: 20px; background-color: yellow;font-family:'Book Antiqua'"><b><?php echo $matches['team2'] ?></b></div>
			<div class="col-md-2"></div>
		</div>
	<?php  
		}
	}
	include ("foot.php");
	?>

</body>

</html>