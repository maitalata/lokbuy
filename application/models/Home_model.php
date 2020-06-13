<?php
class Home_model extends CI_Model{
	public function __construct()
	{
		$this->load->database();
	}
	
	public function check_login($email) {
        //query the table 'users' and get the result count
        $this->db->where('email', $email);
        $query = $this->db->get('rrt');
        return $query->num_rows();
	}
	
	public function get_messages($user){
	    $query = $this->db->query("SELECT id, user, doctor, message, sent_on, TIMESTAMPDIFF(MINUTE, sent_on, NOW()) AS time_ago FROM messenger WHERE user='".$user."' ORDER BY id DESC ");
	    //$this->db->where('user', $user);
	    //$this->db->order_by('id', 'DESC');
		//$query = $this->db->get('messenger');
		return $query->result_array();
	}

	public function get_doctors(){
		$query = $this->db->get('doctors');
		return $query->result_array();
	}
	
	public function get_unassigned_users(){
	    $this->db->where('assigned', NULL);
	    $query = $this->db->get('users');
	    return $query->result_array();
	}
	
	public function get_assigned_users(){
	    $query = $this->db->query("SELECT * FROM assignings, users WHERE assignings.doctor='".$this->session->userdata('doctor_id')."' AND assignings.user=users.user  ");
	    return $query->result_array();
	}
	
	public function get_fullname(){
		$query = $this->db->query("SELECT admin_name FROM admin WHERE email='".$this->session->userdata('current_user')."' ");
		$row = $query->row(); 
		return $row->admin_name;
	}

	public function save_about($data){
		$this->db->where('id', 'aboutus');
		return $this->db->update('about', $data);
	}

	public function save_admin_to_db($data)
	{
        //get the data from controller and insert into the table 'users'
        return $this->db->insert('admin', $data);
	}
	
	public function update_admin($data){
		$this->db->where('email', $this->session->userdata('current_user'));
		return $this->db->update('admin', $data);
	}

	//get about from the database
	public function get_number_of_messages(){
		$query = $this->db->query("SELECT * FROM messages");
		return $query->num_rows();
	}

	//Get and return the total number of all products posted in the system
	public function get_number_of_products(){
		$query = $this->db->query("SELECT * FROM product");
		return $query->num_rows();
	}
	
	// Get hashed password 
	public function get_hashed_password($email){
		//$this->db->where('email', $email);
		$query = $this->db->query("SELECT * FROM rrt WHERE email='".$email."' ");
		$row = $query->row();
		return $row->password;
	}
	
	public function save_doctor($data)
	{
        //Save the new product to the database
        return $this->db->insert('doctors', $data);
	}
	
	public function update_user($data, $user)
	{
	    $this->db->where('user', $user);
	    return $this->db->update('users', $data);
	}
	
	// Get the doctor ID
	public function get_doctor_id($email){
	    $query = $this->db->query("SELECT id FROM doctors WHERE email='".$email."' ");
	    $row = $query->row();
	    return $row->id;
	}
	
	public function save_message($data)
	{
	    return $this->db->insert('messenger', $data);
	}


}
