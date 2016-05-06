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
    
    <style type="text/css">
        .padding-right{
            margin-right: 15px;
        }
    </style>

</head>
<body>
    <div id="wrapper">
    	
    <div class="row">
       <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>用户列表</h5>
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
                    <a class="btn btn-primary" href="<?php echo U('Admin/Auth/addGroup');?>" target="rightMain"><i class="fa fa-plus"></i>&nbsp;&nbsp;添加角色组</a>
                    <div class="table-box" >
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>用户组名称</th>
                                    <th>创建时间</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(is_array($groups)): $i = 0; $__LIST__ = $groups;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$group): $mod = ($i % 2 );++$i;?><tr>
                                        <td><?php echo ($group['id']); ?></td>
                                        <td><?php echo ($group['title']); ?></td>
                                        <td><?php echo (date("Y-m-d H:i:s",$group['create_time'])); ?></td>
                                        <?php if($group["id"] == '1'): ?><td><a class="option disable-option" href="javascript:void(0)">授权/编辑</a>|<a class="option disable-option" data-id="<?php echo ($group['id']); ?>">删除</a></td>
                                            <?php else: ?>
                                            <td><a class="option" href="<?php echo U('Admin/Auth/editGroup');?>/id/<?php echo ($group['id']); ?>">授权/编辑</a>|<a class="option del-group" data-id="<?php echo ($group['id']); ?>">删除</a></td><?php endif; ?>
                                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                            </tbody>
                        </table>
                    </div>
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
    
    <script type="text/javascript">
        $(function(){
            $('.del-group').click(function(){
                var id = $(this).data('id');
                parent.del_group(id);
            })

        })
    </script>


</body>

</html>