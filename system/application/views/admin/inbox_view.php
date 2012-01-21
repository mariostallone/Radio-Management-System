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
<h1><img src="<?php echo base_url()?>images/inbox.png">&nbsp;&nbsp;Inbox</h1>
<table>
<tr>
<th width="60px" align="left">From</th>
<th width="200px" align="left">Subject</th>
<th width="80px" align="left">Date</th>
</tr>
<?php
$x=1;
if(!empty($msg)) 
{	
	foreach($msg as $cmsg)
	{
		if($x<>1 && $cmsg[1]<> $username)
		{
			$cmsg[4] = character_limiter($cmsg[4], 25);
			
			if($cmsg[5] == 0)
			{
				echo '<tr class="unread">';
			}
			else
			{
				echo '<tr>';
			}
			echo '<td>';
			echo $cmsg[1].'</td><td><a href="read_mail/'.$cmsg[0].'">'.$cmsg[3].'<span class="light">&nbsp;&nbsp;- &nbsp;&nbsp;&nbsp;&nbsp;'.$cmsg[4].'</span></a></td><td><span class="small">';
			echo $cmsg[2];
			echo '</span></td></tr>';
		}
		$x++;
	}
}

?>
</table>
</div>
<p>Page rendered in {elapsed_time} seconds</p>
<?php $br = 15-$x;
echo br($br);?>
</div>
</div>
<div id="footer">
</div>
</div>
</body>
</html>