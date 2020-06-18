<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>后台管理</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Access-Control-Allow-Origin" content="*">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <link rel="icon" href="favicon.ico">
    <meta name="csrf-param" content="_csrf-backend">
    <meta name="csrf-token"
          content="OfIdK9QLvYvsd6cT-YgrOcsij7PpNmWaETU8k0s1rrhDgk4dukjK-MEV9VGouE52qky9h7N7BMVTYQz-O1T6gA==">
    <title></title>
    <link href="./plugins/layui/css/layui.css" rel="stylesheet">
    <link href="./resources/css/main.css" rel="stylesheet">
    <link href="./resources/css/iconfont.css" rel="stylesheet">
    <link href="./plugins/awesome/css/font-awesome.min.css" rel="stylesheet">
</head>
<body class="mainBody">
<div class="layui-layout layui-layout-admin">
    <!-- 顶部 -->
    <div class="layui-header  header height-50">
        <div class="layui-main">
            <div style="position: absolute; right: 0;left: 0;margin: auto; height: 50px">
                <form id="form" action='javascript:postaction()' method='post'>
                    <div class="nav">
                        <div class="topNav">
                            <input type="text" name="todoList" id="inputTodo" style="padding-left: 5px"
                                   placeholder="Input content" required="required"
                                   autocomplete="off">
                        </div>
                    </div>

                </form>
            </div>
            <div class="header-menu">
                <!-- 顶部右侧菜单 -->
                <ul class="layui-nav top_menu">
                    <li class="layui-nav-item line-h50 showNotice layui-this" id="showNotice">
                        <a href="javascript:;">
                            <i class="iconfont icon-gonggao"></i>
                            <cite>分享公告<span class="layui-badge noice">0</span></cite>
                        </a>
                    </li>
                    <li class="layui-nav-item line-h50">
                        <a href="javascript:;">
                            <img src="https://resources.alilinet.com/20180323/201803230920589741.png"
                                 class="layui-circle header_user_head_pic" width="30" height="30">
                            <cite class="header_user_name user-menu" id="user"></cite>
                        </a>
                        <dl class="layui-nav-child top-50">
                            <dd><a href="javascript:;" class="changeSkin"><i
                                            class="iconfont icon-yifu userMenu"></i><cite>skin</cite></a></dd>
                            <dd><a href="login.php" class="signOut yii2-post-logout"><i
                                            class="iconfont icon-logout userMenu"></i><cite>sign out</cite></a></dd>
                        </dl>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- 右侧内容 -->
    <div class="layui-form top-50">
        <div class="content" style="padding: 20px; background-color: #F2F2F2;position: absolute; width: 100%;height: 100%">
            <div class="layui-row layui-col-space15">
                <form class="layui-form" action="" lay-filter="example">
                    <div class="layui-card conduct" style="margin: auto; width: 50%">
                        <div class="layui-card-header"><h3 style="font-weight: bold; width: 80%;display: inline-block">
                                doing</h3>
                            <div style="display: inline-block">
                                <a type="button" class="layui-btn layui-btn-xs layui-btn-normal doing_button"><i class="layui-icon"></i>全部删除</a>
                            </div>
                            <span class="layui-badge layui-bg-gray num">0</span>
                        </div>
                    </div>
                    <div class="layui-card complete" style="margin: auto; width: 50%">
                        <div class="layui-card-header"><h3 style="font-weight: bold; width: 80%;display: inline-block">
                                complete</h3>
                            <div style="display: inline-block">
                                <a type="button" class="layui-btn layui-btn-xs layui-btn-normal share_button"><i class="layui-icon"></i>全部删除</a>
                            </div>
                            <span class="layui-badge layui-bg-gray num">0</span>
                        </div>
                    </div>
                    <div class="layui-card share" style="margin: auto; width: 50%">
                        <div class="layui-card-header"><h3 style="font-weight: bold; width: 94%;display: inline-block">
                                share</h3>
                            <span class="layui-badge layui-bg-gray num">0</span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>    <!-- 移动导航 -->
<div class="site-tree-mobile layui-hide"><i class="layui-icon">&#xe602;</i></div>
<div class="site-mobile-shade"></div>
<script src="./plugins/layui/layui.js"></script>
<script src="./plugins/echarts/echarts.min.js" 0="backend\assets\AppAsset"></script>
<script src="./resources/js/index.js"></script>



</body>
</html>
