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
echo form_open('admin/task_write');
	$task = array(
              'name'        => 'task',
              'id'          => 'task');
for($x=1;$x<=$num;$x++)
{
	
echo 'User '.$x;?>
<select name="user<?php echo $x?>">
<?php 
			$this->db->select('username');
			$query = $this->db->get('users');
			echo $query->result();
			foreach ($query->result() as $row)
			{ 
				if($row->username <> $this->dx_auth->get_username())
				{
					print $row->username;
				
			
?>
<option value="<?php print $row->username;?>"><?php print $row->username;?></option>
<?php }
			}?>
</select>
<?php
echo br(1);
}
echo 'Task Name';
echo form_input($task);
echo br(1);
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