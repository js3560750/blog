<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>Js Blog</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport"
        content="width=device-width, initial-scale=1">
  <meta name="format-detection" content="telephone=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp"/>
  <link rel="alternate icon" type="image/png" href="<?php echo base_url('assets/i/favicon.png')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/amazeui.min.css')?>"/>


  <style>
    @media only screen and (min-width: 1200px) {
      .blog-g-fixed {
        max-width: 1200px;
      }
    }

    @media only screen and (min-width: 641px) {
      .blog-sidebar {
        font-size: 1.4rem;
      }
    }

    .blog-main {
      padding: 20px 0;
    }

    .blog-title {
      margin: 10px 0 20px 0;
    }

    .blog-meta {
      font-size: 14px;
      margin: 10px 0 20px 0;
      color: #222;
    }

    .blog-meta a {
      color: #27ae60;
    }

    .blog-pagination a {
      font-size: 1.4rem;
    }

    .blog-team li {
      padding: 4px;
    }

    .blog-team img {
      margin-bottom: 0;
    }

    .blog-content img,
    .blog-team img {
      max-width: 100%;
      height: auto;
    }

    .blog-footer {
      padding: 10px 0;
      text-align: center;
    }

    #a_title:hover{text-decoration:underline;color:#0873c0 }
  </style>
</head>
<body>
<header class="am-topbar am-topbar-fixed-top  am-topbar-inverse">

  <h1 class="am-topbar-brand">
  <p>Js blog</p>
    
  </h1>

  <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only"
          data-am-collapse="{target: '#doc-topbar-collapse'}"><span class="am-sr-only">Navigation switch</span> <span
      class="am-icon-bars"></span></button>

<!--           上部导航栏                   -->
  <div class="am-collapse am-topbar-collapse" id="doc-topbar-collapse">
    <ul class="am-nav am-nav-pills am-topbar-nav">
      <li><a href="<?php echo site_url('home/index')?>">Home</a></li>
      <li class="am-active"><a href="<?php echo site_url('home/blog')?>">Articles</a></li>
      <li class="am-dropdown" data-am-dropdown>
        <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
          Category <span class="am-icon-caret-down" ></span>
        </a>
        <ul class="am-dropdown-content">
          <li class="am-dropdown-header">Classification</li>
          <?php foreach($category as $value):?>
                <li><a href="<?php echo site_url().'/home/category_article/'.$value['type']?>"><?php echo $value['type']?></a></li>
          <?php endforeach ?>     
        </ul>
      </li>
    </ul>
    <!--           上部右侧的搜索                   -->
    <form class="am-topbar-form am-topbar-left am-form-inline am-topbar-right" role="search" method="post" action="<?php echo site_url('/home/search_article')?>">
      <div class="am-form-group">
        <input type="text" class="am-form-field am-input-sm" placeholder="Please Input Title" name="text">
      </div>
      <button type="submit" class="am-btn am-btn-default am-btn-sm">Search</button>
    </form>

  </div>

</header>



<!--           左边文章部分信息显示                   -->

<div class="am-g am-g-fixed blog-g-fixed">
  <div class="am-u-md-8">

  <?php foreach($articles as $value):?> <!-- foreach()后面有个：千万别掉了-->
    <article class="blog-main">
      <h3 class="am-article-title blog-title" >
        <a href="<?php echo site_url().'/home/article/'.$value['aid']?>" id="a_title"><?php echo $value['title']?></a> 
      </h3>
      <h4 class="am-article-meta blog-meta">by <a href=""><?php echo $value['author']?></a> posted on <?php echo $value['time']?> under <a href="#"><?php echo $value['type']?></a></h4>

      <div class="am-g blog-content">
        <div class="am-u-lg-7" style="height: 160px;overflow: hidden"> <!--overflow:hidden 超出的文字都隐藏掉-->
          <?php echo $value['content']?> 
        </div>
        <div class="am-u-lg-5">
          <p><img src="<?php echo base_url('assets/i/').$value['picture']?>"></p>
        </div>
      </div>
    </article>
  <hr class="am-article-divider blog-hr">
  <?php endforeach ?>



<!--          !!!!!!!!!!!!!!!!!!!!!!!!!!          -->
    

    


    <!-- 加载分页！！！-->
    <?php echo $page;?>
    
  </div>

  <!--           右侧各类信息栏                   -->
  <div class="am-u-md-4 blog-sidebar" >
    <div class="am-panel-group" >
    <!--           个人简介                   -->
      <section class="am-panel am-panel-default" >
        <div class="am-panel-hd" style="background:#0e90d2"><font color="white">About me</font></div>
        <div class="am-panel-bd">
          <p>Jin Song, as a postgraduate enrolled in University of Electronic Science and Technology of China.Focus on Java, PHP and Image Processing.</p>
          <a class="am-btn am-btn-success am-btn-sm" href="<?php echo site_url('/home/index#contact_me')?>">contact me</a>
        </div>
      </section>
      <!--           最新的文章                   -->
      <section class="am-panel am-panel-default">
        <div class="am-panel-hd" style="background:#0e90d2"><font color="white">Latest Articles</font></div>
        <ul class="am-list blog-list">
          <?php foreach($latest_title as $value):?>
            <li>
              
              <a href="<?php echo site_url('/home/article/').$value['aid']?>">
               <?php echo $value['title']?>
              </a>
            </li>
          <?php endforeach ?>
        </ul>
      </section>
      <!--           精选文章                   -->
      <section class="am-panel am-panel-default">
        <div class="am-panel-hd" style="background:#0e90d2"><font color="white">Featured Articles</font></div>
        <div class="am-panel-bd">
            <div data-am-widget="slider" class="am-slider am-slider-default" data-am-slider='{}' >
                <ul class="am-slides">
                     <li>
                        <img src="<?php echo base_url('assets/i/img005.jpg')?>" alt="">
                    </li>
                    <li>
                        <img src="<?php echo base_url('assets/i/img003.jpg')?>" alt="">
                    </li>
                    <li>
                        <img src="<?php echo base_url('assets/i/img004.jpg')?>" alt="">
                    </li>
     
     
                </ul>
            </div>

        </div>
      </section>
    </div>
  </div>

</div>

  <!--回到顶部的组件-->
  <div data-am-widget="gotop" class="am-gotop am-gotop-default" >
    <a href="#top" title="回到顶部">
        <span class="am-gotop-title">回到顶部</span>
          <i class="am-gotop-icon am-icon-chevron-up"></i>
    </a>
  </div>


<footer class="blog-footer">
  <p>Js blog<br/>
    <small>© Copyright 2017 by Js.</small>
  </p>
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
