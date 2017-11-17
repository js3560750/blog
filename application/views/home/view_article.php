<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title><?php echo $article['0']['title']?> | Js blog</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="format-detection" content="telephone=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="alternate icon" type="image/png" href="<?php echo base_url('assets/i/favicon.png')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/amazeui.min.css')?>"/>
  <style>
    @media only screen and (min-width: 641px) {
      .am-offcanvas {
        display: block;
        position: static;
        background: none;
      }

      .am-offcanvas-bar {
        position: static;
        width: auto;
        background: none;
        -webkit-transform: translate3d(0, 0, 0);
        -ms-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
      }
      .am-offcanvas-bar:after {
        content: none;
      }

    }

    @media only screen and (max-width: 640px) {
      .am-offcanvas-bar .am-nav>li>a {
        color:#ccc;
        border-radius: 0;
        border-top: 1px solid rgba(0,0,0,.3);
        box-shadow: inset 0 1px 0 rgba(255,255,255,.05)
      }

      .am-offcanvas-bar .am-nav>li>a:hover {
        background: #404040;
        color: #fff
      }

      .am-offcanvas-bar .am-nav>li.am-nav-header {
        color: #777;
        background: #404040;
        box-shadow: inset 0 1px 0 rgba(255,255,255,.05);
        text-shadow: 0 1px 0 rgba(0,0,0,.5);
        border-top: 1px solid rgba(0,0,0,.3);
        font-weight: 400;
        font-size: 75%
      }

      .am-offcanvas-bar .am-nav>li.am-active>a {
        background: #1a1a1a;
        color: #fff;
        box-shadow: inset 0 1px 3px rgba(0,0,0,.3)
      }

      .am-offcanvas-bar .am-nav>li+li {
        margin-top: 0;
      }
    }

    .my-head {
      margin-top: 40px;
      text-align: center;
    }

    .my-button {
      position: fixed;
      top: 0;
      right: 0;
      border-radius: 0;
    }
    .my-sidebar {
      padding-right: 0;
      border-right: 1px solid #eeeeee;
    }

    .my-footer {
      border-top: 1px solid #eeeeee;
      padding: 10px 0;
      margin-top: 10px;
      text-align: center;
    }
  </style>
</head>
<body>
<header class="am-topbar am-topbar-inverse" >
  <h1 class="am-topbar-brand">
    <p>Js blog</p>
  </h1>

  <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only"
          data-am-collapse="{target: '#doc-topbar-collapse'}"><span class="am-sr-only">Navigation switch</span> <span
      class="am-icon-bars"></span></button>

  <div class="am-collapse am-topbar-collapse" id="doc-topbar-collapse" style="background-color:#00bff">
    <ul class="am-nav am-nav-pills am-topbar-nav">
      <li><a href="<?php echo site_url('home/index')?>">Home</a></li>
      <li class=""><a href="<?php echo site_url('home/blog')?>">Articles</a></li>
      <li class="am-dropdown" data-am-dropdown>
        <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
          Category <span class="am-icon-caret-down"></span>
        </a>
        <ul class="am-dropdown-content">
          <li class="am-dropdown-header">Classification</li>
          <?php foreach($category as $value):?>
                <li><a href="<?php echo site_url().'/home/category_article/'.$value['type']?>"><?php echo $value['type']?></a></li>
          <?php endforeach ?>     
        </ul>
      </li>
    </ul>

    <form class="am-topbar-form am-topbar-left am-form-inline am-topbar-right" role="search" method="post" action="<?php echo site_url('/home/search_article')?>">
      <div class="am-form-group">
        <input type="text" class="am-form-field am-input-sm" placeholder="Search Articles" name="text">
      </div>
      <button type="submit" class="am-btn am-btn-default am-btn-sm">Search</button>
    </form>

  </div>
</header>
<!--文章标题和作者、时间-->
<header class="am-g my-head">
  <div class="am-u-sm-12 am-article">
    <h1 class="am-article-title"><?php echo $article['0']['title']?></h1>
    <p class="am-article-meta"><?php echo 'Author: '.$article['0']['author'].' Time: '.$article['0']['time']?></p>

  </div>
</header>
<hr class="am-article-divider"/>
<div class="am-g am-g-fixed">
	<!--文章内容-->
  <div class="am-u-md-9 am-u-md-push-3">
    <div class="am-g">
      <div class="am-u-sm-11 am-u-sm-centered">
        <div class="am-cf am-article">
            <?php echo $article['0']['content']?>
        </div>
        <hr/>
      </div>
    </div>
	<!--评论组件-->
  


  </div>
  <!--侧面其他文章-->
  <div class="am-u-md-3 am-u-md-pull-9 my-sidebar">
    <div class="am-offcanvas" id="sidebar">
      <div class="am-offcanvas-bar">
        <ul class="am-nav">
          <li><a href="#"><?php echo $article['0']['title']?></a></li>
          <li class="am-nav-header">其他文章</li>
          <?php foreach($article_title as $value):?>

            <li><a href="<?php echo site_url().'/home/article/'.$value['aid']?>"><?php echo $value['title']?></a></li>
          <?php endforeach ?>
        </ul>
      </div>
    </div>
  </div>
  <a href="#sidebar" class="am-btn am-btn-sm am-btn-success am-icon-bars am-show-sm-only my-button" data-am-offcanvas><span class="am-sr-only">侧栏导航</span></a>
</div>

  <!--回到顶部的组件-->
  <div data-am-widget="gotop" class="am-gotop am-gotop-default" >
    <a href="#top" title="回到顶部">
        <span class="am-gotop-title">回到顶部</span>
          <i class="am-gotop-icon am-icon-chevron-up"></i>
    </a>
  </div>

<footer class="my-footer">
  <p>Js blog<br><small>© Copyright 2017 by Js.</small></p>
</footer>

<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="<?php echo base_url('assets/js/jquery.min.js')?>"></script>
<!--<![endif]-->
<script src="<?php echo base_url('assets/js/amazeui.min.js')?>"></script>
</body>
</html>
