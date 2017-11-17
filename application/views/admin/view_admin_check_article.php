<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<link rel="stylesheet" href="<?php echo base_url('assets/css/amazeui.min.css')?>"/>
  <link rel="stylesheet" href="<?php echo base_url('assets/css/admin.css')?>">
	<title>后台管理</title>
	
</head>
<body>
	<div class="am-g">
        <div class="am-u-sm-12">
          <table class="am-table am-table-bd am-table-striped admin-content-table">
            <thead>
            <tr>
              <th>AID</th><th>Title</th><th>Type</th><th>Time</th><th>Author</th><th>Management</th>
            </tr>
            </thead>

            <tbody>

        <?php foreach($article as $value):?>

            <tr><td><?php echo $value['aid']?></td><td><?php echo $value['title']?></td><td><?php echo $value['type']?></td> <td><?php echo $value['time']?></td><td><?php echo $value['author']?></td>
              <td>
                <div class="am-dropdown" data-am-dropdown>
                  <button class="am-btn am-btn-success am-btn-xs am-dropdown-toggle" data-am-dropdown-toggle><span class="am-icon-cog"></span> <span class="am-icon-caret-down"></span></button>
                  <ul class="am-dropdown-content">
                    <li><a href="<?php echo site_url('/admin/edit_article/'.$value['aid'])?>">编辑</a></li>
                    <li><a href="<?php echo site_url('/admin/delete_article/'.$value['aid'])?>" onclick="javascript:if(confirm('确定要删除此信息吗？')){alert('删除成功！');return true;}return false;">删除</a></li>
                  </ul>
                </div>
              </td>
            </tr>

        <?php endforeach ?>
           
            </tbody>
          </table>
        </div>
      </div>

  <!--分页-->
  <p align="center"> <?php echo $links?></p>
 

     


<!--[if (gte IE 9)|!(IE)]><!-->
<script src="<?php echo base_url('assets/js/jquery.min.js')?>"></script>
<!--<![endif]-->
<script src="<?php echo base_url('assets/js/amazeui.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/app.js')?>"></script>

</body>
</html>