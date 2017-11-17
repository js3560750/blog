<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<link rel="stylesheet" href="<?php echo base_url('assets/css/amazeui.min.css')?>"/>
  <link rel="stylesheet" href="<?php echo base_url('assets/css/admin.css')?>">
	<title>后台管理</title>
	
</head>
<body style="overflow-y: auto;">
	<div class="am-g">
        <h2 style="text-align: center;">只显示最近30条信息</h2>
        <div class="am-u-sm-12">
          <table class="am-table am-table-bd am-table-striped admin-content-table">
            <thead>
            <tr>
              <th>Number</th><th>IP地址</th><th>访问时间</th>
            </tr>
            </thead>

            <tbody>

        <?php foreach($ip as $value):?>

            <tr><td><?php echo $value['number']?></td><td><?php echo $value['ip']?></td><td><?php echo $value['time']?></td>
              
            </tr>

        <?php endforeach ?>
           
            </tbody>
          </table>
        </div>
      </div>

  
 

     


<!--[if (gte IE 9)|!(IE)]><!-->
<script src="<?php echo base_url('assets/js/jquery.min.js')?>"></script>
<!--<![endif]-->
<script src="<?php echo base_url('assets/js/amazeui.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/app.js')?>"></script>

</body>
</html>