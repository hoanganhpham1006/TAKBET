<!DOCTYPE html>
<html>
<head>
	<title>Live Score</title>
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
	include ("globalAdmin.php");
	include ("nav.php"); 
	?>

	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<iframe src="https://www.ligascore.com/widget/soccer" width="100%" height="800" frameborder="0"></iframe>
	<?php include ("foot.php"); ?>
</body>
</html>