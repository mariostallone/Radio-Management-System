<?php
class Admin extends Controller
{
	// Used for registering and changing password form validation
	var $min_username = 4;
	var $max_username = 20;
	var $min_password = 4;
	var $max_password = 20;
	
	function Admin()
	{
		parent::Controller();
		
		$this->load->library('Form_validation');
		$this->load->library('DX_Auth');
		$this->load->model('User');
	
	}
	function index()
	{
		if(!$this->dx_auth->is_admin()) $this->denied();
		$task = $this->User->read_task();
		if($task->num_rows() > 0)
		{
			$table = array();
			$users = array();
			$table[] = array('id','show_name','no_users','users','description','completed','comments','approved');
			$users[] = array('id','ind_user' =>array());
			foreach($task->result() as $row)
			{
				if($row->approved == 0)
				{
					$table[] = array($row->id,$row->show_name,$row->no_users,
								 $row->users,
								 $row->description,$row->completed,$row->comments);
					$users[] = array($row->id);
				}
			}
		}
		foreach($table as $us)
		{
		$users['ind_user']=explode('?',$us[3]);
		}
			$data['username'] = $this->dx_auth->get_username();
			$data['task']=$table;
			$data['users']=$users;
			$this->load->view('admin/admin_view',$data);
	}
	function sendmessage()
	{
		if($this->dx_auth->is_admin())
		{
			$this->load->database();
			$data['username'] = $this->dx_auth->get_username();
			$this->load->view('admin/sendmessage_view',$data);
		}
		else
		{
			$this->denied();
		}
	}
	function send()
	{
		if(!$this->dx_auth->is_admin()) $this->denied();
		$data['from'] = $this->dx_auth->get_username();
		$data['to'] = $_POST['user'];
		$data['message'] = $_POST['message'];
		$data['subject'] = $_POST['subject'];
		$data['str'] = $this->User->send_message($data);
		$this->load->view(redirect('admin/inbox'));
	}
	function inbox()
	{
		if(!$this->dx_auth->is_admin()) $this->denied();
		$user = $this->dx_auth->get_username();
		$in = $this->User->inbox($user);
		if($in->num_rows() > 0)
		{
			$table = array();
			$table[] = array('id','to_from','date','subject','message','read');
			foreach($in->result() as $row)
			{
				$table[] = array($row->id,$row->to_from,$row->date,$row->subject,$row->message,$row->read);
			}
		}
			$data['username'] = $this->dx_auth->get_username();
			$data['msg']=$table;
		$this->load->view('admin/inbox_view',$data);
	}
	function read_mail()
	{
		if(!$this->dx_auth->is_admin()) $this->denied();
		$id = $this->uri->segment(3);
		$user = $this->dx_auth->get_username();
		$in = $this->User->read_mail($user,$id);
		if($in->num_rows() > 0)
		{
			$table = array();
			$table[] = array('id','to_from','date','subject','message','read');
			foreach($in->result() as $row)
			{
				$table[] = array($row->id,$row->to_from,$row->date,$row->subject,$row->message,$row->read);
			}
		}
			$data['username'] = $this->dx_auth->get_username();
			$data['msg']=$table;
			$data['id']= $id;
			$this->load->view('admin/message_view',$data);
		
	}
	function assign_task_num()
	{
		if(!$this->dx_auth->is_admin()) $this->denied();
		$data['username'] = $this->dx_auth->get_username();
		$this->load->view('admin/assign_task_num',$data);
	}
	function assign_task()
	{
		if(!$this->dx_auth->is_admin()) $this->denied();
		$data['num'] = $_POST['num'];
		$data['username'] = $this->dx_auth->get_username();
		$this->load->view('admin/assign_task_view',$data);
	}
	function task_write()
	{
		if(!$this->dx_auth->is_admin()) $this->denied();
		if($_POST['no']==1) $data['users']=$_POST['user1'];
		if($_POST['no']==2) $data['users']=$_POST['user1'].'?'.$_POST['user2'];
		if($_POST['no']==3) $data['users']=$_POST['user1'].'?'.$_POST['user2'].'?'.$_POST['user3'];
		if($_POST['no']==4) $data['users']=$_POST['user1'].'?'.$_POST['user2'].'?'.$_POST['user3'].'?'.$_POST['user4'];
		if($_POST['no']==5) $data['users']=$_POST['user1'].'?'.$_POST['user2'].'?'.$_POST['user3'].'?'.$_POST['user4'].'?'.$_POST['user5'];
		if($_POST['no']==6) $data['users']=$_POST['user1'].'?'.$_POST['user2'].'?'.$_POST['user3'].'?'.$_POST['user4'].'?'.$_POST['user5'].'?'.$_POST['user6'];
		if($_POST['no']==7) $data['users']=$_POST['user1'].'?'.$_POST['user2'].'?'.$_POST['user3'].'?'.$_POST['user4'].'?'.$_POST['user5'].'?'.$_POST['user6'].'?'.$_POST['user7'];
		if($_POST['no']==8) $data['users']=$_POST['user1'].'?'.$_POST['user2'].'?'.$_POST['user3'].'?'.$_POST['user4'].'?'.$_POST['user5'].'?'.$_POST['user6'].'?'.$_POST['user7'].'?'.$_POST['user8'];
		$data['username'] = $this->dx_auth->get_username();
		$data['num'] = $_POST['no'];
		$data['show_name'] = $_POST['task'];
		$data['description'] = $_POST['description'];
		$data['date'] = $_POST['date'];
		$data['slot'] = $_POST['slot']; 
		$data['str'] = $this->User->task_write($data);
		$this->load->view(redirect('admin/'));
		
	}
	function read_task()
	{
		if(!$this->dx_auth->is_admin()) $this->denied();
		$task = $this->User->read_task();
		if($task->num_rows() > 0)
		{
			$table = array();
			$users = array();
			$table[] = array('id','show_name','no_users','users','description','completed','comments','approbed');
			$users[] = array('id','ind_user' =>array());
			foreach($task->result() as $row)
			{
				$table[] = array($row->id,$row->show_name,$row->no_users,
								 $row->users,
								 $row->description,$row->completed,$row->comments,$row->approved);
				$users[] = array($row->id);
				
			}
		}
		foreach($table as $us)
		{
		$users['ind_user']=explode('?',$us[3]);
		}
			$data['username'] = $this->dx_auth->get_username();
			$data['task']=$table;
			$data['users']=$users;
			$this->load->view('admin/read_task',$data);
		
	}
	function detail_task($id)
	{
		if(!$this->dx_auth->is_admin()) $this->denied();
		$table = array();
				$table[] = array('id','show_name','no_users','users','description','completed','comments','accesss_key','filename','approved','communication','deadline','slot');
		$task = $this->User->detail_task($id);
		$data['username'] = $this->dx_auth->get_username();
		foreach($task->result() as $row)
			{
				$table[] = array($row->id,$row->show_name,$row->no_users,
								 $row->users,
								 $row->description,$row->completed,$row->comments,$row->access_key,
								 $row->filename,$row->approved,$row->communication,$row->deadline,$row->slot);
			}
		$data['task'] = $table;
		$this->load->view('admin/detail_task_view',$data);
		
	}
	function upload()
	{
		if(!$this->dx_auth->is_admin()) $this->denied();
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'mp3';
	
		$this->load->library('upload', $config);
	
		if ( ! $this->upload->do_upload())
		{
			$data['error'] = array('error' => $this->upload->display_errors());
			$data['username'] = $this->dx_auth->get_username();
			// Echo mime type after upload
			//$field = 'file';
			//var_dump($_FILES[$field]['type']); 
			$this->load->view('admin/upload_form', $data);
		}	
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$data['id'] = $_POST['id'];
			$id = $_POST['id'];
			$x=0;
			foreach($data['upload_data'] as $item => $value)
			{
				$x++;
				if($x==5)
				{
					$data['filename'] = $value;
				}
				
			}
			$data['approved'] = '1';
			$this->User->upload($data,$id);
			$data['username'] = $this->dx_auth->get_username();
			$this->load->view(redirect('admin/read_task'));
		}
	}
	function approve()
	{
		if(!$this->dx_auth->is_admin()) $this->denied();
		$data['username'] = $this->dx_auth->get_username();
		$data['approved'] = $_POST['approve'];
		$data['comments'] = $_POST['comments'];
		$data['id'] = $_POST['num'];
		$id = $_POST['num'];
		$comments = $_POST['comments'];
		if($data['approved']=='accept')$approved = '1';
		if($data['approved']=='reject')$approved = '2';
		if($data['approved']=='accept')$completed = '1';
		if($data['approved']=='reject')$completed = '0';
		$this->User->approve($id,$comments,$approved,$completed);
		$this->load->view(redirect('admin/approval_queue'));
	}
	function approval_queue()
	{
		if(!$this->dx_auth->is_admin()) $this->denied();
		$task = $this->User->read_task();
		if($task->num_rows() > 0)
		{
			$table = array();
			$users = array();
			$table[] = array('id','show_name','no_users','users','description','completed','comments','approved');
			$users[] = array('id','ind_user' =>array());
			foreach($task->result() as $row)
			{
				if($row->approved == 0)
				{
					$table[] = array($row->id,$row->show_name,$row->no_users,
								 $row->users,
								 $row->description,$row->completed,$row->comments);
					$users[] = array($row->id);
				}
			}
		}
		foreach($table as $us)
		{
		$users['ind_user']=explode('?',$us[3]);
		}
			$data['username'] = $this->dx_auth->get_username();
			$data['task']=$table;
			$data['users']=$users;
			$this->load->view('admin/approval_queue',$data);
	}
	function approved()
	{
		if(!$this->dx_auth->is_admin()) $this->denied();
		$task = $this->User->read_task();
		if($task->num_rows() > 0)
		{
			$table = array();
			$users = array();
			$table[] = array('id','show_name','no_users','users','description','completed','comments','approved');
			$users[] = array('id','ind_user' =>array());
			foreach($task->result() as $row)
			{
				if($row->approved == 1)
				{
					$table[] = array($row->id,$row->show_name,$row->no_users,
								 $row->users,
								 $row->description,$row->completed,$row->comments);
					$users[] = array($row->id);
				}
			}
		}
		foreach($table as $us)
		{
		$users['ind_user']=explode('?',$us[3]);
		}
			$data['username'] = $this->dx_auth->get_username();
			$data['task']=$table;
			$data['users']=$users;
			$this->load->view('admin/approved',$data);
	}
	function slot()
	{
		if(isset($_POST['date']))
		{
			$data['date'] = $_POST['date'];

		if(!$this->dx_auth->is_admin()) $this->denied();
		$task = $this->User->read_task();
		if($task->num_rows() > 0)
		{
			$table = array();
			$users = array();
			$table[] = array('id','show_name','no_users','users','description','approved','deadline','slot');
			$users[] = array('id','ind_user' =>array());
			foreach($task->result() as $row)
			{
				if($row->approved == 1)
				{
					$table[] = array($row->id,$row->show_name,$row->no_users,
								 $row->users,
								 $row->description,$row->approved,$row->deadline,$row->slot);
					$users[] = array($row->id);
				}
			}
		}
		foreach($table as $us)
		{
		$users['ind_user']=explode('?',$us[3]);
		}
			
			$data['task']=$table;
			$data['users']=$users;
				}
		else
		{
			$data['date'] = ' ';
		}	
		$data['username'] = $this->dx_auth->get_username();
			$this->load->view('admin/slots',$data);
	}
	function logout()
	{
		if(!$this->dx_auth->is_admin()) $this->denied();
		$this->dx_auth->logout();
		$data['auth_message']='logout';
        $this->load->view($this->dx_auth->logout_view, $data);
	}
	function create_db_notexist()
	{
		if(!$this->dx_auth->is_admin()) $this->denied();
		$data['username'] = $this->dx_auth->get_username();
		$this->load->view('admin/create_tab',$data);	
	}
	function create_db()
	{
		if(!$this->dx_auth->is_admin()) $this->denied();
		$data['user'] = $_POST['user'];
		$this->User->create_table_message($data);
		$this->load->view(redirect('admin/create_db_notexist'));
	}
	function denied()
	{
		$this->dx_auth->deny_access('denied');
	}
}
