<!DOCTYPE html>
<html>
<head>
	<title>Đặt cược</title>
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
		$matchid = $_GET['matchid'];
		include ("db.php");
		$result = mysqli_query($conn, "SELECT * FROM `matches` WHERE `MatchID`='$matchid' && `isStart` = 0");
		$rows = mysqli_num_rows($result);
		if ($rows == 0) {
			header("location: index.php");
		}
		include ("nav.php");
		
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
				  <div class="col-md-3">
				  	<?php  
				  		echo $matches['team1'];
				  	?>
				  </div>
				  <div class="col-md-4">
				  	<?php  
				  		echo "<i style = 'color:red'>"."(".$matches['hesoX'].") "." Xỉu/Tài (".$matches['hesoT'].") : ".$matches['haveT']."</i>";
				  		
				  	?>
				  </div>
				  <div class="col-md-3">
				  	<?php  
				  		echo " ".$matches['team2'];
				  	?>
				  </div>
				  <div class="col-md-1"></div>
				</div>
			</b><br>
		</div>


	<div class="row" style="width: 100%">
	  <div class="col-md-2"></div>
	  <div class="col-md-8">
	  	<form class="form-horizontal" method="POST" action="newbett.php?matchid=<?php echo $matchid ?>">
		  <div class="form-group">
		    <label class="col-sm-2 control-label">Tên đội</label>
		    <div class="col-sm-9">
		      	<select class="form-control" name="isT" id="isT">
					  <option>Xỉu</option>
					  <option>Tài</option>
				</select>
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="col-sm-2 control-label">Số tiền</label>
		    <div class="col-sm-9">
		      <input type="text" class="form-control" name="moneyT" id="moneyT" placeholder="">
		      <span id="errormoney" class="error"></span>
		    </div>
		  </div>
		  <br><br>
		  <div class="form-group">
		    <div class="col-sm-offset-5 col-sm-9">
		      <button type="submit" class="btn btn-danger" onclick="return check_bet()">Xác nhận</button>
		    </div>
		  </div>
		</form>
	  </div>
	  <div class="col-md-2"></div>
	</div>
	
	<?php  
		}
		include ("foot.php");
		$table = mysqli_query($conn, "SELECT * FROM `thongso` WHERE 1");
		$thongso = mysqli_fetch_assoc($table);
	?>
	<input type="hidden" name="GTLN" id="GTLN" value="<?php echo $thongso['Max'];?>">
	<input type="hidden" name="DCNN" id="DCNN" value="<?php echo $thongso['DCNN'];?>">


</body>

</html>

<script type="text/javascript">
	function check_bet ( ) {
	var check = 0;
	var DCNN = document.getElementById("DCNN").value;
	var GTLN =  document.getElementById("GTLN").value;
	var money = document.getElementById("moneyT").value;
	var hieu = money - GTLN;
	if (money == ""){
		check = 1;
		document.getElementById("errormoney").innerHTML = "Nhập số tiền của bạn";
	}
	else if (money % DCNN != 0 || hieu > 0) {
		check = 1;
		if(money% DCNN != 0) {
			document.getElementById("errormoney").innerHTML = "Số tiền phải là bội của " + DCNN;
		}
		else {
			document.getElementById("errormoney").innerHTML = "Max "+ GTLN;
		}
	}
	else if (money < 0) {
		check = 1;
		document.getElementById("errormoney").innerHTML = "Số tiền phải lớn hơn 0";
	}

	else {
		document.getElementById("errormoney").innerHTML = "";
	}

	if (check == 0) {
		return true;
	}
	else return false;
}


</script>