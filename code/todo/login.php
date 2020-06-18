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
    <meta name="csrf-token"
          content="6ou6sHiXSE-WZY-AtriSifCevo1NcX3AZyUz6GPMkDqYv8LyDq8gDf9Uv9PY6uv8wenY2ipIH4UiQQaSJJ7CaQ==">
    <link href="./plugins/layui/css/layui.css" rel="stylesheet">
    <link href="./resources/css/main.css" rel="stylesheet">
    <link href="./resources/css/iconfont.css" rel="stylesheet">
    <link href="./plugins/awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="./resources/css/login.css" rel="stylesheet" 0="backend\assets\AppAsset">
</head>
<body>
<div class="login_background" style="background: url(./resources/images/login.jpg) no-repeat center center;"></div>
<div class="login">

    <div>
        <h1>login</h1>
    </div>
    <div>
        <form id="request-password-reset-form" class="layui-form">
            <input type="hidden" name="type" value="login">
            <div class="layui-form-item field-login-username required">

                <input type="text" id="login-username" class="layui-input" name="email" lay-verify="required"
                       placeholder="Email" aria-required="true"><span
                        class='glyphicon glyphicon-envelope form-control-feedback'></span>

                <p class="help-block help-block-error"></p>
            </div>
            <div class="layui-form-item field-login-password required">

                <input type="password" id="login-password" class="layui-input" name="password" lay-verify="required"
                       placeholder="密码" aria-required="true"><span
                        class='glyphicon glyphicon-lock form-control-feedback'></span>

                <p class="help-block help-block-error"></p>
            </div>

            <div class="layui-form-item">
                <a class="layui-btn login_btn" id="login-button" lay-submit="">login</a></div>

            <div>

                <div style="position: absolute;right: 18px;bottom: 37px;">
                    <a class="layui-form-mid layui-word-aux" href="request-password-reset.php"
                       style="float:right;padding: 5px 0; color: #fff !important">register</a></div>
            </div>
        </form>
    </div>
</div>
<script src="./plugins/layui/layui.js"></script>
<script src="./resources/js/login.js" 0="backend\assets\AppAsset"></script>
</body>
</html>
