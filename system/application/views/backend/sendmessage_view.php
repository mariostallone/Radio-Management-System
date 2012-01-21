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
echo $this->dx_auth->get_username();
?>
<h1>Navigation</h1>
<ul>
<li><a href="<?php echo base_url()?>">Main Page</a></li>
<li><a href="<?php echo base_url()?>user_/sendmessage">Compose Message</a></li>
<li><a href="<?php echo base_url()?>user_/inbox">Inbox</a></li>
</ul>
</div>
<div id="cont">
<h1>Send Message</h1>
<?php 
echo form_open('admin/send');
$message = array(
              'name'        => 'message',
              'id'          => 'message',
              'value'       => '',
			  'maxlength'   => '800',
              'size'        => '500',
              'cols'        => '50',
			  'rows'        => '10');
$subject = array(
              'name'        => 'subject',
              'id'          => 'subject');
?>
<p>Select User</p>
<select name="user">
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
echo br(1).'Subject'.br(1);
echo form_input($subject);
echo br(1).'Message'.br(1);
echo form_textarea($message);
echo br(2);
echo form_submit(array('name' => 'submit','class' => 'form_but' ));
echo form_close();
?>
</div>
<p><br />Page rendered in {elapsed_time} seconds</p>
</div>
</div>
</body>
</html>