<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">

    <title>H+ 后台主题UI框架 - 主页</title>
    <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">
    <link href="/Public/admin/css/bootstrap.min.css?v=3.4.0" rel="stylesheet">
    <link href="/Public/admin/font-awesome/css/font-awesome.css?v=4.3.0" rel="stylesheet">
    <!-- Morris -->
    <link href="/Public/admin/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <!-- Gritter -->
    <link href="/Public/admin/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">
    <link href="/Public/admin/css/animate.css" rel="stylesheet">
    <link href="/Public/admin/css/style.css?v=2.2.0" rel="stylesheet">
    <link href="/Public/admin/css/plugins/iCheck/custom.css" rel="stylesheet">
    <style>
        #page-wrapper{
            min-height:100%;
        }
        #wrapper{height: 100%;}
        .wrapper-content{min-height: 500px}
        html, body{
            overflow: hidden;
        }
    </style>
    
</head>
<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="/Public/admin/img/ava.png" width="64" height="64" />
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="javascript:void(0);">
                                <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo ($userinfo['username']); ?></strong>
                             </span> <span class="text-muted text-xs block"><?php echo ($userinfo['groupname']); ?><b class="caret"></b></span> </span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="<?php echo U('Admin/Index/changePassword');?>" target="rightMain">修改密码</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="<?php echo U('Admin/Index/logout');?>">安全退出</a>
                                </li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            H+
                        </div>
                    </li>

                    <?php if(is_array($menuData)): $i = 0; $__LIST__ = $menuData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pdata): $mod = ($i % 2 );++$i;?><li class="<?php if($key == 0): ?>active<?php endif; ?>" >
                            <a href='<?php if(empty($pdata["name"])): ?>javascript:void(0);<?php else: echo U($pdata["name"]); endif; ?>' target="rightMain"><i class="<?php echo ($pdata['icon']); ?>"></i> <span class="nav-label"><?php echo ($pdata['title']); ?></span></a>
                            <?php if(!empty($pdata["sub"])): ?><ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
                                    <?php if(is_array($pdata["sub"])): $i = 0; $__LIST__ = $pdata["sub"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub): $mod = ($i % 2 );++$i;?><li>
                                            <a href="<?php echo U($sub['name']);?>" target="rightMain">
                                            <?php if(!empty($sub["icon"])): ?><i class="<?php echo ($sub["icon"]); ?>"></i><?php endif; ?>
                                            <?php echo ($sub['title']); ?>
                                            </a>
                                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                </ul><?php endif; ?>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="javascript:void;"><i class="fa fa-bars"></i> </a>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message"><a href="<?php echo U('Admin/Index/mainInfo');?>" target="rightMain" title="返回首页"><i class="fa fa-home"></i>&nbsp;&nbsp;返回首页</a></span>
                        </li>
                        <li>
                            <a href="<?php echo U('Admin/Index/logout');?>">
                                <i class="fa fa-sign-out"></i> 退出
                            </a>
                        </li>
                    </ul>

                </nav>
            </div>
            <div class="row  border-bottom white-bg dashboard-header">
                <div class="col-lg-10">
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?php echo ('Admin/Index');?>">主页</a>
                        </li>
                        <li>
                            <strong>系统首页</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>

            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="wrapper wrapper-content">
                        <iframe src="<?php echo U('Admin/Index/mainInfo');?>" id="rightMain" name="rightMain" frameborder="0" width="100%" height="100%"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>



<!-- 添加用户模态框 -->
<div class="modal fade" id="add_user" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">添加用户</h4>
         </div>
         <div class="modal-body">
            <form class="form-horizontal" id="form-add-user" autocomplete="off">

                <div class="form-group">
                    <label class="col-lg-3 control-label">用户名：</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" required="true" name="username">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">用户密码：</label>
                    <div class="col-lg-8">
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">确认密码：</label>
                    <div class="col-lg-8">
                        <input type="password" class="form-control" name="cpassword"> 
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">选择分组：</label>
                    <div class="col-sm-8">
                        <select class="form-control m-b" name="groupid" id="groupOption">

                        </select>                            
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-5 col-sm-offset-3">
                        <button type="submit" class="btn btn-primary">保存内容</button>
                        <button type="button" class="btn btn-default col-sm-offset-1" data-dismiss="modal">取消</button>
                    </div>
                </div>
            </form>
         </div>
      </div>
    </div>
</div>


