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
<div id="navigation">
<a href="../">Main Page</a>
</div>
<div id="main_cont">
<?php
echo 'Welcome ';
echo br(3);
echo $to.br(2).$message;
echo br(2).$str;
?>
<p><br />Page rendered in {elapsed_time} seconds</p>
</div>
</div>
</body>
</html>