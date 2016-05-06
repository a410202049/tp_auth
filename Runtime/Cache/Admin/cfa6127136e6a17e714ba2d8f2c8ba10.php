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
                    <h5>站点设置</h5>
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
                    <form method="post" class="form-horizontal" id="setting-form">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">站点名称：</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="sitename" value="<?php echo ($data["sitename"]); ?>">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">网站关键词：</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="keywords" value="<?php echo ($data["keywords"]); ?>">
                                <span class="help-block m-b-none">请用逗号分隔关键词</span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">网站描述：</label>
                            <div class="col-sm-3">
                                <textarea class="form-control" name="description"  rows='5'><?php echo ($data["description"]); ?></textarea>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">是否开启网站：</label>
                            <div class="col-sm-3">
                                <div class="radio i-checks">
                                    <label><input type="radio" <?php if($data["isopen"] == '1'): ?>checked="checked"<?php endif; ?> value="1" name="isopen"> <i></i>是</label>
                                    <label><input type="radio" <?php if($data["isopen"] == '0'): ?>checked="checked"<?php endif; ?> value="0" name="isopen"> <i></i>否</label>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button type="submit" class="btn btn-primary">保存设置</button>
                                <a class="btn btn-white" href="<?php echo U('Admin/Index/mainInfo');?>">取消</a>
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

            $("#setting-form").validate({
                rules: {
                  sitename:"required",
                  keywords:"required",
                  description:"required"
                },
                messages: {
                  sitename: "请输入站点名称",
                  keywords:"请输入站点关键词",
                  description:"请输入站点描述"
                },
                submitHandler:function(form){
                    $.ajax({
                     type: "POST",
                     url: "<?php echo U('Admin/Index/siteSetting');?>",
                     data: $(form).serialize(),
                     dataType: "json",
                     success: function(data){
                        if(data.status=='success'){

                            layer.msg(data.message,{icon: 1});
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