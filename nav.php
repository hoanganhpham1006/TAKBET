	<!-- Navigation -->
	<nav class="navbar navbar-default" role="navigation">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				
				<a class="navbar-brand" href="index.php" style="font-size: 200%; color: blue; font-family: verdana;">TAK BET</a>
			</div>
	
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					<li><a href="bangxephang.php">Bảng xếp hạng</a></li>
					<li><a href="lichthidau.php">Lịch thi đấu</a></li>
					<?php
						if ($admin == 1) echo "
						<li class='dropdown'>
							<a href='' class='dropdown-toggle' data-toggle='dropdown'>Quản lý<b class='caret'></b></a>
							<ul class='dropdown-menu'>
								<li><a href='quanlyC.php'>Quản lý Customers</a></li>
								<li><a href='quanlyM.php'>Quản lý Matches</a></li>
								<li><a href='quanlyB.php'>Quản lý Bet</a></li>
								<li><a href='quanlyTB.php'>Quản lý Thông báo</a></li>
								<li><a href='quanlyTS.php'>Quản lý Thông số</a></li>
							</ul>
						</li>
						";
            else echo "
              <li><a href='dangcuoc.php'>Đang cược</a></li>
              <li><a href='lichsu.php'>Lịch sử</a></li>
            ";
					?>
          <li><a href='live.php'>Livescore</a></li>

				</ul>

				
				<ul class="nav navbar-nav navbar-right">
					<!-- <li><a href="#">Link</a></li> -->
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Xin chào <?php echo $name ?>/ Quản lý tài khoản<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="thongtintaikhoan.php">Thông tin tài khoản</a></li>
							<li><a href="logout.php">Đăng xuất</a></li>
						</ul>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div>
	</nav>

	<?php  
		include("db.php");
		$table = mysqli_query($conn, "SELECT * FROM `notice` WHERE 1 ");
			
		while ($notice = mysqli_fetch_assoc($table)) {
	?>
		<div style="text-align: center; color: red; margin-bottom: 20px;"><?php echo $notice['notice']; ?></div>

	<?php
		}
	?>