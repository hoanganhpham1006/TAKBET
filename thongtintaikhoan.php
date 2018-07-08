<!DOCTYPE html>
<html>
<head>
	<title>Thông tin tài khoản</title>
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
		include("nav.php");
	?>


	<div style="text-align: center" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<b style = "font-family: arial; font-size: 30px;">THÔNG TIN TÀI KHOẢN</b><br>
		<br> <br> <br>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>Account</th>
					<th>Tên chủ tài khoản</th>
					<th>Số điện thoại </th>
					<th>Số dư TK</th>
					<th>Loại </th>
				</tr>
			</thead>
			<tbody>
				<?php
				include("db.php");
				$sql = mysqli_query($conn, "SELECT * FROM `customers` WHERE `CustomerID` = '$id' ");
				while ($customers = mysqli_fetch_assoc($sql)) {	
						echo "<tr style = 'text-align: left'>";	
						echo "<td>".$customers['CustomerID']."</td>";					
						echo "<td>".$customers['acc']."</td>";
						echo "<td>".$customers['name']."</td>";
						echo "<td>".$customers['phone']."</td>";
						if ($customers['isAdmin'] == 0) {
							echo "<td>".$customers['moneyS']."</td>";
						}
						else {
							echo "<td> None </td>";
						}

						if ($customers['isAdmin'] == 0) {
							echo "<td> Thành viên </td>";
						}
						else {
							echo "<td> ADMIN </td>";
						}
						echo "</tr>";
						$old_pass = $customers['pass'];		
				}
				?>
			</tbody>
		</table>
		<br><br>
		<b style="font-size: 14px">Đổi mật khẩu</b> <br><br>

		<form  method="post" class="form-horizontal" role="form" action = "newpass.php">
			<div class="form-group">
				<label class="col-sm-5 control-label">Mật khẩu hiện tại</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="opass" name = "opass" placeholder="Mật khẩu hiện tại">
				</div>
			</div>
			<span id="erroropass" class="error"></span> 

			<div class="form-group">
				<label class="col-sm-5 control-label">Mật khẩu mới</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="npass" name="npass" placeholder="Password">
				</div>
			</div>
			<span id="errornpass" class="error"></span> 

			<div class="form-group">
				<label class="col-sm-5 control-label">Nhập lại lần 2</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="npass1" name="npass1" placeholder="Password">
				</div>
			</div>
			<span id="errornpass1" class="error"></span> 
			   
			<input type="submit" class="btn btn-primary" value="Submit" onclick="return check_pass()">
		</form>
				

	</div>


	<?php  
		include ("foot.php");
	?>

</body>

</html>

<script type="text/javascript">
function check_pass() {
	var check = 0;
	var opass = document.getElementById("opass").value;
	if (opass != <?php echo $old_pass ?>){
		check = 1;
		document.getElementById("erroropass").innerHTML = "Mật khẩu không đúng <br> <br>";
	}
	else {
		document.getElementById("erroropass").innerHTML = "";
	}

	var npass = document.getElementById("npass").value;
	if (npass == ""){
		check = 1;
		document.getElementById("errornpass").innerHTML = "Nhập Mật khẩu mới! <br> <br>";
	}
	else {
		document.getElementById("errornpass").innerHTML = "";
	}

	var pass1 = document.getElementById("npass1").value;
	if (pass1 != npass) {
		check = 1;
		document.getElementById("errornpass1").innerHTML = "Mật khẩu không khớp! <br> <br>";
	}
	else {
		document.getElementById("errornpass1").innerHTML = "";
	}


	if (check == 0) {
		return true;
	}
	else return false;
}

</script>