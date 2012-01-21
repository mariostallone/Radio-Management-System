<?php
class User_ extends Controller
{
	// Used for registering and changing password form validation
	var $min_username = 4;
	var $max_username = 20;
	var $min_password = 4;
	var $max_password = 20;
	
	function User_()
	{
		parent::Controller();
		
		$this->load->library('Form_validation');
		$this->load->library('DX_Auth');
		$this->load->model('User');
	
	}
	function index()
	{
		$task = $this->User->read_task();
		$user = $this->dx_auth->get_username();
		$yes = 0;
		if($task->num_rows() > 0)
		{
			$table = array();
			$table2 = array();
			$users = array();
			$table[] = array('id','show_name','no_users','users','description','completed','comments','accesss_key','filename','approved','communication','deadline');
			$table2[] = array('id','show_name','no_users','users','description','completed','comments','accesss_key','filename','approved','communication','deadline');
			$users[] = array('id','ind_user' =>array());
			foreach($task->result() as $row)
			{
				$yes = 0;
				$table[] = array($row->id,$row->show_name,$row->no_users,
								 $row->users,
								 $row->description,$row->completed,$row->comments,
								 $row->access_key,$row->filename,$row->approved,$row->communication,$row->deadline);
				$users[] = array($row->id);
				
			
				foreach($table as $us)
				{
					$users['ind_user']=explode('?',$us[3]);
				}
				foreach($users as $t)
				{
					if(is_array($t))
					{
						foreach($t as $a)
						{
							if($a==$user) 
							{
								$yes = 1;
							}
						}
					}
				}
				if($yes==1) 
				{
				$table2[] = array($row->id,$row->show_name,$row->no_users,
								 $row->users,
								 $row->description,$row->completed,$row->comments,
								 $row->access_key,$row->filename,$row->approved,$row->communication,$row->deadline);
				}
				}
				
		}

			$data['username'] = $this->dx_auth->get_username();
			$data['task']=$table2;
			$data['users']=$users;	
			$this->load->view('user/user_view',$data);
	}
	function sendmessage()
	{
			$this->load->database();
			$data['username'] = $this->dx_auth->get_username();
			$this->load->view('user/sendmessage_view',$data);
	}
	function send()
	{
		$data['from'] = $this->dx_auth->get_username();
		$data['to'] = $_POST['user'];
		$data['message'] = $_POST['message'];
		$data['subject'] = $_POST['subject'];
		$data['str'] = $this->User->send_message($data);
		$this->load->view(redirect('user_/inbox'));
	}
	function inbox()
	{
		$user = $this->dx_auth->get_username();
		$in = $this->User->inbox($user);
		$table = array();
		$table[] = array('id','to_from','date','subject','message','read');
		if($in->num_rows() > 0)
		{

			foreach($in->result() as $row)
			{
				$table[] = array($row->id,$row->to_from,$row->date,$row->subject,$row->message,$row->read);
			}
		}
			$data['username'] = $this->dx_auth->get_username();
			$data['msg']=$table;
		$this->load->view('user/inbox_view',$data);
	}
	function read_mail()
	{
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
			$this->load->view('user/message_view',$data);
		
	}
	function check_task()
	{
		$task = $this->User->read_task();
		$user = $this->dx_auth->get_username();
		$yes = 0;
		$table = array();
		$table2 = array();
		$users = array();
		$table[] = array('id','show_name','no_users','users','description','completed','comments','deadline');
		$table2[] = array('id','show_name','no_users','users','description','completed','comments','deadline');
		$users[] = array('id','ind_user' =>array());
		if($task->num_rows() > 0)
		{
			foreach($task->result() as $row)
			{
				$yes = 0;
				$table[] = array($row->id,$row->show_name,$row->no_users,
								 $row->users,
								 $row->description,$row->completed,$row->comments);
				$users[] = array($row->id);
				
			
				foreach($table as $us)
				{
					$users['ind_user']=explode('?',$us[3]);
				}
				foreach($users as $t)
				{
					if(is_array($t))
					{
						foreach($t as $a)
						{
							if($a==$user) 
							{
								$yes = 1;
							}
						}
					}
				}
				if($yes==1) 
				{
								$table2[] = array($row->id,$row->show_name,$row->no_users,
								 $row->users,
								 $row->description,$row->completed,$row->comments);
				}
				}
				
		}

			$data['username'] = $this->dx_auth->get_username();
			$data['task']=$table2;
			$data['users']=$users;
			$data['yes'] = $yes;
			$this->load->view('user/is_task',$data);
			
	}
	function detail_task($id)
	{
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
		$this->load->view('user/detail_task_view',$data);
		
	}
	function upload()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'mp3';
	
