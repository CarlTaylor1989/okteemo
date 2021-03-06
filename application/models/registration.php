<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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
    		'email' => $this->input->post('reg_email')
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
    	$username 	 = $this->input->post('reg_username');
    	$email       = $this->input->post('reg_email');
    	$password 	 = $this->input->post('reg_password');
    	$created_on  = date('Y-m-d H:i:s');

        $this->ion_auth_model->register($username, $password, $email, $additional_data, $group_ids);
        $this->ion_auth_model->login($email, $password, $remember);
    }
}