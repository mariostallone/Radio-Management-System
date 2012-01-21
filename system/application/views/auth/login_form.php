<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login-::Radio Management System::-</title>
<link href="<?php echo base_url()?>css/login.css" rel="stylesheet" type="text/css">
</head>
<body class="body">
<div id="content">
<div id="login">
<div id="text">
<table align="center">
<tr>
<td>
<?php echo br(1);?>
</td>
</tr>
</table>
<?php
$username = array(
	'name'	=> 'username',
	'id'	=> 'username',
	'size'	=> 20,
	'value' => set_value('username')
);

$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'size'	=> 20
);

$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember'),
	'style' => 'margin:0;padding:0'
);

$confirmation_code = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8
);

?>
<?php echo form_open($this->uri->uri_string())?>
<?php echo $this->dx_auth->get_auth_error(); ?>
<table align="center">
	<tr>
		<td>
			Username : 	<?php echo form_input($username)?>
    		<span class="small"><?php echo form_error($username['name']); ?></span>
		</td>
	</tr>
	<tr>
		<td>
			Password : 	<?php echo form_password($password)?>
    		<span class="small"><?php echo form_error($password['name']); ?></span>
		</td>
	</tr>
<?php if ($show_captcha): ?>
	<tr>
		<td>Enter the code exactly as it appears. There is no zero.</td>
		<td><?php echo $this->dx_auth->get_captcha_image(); ?></td>
		<td><?php echo form_label('Confirmation Code', $confirmation_code['id']);?></td>
		<td>
			<?php echo form_input($confirmation_code);?>
			<?php echo form_error($confirmation_code['name']); ?>
		</td>
	</tr>	
<?php endif; ?>
	<tr>
    	<td>
      
		<?php echo form_checkbox($remember);?> <?php echo form_label('Remember me', $remember['id']);?> 
        <?php echo br(1);?>
		<?php echo anchor($this->dx_auth->forgot_password_uri, 'Forgot password');?> 
		<?php echo "|";?>
		<?php
			if ($this->dx_auth->allow_registration) {
				echo anchor($this->dx_auth->register_uri, 'Register');
			};
		?>
		</td>
	</tr>
	<tr>
		<td align="center"><?php echo form_submit(array('name' => 'login','class' => 'form_but' ));?>
    	</td>
    </tr>
<?php echo form_close()?>
</table>
</div>
</div>
</div>
</body>
</html>