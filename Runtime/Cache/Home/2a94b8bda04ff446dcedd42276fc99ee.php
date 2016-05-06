<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <title>汽车之家</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="汽车之家网站">
    <meta name="keywords" content="汽车，二手车，房车">
    <link href="/Public/home/css/public.css" rel="stylesheet">
    <link href="/Public/home/css/rotaion.css" rel="stylesheet">
    <link href="/Public/home/css/dropdownlist.css" rel="stylesheet">
    <link href="/Public/home/css/slider.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="/Public/home/js/html5shiv.min.js"></script>
      <script src="/Public/home/js/respond.min.js"></script>
    <![endif]-->
  </head>
<body>
<div class="fix-top">
  <div class="container">
    <ul class="fix-top-ul">
            <li><a class="active" href="#">i黑马网</a></li>  
            <li><a href="#">活动</a></li>
            <li><a target="_blank" href="#">黑马会</a></li>
            <li><a target="_blank" href="#">创业黑马学院</a></li>
            <li><a target="_blank" href="#">黑马大赛</a></li>
            <li><a target="_blank" href="#">i代言</a></li>
        </ul>

        <ul class="fix-top-right">
            <li><a href="#">加入收藏</a></li>  
            <li><a href="#">设置首页</a></li>
        </ul>
  </div>
</div>
<header class="header-top">
  <div class="container">
    <div class="header-logo">
        <a class="logo" href="index.html"><img title="汽车之家" alt="汽车之家" src="/Public/home/images/logo.png"></a>
        <div class="header-right-div">
            <!-- pc端头部 -->
            <ul class="navbar-nav">
                <?php if(is_array($menus)): $i = 0; $__LIST__ = $menus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($menu["url"]); ?>"><?php echo ($menu["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>

          <form method="GET" action="http://app.iheima.com/" id="head_search" class="search">
                <input type="text" placeholder="输入搜索关键字" value=""  name="wd">
                <button type="submit" class="search-icon"></button>
          </form>
          <ul class="navbar-right">
              <li><a href="/user/login">登录</a></li>
              <li><a href="/user/register">注册</a></li>
          </ul>
        </div>
    </div>
  </div>
