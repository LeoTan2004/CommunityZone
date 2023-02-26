function login(username, password) {
	var v = parseInt(username);
	if (isNaN(v)) {
		alert('账号应为数字');
		return ;
	}
	if (password.length < 6) {
		alert('密码长度应大于6位');
		return;
	}

	let xmlhttp = getAjax();

	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			var str = xmlhttp.responseText;
			var date = JSON.parse(str);
			if (date['code']==0){
				window.location.href = ('blog.html');
			}else{
				alert('登录失败');
			}
		}
	}
	xmlhttp.open("POST", "../interface/login.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("username=" + v + '&' + "password=" + password);
}


function register(username, password,email) {
	var v = parseInt(username);
	if (isNaN(v)) {
		alert('账号应为数字');
		return ;
	}
	if (password.length < 6) {
		alert('密码长度应大于6位');
		return;
	}

	let xmlhttp = getAjax();
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			var str = xmlhttp.responseText;
			var date = JSON.parse(str);
			if (date['code']==0){
				alert('注册成功');
				window.location.href = 'sign-in.html';
			}else{
				alert('注册失败:'+date['message']);
			}
		}
	}
	xmlhttp.open("POST", "../interface/register.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("username=" + v + '&' + "password=" + password+ '&' + "email=" + email);
}

function checkStatus(){

	let xmlhttp = getAjax();
	xmlhttp.onreadystatechange = function () {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			da = xmlhttp.responseText;
			daobj = JSON.parse(da);
			if (daobj['code']==0){
				document.getElementById('userInfo').innerText =  daobj['date']['nickname'];
			}
		}
	}
	xmlhttp.open("GET", "../interface/getCurrentUserInfo.php", true);//url
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send();//datebody
}