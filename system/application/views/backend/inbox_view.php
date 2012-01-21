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
<h1>Inbox</h1>
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
			$cmsg[4] = character_limiter($cmsg[4], 25).'...';
			
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
</ul>
</div>
<p><br />Page rendered in {elapsed_time} seconds</p>
</div>
</div>
</body>
</html>