<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>message Page | Js blog</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="format-detection" content="telephone=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="alternate icon" type="image/png" href="<?php echo base_url('assets/i/favicon.png')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/amazeui.min.css')?>"/>
  <style>
    .header {
      text-align: center;
    }
    .header h1 {
      font-size: 200%;
      color: #333;
      margin-top: 30px;
    }
    .header p {
      font-size: 14px;
    }
  </style>
</head>
<body>
<div class="header">
  <div class="am-g">
    <h1>Message is successful</h1>
    <p>Good good study Day day up<br/>妈妈说，好好学习，天天向上</p>
  </div>
  <hr />
</div>
<div class="am-g">
  <div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">
    <h3>谢谢您！您的留言我已经收到~~</h3>
    

    <hr>
    <a href="<?php echo site_url('home/index')?>">
          <input type="submit" name="" value="返回主页 ^_^ " class="am-btn am-btn-default am-btn-sm am-fr">  
    </a>
    <p>© 2017 by Js.</p>
  </div>
</div>
</body>
</html>
