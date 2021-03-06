<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<link rel="stylesheet" href="<?php echo base_url('assets/css/amazeui.min.css')?>"/>
  <link rel="stylesheet" href="<?php echo base_url('assets/css/admin.css')?>">

  <!--百度编辑器配置,配置config.js文件必须在all.min.js文件前面，否则出错-->
    <script type="text/javascript" src="<?php echo base_url().'ueditor/ueditor.config.js'?>"></script>

    <script type="text/javascript" src="<?php echo base_url().'ueditor/ueditor.all.min.js'?>"></script>
    
    

    <script type="text/javascript">
      //设置根路径，必须设置到包含js文件的那一层
      window.UEDITOR_HOME_URL="<?php echo base_url().'ueditor/'?>";
      window.onload=function(){
        window.UEDITOR_CONFIG.initialFrameWidth=900;//设置百度编辑器的高宽
        window.UEDITOR_CONFIG.initialFrameHeight=600;
        var ue=UE.getEditor('content'); /*这里调用的是id，不是name*/
      }
    </script>




	<title>后台管理</title>
	
</head>

<body>
<!--添加下面两个div 以给页面添加滑动条！！！-->
<div class="admin-content">
<div class="admin-content-body">

<form class="am-form" method="post" enctype="multipart/form-data" action="<?php echo site_url('/admin/add_article_action')?>">
  <fieldset>
    <legend>发表文章</legend>
    <div class="am-form-group">
      <label for="doc-ta-1">标题</label>
      <p><input type="text" class="am-form-field am-radius" placeholder="请输入标题"  name="title" /></p>
    </div>

    <div class="am-form-group">
      <label for="doc-select-1">文章类型</label>
      <select id="doc-select-1" name="type">
      <?php foreach($category as$value):?>
        <option value="<?php echo $value['type']?>" ><?php echo $value['type']?></option> 
      <?php endforeach?>
      </select>
      <span class="am-form-caret"></span>
    </div>

    <div class="am-form-group">
      <label for="doc-ipt-file-1">上传宣传图</label>
      <p class="am-form-help">请选择形状类似宽屏的图片</p>
      <input type="file" id="doc-ipt-file-1" name="picture">
      
    </div>

    <div class="am-form-group">
      <label for="doc-ta-1">文本域</label>
        <!--标签内的php语句保证提交的表单不通过时保存用户之前选的值-->
        <textarea  id="content" name="content"><?php echo set_value('content')?></textarea>
        <!--打印错误提示-->
        <?php echo form_error('content','<span>','</span>')?>
    </div>


    <p><button type="submit" class="am-btn am-btn-primary">提交</button></p>
  </fieldset>
</form>

  
</div>
</div>
     


<!--[if (gte IE 9)|!(IE)]><!-->
<script src="<?php echo base_url('assets/js/jquery.min.js')?>"></script>
<!--<![endif]-->
<script src="<?php echo base_url('assets/js/amazeui.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/app.js')?>"></script>

</body>
</html>