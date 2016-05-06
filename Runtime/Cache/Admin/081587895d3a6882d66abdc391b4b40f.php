<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <link href="/Public/admin/css/bootstrap.min.css?v=3.4.0" rel="stylesheet">
    <link href="/Public/admin/font-awesome/css/font-awesome.css?v=4.3.0" rel="stylesheet">
    <!-- Morris -->
    <link href="/Public/admin/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <!-- Gritter -->
    <link href="/Public/admin/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">
    <link href="/Public/admin/css/animate.css" rel="stylesheet">
    <link href="/Public/admin/css/style.css?v=2.2.0" rel="stylesheet">
    <style>
        body{background: #f3f3f4 }
    </style>
    
</head>
<body>
    <div id="wrapper">
    	
    <div class="row">
       <div class="col-lg-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>个人信息</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <table>
                        <tbody>
                            <tr>
                                <td>用户帐号：</td>
                                <td><?php echo ($userinfo['username']); ?></td>
                            </tr>
                            <tr>
                                <td>用户角色：</td>
                                <td><?php echo ($userinfo['groupname']); ?></td>
                            </tr>
                            <tr>
                                <td>上次登陆IP:：</td>
                                <td><?php echo ($userinfo['last_login_ip']); ?></td>
                            </tr>
                            <tr>
                                <td>上次登陆地址：</td>
                                <td><?php echo get_location($userinfo['last_login_ip']);?></td>
                            </tr>
                            <tr>
                                <td>上次登陆时间：</td>
                                <td><?php echo date('Y-m-d H:i:s', $userinfo['last_login_time']); ?></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
       </div>
       <div class="col-lg-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>系统信息</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <table>
                        <tbody>
                            <tr>
                                <td>操作系统：</td>
                                <td><?php echo ($system_info['0']); ?></td>
                            </tr>
                            <tr>
                                <td>运行方式：</td>
                                <td><?php echo ($system_info['1']); ?></td>
                            </tr>
                            <tr>
                                <td>PHP版本：</td>
                                <td><?php echo ($system_info['3']); ?></td>
                            </tr>
                            <tr>
                                <td>MYSQL版本：</td>
                                <td><?php echo ($system_info['2']); ?></td>
                            </tr>
                            <tr>
                                <td>GD库版本：</td>
                                <td><?php echo ($system_info['4']); ?></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
       </div>
    </div>

    </div>

    <!-- Mainly scripts -->
    <script src="/Public/admin/js/jquery-2.1.1.min.js"></script>
    <script src="/Public/admin/js/bootstrap.min.js?v=3.4.0"></script>
    <script src="/Public/admin/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="/Public/admin/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="/Public/admin/js/hplus.js?v=2.2.0"></script>
    <script src="/Public/admin/js/plugins/pace/pace.min.js"></script>
    <script src="/Public/admin/js/plugins/layer/layer.js"></script>
    <script src="/Public/admin/js/plugins/validate/jquery.validate.min.js"></script>
    <script src="/Public/admin/js/plugins/validate/messages_zh.min.js"></script>
    

</body>

</html>