<!-- 添加分类模态框 -->
<div class="modal fade" id="add_category" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">添加分类</h4>
         </div>
         <div class="modal-body">
            <form class="form-horizontal" name="add-category" id="form-add-category" autocomplete="off">
                <div class="form-group">
                    <label class="col-lg-3 control-label">上级栏目：</label>
                        <div class="col-sm-8">
                            <select class="form-control m-b" name="parentid" id="category">
                                
                            </select>                            
                        </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">分类名称：</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" required="true" name="name">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">是否显示：</label>
                    <div class="col-lg-8">
                        <div class="radio i-checks">
                            <label><input type="radio" checked="checked" value="1" name="isshow"> <i></i>显示</label>
                            <label><input type="radio" value="0" name="isshow"> <i></i>隐藏</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">分类类型：</label>
                    <div class="col-lg-8">
                        <div class="radio i-checks">
                            <?php if(is_array($ctype)): $i = 0; $__LIST__ = $ctype;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$type): $mod = ($i % 2 );++$i;?><label><input type="radio" <?php if($i == '1'): ?>checked="checked"<?php endif; ?> value="<?php echo ($key); ?>" name="categorytype"> <i></i><?php echo ($type); ?></label><?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">分类描述：</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="description"> 
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">分类关键词：</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="keywords">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-5 col-sm-offset-3">
                        <button type="submit" class="btn btn-primary submit-category-add">保存内容</button>
                        <button type="button" class="btn btn-default col-sm-offset-1" data-dismiss="modal">取消</button>
                    </div>
                </div>
            </form>
         </div>
      </div>
    </div>
</div>


