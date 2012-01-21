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
<li><a href="<?php echo base_url()?>admin/sendmessage"><img src="<?php echo base_url()?>images/compose.png" width="32" height="32">Compose Message</a></li>
<li><a href="<?php echo base_url()?>admin/inbox"><img src="<?php echo base_url()?>images/inbox.png" width="32" height="32">Inbox</a></li>
<li><a href="<?php echo base_url()?>admin/assign_task_num"><img src="<?php echo base_url()?>images/assign_task.png" width="32" height="32">Assign Task</a></li>
<li><a href="<?php echo base_url()?>admin/read_task"><img src="<?php echo base_url()?>images/completed.png" width="32" height="32">View Tasks</a></li>
<li><a href="<?php echo base_url()?>admin/approval_queue"><img src="<?php echo base_url()?>images/pending.png" width="32" height="32">Approval Queue</a></li>
<li><a href="<?php echo base_url()?>admin/approved"><img src="<?php echo base_url()?>images/approved.png" width="32" height="32">Approved Tasks</a></li>
<li><a href="<?php echo base_url()?>backend/unactivated_users"><img src="<?php echo base_url()?>images/unactivated.png" width="32" height="32">Activate Users</a></li>
<li><a href="<?php echo base_url()?>backend/users"><img src="<?php echo base_url()?>images/ban.png" width="32" height="32">Ban/UnBan Users</a></li>
<li><a href="<?php echo base_url()?>admin/slot"><img src="<?php echo base_url()?>images/slot.png" width="32" height="32">Check Slots</a></li>
</ul>
</div>
<div id="cont">
<?php
//echo 'Welcome ';
//echo $this->table->generate($users);
?>
<table>
<tr>
<th>No</th>
<th>Show Name</th>
<th>Users</th>
<th>Description</th>
<th>Completed</th>
<th>Approved</th></tr>
<?php 
$x=1;
foreach($task as $now_task)
{
	if($x>1)
	{
		echo '<tr><td><a href="detail_task/'.$now_task[0].'">'.$now_task[0].'</td><td><a href="detail_task/'.$now_task[0].'">'.$now_task[1].'</td><td><a href="detail_task/'.$now_task[0].'">';
		$u = explode("?",$now_task[3]);
		foreach($u as $t) echo '<span class="small">'.$t.br(1).'</span>';
		$now_task[4] = character_limiter($now_task[4], 15);
		echo '</td><td><span class="small">'.$now_task[4].'</span></td><td><a href="detail_task/'.$now_task[0].'">';
		if($now_task[5] == 0) echo 'No';
		else echo 'Yes';
		echo'</td><td>';
		if($now_task[7] == 0) echo 'No';
		if($now_task[7] == 1) echo 'Yes';
		if($now_task[7] == 2) echo 'Disapproved';
		echo '</td></tr>';
	}
	$x++;
}

?>
</table>

<?php $br = 25-$x;
echo br($br);?>
</div>
</div>
<div id="footer">
</div>
</div>
</body>
</html>