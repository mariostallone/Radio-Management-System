<?php
class User extends Model
{
	function User()
	{
		parent::Model();
		$this->load->dbforge();
	}
	function create_table_message($data)
	{
		$fields = array(
                        'id' => array(
                                                 'type' => 'INT',
                                                 'constraint' => 5, 
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE,
                                          ),
                        'to_from' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '30'
                                          ),
						'date' => array(
                                                 'type' => 'TIMESTAMP',
                                                 'constraint' => '10'
                                          ),
						'subject' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '30'
                                          ),
						'message' => array(
                                                 'type' => 'TEXT'
                                          ),
						'read' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '2'
                                          )	 
                );
		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table($data['username'].'_message',TRUE);
	}
	function send_message($data)
	{
	$msg = array('to_from' => $data['from'], 'subject' => $data['subject'],'message' => $data['message'],'read' => '0');
	$str=$this->db->insert($data['to'].'_message', $msg); 
	return $str;
	}
	function inbox($user)
	{
		$this->db->order_by("date", "desc"); 
		$query = $this->db->get($user.'_message');
		return $query;
	}
	function read_mail($user,$id)
	{
		$data = array(
               'read' => 1
         );

		$this->db->where('id', $id);
		$this->db->update($user.'_message', $data); 
		$query = $this->db->get_where($user.'_message', array('id' => $id));
		
		return $query;
	}
	function task_write($data)
	{
	$task = array('no_users' => $data['num'], 'users' => $data['users'],'show_name' => $data['show_name'],'description' => $data['description'],'approved' => '0','completed' => '0','deadline' => $data['date'],'slot' => $data['slot']);
	$str=$this->db->insert('tasks', $task); 
	return $str;
	}
	function read_task()
	{
		$this->db->order_by("id", "desc"); 
		$query = $this->db->get('tasks');
		return $query;
	}
	function detail_task($id)
	{
		$query = $this->db->get_where('tasks', array('id' => $id));
		return $query;	
	}
	function upload($data,$id)
	{
		$data = array(
               'access_key' => '1',
			   'completed'  => '1',
			   'filename'   => $data['filename'],
			   'approved'   => $data['approved']
            );
		$this->db->where('id', $id);
		$this->db->update('tasks', $data);
	}
	function approve($id,$comments,$approved,$completed)
	{
		$msg = array('id' => $id, 'comments' => $comments,'approved' => $approved,'completed' =>$completed);
		$this->db->where('id', $id);
		$this->db->update('tasks', $msg);
	}
	function approval_queue()
	{
		$this->db->order_by("id", "desc"); 
		$query = $this->db->get('tasks');
		return $query;
	}
	function communication($data,$id)
	{
		$data = array(
			   'communication'   => $data['pmsg'].'?/?'.$data['name'].'?/?'.$data['msg']
            );
		$this->db->where('id', $id);
		$this->db->update('tasks', $data);
		
	}
}