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
<div id="xcont">
<div id="nav">
<?php
echo 'Welcome ';
echo $username;
echo '<img src="'.base_url().'images/profile.png" width="32" height="32">';
?>
<h1>Navigation</h1>
    <ul>
    <li><a href="<?php echo base_url()?>"><img src="<?php echo base_url()?>images/home.png" width="32" height="32">Main Page</a></li>
    <li><a href="<?php echo base_url()?>user_/sendmessage"><img src="<?php echo base_url()?>images/compose.png" width="32" height="32">Compose Message</a></li>
    <li><a href="<?php echo base_url()?>user_/inbox"><img src="<?php echo base_url()?>images/inbox.png" width="32" height="32">Inbox</a></li>
    <li><a href="<?php echo base_url()?>user_/check_task"><img src="<?php echo base_url()?>images/pending.png" width="32" height="32">Pending Tasks</a></li>
     <li><a href="<?php echo base_url()?>user_/completed_task"><img src="<?php echo base_url()?>images/completed.png" width="32" height="32">Completed Tasks</a></li>
      <li><a href="<?php echo base_url()?>user_/approved_task"><img src="<?php echo base_url()?>images/approved.png" width="32" height="32">Approved Tasks</a></li>
    </ul>
</div>
<div id="cont">
<h3>Uploaded File Details</h3>
<ul>
<?php foreach($upload_data as $item => $value):?>
<li><?php echo $item;?>: <?php echo $value;?></li>
<?php endforeach; ?>
</ul>
<p><br />Page rendered in {elapsed_time} seconds</p>
</div>
</div>
<div id="footer">
</div>
</body>
</html>