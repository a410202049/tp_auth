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
                    <h5>文章列表</h5>
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
                    <a class="btn btn-primary" href="<?php echo U('Admin/Article/addArticle');?>"><i class="fa fa-plus"></i>&nbsp;&nbsp;添加文章</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>文章ID</th>
                                <th>文章标题</th>
                                <th width="45%">文章描述</th>
                                <th>是否显示</th>
                                <th>发布时间</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(is_array($articles)): $i = 0; $__LIST__ = $articles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$article): $mod = ($i % 2 );++$i;?><tr>
                                    <td><?php echo ($article['id']); ?></td>
                                    <td><?php echo ($article['title']); ?></td>
                                    <td><?php echo ($article['description']); ?></td>
                                    <td><?php echo ($article['isshow']); ?></td>
                                    <td><?php echo (date("Y-m-d H:i:s",$article['updatetime'])); ?></td>
                                    <td><a class="option" href="<?php echo U('Admin/Article/editArticle');?>/id/<?php echo ($article['id']); ?>">编辑</a>|<a class="option articledel" data-id="<?php echo ($article['id']); ?>">删除</a>|<a class="option isshow" data-id="<?php echo ($article['id']); ?>"><?php if($article['isshow'] == '1'): ?>隐藏<?php else: ?>显示<?php endif; ?></a>|<a class="option istop" data-id="<?php echo ($article['id']); ?>"><?php if($article['istop'] == '1'): ?>取消置顶<?php else: ?>置顶<?php endif; ?></a></td>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                    <?php echo ($page); ?>
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
            $('.isshow').click(function(){
                var id =  $(this).data('id');
                $.ajax({
                     type: "POST",
                     url: "<?php echo U('Admin/Article/isshow');?>",
                     data: {id:id},
                     dataType: "json",
                     success: function(data){
                        if(data.status=='success'){
                            window.location.reload();
                        }
                     }})
                })
            $('.istop').click(function(){
                var id =  $(this).data('id');
                $.ajax({
                     type: "POST",
                     url: "<?php echo U('Admin/Article/istop');?>",
                     data: {id:id},
                     dataType: "json",
                     success: function(data){
                        if(data.status=='success'){
                            window.location.reload();
                        }
                     }})
            })


            $('.articledel').click(function(){
                var id =  $(this).data('id');
                parent.articledel(id);
            });

        })
    </script>


</body>

</html>