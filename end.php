<?php 
	include ("db.php");
	
	$matchid = $_GET["idM"];
	
	$table = mysqli_query($conn, "SELECT bet.BetID, bet.MatchID, bet.CustomerID, bet.whichTeam, bet.money, bet.isCount, matches.team1, matches.team2, matches.point1, matches.point2, matches.heso1, matches.heso2, matches.hesoT, matches.hesoX, matches.isEnd, customers.name, customers.moneyS, customers.money24h FROM ((`bet` INNER JOIN matches ON bet.MatchID = matches.MatchID) INNER JOIN customers ON bet.CustomerID = customers.CustomerID ) WHERE matches.MatchID = '$matchid' ");
	while ($matches = mysqli_fetch_assoc($table)) {
		$id = $matches['CustomerID'];
		$money24h = $matches['moneyS'];
		if($matches['whichTeam'] == 1) {
			if ($matches['point1'] > $matches['point2']) {
				if ($matches['point1'] - $matches['point2'] > 0.25) $a= $matches['moneyS'] + $matches['money']*$matches['heso1'];
				else $a = $matches['moneyS'] + $matches['money']*$matches['heso1']/2;
			
				$sql = "UPDATE `customers` SET `moneyS` = '$a' WHERE `CustomerID` = '$id'";
				mysqli_query($conn, $sql);
			}
			if ($matches['point1'] < $matches['point2']) {
				if ($matches['point1'] - $matches['point2'] < -0.25) $a = $matches['moneyS'] - $matches['money'];
				else $a = $matches['moneyS'] - $matches['money']/2;
		
				$sql = "UPDATE `customers` SET `moneyS` = '$a' WHERE `CustomerID` = '$id'";
				mysqli_query($conn, $sql);
			}
		}
		if($matches['whichTeam'] == 2) {
			if ($matches['point1'] > $matches['point2']) {
				if ($matches['point1'] - $matches['point2'] > 0.25) $a = $matches['moneyS'] - $matches['money'];
				else $a = $matches['moneyS'] - $matches['money']/2;
		
				$sql = "UPDATE `customers` SET `moneyS` = '$a' WHERE `CustomerID` = '$id'";
				mysqli_query($conn, $sql);
			}
			if ($matches['point1'] < $matches['point2']) {
				if ($matches['point1'] - $matches['point2'] < -0.25) $a = $matches['moneyS'] + $matches['money']*$matches['heso2'];
				else $a = $matches['moneyS'] + $matches['money']*$matches['heso2']/2;
			
				$sql = "UPDATE `customers` SET `moneyS` = '$a' WHERE `CustomerID` = '$id'";
				mysqli_query($conn, $sql);
			}
		}
	}

	$table = mysqli_query($conn, "SELECT bett.BetTID, bett.MatchID, bett.CustomerID, bett.isT, bett.moneyT, matches.team1, matches.team2, matches.res, matches.haveT, matches.isEnd, matches.heso1, matches.heso2, matches.hesoT, matches.hesoX, customers.name, customers.moneyS, customers.money24h FROM ((`bett` INNER JOIN matches ON bett.MatchID = matches.MatchID) INNER JOIN customers ON bett.CustomerID = customers.CustomerID ) WHERE matches.MatchID = '$matchid' ");
	while ($matches = mysqli_fetch_assoc($table)) {
		$id = $matches['CustomerID'];
		$money24h = $matches['moneyS'];
		if($matches['isT'] == 1) {
			if ($matches['res'] > $matches['haveT']) {
				if ($matches['res'] - $matches['haveT'] > 0.25) $a= $matches['moneyS'] + $matches['moneyT']*$matches['hesoT'];
				else $a = $matches['moneyS'] + $matches['moneyT']*$matches['hesoT']/2;
		
				$sql = "UPDATE `customers` SET `moneyS` = '$a' WHERE `CustomerID` = '$id'";
				mysqli_query($conn, $sql);
			}
			if ($matches['res'] < $matches['haveT']) {
				if ($matches['res'] - $matches['haveT'] < -0.25) $a = $matches['moneyS'] - $matches['moneyT'];
				else $a = $matches['moneyS'] - $matches['moneyT']/2;
	
				$sql = "UPDATE `customers` SET `moneyS` = '$a' WHERE `CustomerID` = '$id'";
				mysqli_query($conn, $sql);
			}
		}
		if($matches['isT'] == 0) {
			if ($matches['res'] > $matches['haveT']) {
				if ($matches['res'] - $matches['haveT'] > 0.25) $a = $matches['moneyS'] - $matches['moneyT'];
				else $a = $matches['moneyS'] - $matches['moneyT']/2;
			
				$sql = "UPDATE `customers` SET `moneyS` = '$a' WHERE `CustomerID` = '$id'";
				mysqli_query($conn, $sql);
			}
			if ($matches['res'] < $matches['haveT']) {
				if ($matches['res'] - $matches['haveT'] < -0.25) $a = $matches['moneyS'] + $matches['moneyT']*$matches['hesoX'];
				else $a = $matches['moneyS'] + $matches['moneyT']*$matches['hesoX']/2;
			
				$sql = "UPDATE `customers` SET `moneyS` = '$a' WHERE `CustomerID` = '$id'";
				mysqli_query($conn, $sql);
			}
		}
	}

	$sql = "UPDATE `matches` SET `isEnd` = 1 WHERE MatchID = '$matchid'";

	if (mysqli_query($conn, $sql)) { //Check 
		header("location: quanlyM.php");
	}

	else {
		echo "Haven't Edited";
	}


	mysqli_close($conn); //Disconnect

?>