		$this->load->library('upload', $config);
	
		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			// Echo mime type after upload
			//$field = 'file';
		//	var_dump($_FILES[$field]['type']); 
			$this->load->view('user/upload_form',$error);
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
			$data['approved'] = '0';
			$this->User->upload($data,$id);
			$data['username'] = $this->dx_auth->get_username();
			$this->load->view(redirect('user_/'));
		}
	}
	function communication()
	{
		$data['msg'] = $_POST['message'];
		$data['name'] = $_POST['user'];
		$data['pmsg'] = $_POST['pmsg'];
		$id = $_POST['id'];
		$this->User->communication($data,$id);
		$this->load->view('user/comment',$data);
	}
	function completed_task()
	{
		$task = $this->User->read_task();
		$user = $this->dx_auth->get_username();
		$yes = 0;
		$table = array();
		$table2 = array();
		$users = array();
		$table[] = array('id','show_name','no_users','users','description','completed','comments','approved');
		$table2[] = array('id','show_name','no_users','users','description','completed','comments','approved');
		$users[] = array('id','ind_user' =>array());
		if($task->num_rows() > 0)
		{
			
			foreach($task->result() as $row)
			{
				$yes = 0;
				$table[] = array($row->id,$row->show_name,$row->no_users,
								 $row->users,
								 $row->description,$row->completed,$row->comments,$row->approved);
				$users[] = array($row->id);
				
			
				foreach($table as $us)
				{
					$users['ind_user']=explode('?',$us[3]);
				}
				foreach($users as $t)
				{
					if(is_array($t))
					{
						foreach($t as $a)
						{
							if($a==$user) 
							{
								$yes = 1;
							}
						}
					}
				}
				if($yes==1) 
				{
								$table2[] = array($row->id,$row->show_name,$row->no_users,
								 $row->users,
								 $row->description,$row->completed,$row->comments,$row->approved);
				}
				}
				
		}

			$data['username'] = $this->dx_auth->get_username();
			$data['task']=$table2;
			$data['users']=$users;
			$data['yes'] = $yes;
			$this->load->view('user/completed_task',$data);
			
	}
	function approved_task()
	{
		$task = $this->User->read_task();
		$user = $this->dx_auth->get_username();
		$yes = 0;
		if($task->num_rows() > 0)
		{
			$table = array();
			$table2 = array();
			$users = array();
			$table[] = array('id','show_name','no_users','users','description','completed','comments','approved');
			$table2[] = array('id','show_name','no_users','users','description','completed','comments','approved');
			$users[] = array('id','ind_user' =>array());
			foreach($task->result() as $row)
			{
				$yes = 0;
				$table[] = array($row->id,$row->show_name,$row->no_users,
								 $row->users,
								 $row->description,$row->completed,$row->comments,$row->approved);
				$users[] = array($row->id);
				
			
				foreach($table as $us)
				{
					$users['ind_user']=explode('?',$us[3]);
				}
				foreach($users as $t)
				{
					if(is_array($t))
					{
						foreach($t as $a)
						{
							if($a==$user) 
							{
								$yes = 1;
							}
						}
					}
				}
				if($yes==1) 
				{
								$table2[] = array($row->id,$row->show_name,$row->no_users,
								 $row->users,
								 $row->description,$row->completed,$row->comments,$row->approved);
				}
				}
				
		}

			$data['username'] = $this->dx_auth->get_username();
			$data['task']=$table2;
			$data['users']=$users;
			$data['yes'] = $yes;
			$this->load->view('user/approved_task',$data);
			
	}
	function logout()
	{
		$this->dx_auth->logout();
		$data['auth_message']='logout';
        $this->load->view($this->dx_auth->logout_view, $data);
	}
	

}
