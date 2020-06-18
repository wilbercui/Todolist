<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <meta name="csrf-param" content="_csrf-backend">
    <meta name="csrf-token" content="LTZJgB-1GFxMoj4Jv4mUN8UXwrqAfmOLwSzvd_jgDDNfAjHCaY1wHiWTDlrR2-1C9GCk7edHAc6ESNoNv7JeYA==">
    <link href="./plugins/layui/css/layui.css" rel="stylesheet">
    <link href="./resources/css/main.css" rel="stylesheet">
    <link href="./resources/css/iconfont.css" rel="stylesheet">
    <link href="./plugins/awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="./resources/css/login.css" rel="stylesheet" 0="backend\assets\AppAsset"></head>
<body>
<div class="login_background" style="background: url(./resources/images/login.jpg) no-repeat center center;"></div>
<div class="login">
    <div class="login-box">
        <div class="login-box-body">
            <h1>register</h1>
            <form id="request-password-reset-form" class="layui-form" method="post">
                <input type="hidden" name="type" value="reset">
                <div class="layui-form-item field-passwordresetrequest-email required">
                    <input type="text" id="passwordresetrequest-email" class="layui-input" name="email" placeholder="Email" aria-required="true"><span class='glyphicon glyphicon-envelope form-control-feedback'></span>
                    <p class="help-block help-block-error"></p>
                </div>
                <div class="layui-form-item field-passwordresetrequest-email required">
                    <input type="text" id="passwordresetrequest-email" class="layui-input" name="nickname" placeholder="Nickname" aria-required="true"><span class='glyphicon glyphicon-envelope form-control-feedback'></span>
                    <p class="help-block help-block-error"></p>
                </div>
                <div class="layui-form-item field-passwordresetrequest-email required">
                    <input type="password" id="passwordresetrequest-email" class="layui-input" name="password" placeholder="password" aria-required="true"><span class='glyphicon glyphicon-envelope form-control-feedback'></span>
                    <p class="help-block help-block-error"></p>
                </div>
                <div class="layui-form-item">
                    <a  class="layui-btn login_btn" id="login-button">register</a></div>
                <div style="position: absolute;right: 18px;bottom: 0;">
                    <a class="layui-form-mid layui-word-aux" href="login.php"
                       style="float:right;padding: 5px 0; color: #fff !important">login</a></div>
            </form>
        </div>
    </div>
</div>


<script src="./plugins/layui/layui.js"></script>
<script src="./resources/js/login.js" 0="backend\assets\AppAsset"></script>
</body>
</html>