</header>
<div class="wrap">
    
  <div class="container">
    <div class="wrap-left pull-left">
      <div class="rotaion">
        <ul class="rotaion_list">
          <?php if(is_array($sides)): $i = 0; $__LIST__ = $sides;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$side): $mod = ($i % 2 );++$i;?><li><a href="#"><img src="/Uploads/<?php echo ($side["cover"]); ?>" alt="<?php echo ($side["title"]); ?>"></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
      </div>
      <span class="most_update"><h4>最近更新</h4></span>
      <div class="artilce-list">

        <?php if(is_array($articles)): $i = 0; $__LIST__ = $articles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$article): $mod = ($i % 2 );++$i; if($article["cover"] == ''): ?><div class="artilce-list-div">
              <div class="mob-ctt no-cover">
                  <h3><a target="_blank" class="transition" href="#"><?php echo ($article["title"]); ?></a></h3>
                  <div class="mob-author">
                    <div class="author-face">
                        <a target="_blank" href="#"><img src="http://www.auth.com/Public/admin/img/ava.png"></a>
                    </div>
                        <a target="_blank" href="/member/322384.html"><span class="author-name "><?php echo ($article["username"]); ?></span></a>
                      <span class="time"><?php echo ($article["updatetime"]); ?></span>
                      <i class="icon icon-cmt"></i><em>1</em>
                      <i class="icon icon-fvr"></i><em>0</em>
                      <i class="icon icon-line"></i>
                      <i aid="141907" data-f="pc-weibo-index" data-location="index" class="icon icon-weibo js-weibo js-share-article"></i>
                      <div class="qr-moments-box">
                          <i data-aid="141907" data-f="pc-friends-index" data-location="index" class="icon icon-moments js-icon-moments"></i>
                      </div>
                      <i aid="141907" data-f="pc-qzone-index" data-location="index" class="icon icon-Qzone js-qzone js-share-article"></i>
                  </div>
                  <div class="mob-sub"><?php echo ($article["description"]); ?></div>
              </div>
            </div>
          <?php elseif($article["isstressed"] == '1'): ?>
            <div class="artilce-list-div mod-b-push">
                <div class="mod-thumb">
                    <a target="_blank" href="#" class="transition">
                        <img alt="#" src="/Uploads/<?php echo ($article["cover"]); ?>">
                    </a>
                </div><div class="mob-ctt">
                    <h3><a target="_blank" class="transition" href="#"><?php echo ($article["title"]); ?></a></h3>
                    <div class="mob-author">
                      <div class="author-face">
                          <a target="_blank" href="#"><img src="http://www.auth.com/Public/admin/img/ava.png"></a>
                      </div>
                          <a target="_blank" href="/member/322384.html"><span class="author-name "><?php echo ($article["username"]); ?></span></a>
                        <span class="time"><?php echo ($article["updatetime"]); ?></span>
                        <i class="icon icon-cmt"></i><em>1</em>
                        <i class="icon icon-fvr"></i><em>0</em>
                        <i class="icon icon-line"></i>
                        <i aid="141907" data-f="pc-weibo-index" data-location="index" class="icon icon-weibo js-weibo js-share-article"></i>
                        <div class="qr-moments-box">
                            <i data-aid="141907" data-f="pc-friends-index" data-location="index" class="icon icon-moments js-icon-moments"></i>
                        </div>
                        <i aid="141907" data-f="pc-qzone-index" data-location="index" class="icon icon-Qzone js-qzone js-share-article"></i>
                    </div>
                    <div class="mob-sub"><?php echo (msubstr($article["description"],0,55)); ?></div>
                </div>
              </div>
          <?php else: ?>
            <div class="artilce-list-div">
                <div class="mod-thumb">
                    <a target="_blank" href="#" class="transition">
                        <img alt="#" src="/Uploads/<?php echo ($article["cover"]); ?>">
                    </a>
                </div><div class="mob-ctt">
                    <h3><a target="_blank" class="transition" href="#"><?php echo ($article["title"]); ?></a></h3>
                    <div class="mob-author">
                      <div class="author-face">
                          <a target="_blank" href="#"><img src="http://www.auth.com/Public/admin/img/ava.png"></a>
                      </div>
                          <a target="_blank" href="/member/322384.html"><span class="author-name "><?php echo ($article["username"]); ?></span></a>
                        <span class="time"><?php echo ($article["updatetime"]); ?></span>
                        <i class="icon icon-cmt"></i><em>1</em>
                        <i class="icon icon-fvr"></i><em>0</em>
                        <i class="icon icon-line"></i>
                        <i aid="141907" data-f="pc-weibo-index" data-location="index" class="icon icon-weibo js-weibo js-share-article"></i>
                        <div class="qr-moments-box">
                            <i data-aid="141907" data-f="pc-friends-index" data-location="index" class="icon icon-moments js-icon-moments"></i>
                        </div>
                        <i aid="141907" data-f="pc-qzone-index" data-location="index" class="icon icon-Qzone js-qzone js-share-article"></i>
                    </div>
                    <div class="mob-sub"><?php echo (msubstr($article["description"],0,55)); ?></div>
                </div>
              </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>



<!-- mod-b-push -->



      </div>

      <!-- <div data-cur-page="1" class="get-mod-more js-get-mod-more-list transition">点击加载更多</div> -->
      <?php echo ($page); ?>

    </div>
    <div class="wrap-right pull-right">
      <!-- 340px 274px广告 -->
      <div class="ad-box box-top">
        <img src="/Public/home/images/ad.jpg">
      </div>
      <div class="tag-list">
        <ul class="car-models">
          <li><a href="#">商务</a></li>
          <li><a href="#">自行式</a></li>
          <li><a href="#">国产</a></li>
          <li><a href="#">C1</a></li>
        </ul>
        <ul class="car-type">
          <li><a href="#">福特</a></li>
          <li><a href="#">奔驰</a></li>
          <li><a href="#">依维柯</a></li>
          <li><a href="#">皮卡</a></li>
        </ul>
        <ul class="car-price">
          <li><a href="#">10-20</a></li>
          <li><a href="#">20-30</a></li>
          <li><a href="#">30-50</a></li>
          <li><a href="#">50-80</a></li>
        </ul>
      </div>
      <div class="select-div">
          <!-- 品牌 -->
          <select id="brand" class="c-select">
              <option value="0">品牌</option>
              <option value="1">奥迪</option>
              <option value="2">奔驰</option>
              <option value="3">宝马</option>
              <option value="4">比亚迪</option>
              <option value="5">大众</option>
          </select>
          <!-- 车系 -->
          <select id="series" class="c-select">
              <option value="0">车系</option>
              <option value="1">奥迪</option>
              <option value="2">奔驰</option>
              <option value="3">宝马</option>
              <option value="4">比亚迪</option>
              <option value="5">大众</option>
          </select>
      </div>

      <div class="box-topic">
          <div class="topic-title-bbs">
              <h4>热门推荐</h4>
          </div>
          <div class="topic-content">
            <div class="slide_container">
              <ul class="rslides" id="slider">
                <?php if(is_array($hotsPic)): $i = 0; $__LIST__ = $hotsPic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pic): $mod = ($i % 2 );++$i;?><li>
                    <a href="#"><img src="/Uploads/<?php echo ($pic["cover"]); ?>"></a>
                  </li><?php endforeach; endif; else: echo "" ;endif; ?>
              </ul>
            </div>
          </div>
      </div>

      <div class="slider-right-list">
        <ul>
          <?php if(is_array($hotsText)): $k = 0; $__LIST__ = $hotsText;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$text): $mod = ($k % 2 );++$k;?><li><a target="_blank" title="<?php echo ($text["title"]); ?>" href="#"><?php echo ($k); ?>.<?php echo (msubstr($text["title"],0,17)); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
      </div>
      
      <div class="box-moder">
          <div class="box-moder-title">
            <span class="span-mark"></span>
            <div class="moder-title">特别推荐</div>
            <span class="moder-more">
              <a target="_blank" class="transition" href="/chuangye">全部</a>
            </span>
          </div>
          <div class="box-moder-content">
            <ul>
                <?php if(is_array($isspecial)): $i = 0; $__LIST__ = $isspecial;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$special): $mod = ($i % 2 );++$i;?><li>
                      <div class="article-pic">
                          <a><img src="/Uploads/<?php echo ($special["cover"]); ?>"></a>
                      </div>
                      <div class="article-content">
                          <div class="article-title-special">
                              <a target="_blank" class="transition" href="#"><?php echo ($special["title"]); ?></a>
                          </div>
                          <p><?php echo ($special["username"]); ?></p>
                      </div>
                  </li><?php endforeach; endif; else: echo "" ;endif; ?>
              </ul>
          </div>
      </div>
      
      <div class="ad-box bottom-ad">
        <img src="/Public/home/images/ad2.jpg">
      </div>
    </div>
