<?php

		include("db.php");
		$table = mysqli_query($conn, "SELECT * FROM `customers`  WHERE 1");
					
		while ($customers = mysqli_fetch_assoc($table)) {
			if ($customers['isActive'] == 1 && $customers['isAdmin'] == 0) {
				$moneyS = $customers['moneyS'];
				$cid = $customers['CustomerID'];
				$a = mysqli_query($conn, "UPDATE `customers` SET `money24h`= '$moneyS' WHERE `CustomerID`='$cid'");
			}
		}
	
?>