<!-- 编辑分类模态框 -->
<div class="modal fade" id="edit_category" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">编辑分类</h4>
         </div>
         <div class="modal-body">
            <form class="form-horizontal" name="add-category" id="form-edit-category" autocomplete="off">
                <div class="form-group">
                    <label class="col-lg-3 control-label">分类名称：</label>
                    <div class="col-lg-8">
                        <input type="hidden" name="id" id="categoryid">
                        <input type="text" class="form-control" required="true" name="name" id="edit-name">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">是否显示：</label>
                    <div class="col-lg-8">
                        <div class="radio i-checks">
                            <label><input type="radio" value="1" name="isshow" id="edit-show"> <i></i>显示</label>
                            <label><input type="radio" value="0" name="isshow" id="edit-hide"> <i></i>隐藏</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">分类描述：</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="description" id="edit-description"> 
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">分类关键词：</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="keywords" id="edit-keywords">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-5 col-sm-offset-3">
                        <button type="submit" class="btn btn-primary submit-category-add">保存内容</button>
                        <button type="button" class="btn btn-default col-sm-offset-1" data-dismiss="modal">取消</button>
                    </div>
                </div>
            </form>
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
    <script src="/Public/admin/js/plugins/iCheck/icheck.min.js"></script> -->
    <script type="text/javascript">
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
        window.onload = function (){
            if(!+"\v1" && !document.querySelector) { // for IE6 IE7
              document.body.onresize = resize;
            } else { 
              window.onresize = resize;
            }
            function resize() {
                wSize();
                return false;
            }
            $('#side-menu > li:not(.nav-header) > a').click(function(){
                var brother = $(this).closest('li').addClass('active').siblings();
                brother.removeClass('active');
                brother.find('.nav-second-level').removeClass('in').find('li').removeClass('active').find('.nav-third-level').removeClass('in');
            })

            $('.nav-second-level li').click(function(){
                var brother = $(this).addClass('active').siblings();
                brother.removeClass('active');
                brother.find('.nav-third-level').removeClass('in').find('li').removeClass('active').find('.nav-third-level').removeClass('in');
            })

            $('.nav-third-level li').click(function(){
                $(this).addClass('active').siblings().removeClass('active');
            })
        }
        function wSize(){
            var h = $(window).height();
            $('#rightMain').height(h-185);
        }
        wSize();
        
        $("a").bind("focus", function(){
            if(this.blur){
            this.blur();
            }
        });
        // 模态框 垂直居中
        function centerModals(){
          $('.modal').each(function(i){
              var $clone = $(this).clone().css('display', 'block').appendTo('body');    
              var top = Math.round(($clone.height() - $clone.find('.modal-content').height()) / 2);
              top = top > 0 ? top : 0;
              $clone.remove();
              $(this).find('.modal-content').css("margin-top", top);
          });
        }
        $('.modal').on('show.bs.modal', centerModals);
        $(window).on('resize', centerModals);



        function add_menu(data){
            var title = data.find('input[name=title]').val();
            var name = data.find('input[name=name]').val();
            if(!title){
                layer.msg('菜单名称不能为空',{icon: 2});
            }else{

                layer.confirm('您确定要添加此菜单？', {icon: 3, title:'确认添加菜单'}, function(index){
                    $.ajax({
                        type:"POST",
                        url:"<?php echo U('Admin/Auth/addMenu');?>",
                        data:data.serialize(),
                        dataType:"json",
                        success:function(data){
                            // console.log(data);
                            if(data.status=='success'){
                                layer.msg(data.message,{icon: 1});
                                document.getElementById('rightMain').contentWindow.location.reload(true);
                                layer.close(index);
                            }else{
                                layer.msg(data.message,{icon: 2});
                            }
                        }
                    })
                })
            }
        }

        function del_menu(id){
             layer.confirm('您确定要添加此菜单？', {icon: 3, title:'确认添加菜单'}, function(index){
                $.ajax({
                    type:"POST",
                    url:"<?php echo U('Admin/Auth/delMenu');?>",
                    data:{id:id},
                    dataType:"json",
                    success:function(data){
                        if(data.status=='success'){
                            layer.msg(data.message,{icon: 1});
                            document.getElementById('rightMain').contentWindow.location.reload(true);
                            layer.close(index);
                        }else{
                            layer.msg(data.message,{icon: 2});
                        }
                    }
                })
             })
        }

        function articledel(id){
             layer.confirm('您确定要删除此文章？', {icon: 3, title:'确认删除文章'}, function(index){
                $.ajax({
                    type:"POST",
                    url:"<?php echo U('Admin/Article/delArticle');?>",
                    data:{id:id},
                    dataType:"json",
                    success:function(data){
                        if(data.status=='success'){
                            layer.msg(data.message,{icon: 1});
                            document.getElementById('rightMain').contentWindow.location.reload(true);
                            layer.close(index);
                        }else{
                            layer.msg(data.message,{icon: 2});
                        }
                    }
                })
             })
        }

        function delFrontMenu(id){
             layer.confirm('您确定要添加此菜单？', {icon: 3, title:'确认添加菜单'}, function(index){
                $.ajax({
                     type: "POST",
                     url: "<?php echo U('Admin/Content/delMenu');?>",
                     data: {id:id},
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
        }

        function add_user(){
                $.ajax({
                    type:"GET",
                    url:"<?php echo U('Admin/Auth/getGroupList');?>",
                    dataType:"json",
                    success:function(data){
                        if(data.status=='success'){
                            $('#groupOption').html(data.data);
                        }
                    }
                })
            $('#add_user').modal('show');
        }

        function disable_user(id){
             layer.confirm('您确定要禁用此用户？', {icon: 3, title:'确认禁用用户'}, function(index){
                $.ajax({
                    type:"POST",
                    url:"<?php echo U('Admin/Auth/disableUser');?>",
                    data:{id:id},
                    dataType:"json",
                    success:function(data){
                        if(data.status=='success'){
                            layer.msg(data.message,{icon: 1});
                            document.getElementById('rightMain').contentWindow.location.reload(true);
                            layer.close(index);
                        }else{
                            layer.msg(data.message,{icon: 2});
                        }
                    }
                })
             })
        }

        function del_group(id){
            layer.confirm('您确定要删除此用户组？', {icon: 3, title:'确认删除用户组'}, function(index){
                $.ajax({
                    type:"POST",
                    url:"<?php echo U('Admin/Auth/delGroup');?>",
                    data:{id:id},
                    dataType:"json",
                    success:function(data){
                        if(data.status=='success'){
                            layer.msg(data.message,{icon: 1});
                            document.getElementById('rightMain').contentWindow.location.reload(true);
                            layer.close(index);
                        }else{
                            layer.msg(data.message,{icon: 2});
                        }
                    }
                })
            
            }) 
        }

        function del_user(id){
            layer.confirm('您确定要删除此用户？', {icon: 3, title:'确认删除用户'}, function(index){
                $.ajax({
                    type:"POST",
                    url:"<?php echo U('Admin/Auth/delUser');?>",
                    data:{id:id},
                    dataType:"json",
                    success:function(data){
                        if(data.status=='success'){
                            layer.msg(data.message,{icon: 1});
                            document.getElementById('rightMain').contentWindow.location.reload(true);
                            layer.close(index);
                        }else{
                            layer.msg(data.message,{icon: 2});
                        }
                    }
                })
            
            }) 
        }


        //添加分类弹窗
        function add_category(){
            $.ajax({
                type: "GET",
                url: "<?php echo U('Admin/Content/getCategory');?>",
                dataType: "json",
                success:function(data){
                    if(data.status=='success'){
                        $('#category').html('<option selected="" value="0" id="categoryTop">作为顶级分类</option>'+data.data);
                    }
                    // console.log(data);
                }
            });

            $('#add_category').modal('show')
        }

        function edit_category(cid){
            $('#categoryid').val(cid);
            $.ajax({
                type:"POST",
                url:"<?php echo U('Admin/Content/editCategory');?>",
                data:{id:cid},
                dataType:"json",
                success:function(data){
                    if(data.status=="success"){

                        // $('#edit-category').html('<option selected="" value="0" id="categoryTop">作为顶级分类</option>'+data.data.categoryTree);
                        $('#edit-modelList').html(data.data.modelRadio);
                        $('#edit-name').val(data.data.data.name);
                        $('#edit-keywords').val(data.data.data.keywords);
                        $('#edit-description').val(data.data.data.description);
                        $('.i-checks').iCheck({
                            checkboxClass: 'icheckbox_square-green',
                            radioClass: 'iradio_square-green',
                        });
                        if(data.data.data.isshow=='1'){
                            $('#edit-show').iCheck('check');
                        }else{
                            $('#edit-hide').iCheck('check');
                        }

                    }
                }
            })
            $('#edit_category').modal('show')
        }

        function del_category(cid){
            layer.confirm('您确定要删除ID为  '+cid+'分类？<br>(注：数据也将被删除)', {icon: 3, title:'确认删除分类'}, function(index){
                $.ajax({
                    type:"POST",
                    url:"<?php echo U('Admin/Content/delCategory');?>",
                    data:{id:cid},
                    dataType:"json",
                    success:function(data){
                        if(data.status=='success'){
                            layer.msg(data.message,{icon: 1});
                            document.getElementById('rightMain').contentWindow.location.reload(true);
                            layer.close(index);
                        }else{
                            layer.msg(data.message,{icon: 2});
                        }
                    }
                })
            })
        }


        $(function(){
            $.validator.addMethod("tabname", function(value, element) {
                var tabname = /^[A-Za-z_]+$/;
                return this.optional(element) || (tabname.test(value));
            }, "请填写以字母或下划线命名表名");

            $("#form-add-user").validate({
                rules: {
                  username:"required",
                  password:"required",
                  cpassword: {
                    required:true,
                    equalTo: "#password"
                  },
                },
                messages: {
                  username:"请输入用户名",
                  password: "请输入密码",
                  cpassword:  {
                    required:"请输入重复密码",
                    equalTo:"两次密码不一致"
                  },
                },
                submitHandler:function(form){
                    $.ajax({
                     type: "POST",
                     url: "<?php echo U('Admin/Auth/addUser');?>",
                     data: $(form).serialize(),
                     dataType: "json",
                     success: function(data){
                        if(data.status=='success'){
                            $('#add_user').modal('hide');
                            layer.msg(data.message,{icon: 1});
                            document.getElementById('rightMain').contentWindow.location.reload(true);
                        }else{
                            layer.msg(data.message,{icon: 2});
                        }
                     }})
                }
            })


            $('#form-add-category').validate({
                rules:{
                    name:"required",
                    description:"required",
                    keywords:"required"
                },
                messages:{
                    name:"请输入分类名称",
                    description:"请输入分类描述",
                    keywords:"请输入分类关键词，逗号分隔"
                },
                submitHandler:function(form){
                    $.ajax({
                     type: "POST",
                     url: "<?php echo U('Admin/Content/addCategory');?>",
                     data: $(form).serialize(),
                     dataType: "json",
                     success: function(data){
                        if(data.status=='success'){
                            $('#add_category').modal('hide');
                            layer.msg(data.message,{icon: 1});
                            document.getElementById('rightMain').contentWindow.location.reload(true);
                            // window.location.reload(true);
                        }else{
                            layer.msg(data.message,{icon: 2});
                        }
                     }})
                }
            })

            $('#form-edit-category').validate({
                rules:{
                    name:"required",
                    description:"required",
                    keywords:"required"
                },
                messages:{
                    name:"请输入分类名称",
                    description:"请输入分类描述",
                    keywords:"请输入分类关键词，逗号分隔"
                },
                 submitHandler:function(form){
                    // console.log(form);editCategoryMethod
                    $.ajax({
                         type: "POST",
                         url: "<?php echo U('Admin/Content/editCategoryMethod');?>",
                         data: $(form).serialize(),
                         dataType: "json",
                         success: function(data){
                            // console.log(data);
                            if(data.status=='success'){
                                $('#edit_category').modal('hide');
                                layer.msg(data.message,{icon: 1});
                                document.getElementById('rightMain').contentWindow.location.reload(true);
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