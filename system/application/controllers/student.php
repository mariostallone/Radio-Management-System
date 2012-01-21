<?php

class Student extends Controller {

	function Student()
	{
		parent::Controller();	
	}
	
	function index()
	{
		$this->load->view('student_login');
		
	}
}

/* End of file student.php */
/* Location: ./system/application/controllers/student.php */