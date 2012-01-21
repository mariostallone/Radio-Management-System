<html>
<head>
<title>Welcome to Radio Management System</title>
<script type="text/javascript" src="<?php echo base_url()?>flowplayer/flowplayer.min.js"></script>
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
$x=1;
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
//echo 'Welcome ';
//echo $this->table->generate($users);
?>
<?php 

$y=0;
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
foreach($task as $now_task)
{
	
	if($x>1)
	{
		$thetask = $now_task[0];
		echo '<strong>Task ID</strong> : '.$now_task[0].br(1).'<strong>Task Name</strong> : '.$now_task[1].br(1).'No of Users : '.$now_task[2].br(1).'<strong>Users</strong>'.br(1);
		$u = explode("?",$now_task[3]);
		foreach($u as $t) echo $t.br(1);
		//$now_task[4] = character_limiter($now_task[4], 25);
		echo '<strong>Description</strong>'.br(1).$now_task[4].br(1).'<strong>Completion Status</strong> : ';
		if($now_task[5] == 0) echo 'No';
		else echo 'Yes';
		if($now_task[7]>0) $y = 1;
		echo br(1);
		echo '<strong>Deadline</strong> : '.$now_task[11].br(1);
		$datestring = "%Y-%m-%d";
		$dt1 = explode("-",$now_task[11]);
		$dt2 = explode("-",mdate($datestring));
		$y = $dt1[0] - $dt2[0];
		$m = $dt1[1] - $dt2[1];
		$d = $dt1[2] - $dt2[2];
		echo '<strong>Time Left</strong> : '.$d.'days ';
		if($m>0) echo $m.'months ';
		if($y>0) echo $y.'years ';
		echo br(1);
		echo '<strong>Slot</strong> : ';
		echo $options[$now_task[12]];
		echo br(1);
		echo '<strong>File Name</strong> : '.$now_task[8].'.mp3';
		echo br(1).'<strong>Approved</strong> : ';
		if($now_task[9]==0) echo 'No';
		if($now_task[9]==1) echo 'Yes';
		if($now_task[9]>1) echo 'Rejected';
		if($now_task[5] == 1)
		{echo br(1).'<a href = "'.base_url().'uploads/'.$now_task[8].'.mp3">';
		echo '<img src = "'.base_url().'images/download.png">&nbsp;&nbsp;Download</a>'.br(2);
		}
		echo br(3);
	}
	$x++;
	
}
		$datestring = "%Y-%m-%d";
		$dt1 = explode("-",$now_task[11]);
		$dt2 = explode("-",mdate($datestring));
		$y = $dt1[0] - $dt2[0];
		$m = $dt1[1] - $dt2[1];
		$d = $dt1[2] - $dt2[2];
		$sd=$d-$m-$y;
		if($sd==0) echo 'You have crossed the Deadline';	
if($now_task[5]<1 && $sd>0)
{
	echo form_open_multipart('admin/upload');
	echo '<input type="file" name="userfile" size="20" />';
	echo form_hidden('id',$now_task[0]);
	echo br(2);
	echo '<input type="submit" value="Upload" />';
	echo form_close();
	
}
else if($now_task[5]>=1)
			{
			echo '<a  
			 href="'.base_url().'uploads/'.$now_task[8].'.mp3"  
			 style="display:block;width:450px;height:25px"  
			 id="player"></a>'; 
			echo '<script>flowplayer("player", "'; 
			echo base_url().'flowplayer/flowplayer.swf");</script>';
			echo br(2);
			if($now_task[9]<>1)
			{$comments = array(
              'name'        => 'comments',
              'id'          => 'comments',
              'cols'        => '50',
			  'rows'        => '10');
			echo form_open('admin/approve');
			echo form_radio('approve','accept');
			echo 'Approve'.'<img src = "'.base_url().'images/approve.png">';
			echo br(1);
			echo form_radio('approve','reject');
			echo 'Dis Approve'.'<img src = "'.base_url().'images/disapprove.png">';
			echo br(2);
			echo form_hidden('num',$now_task[0]);
			echo '<strong>Comments</strong>'.br(1);
			echo form_textarea($comments);
			echo br(2);
			echo form_submit(array('name' => 'submit','class' => 'form_but' ));
			echo form_close();
			}

		
}
?>
<img src="<?php echo base_url()?>images/comment.png" width="32" height="32">
<h3>Group Communication</h3>
<?php
$x = 1;
$y=1;
$pmsg = '';
foreach($task as $now_task)
{
		if($x>1)
		{	
			$pmsg = $pmsg.$now_task[10];
			$u = explode("?/?",$now_task[10]);
			foreach($u as $t) 
			{
				if($y==1)
				{
					echo $t.br(1);
					$y++;
				}
				else
				{
					echo '<strong>'.$t.'</strong>'.br(1);
					$y=1;
				}
			}
		}
		$x++;
}
$message = array(
              'name'        => 'message',
              'id'          => 'message',
              'value'       => '',
			  'maxlength'   => '800',
              'cols'        => '50',
			  'rows'        => '5');
echo form_open('user_/communication');
echo form_textarea($message);
echo form_hidden('user', $username);
echo form_hidden('id', $thetask);
echo form_hidden('pmsg', $pmsg);
echo br(2);
echo form_submit('submit','Add Comment');
echo form_close();
?>

<?php $br = 1;
echo br($br);?>
</div>
</div>
<div id="footer">
</div>
</div>
</body>
</html>