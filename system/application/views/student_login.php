<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student Login</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<table align="center">
<tr>
<td>
<h1 align="center"><span class="style1">Student Login</span></h1>
<?php echo br(1);?>
</td>
</tr>
</table>
<?php 
echo form_open('student/login');
$username = array(
              'name'        => 'username',
              'id'          => 'username',
              'value'       => '');
$password = array(
              'name'        => 'password',
              'id'          => 'password',
              'value'       => '');
?>
<table align="center">
<tr>
<td>
<span class="style2">Username : </span><?php echo form_input($username);?>
</td>
</tr>
<tr>
<td>
<span class="style1">Password : </span><?php echo form_input($password);?>
</td>
</tr>
<tr>
<td align="center">
<?php
echo form_submit(array('name' => 'submit','class' => 'form_but' ));
?>
</td>
</tr>
</table>
<?
echo form_close();
?>
</body>
</html>