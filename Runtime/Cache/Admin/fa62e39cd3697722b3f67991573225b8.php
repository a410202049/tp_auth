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
       <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>菜单列表</h5>
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
                    <form id="order-form">
                        <span class="btn btn-primary add-field" id="menu-order-btn">排序</span>
                        <a class="btn btn-primary" href="<?php echo U('Admin/Content/addMenu');?>"><i class="fa fa-plus"></i>&nbsp;&nbsp;添加菜单</a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>排序</th>
                                    <th>菜单ID</th>
                                    <th>菜单名称</th>
                                    <th>菜单URL</th>
                                    <th>是否显示</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                             <?php echo ($tr); ?>
                            </tbody>
                        </table>
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
            $('#menu-order-btn').click(function(){
                $.ajax({
                     type: "POST",
                     url: "<?php echo U('Admin/Content/order');?>",
                     data: $('#order-form').serialize(),
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

            $('.del-menu').click(function(){
                var id = $(this).data('val');
                parent.delFrontMenu(id);
            });


            $('.isshow-menu').click(function(){
                var id = $(this).data('val');
                $.ajax({
                     type: "POST",
                     url: "<?php echo U('Admin/Content/isShowMenu');?>",
                     data: {id:id},
                     dataType: "json",
                     success: function(data){
                        if(data.status=='success'){
                            // layer.msg(data.message,{icon: 1});
                            window.location.reload();
                        }
                 }})
            });

        })
    </script>


</body>

</html>