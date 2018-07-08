
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
		<b style = "font-family: arial; font-size: 30px;">QUẢN LÝ THÔNG SỐ</b><br>
		<div class="row">
		 	<div class="col-md-2"></div>
		 	<div class="col-md-8">
		 		<table class="table table-hover">
					<thead>
						<tr >
							<th style="text-align: center;">Max</th>
							<th style="text-align: center;">Độ chia nhỏ nhất</th>
						</tr>
					</thead>
					<tbody>
						<?php
						include("db.php");
						$result = mysqli_query($conn, "SELECT * FROM thongso WHERE 1");
				
						while ($thongso = mysqli_fetch_assoc($result)) {
								echo "<tr>";						
								echo "<td>".$thongso['Max']."</td>";
								echo "<td>".$thongso['DCNN']."</td>";
								echo "</tr>";
								
						}
						?>
					</tbody>
				</table>
		 	</div>
		 	<div class="col-md-2"></div>
		</div>
		<b style="font-size: 14px">Update Value</b> <br><br>

		<form  method="post" class="form-inline" role="form" action = "newts.php">
			
			<div class="form-group">
			    <input type="text" class="form-control" id="max" name="max" placeholder="Tiền max">
			</div>
			<div class="form-group">
			    <input type="text" class="form-control" id="DCNN" name="DCNN" placeholder="Độ chia nhỏ nhất">
			</div>
			<input type="submit" class="btn btn-primary" value="Submit">


		</form>

	</div>

			<?php  
				include ("foot.php");
			?>

</body>

</html>
