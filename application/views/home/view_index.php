<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>Home Page | Js blog</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport"
        content="width=device-width, initial-scale=1">
  <meta name="format-detection" content="telephone=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp"/>
  
  <link rel="stylesheet" href="<?php echo base_url('assets/css/amazeui.min.css')?>"/>

  <style>
    .get {
      background: #1E5B94;
      color: #fff;
      text-align: center;
      padding: 100px 0;
    }

    .get-title {
      font-size: 200%;
      border: 2px solid #fff;
      padding: 20px;
      display: inline-block;
    }

    .get-btn {
      background: #fff;
    }

    .detail {
      background: #fff;
    }

    .detail-h2 {
      text-align: center;
      font-size: 150%;
      margin: 40px 0;
    }

    .detail-h3 {
      color: #1f8dd6;
    }

    .detail-p {
      color: #7f8c8d;
    }

    .detail-mb {
      margin-bottom: 30px;
    }

    .hope {
      background: white;
      padding: 10px 0;
    }

    .hope2 {
      background: #ffb5c5;
      padding: 50px 0;
    }

    .hope-img {
      text-align: center;
    }

    .hope-hr {
      border-color: #149C88;
    }

    .hope-title {
      font-size: 140%;
    }

    .about {
      background: #fff;
      padding: 40px 0;
      color: #7f8c8d;
    }

    .about-color {
      color: #34495e;
    }

    .about-title {
      font-size: 180%;
      padding: 30px 0 50px 0;
      text-align: center;
    }

    .footer p {
      color: #7f8c8d;
      margin: 0;
      padding: 15px 0;
      text-align: center;
      background: #2d3e50;
    }
  </style>
</head>
<body>
<header class="am-topbar am-topbar-fixed-top">
  <div class="am-container">
    <h1 class="am-topbar-brand">
      <p><span class="am-icon-btn am-icon-envira am-primary"></span> Js blog</p>
    </h1>

    <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-secondary am-show-sm-only"
            data-am-collapse="{target: '#collapse-head'}"><span class="am-sr-only">Navigation Switch</span> <span
        class="am-icon-bars"></span></button>

    <div class="am-collapse am-topbar-collapse" id="collapse-head">
      <ul class="am-nav am-nav-pills am-topbar-nav">
        <li class="am-active"><a href="<?php echo site_url('home/index')?>">Home</a></li>
        <li><a href="<?php echo site_url('home/blog')?>"">Articles</a></li>
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

      <div class="am-topbar-right">
       <a href="<?php echo site_url('home/register')?>">
        <button class="am-btn am-btn-secondary am-topbar-btn am-btn-sm"><span class="am-icon-pencil"></span> Register</button>
        </a>
      </div>

      <div class="am-topbar-right">
        <a href="<?php echo site_url('home/login')?>">
        <button class="am-btn am-btn-primary am-topbar-btn am-btn-sm"><span class="am-icon-user"></span> Login </button>  
        </a>
      </div>
    </div>
  </div>
</header>

<div class="get">
  <div class="am-g">
    <div class="am-u-lg-12">
      <h1 class="get-title">Js's Blog based on Amaze UI and CodeIgniter</h1>

      <p>
        There are <?php echo $like_number['0']['number']?> people who like me ~~
      </p>

      <p>
        <a href="<?php echo site_url().'/home/like'?>" class="am-btn am-btn-sm get-btn">like+</a>
      </p>
    </div>
  </div>
</div>

<div class="detail"  >
  <div class="am-g am-container">
    <div class="am-u-lg-12">
      <h2 class="detail-h2">Maybe there are some articles</h2>

      <div class="am-g">
        <div class="am-u-lg-3 am-u-md-6 am-u-sm-12 detail-mb">

          <h3 class="detail-h3">
            
            <a href="<?php echo site_url().'/home/category_article/Java'?>">
            <i class="am-icon-mobile am-icon-sm"></i> Java</a>
          </h3>

          <p class="detail-p">
            As a Java programmer,this category records various of Java programming experience form the beginning of last year.
          </p>
        </div>
        <div class="am-u-lg-3 am-u-md-6 am-u-sm-12 detail-mb">
          <h3 class="detail-h3">
            
            <a href="<?php echo site_url().'/home/category_article/Server'?>">
            <i class="am-icon-cogs am-icon-sm"></i> Server</a>
          </h3>

          <p class="detail-p">
            The server is a deep pit,involving a lot of network and Linux knowledge.Taking advantage of the identify of students,it's no doubt to rent one to play.
          </p>
        </div>
        <div class="am-u-lg-3 am-u-md-6 am-u-sm-12 detail-mb">
          <h3 class="detail-h3">
            
            <a href="<?php echo site_url().'/home/category_article/Spring'?>">
            <i class="am-icon-check-square-o am-icon-sm"></i> Spring</a>
          </h3>

          <p class="detail-p">
            Spring means the season of spring? I put JSP and Servlet and SpingMVC related articles on here.
          </p>
        </div>
        <div class="am-u-lg-3 am-u-md-6 am-u-sm-12 detail-mb">
          <h3 class="detail-h3">
            
            <a href="<?php echo site_url().'/home/category_article/Life'?>">
            <i class="am-icon-send-o am-icon-sm"></i> Life</a>
          </h3>

          <p class="detail-p">
            Our life is not just coding. People often say programmers are rich, slient and die young.But if you know me,you will know what is life.    
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

