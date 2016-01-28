function login(f1)
{
	if ((f1.login_name.value == "") || (f1.passwd.value == "")) {
		alert("Enter your login name and password.");
		f1.login_name.focus();
		f1.login_name.select();
		return false;
	}
}

function setFocus()
{
	if (document.forms[0].login_name) {
		document.forms[0].login_name.focus();
		document.forms[0].login_name.select();
	}
}