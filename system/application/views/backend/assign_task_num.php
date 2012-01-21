<html>
<head>
<title>Welcome to Radio Management System</title>
<link href="<?php echo base_url() ?>css/style.css" rel="stylesheet" type="text/css">
</head>
<body class="body">
<div id="content">

<div id="header">
<div id="set">
<a href="<?php echo base_url()?>auth/logout">Logout</a>
</div>
</div>
<div id="main_cont">
<div id="nav">
<?php
echo 'Welcome ';
echo $username;
?>
<h1>Navigation</h1>
<ul>
<li><a href="<?php echo base_url()?>">Main Page</a></li>
<li><a href="<?php echo base_url()?>user_/sendmessage">Compose Message</a></li>
<li><a href="<?php echo base_url()?>user_/inbox">Inbox</a></li>
</ul>
</div>
<div id="cont">
<h1>Assign Task</h1>
<?php 
echo form_open('admin/assign_task');
$num = array(
              'name'        => 'num',
              'id'          => 'num');
echo br(1).'Number of Users'.br(1);
echo form_input($num);
echo form_submit(array('name' => 'submit','class' => 'form_but' ));
echo form_close();
?>
</ul>
</div>
<p><br />Page rendered in {elapsed_time} seconds</p>
</div>
</div>
</body>
</html>