<!--图片链接文章，链接写死了，并不是由控制器输出数据-->
<div class="hope">
 <ul data-am-widget="gallery" class="am-gallery am-avg-sm-2
  am-avg-md-3 am-avg-lg-4 am-gallery-bordered" data-am-gallery="{  }" >
      <li>
        <div class="am-gallery-item">
            <a href="<?php echo site_url().'/home/article/18'?>" class="">
              <img src="http://s.amazeui.org/media/i/demos/bing-1.jpg"  alt="远方 有一个地方 那里种有我们的梦想"/>
                <h3 class="am-gallery-title">SpringMVC</h3>
                <div class="am-gallery-desc">书本来去的书包不动的只有情书</div>
            </a>
        </div>
      </li>
      <li>
        <div class="am-gallery-item">
            <a href="<?php echo site_url().'/home/article/15'?>" class="">
              <img src="http://s.amazeui.org/media/i/demos/bing-2.jpg"  alt="某天 也许会相遇 相遇在这个好地方"/>
                <h3 class="am-gallery-title">这热的夜啊</h3>
                <div class="am-gallery-desc">你知道我在等你吗？在你家楼下</div>
            </a>
        </div>
      </li>
      <li>
        <div class="am-gallery-item">
            <a href="<?php echo site_url().'/home/article/13'?>" class="">
              <img src="http://s.amazeui.org/media/i/demos/bing-3.jpg"  alt="不要太担心 只因为我相信"/>
                <h3 class="am-gallery-title">Ubuntu 14下 LNMP环境搭建</h3>
                <div class="am-gallery-desc">朦朦胧胧的他她也懵懵懂懂</div>
            </a>
        </div>
      </li>
      <li>
        <div class="am-gallery-item">
            <a href="<?php echo site_url().'/home/article/14'?>" class="">
              <img src="http://s.amazeui.org/media/i/demos/bing-4.jpg"  alt="终会走过这条遥远的道路"/>
                <h3 class="am-gallery-title">溢夏</h3>
                <div class="am-gallery-desc">她故意迟到 假装在走廊刚好碰到 (哎?早啊~)</div>
            </a>
        </div>
      </li>
  </ul>
</div>

<div class="hope2">
      <h3 align="center">
      <font color="white">Click here  </font>
      <a href="<?php echo site_url('home/love')?>" onclick="javascript:if(confirm('高调秀恩爱，要继续吗？')){return true;}return false;"><span class="am-icon-btn am-danger am-icon-heart"></span></a>
      <font color="white">  Only For XiaoLiMao ~</font></h3>
   
</div>

<div class="about">
  <div class="am-g am-container">
    <div class="am-u-lg-12">
      <h2 class="about-title about-color">I am very honored that you can leave a message below</h2>

      <div class="am-g" id="contact_me">
        <div class="am-u-lg-6 am-u-md-4 am-u-sm-12">

          <form class="am-form" action="<?php echo site_url('home/message')?>" method="post">
            <label for="name" class="about-color">Your Name</label>
            <input id="name"  type="text" name="name">
            <p><?php echo form_error('name'); ?></p> <!--form_error函数返回规则验证的错误信息-->
            <br/>
            <label for="email" class="about-color">Your E-mail</label>
            <input id="email" type="email" name="email">
            <br/>
            <label for="message" class="about-color">Your Message</label>
            <textarea id="message" name="message"></textarea>
            <p><?php echo form_error('message'); ?></p> <!--form_error函数返回规则验证的错误信息-->
            <br/>
            <button type="submit" class="am-btn am-btn-primary am-btn-sm"><i class="am-icon-check"></i> Submit</button>
          </form>
          <hr class="am-article-divider am-show-sm-only">
        </div>

        <div class="am-u-lg-6 am-u-md-8 am-u-sm-12">
          <h4 class="about-color">About me</h4>

          <p>Jin Song, as a postgraduate enrolled in University of Electronic Science and Technology of China.Focus on Java, PHP and Image Processing.</p>
          <h4 class="about-color">Follow me</h4>

          <p>Github: https://github.com/js3560750</p>
          <p>Coding: https://coding.net/u/js3560750</p>
          <p>Weibo: http://weibo.com/u/2044644943</p>
        </div>
      </div>
    </div>
  </div>
</div>

<footer class="footer">
  <p>© 2017  by Js.</p>
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
