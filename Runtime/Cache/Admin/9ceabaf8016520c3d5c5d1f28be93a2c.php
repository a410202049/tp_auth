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
    
    <link href="/Public/admin/css/plugins/iCheck/custom.css" rel="stylesheet">

</head>
<body>
    <div id="wrapper">
    	
    <div class="row">
        <div class="col-lg-12">

            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>添加用户组</h5>
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
                <a class="btn btn-primary add-field" href="<?php echo U('Admin/Auth/groupList');?>" target="rightMain"><i class="fa fa-list-ul"></i>&nbsp;&nbsp;用户组列表</a>
                    <form method="post" class="form-horizontal" id="form-group-edit">
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">用户组名：</label>
                            <div class="col-sm-2">
                                <input type="hidden" name="id" value="<?php echo ($id); ?>">
                                <input type="text" class="form-control" name="title" value="<?php echo ($authData['title']); ?>">
                                <span class="help-block m-b-none">操作栏目/中文名</span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">权限列表：</label>
                            <div class="col-sm-2">
                                <div class="checkbox i-checks">
                                    <?php echo ($rules); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button type="submit" class="btn btn-primary edit-group">保存用户组</button>
                                <a class="btn btn-white" href="<?php echo U('Admin/Auth/groupList');?>">取消</a>
                            </div>
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
    
    <script src="/Public/admin/js/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });


       $(function(){

            $("#form-group-edit").validate({
                rules: {
                  title:"required"
                },
                messages: {
                  title: "请输入角色组名称"
                },
                submitHandler:function(form){
                    $.ajax({
                     type: "POST",
                     url: "<?php echo U('Admin/Auth/editGroup');?>",
                     data: $(form).serialize(),
                     dataType: "json",
                     success: function(data){
                        if(data.status=='success'){
                            layer.msg(data.message,{icon: 1});
                            window.location.href ="<?php echo U('Admin/Auth/groupList');?>";
                        }else{
                            layer.msg(data.message,{icon: 2});
                        }
                     }})
                }
            })

        })
    </script>


</body>

</html>