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
                    <h5>字段列表</h5>
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
                    <form class="form-inline" role="form" id="addMenuForm">
                            <div class="form-group padding-right">
                                <label>父级菜单：</label>
                                    <select name="pid" class="form-control">
                                        <option value="0">--顶级菜单--</option>
                                        <?php echo ($menus); ?>
                                    </select>
                            </div>
                            <div class="form-group padding-right">
                                <label>是否显示：</label>
                                    <select name="isshow" class="form-control">
                                        <option value="1">显示</option>
                                        <option value="0">隐藏</option>
                                    </select>
                            </div>
                            <div class="form-group padding-right">
                                <label>菜单名称：</label>
                                <input type="text" class="form-control"  placeholder="请输入菜单名称" name="title">
                            </div>
                            <div class="form-group padding-right">
                                <label>控制器/方法：</label>
                                <input type="text" class="form-control" placeholder="请输出控制器/方法" name="name">
                            </div>
                            <div class="form-group padding-right">
                                <label>菜单图标：</label>
                                <input type="text" class="form-control" placeholder="菜单图标" name="icon">
                            </div>
                            <span id="addMenu" class="btn btn-primary add-field" href="javascript:void(0);" style="margin-bottom: 0px;"><i class="fa fa-plus"></i>&nbsp;&nbsp;添加菜单</span>
                    </form>
                    <form name="rule-order" id="rule-order">
                    <span id="rule-order-btn" class="btn btn-primary add-field" >排序</span>
                        <div class="table-box" style="margin-top: 10px;">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>排序</th>
                                        <th>ID</th>
                                        <th>菜单名称</th>
                                        <th>控制器/方法</th>
                                        <th>是否显示</th>
                                        <th>创建时间</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php echo ($tr); ?>
                                </tbody>
                            </table>
                        </div>
                    </form>
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
            // $(form).serialize()
            $('#addMenu').click(function(){
                var data = $('#addMenuForm');
                parent.add_menu(data);
            })

            $('.del-menu').click(function(){
                var id = $(this).data('val');
                parent.del_menu(id);
            })


            $('#rule-order-btn').click(function(){
                $.ajax({
                 type: "POST",
                 url: "<?php echo U('Admin/Auth/order');?>",
                 data: $('#rule-order').serialize(),
                 dataType: "json",
                 success: function(data){
                    if(data.status=='success'){
                        layer.msg(data.message,{icon: 1});
                        window.location.reload();
                    }else{
                        layer.msg(data.message,{icon: 2});
                    }
                 }})
            })


        })
    </script>


</body>

</html>