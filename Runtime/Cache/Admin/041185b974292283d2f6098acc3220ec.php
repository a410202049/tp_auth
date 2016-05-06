<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><meta name="renderer" content="webkit">
    <title>H+ 后台主题UI框架 - 登录</title>
    <meta name="keywords" content="管理后台">
    <meta name="description" content="管理后台">
    <link href="/Public/admin/css/bootstrap.min.css?v=3.4.0" rel="stylesheet">
    <link href="/Public/admin/font-awesome/css/font-awesome.css?v=4.3.0" rel="stylesheet">

    <link href="/Public/admin/css/animate.css" rel="stylesheet">
    <link href="/Public/admin/css/style.css?v=2.2.0" rel="stylesheet">

</head>

<body class="gray-bg">
    <div class="middle-box text-center loginscreen  animated fadeInDown">
        <div>
            <div>
                <h1 class="logo-name">H+</h1>
            </div>
            <h3>欢迎使用 后台管理系统</h3>
            <form class="m-t" role="form" action="<?php echo U('Admin/Index/login');?>" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="用户名" name="username">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="密码" name="password">
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-7">
                            <input type="text" class="form-control" placeholder="验证码" name="code">
                        </div>
                        <div class="col-sm-5">
                            <img src="<?php echo U('Admin/Index/verify');?>" onclick='this.src="<?php echo U('Admin/Index/verify');?>/&"+Math.random()' alt="" height="34" width="100%">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">登 录</button>
            </form>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="/Public/admin/js/jquery-2.1.1.min.js"></script>
    <script src="/Public/admin/js/bootstrap.min.js?v=3.4.0"></script>


</body>

</html>