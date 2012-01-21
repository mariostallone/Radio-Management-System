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
<h3>Pending Tasks</h3>
<table>
<tr>
<th>No</th>
<th>Show Name</th>
<th>No. of Users</th>
<th>Users</th>
<th>Description</th>
<th>Completed</th>
</tr>
<?php 
$x=1;
foreach($task as $now_task)
{
	if($x>1 && $now_task[5]==0)
	{
		echo '<tr><td><a href="detail_task/'.$now_task[0].'">'.$now_task[0].'</td><td><a href="detail_task/'.$now_task[0].'">'.$now_task[1].'</td><td>'.$now_task[2].'</td><td><a href="detail_task/'.$now_task[0].'">';
		$u = explode("?",$now_task[3]);
		foreach($u as $t) echo '<span class="small">'.$t.br(1).'</span>';
		$now_task[4] = character_limiter($now_task[4], 15);
		echo '</td><td><span class="small">'.$now_task[4].'</span></td><td><a href="detail_task/'.$now_task[0].'">';
		if($now_task[5] == 0) echo 'No';
		else echo 'Yes';
		echo '</td></tr>';
	}
	$x++;
}

?>
</table>
<?php $br = 15-$x;
echo br($br);?>
<p><br />Page rendered in {elapsed_time} seconds</p>
</div>
</div></div>
<div id="footer">
</div>

</body>
</html>