
function check_bet ( ) {
	var check = 0;
	var money = document.getElementById("money").value;
	if (money == ""){
		check = 1;
		document.getElementById("errormoney").innerHTML = "Nhập số tiền của bạn";
	}
	else if (money % 10000 != 0 || money > 200000) {
		check = 1;
		if(money%10000 != 0) {
			document.getElementById("errormoney").innerHTML = "Số tiền phải là bội của 10.000";
		}
		else {
			document.getElementById("errormoney").innerHTML = "Max 200.000! Không nhận kèo này :)";
		}
	}

	else {
		document.getElementById("errormoney").innerHTML = "";
	}

	if (check == 0) {
		return true;
	}
	else return false;
}