</div>


</div>

<footer class="footer">
	<div class="container">
		<div class="container copy-right">
		<div class="footer-tag-list">
		    <a class="transition" target="_blank" href="http://www.huxiu.com/about.html">关于我们</a>
		    <a class="transition" target="_blank" href="http://www.huxiu.com/joinus.html">加入我们</a>
		    <a class="transition" target="_blank" href="http://www.huxiu.com/links">合作伙伴</a>
		    <a class="transition" target="_blank" href="http://www.huxiu.com/contact.html">广告及服务</a>
		    <a class="transition" target="_blank" href="http://www.huxiu.com/help">常见问题解答</a>
		    <a class="transition" target="_blank" href="http://www.huxiu.com/tags/10340.html">防网络诈骗专题</a>
		    <a class="transition js-show-feedback-box min-feedback" target="_blank" href="javascript:" style="display: none;">用户反馈</a>
		</div>
		<span>Copyright &copy; <a href="http://www.huxiu.com">汽车之家</a> - 成都汽车之家信息科技股份有限公司 <a target="_blank" href="http://www.miitbeian.gov.cn/">京ICP备12013432号-1</a>
		    <i class="footer-bull">•</i><em class="bull-right">本站由</em><i style="width: 70px;background-size: 100%;left: 7px;" class="icon-aliyun"></i><em class="bull-em">提供计算与安全服务</em>
		</span>
		</div>
	</div>
</footer>

<script src="/Public/home/js/jquery.min.js"></script>
<script src="/Public/home/js/jquery.rotaion.js"></script>
<script src="/Public/home/js/dropdownlist.js"></script>
<script src="/Public/home/js/responsiveslides.min.js"></script>
<script type="text/javascript">
  $(".rotaion").rotaion({auto:true,width:670,height:450,btn:true});
    // 通过原生select控件创建自定义下拉框
    var ddl_picture = DropDownList.create({
        select:$('#brand'),
        attrs:{
            column :10,
            width :143,
      
        }
    });
    var ddl_picture = DropDownList.create({
        select:$('#series'),
        attrs:{
            column :10,
            width :143,
      
        }
    });



  // ddl_picture.change(function(){
  //   alert(ddl_picture.val());
  // });

  // json
  // var ddl_album = DropDownList.create({
  //     container :$('#demo1'),
  //     attrs : {
  //         id : 'ddl_album',   // 给dropdownlist一个id
  //         column :5,         // 展示4行
  //         width:200,         // 宽度为150px
  //         height: 30          // 每个option选项的高度
  //     },  
  //     options : [
  //         ['默认相册','001'],
  //         ['我的收藏','002'],
  //         ['大学同学','003',true],
  //         ['亲朋好友','004'],
  //         ['明星们','005'],
  //         ['狗仔队','006'],
  //     ]
  
  // });
</script>
<script type="text/javascript">
  $(function () {
    $("#slider").responsiveSlides({
    auto: true,
    pager: false,
    nav: true,
    speed: 500,
    // 对应外层div的class : slide_container
    namespace: "slide"
    });
});
</script>

</body>
</html>