function ubahPassword() {
	if (document.forms["ubahpass"]["newPass"].value !== document.forms["ubahpass"]["konPass"].value) {
	alert("Password Tidak Sesuai");
	document.forms["ubahpass"]["konPass"].focus();
	return false;
	}
	if(document.forms["ubahpass"]["newPass"].value == document.forms["ubahpass"]["konPass"].value){
	var acc = document.getElementById('sesuai');
	acc.innerHTML="<p>Password Berhasil diubah</p>"
	return true;
	}

}