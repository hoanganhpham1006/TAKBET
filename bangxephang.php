<!DOCTYPE html>
<html>
<head>
	<title>Bảng xếp hạng</title>
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
		<b style = "font-family: arial; font-size: 30px;">BẢNG XẾP HẠNG</b><br>
		<i style = "font-family: arial; font-size: 13px;">Kiểm tra 'Đang cược' và 'Lịch sử' để biết kết quả đã được cập nhật hay chưa</i><br><br>
		<table class="table table-hover">
			<thead>
				<tr>
					<th style="text-align: center;">XH</th>
					<th style="text-align: center;">Họ và Tên</th>
					<th>Elo</th>
					<th></th>
					<th>+/-</th>
				</tr>
			</thead>
			<tbody style="text-align: left;">
				<?php
				include("db.php");
				$table = mysqli_query($conn, "SELECT * FROM `customers` ORDER BY `moneyS` DESC, `money24h` DESC ");
				$tmp = 1;
        $total = 0;
        $total_tmp = 0;
				while ($customers = mysqli_fetch_assoc($table)) {
					if ($customers['isActive'] == 1 && $customers['isAdmin'] == 0) {
						$hieu = $customers['moneyS'] - $customers['money24h'];
						if ($customers['moneyS'] >= 500000) {
							echo "<tr style = 'background-color: #9ae5ff;'>";
							echo "<td width = '10%'><img src='rank/Challenger.png' width='100%'></td>";
						}
						if ($customers['moneyS'] < 500000 && $customers['moneyS'] >= 200000) {
							echo "<tr style = 'background-color: #e6e6e6;'>";
							echo "<td width = '10%'><img src='rank/Master.png' width='100%'></td>";
						}
						if ($customers['moneyS'] < 200000 && $customers['moneyS'] >= 100000) {
							echo "<tr style = 'background-color:#ffdcee;'>";
							echo "<td width = '10%'><img src='rank/Diamond.png' width='100%'></td>";
						}
						if ($customers['moneyS'] < 100000 && $customers['moneyS'] >= 0) {
							echo "<tr style = 'background-color:#e2eeee;'>";
							echo "<td width = '10%'><img src='rank/Platinum.png' width='100%'></td>";
						}
						if ($customers['moneyS'] < 0 && $customers['moneyS'] >= -200000) {
							echo "<tr style = 'background-color: #ffef9a;'>";
							echo "<td width = '10%'><img src='rank/Gold.png' width='100%'></td>";
						}						
						if ($customers['moneyS'] < -200000 && $customers['moneyS'] >= -500000) {
							echo "<tr style = 'background-color: #e7e7e7;'>";
							echo "<td width = '10%'><img src='rank/Silver.png' width='100%'></td>";
						}
						if ($customers['moneyS'] < -500000) {
							echo "<tr style = 'background-color: #e6bf99;'>";
							echo "<td width = '10%'><img src='rank/Bronze.png' width='100%'></td>";
						}
						echo "<td style='text-align: center; vertical-align: middle;'>".$customers['name']."</td>";
						echo "<td style=' vertical-align: middle;'>".$customers['moneyS']."</td>";
            $total += $customers['moneyS'];
						if ($hieu > 0) echo "<td style=' vertical-align: middle;' width = '3%'><img src='icon/up.png' width='100%'></td>";
						if ($hieu < 0) echo "<td style=' vertical-align: middle;' width = '3%'><img src='icon/down.png' width='100%'></td>";
						if ($hieu == 0) echo "<td width = '3%'></td>";
						echo "<td style=' vertical-align: middle;'>".$hieu."</td>";
            $total_tmp += $hieu;
						echo "</tr>";
						$tmp++;
						
					}
				}
        if ($tmp > 1 && $admin == 1) {
          echo "<tr>";
          echo "<td></td>";
          echo "<td style='text-align: center; vertical-align: middle;'>Tổng</td>";
          echo "<td>".$total."</td>";
          echo "<td></td>";
          echo "<td>".$total_tmp."</td>";
          echo "</tr>";
				}
        ?>
			</tbody>
		</table>
		Thách đấu: >= 500k; Cao Thủ: 200k -> 500k; Kim Cương: 100k -> 200k; Bạch Kim: 0k -> 100k; Vàng: -200k -> 0; Bạc: -500k -> -200k; Đồng < -500k;
	</div>

	<?php  
		include ("foot.php");
	?>

</body>

</html>