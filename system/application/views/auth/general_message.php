<?php echo $auth_message; 
if($auth_message=='logout')
{
	redirect('', 'location');
}

echo br(1);
?>
<a href="
<?php echo base_url(); ?>
">Main Page</a>