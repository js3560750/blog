<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<link rel="stylesheet" href="<?php echo base_url('assets/css/amazeui.min.css')?>"/>
  <link rel="stylesheet" href="<?php echo base_url('assets/css/admin.css')?>">
	<title>后台管理</title>
	
</head>
<body>

<form class="am-form" method="post" action="<?php echo site_url('/admin/edit_category_action')?>">
  <!-- 这个不可编辑的 fieldset 好像不能用表单传值-->
  <fieldset disabled>
    <legend>编辑栏目</legend>

    <div class="am-form-group">
      <label for="doc-ds-ipt-1">原栏目名</label>
      <p><input type="text" id="doc-ds-ipt-1" class="am-form-field" placeholder="<?php echo $category['cname']?>" /></p>
  </fieldset>

  <!--可以编辑的fieldset-->
  <fieldset>
      <label for="doc-ta-1">新栏目名</label>
      <p class="am-form-help">不要轻易修改栏目名，会连带修改article表和category表中相关的栏目名</p>
      <p><input type="text" class="am-form-field am-radius" placeholder="新栏目名" name="new_type" /></p>
      <!--这个隐藏的表单是为了传值，把原栏目名通过表单提交-->
      <input type="hidden" value="<?php echo $category['cname']?>" name="old_type">
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