<!DOCTYPE html>
<html>
<head>
	<title>Customers</title>
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
		<b style = "font-family: arial; font-size: 30px;">QUẢN LÝ CUSTOMERS</b><br>
		
		<table class="table table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>Account</th>
					<th>Name</th>
					<th>Phone</th>
					<th>Số dư</th>
					<th>Loại</th>
					<th>TT</th>
					<th></th>
				</tr>
			</thead>
			<tbody style="text-align: left;">
				<?php
				include("db.php");
				$table = mysqli_query($conn, "SELECT * FROM `customers` ORDER BY `CustomerID` DESC ");
		
				while ($customers = mysqli_fetch_assoc($table)) {
				
						if ($customers['isAdmin'] == 1) echo "<tr class = 'info'>";
						if ($customers['isActive'] == 0) echo "<tr class= 'danger'>";
						
						echo "<td>".$customers['CustomerID']."</td>";
						echo "<td>".$customers['acc']."</td>";
						echo "<td>".$customers['name']."</td>";
						echo "<td>".$customers['phone']."</a></td>";
						echo "<td><a style ='text-decoration: none' href = 'edit.php?id=".$customers['CustomerID']."'>".$customers['moneyS']."</td>";
						if ($customers['isAdmin'] == 1) echo "<td><a onclick='return confirm(\"Bạn có chắc chắn muốn tước quyền ADMIN?\");' style ='text-decoration: none' href = 'be_mem.php?id=".$customers['CustomerID']."'> ADMIN </a></td>";
						else echo "<td> <a onclick='return confirm(\"Bạn có chắc chắn muốn cấp quyền ADMIN?\");' style ='text-decoration: none' href = 'be_admin.php?id=".$customers['CustomerID']."'> Thành viên </a> </td>";
						if ($customers['isActive'] == 1) echo "<td> <a onclick='return confirm(\"Bạn có chắc chắn muốn HỦY active?\");' style ='text-decoration: none' href = 'none_active.php?id=".$customers['CustomerID']."'> ACTIVED </a> </td>";
						else echo "<td><a onclick='return confirm(\"Bạn có chắc chắn muốn active?\");' style ='text-decoration: none' href = 'active.php?id=".$customers['CustomerID']."'> NONE ACTIVE </a></td>";
						// echo "<td><a style ='text-decoration: none' href = 'edit.php?id=".$customers['CustomerID']."'> EDIT </a> </td>";
						echo "<td> <a onclick='return confirm(\"Bạn có chắc chắn muốn DELETE?\");' style ='text-decoration: none' href = 'delete.php?id=".$customers['CustomerID']."'> DELETE </a> </td>";
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