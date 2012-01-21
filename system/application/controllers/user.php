<?php
class User_ extends Controller
{
	// Used for registering and changing password form validation
	var $min_username = 4;
	var $max_username = 20;
	var $min_password = 4;
	var $max_password = 20;
	
	function User()
	{
		parent::Controller();
		
		$this->load->library('Form_validation');
		$this->load->library('DX_Auth');
		$this->load->model('User');
	
	}
	function index()
	{
		$this->load->view('backend/admin_view');
	}
	function sendmessage()
	{
			$this->load->database();
			$this->load->view('backend/sendmessage_view');
	}
	function send()
	{
		$data['from'] = $this->dx_auth->get_username();
		$data['to'] = $_POST['user'];
		$data['message'] = $_POST['message'];
		$data['subject'] = $_POST['subject'];
		$data['str'] = $this->User->send_message($data);
		$this->load->view('backend/send_view',$data);
	}
	function inbox($user)
	{
		$user = $this->dx_auth->get_username();
		$data = $this->User->inbox($user);
		$this->load->view('backend/inbox_view',$data);
	}
	function logout()
	{
		$this->dx_auth->logout();
		$data['auth_message']='logout';
        $this->load->view($this->dx_auth->logout_view, $data);
	}

}
