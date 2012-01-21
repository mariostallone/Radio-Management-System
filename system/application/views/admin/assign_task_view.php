<html>
<head>
<title>Welcome to Radio Management System</title>
<link href="<?php echo base_url() ?>css/style-task.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url() ?>css/jscal2.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url() ?>js/jscal2.js"></script>
<script src="<?php echo base_url() ?>js/en.js"></script>
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
<h1>Assign Task</h1>
<?php 
echo form_open('admin/task_write');
	$task = array(
              'name'        => 'task',
              'id'          => 'task');
	$options = array(
              'slot1'  => '00:00 - 00:30',
              'slot2'  => '00:30 - 01:00',
              'slot3'  => '01:00 - 01:30',
              'slot4'  => '01:30 - 02:00',
              'slot5'  => '02:00 - 02:30',
              'slot6'  => '02:30 - 03:00',
              'slot7'  => '03:00 - 03:30',
              'slot8'  => '03:30 - 04:00',
              'slot9'  => '04:00 - 04:30',
              'slot10'  => '04:30 - 05:00',
              'slot11'  => '05:00 - 05:30',
              'slot12'  => '05:30 - 06:00',
              'slot13'  => '06:00 - 06:30',
              'slot14'  => '06:30 - 07:00',
              'slot15'  => '07:00 - 07:30',
              'slot16'  => '07:30 - 08:00',
              'slot17'  => '08:00 - 08:30',
              'slot18'  => '08:30 - 09:00',
              'slot19'  => '09:00 - 09:30',
              'slot20'  => '09:30 - 10:00',
              'slot21'  => '10:00 - 10:30',
              'slot22'  => '10:30 - 11:00',
              'slot23'  => '11:00 - 11:30',
              'slot24'  => '11:00 - 12:00',
			  'slot25'  => '12:00 - 12:30',
			  'slot26'  => '12:30 - 13:00',
			  'slot27'  => '13:00 - 13:30',
			  'slot28'  => '13:30 - 14:00',
			  'slot29'  => '14:00 - 14:30',
			  'slot30'  => '14:30 - 15:00',
			  'slot31'  => '15:00 - 15:30',
			  'slot32'  => '15:30 - 16:00',
			  'slot33'  => '16:00 - 16:30',
			  'slot34'  => '16:30 - 17:00',
			  'slot35'  => '17:00 - 17:30',
			  'slot36'  => '17:30 - 18:00',
			  'slot37'  => '18:00 - 18:30',
			  'slot38'  => '18:30 - 19:00',
			  'slot39'  => '19:00 - 19:30',
			  'slot40'  => '19:30 - 20:00',
			  'slot41'  => '20:00 - 20:30',
			  'slot42'  => '20:30 - 21:00',
			  'slot43'  => '21:00 - 21:30',
			  'slot44'  => '21:30 - 22:00',
			  'slot45'  => '22:00 - 22:30',
			  'slot46'  => '22:30 - 23:00',
			  'slot47'  => '23:00 - 23:30',
			  'slot48'  => '23:30 - 00:00'
                );	
	$description = array(
              'name'        => 'description',
              'id'          => 'description',
			  'maxlength'   => '800',
              'cols'        => '30',
			  'rows'        => '10');
	$no = array(
              'name'        => 'no',
              'id'          => 'no',
			  'value'		=> $num);
	
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
echo 'Show Name ';
echo form_input($task);
echo br(1);
echo 'Descpition ';
echo form_textarea($description);
echo br(2);
?>
Deadline : <input type="text" name="date" value="" id="date"  /><br />
          <table align="left">
          <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><div id="cal"></div>
          <script type="text/javascript">
            var LEFT_CAL = Calendar.setup({
                    cont: "cal",
                    weekNumbers: true,
                    selectionType: Calendar.SEL_MULTIPLE,
                    // titleFormat: "%B %Y"
            })
          </script>
</td></tr></table>
<script type="text/javascript">//<![CDATA[

LEFT_CAL.addEventListener("onSelect", function(){
var ta = document.getElementById("date");
ta.value = this.selection.print("%Y/%m/%d");
});
//]]></script>
<?php echo br(10);
echo 'Slot ';
echo form_dropdown('slot',$options);
echo br(2);
echo form_hidden('no',$num);
echo form_submit(array('name' => 'submit','class' => 'form_but' ));
echo form_close();
?>
</ul>
</div>

<?php echo br(5);?>
</div>
</div>
<div id="footer">
</div>
</div>
</body>
</html>