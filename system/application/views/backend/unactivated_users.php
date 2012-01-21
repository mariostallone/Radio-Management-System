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
		// Show error
		echo validation_errors();
		
		$this->table->set_heading('', 'Username', 'Email','Created');
		
		foreach ($users as $user) 
		{
			$this->table->add_row(
				form_checkbox('checkbox_'.$user->id, $user->username).form_hidden('key_'.$user->id, $user->activation_key),
				$user->username, 
				$user->email,  				 
				date('Y-m-d', strtotime($user->created)));
		}
		
		echo form_open($this->uri->uri_string());
				
		echo form_submit('activate', 'Activate User');
		
		echo '<hr/>';
		
		echo $this->table->generate(); 
		
		echo form_close();
		
		echo $pagination;
			
	?>
    <?php echo br(25);?>
</div>
</div>
</div>
<div id="footer">
</div>
</div>
</body>
</html>