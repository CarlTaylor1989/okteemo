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

    public function update_profile_completion($update_progress = 4)
    {
        $id = $this->session->userdata('user_id');

        $data = array(
            'profile_complete'  => $update_progress
        );

        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }

    public function update_profile_stage_one($basic_name, $twitter_handle)
    {
        $id = $this->session->userdata('user_id');

        $data = array(
            'name'              => $basic_name,
            'twitter_handle'    => '@'.$twitter_handle
        );

        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }

    public function username()
    {
        $id = $this->session->userdata('user_id');
        $query = $this->db->query('SELECT username FROM users WHERE id = "'.$id.'"');
        return $query->row()->username;
    }
}