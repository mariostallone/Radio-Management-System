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
<?php
$x=1;
if(!empty($msg)) 
{	
	foreach($msg as $cmsg)
	{
		if($cmsg[0]==$id)
		{
			echo 'From : '.$cmsg[1].br(1).'Subject : '.$cmsg[3].br(2).'<p class="whitebg">'.$cmsg[4].'</p>';
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