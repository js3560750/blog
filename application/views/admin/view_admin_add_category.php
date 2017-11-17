<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<link rel="stylesheet" href="<?php echo base_url('assets/css/amazeui.min.css')?>"/>
  <link rel="stylesheet" href="<?php echo base_url('assets/css/admin.css')?>">
	<title>后台管理</title>
	
</head>
<body>

<form class="am-form" method="post" action="<?php echo site_url('/admin/add_category_action')?>">
  <fieldset>
    <legend>添加栏目</legend>
    <div class="am-form-group">
      <label for="doc-ta-1">栏目名</label>
      <p><input type="text" class="am-form-field am-radius" placeholder="请添加栏目名"   name="name" /></p>
    </div>
    <p><button type="submit" class="am-btn am-btn-primary">提交</button></p>
  </fieldset>
</form>

  
 

     


<!--[if (gte IE 9)|!(IE)]><!-->
<script src="<?php echo base_url('assets/js/jquery.min.js')?>"></script>
<!--<![endif]-->
<script src="<?php echo base_url('assets/js/amazeui.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/app.js')?>"></script>

</body>
</html>