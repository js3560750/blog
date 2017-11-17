<?php
if(!defined('BASEPATH'))exit('No direct script access allowed');
?>
<!doctype html>
<html class="no-js fixed-layout">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Js Blog 后台管理</title>
  <meta name="description" content="这是一个 index 页面">
  <meta name="keywords" content="index">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="icon" type="image/png" href="<?php echo base_url('assets/i/favicon.png')?>">
  <link rel="apple-touch-icon-precomposed" href="<?php echo base_url('assets/i/app-icon72x72@2x.png')?>">
  <meta name="apple-mobile-web-app-title" content="Amaze UI" />
  <link rel="stylesheet" href="<?php echo base_url('assets/css/amazeui.min.css')?>"/>
  <link rel="stylesheet" href="<?php echo base_url('assets/css/admin.css')?>">

<!-- 默认打开目标!!!!!!!!!正因为有这句话，所以在本页面操作打开的页面都会显示在框架内 -->
<base target="iframe"/>
</head>
<body>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
  以获得更好的体验！</p>
<![endif]-->

<header class="am-topbar am-topbar-inverse admin-header">
  <div class="am-topbar-brand">
    <strong>Js Blog</strong> <small>后台管理</small>
  </div>

  <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

  <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

    <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
      <li><a href="javascript:;"><span class="am-icon-envelope-o"></span> 收件箱 <span class="am-badge am-badge-warning">5</span></a></li>
      <li class="am-dropdown" data-am-dropdown>
        <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
          <span class="am-icon-users"></span> 管理员 <span class="am-icon-caret-down"></span>
        </a>
        <ul class="am-dropdown-content">
          <li><a href="#"><span class="am-icon-user"></span> 资料</a></li>
          <li><a href="#"><span class="am-icon-cog"></span> 设置</a></li>
          <li><a href="#"><span class="am-icon-power-off"></span> 退出</a></li>
        </ul>
      </li>
      <li class="am-hide-sm-only"><a href="javascript:;" id="admin-fullscreen"><span class="am-icon-arrows-alt"></span> <span class="admin-fullText">开启全屏</span></a></li>
    </ul>
  </div>
</header>

<div class="am-cf admin-main">
  <!-- sidebar start -->
  <div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
    <div class="am-offcanvas-bar admin-offcanvas-bar">
      <ul class="am-list admin-sidebar-list">
        <li><a href="<?php echo site_url('home/index')?>"> 首页</a></li>
        <li class="admin-parent">
          <a class="am-cf" data-am-collapse="{target: '#collapse-nav'}">文章管理 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
          <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav">
            <li><a href="<?php echo site_url('/admin/add_article')?>" class="am-cf"> 发表文章</a></li>
            <li><a href="<?php echo site_url('/admin/check_article')?>"> 查看文章</a></li>
            
          </ul>
        </li>

        <li class="admin-parent">
          <a class="am-cf" data-am-collapse="{target: '#collapse-nav2'}">文章栏目管理 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
          <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav2">
            <li><a href="<?php echo site_url('/admin/check_category')?>" class="am-cf"> 查看栏目</a></li>
            <li><a href="<?php echo site_url('/admin/add_category')?>"> 添加栏目</a></li>
            
          </ul>
        </li>
        <li><a href="<?php echo site_url('admin/message_display')?>"> 查看留言</a></li>
        <li><a href="<?php echo site_url('admin/ip_display')?>"> 查看访客IP</a></li>
      
        <!-- target属性使目标打开的页面不再在右侧框架内-->
        <li><a href="<?php echo site_url('/home/index')?>" target="_self" onclick="javascript:if(confirm('确定要退出吗？')){return true;}return false;">注销</a></li>
      </ul>

      
    </div>
  </div>
  <!-- sidebar end -->

  <!-- content start -->
  <!-- 右侧 框架内嵌页面，默认调用admin控制器中的copy方法-->
  <div class="admin-content" >
    
    <!--设置iframe的宽和高以适应屏幕-->
    <iframe  style="height: 100%;width: 100%" frameboder="0" border="0"  scrolling="yes" name="iframe" src="<?php echo site_url().'/admin/copy'?>"></iframe>

    
    
      

    <footer class="admin-content-footer">
      <hr>
      <p class="am-padding-left">© 2017 by Js.</p>
    </footer>
    
  </div>
  <!-- content end -->

</div>



<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="<?php echo base_url('assets/js/jquery.min.js')?>"></script>
<!--<![endif]-->
<script src="<?php echo base_url('assets/js/amazeui.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/app.js')?>"></script>
</body>
</html>
