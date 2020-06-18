layui.config({
	base: "./resources/js/"
}).use(['form', 'jquery'], function () {
	$ = layui.jquery;
	$('#login-button').click(function () {
		$.ajax({
			url: 'get.php',
			type: 'get',
			dataType: 'json',
			data:$('#request-password-reset-form').serialize(),
			success: function (res) {
                if(res.data==0){
					window.location.href='login.php';
				}else if(res.data['code']==1){
					localStorage.setItem('user',res.data['id']+":"+res.data['user'])
					window.location.href='index.php';
				}
			}
		})

	})





});


