
function check_submit ( ) {
	var check = 0;
	var acc = document.getElementById("acc").value;
	if (acc.length < 6){
		check = 1;
		document.getElementById("erroracc").innerHTML = "Tên tài khoản tối thiểu 6 ký tự <br> <br>";
	}
	else {
		document.getElementById("erroracc").innerHTML = "";
	}

	var pass = document.getElementById("pass").value;
	if (pass == ""){
		check = 1;
		document.getElementById("errorpass1").innerHTML = "Nhập Mật khẩu! <br> <br>";
	}
	else {
		document.getElementById("errorpass1").innerHTML = "";
	}

	var pass1 = document.getElementById("repass").value;
	if (pass1 != pass) {
		check = 1;
		document.getElementById("errorpass2").innerHTML = "Mật khẩu không khớp! <br> <br>";
	}
	else {
		document.getElementById("errorpass2").innerHTML = "";
	}

	var name = document.getElementById("name").value;
	if (name == ""){
		check = 1;
		document.getElementById("errorname").innerHTML = "Nhập Họ và tên của bạn! <br> <br>";
	}
	else {
		document.getElementById("errorname").innerHTML = "";
	}

	var phone = document.getElementById("phone").value;
	if (phone == ""){
		check = 1;
		document.getElementById("errorphone").innerHTML = "Nhập Số điện thoại của bạn! <br> <br>";
	}
	else {
		document.getElementById("errorphone").innerHTML = "";
	}



	if (check == 0) {
		return true;
	}
	else return false;
}

