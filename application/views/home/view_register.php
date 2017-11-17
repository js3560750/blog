<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>Register Page | Js blog</title>
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
    <h1>Register</h1>
    <p>Good good study Day day up<br/>妈妈说，好好学习，天天向上</p>
  </div>
  <hr />
</div>
<div class="am-g">
  <div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">
    <h3>抱歉，暂不开放对外注册</h3>
    <hr>
    
    <br>
    <br>

    <form method="post" class="am-form">
      <label for="email">账号:</label>
      <input type="email" name="" id="email" value="">
      <br>
      <label for="password">密码:</label>
      <input type="password" name="" id="password" value="">
      <br>
      <label for="password">再一次输入密码:</label>
      <input type="password" name="" id="password_repeat" value="">
      
      <br />
      <div class="am-cf">
        <input type="submit" name="" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl">
        
      </div>
    </form>
    <hr>
    <a href="<?php echo site_url('Home/index')?>">
          <input type="submit" name="" value="返回主页 ^_^ " class="am-btn am-btn-default am-btn-sm am-fr">  
    </a>
    <p>© 2017 by Js.</p>
  </div>
</div>
</body>
</html>
