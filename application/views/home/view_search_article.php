<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>Search Page | Js blog</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="format-detection" content="telephone=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  
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
    <h1>Search Results</h1>
    
  </div>
  <hr />
</div>
<div class="am-g">
  <div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">
    <h3><?php if(isset($error)){echo $error;}?></h3>
    
    
      <div class="am-g">
        <div class="am-u-sm-12">
          <table class="am-table am-table-bd am-table-striped admin-content-table">
            <thead>
            <tr>
              <th>AID</th><th>Title</th><th>Type</th><th>Time</th><th>Author</th>
            </tr>
            </thead>

            <tbody>
    <?php foreach($search_article as$value):?>

            <tr>
                <td><?php echo $value['aid']?></td>

                <td><a href="<?php echo site_url().'/home/article/'.$value['aid']?>"><?php echo $value['title']?></a></td>
                <td><?php echo $value['type']?></td> 
                <td><?php echo $value['time']?></td>
                <td><?php echo $value['author']?></td>
            </tr>

    <?php endforeach?>
             </tbody>
          </table>
        </div>
      </div>


    <hr>
    <a href="<?php echo site_url('home/index')?>">
          <input type="submit" name="" value="返回主页 ^_^ " class="am-btn am-btn-default am-btn-sm am-fr">  
    </a>
    <p>© 2017 by Js.</p>
  </div>
</div>
</body>
</html>
