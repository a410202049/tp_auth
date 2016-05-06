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
    <link rel="stylesheet" type="text/css" href="/Public/admin/js/plugins/uploadify/uploadify.css">
    <link rel="stylesheet" type="text/css" href="/Public/admin/css/content.css">
    <script type="text/javascript" charset="utf-8" src="/Public/admin/js/plugins/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/Public/admin/js/plugins/ueditor/ueditor.all.min.js"> </script>
    <script type="text/javascript" charset="utf-8" src="/Public/admin/js/plugins/ueditor/lang/zh-cn/zh-cn.js"></script>

</head>
<body>
    <div id="wrapper">
    	
    <div class="row">
        <div class="col-lg-12">

            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>添加文章</h5>
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
                    <form method="post" class="form-horizontal" id="edit-article-form">
                        <div class="form-group">
                            <label class="col-lg-2 control-label">文章栏目：</label>
                                <div class="col-sm-2">
                                    <select id="category" name="categoryid" class="form-control">
                                        <?php if(is_array($categoryData)): $i = 0; $__LIST__ = $categoryData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$da): $mod = ($i % 2 );++$i;?><option value="<?php echo ($da["id"]); ?>" <?php if($da['id'] == $data['categoryid']): ?>selected="selected"<?php endif; ?>><?php echo ($da["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>                     
                                </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">文章标题：</label>
                            <div class="col-sm-2">
                                <input type="hidden" name="id" value="<?php echo ($data["id"]); ?>">
                                <input type="text" class="form-control" name="title" value="<?php echo ($data["title"]); ?>">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">文章关键词：</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="keywords" value="<?php echo ($data["keywords"]); ?>">
                                <span class="help-block m-b-none">请用逗号分隔关键词</span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">发布来源：</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="source" value="<?php echo ($data["source"]); ?>">
                                <span class="help-block m-b-none">如果默认为空，将显示本站来源</span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">文章描述：</label>
                            <div class="col-sm-3">
                                <textarea class="form-control" name="description"  rows='5'><?php echo ($data["description"]); ?></textarea>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">其他选项</label>
                            <div class="col-sm-10">
                                <label class="checkbox-inline i-checks">
                                    <input type="checkbox" name="isslide" <?php if($data["isslide"] == '1'): ?>checked<?php endif; ?>> 幻灯</label>
                                <label class="checkbox-inline i-checks">
                                    <input type="checkbox" name="ishot" <?php if($data["ishot"] == '1'): ?>checked<?php endif; ?>> 热门</label>
                                <label class="checkbox-inline i-checks" >
                                    <input type="checkbox" name="isspecial" <?php if($data["isspecial"] == '1'): ?>checked<?php endif; ?>> 特别</label>
                                <label class="checkbox-inline i-checks" >
                                    <input type="checkbox" name="isspecial" <?php if($data["isstressed"] == '1'): ?>checked<?php endif; ?>> 强调
                                </label>
                                    <!-- stressed  -->
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">封面图：</label>
                            <div class="col-sm-4">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <?php if(empty($data["cover"])): ?><img src="/Public/admin/img/add_img.gif" width="125" height="105" id="img_images">
                                        <?php else: ?>
                                            <img src="/Uploads/<?php echo ($data['cover']); ?>" width="125" height="105" id="img_images"><?php endif; ?>
                                    </div>
                                    <input type="hidden" name="cover" value="<?php echo ($data["cover"]); ?>">
                                    <div class="col-sm-6 up-padding" >
                                        <input id="file_images" name="file_upload" type="file" multiple="true">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">文章内容：</label>
                            <div class="col-sm-6">
                                <div id="content" name="content"></div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button type="submit" class="btn btn-primary">保存设置</button>
                                <a class="btn btn-white" href="<?php echo U('Admin/Article/index');?>">取消</a>
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
    <script src="/Public/admin/js/plugins/uploadify/jquery.uploadify.js" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });

        $('#file_images').uploadify({
            'swf': '/Public/admin/js/plugins/uploadify/uploadify.swf',
            'uploader': '<?php echo U("Admin/Index/upload");?>',
            'buttonText': '上传封面',
            'width':'120',
            'height':'30',
            // 'buttonClass':'imageslist',
            'onUploadSuccess': function(file, data, response) {
                data = jQuery.parseJSON(data);
                $('#img_images').attr('src', '/Uploads/' + data.data);
                $('input[name=cover]').val(data.data);
            }
        });

       $(function(){
            var ue = UE.getEditor('content',{initialFrameWidth : 800, initialFrameHeight: 400});
            ue.addListener("ready", function () {
                ue.setContent('<?php echo ($data["content"]); ?>');
            });
            $("#edit-article-form").validate({
                rules: {
                  title:"required",
                  keywords:"required",
                  description:"required",
                },
                messages: {
                  title: "请输入文章标题",
                  keywords: "请输入文章关键词",
                  description: "请输入文章描述",
                },
                submitHandler:function(form){
                    if(ue.getContent()){
                        $.ajax({
                         type: "POST",
                         url: "<?php echo U('Admin/Article/editArticle');?>",
                         data: $(form).serialize(),
                         dataType: "json",
                         success: function(data){
                            if(data.status=='success'){
                                layer.msg(data.message,{icon: 1});
                                window.location.href ="<?php echo U('Admin/Article/index');?>";
                            }else{
                                layer.msg(data.message,{icon: 2});
                            }
                         }})
                    }else{
                        layer.msg('文章内容不能为空',{icon: 2});
                    }
                }
            })

        })
    </script>


</body>

</html>