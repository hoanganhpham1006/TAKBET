<!DOCTYPE html>
<html>
<head>
	<title>TAK BET</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="css/bootstrap.min.css" >
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js" ></script>
	<script src="js/jquery-2.1.1.min.js" ></script>
</head>
<body>
	<?php  
		include ("global.php");
		include ("nav.php");
	?>

	<?php  
		if ($admin == 1) {
		echo "
	    <form method='post' action='' enctype='multipart/form-data'>
	        <input type='file' name='avatar'>
	        <input type='submit' name='uploadclick' value='Upload'>
	    </form> ";
		}
	?>
	    <?php // Xử Lý Upload
	  
	    // Nếu người dùng click Upload
	    if (isset($_POST['uploadclick']))
	    {
	        // Nếu người dùng có chọn file để upload
	        if (isset($_FILES['avatar']))
	        {
	            // Nếu file upload không bị lỗi,
	            // Tức là thuộc tính error > 0
	            if ($_FILES['avatar']['error'] > 0)
	            {
	                echo 'File Upload Bị Lỗi';
	            }
	            else{
	                // Upload file
	     			$_FILES['avatar']['name'] = '1.png';
	                move_uploaded_file($_FILES['avatar']['tmp_name'], 'images/'.$_FILES['avatar']['name']);
	                header("location: index.php");
	            }
	        }
	        else{
	            echo 'Bạn chưa chọn file upload';
	        }
	    }

		?>
		
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<img src="<?php echo 'images/1.png?t='.time();?>" style="width: 100%; height: 650px">
	</div>

	<?php  
		include ("foot.php");
	?>

</body>

</html>