<?php 

class Registration extends MY_Model {

    function __construct()
    {
        parent::__construct();
    }

    function username_available($username)
    {
    	$query = $this->db->get_where('users', array(
    		'username' => $this->input->post('reg_username')
    	));

    	if($query->num_rows() > 0)
    	{
    		return false;
    	} 
    	else 
    	{
	    	return true;
    	}
    }

    function email_available($email)
    {
    	$query = $this->db->get_where('users', array(
    		'email_address' => $this->input->post('reg_email')
    	));

    	if($query->num_rows() > 0)
    	{
    		return false;
    	} 
    	else 
    	{
	    	return true;
    	}
    }

    function insert_entry()
    {
    	$this->load->library('encrypt');

    	$this->username 	 = $this->input->post('reg_username');
    	$this->email_address = $this->input->post('reg_email');
    	$this->password 	 = $this->encrypt->encode($this->input->post('reg_password'));
    	$this->date_created  = date('Y-m-d H:i:s');

    	$this->db->insert('users', $this);

    	$data = array(
	        'username' 		=> $this->username,
	        'email'			=> $this->email_address,
	        'is_logged_in' 	=> true      
        );
    	$this->session->set_userdata($data);
    }
}