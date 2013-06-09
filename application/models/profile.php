<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends MY_Model {

    function __construct()
    {
        parent::__construct();
    }

    public function check_profile_complete()
    {
        $id = $this->session->userdata('user_id');
        $query = $this->db->query('SELECT profile_complete FROM users WHERE id = "'.$id.'"');
        return $query->row()->profile_complete;
    }

    public function username()
    {
        $id = $this->session->userdata('user_id');
        $query = $this->db->query('SELECT username FROM users WHERE id = "'.$id.'"');
        return $query->row()->username;
    }
}