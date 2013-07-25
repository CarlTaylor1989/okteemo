<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends MY_Controller {

	public function index()
	{	
		$this->data['title'] = 'Account';
		$this->data['body']	= 'account';
	}

	public function edit_profile($stage_view = 1)
	{
		if(!$this->ion_auth->logged_in())
		{
      		redirect('/', 'refresh');
    	}

    	$this->load->model('profile');
        $this->load->library('form_validation');

    	$this->data = array(
    		'title' 			=> 'Edit your profile',
    		'body'				=> 'account-profile',
    		'username'			=> $this->profile->username(),
    		'profile_complete' 	=> $this->profile->check_profile_complete(),
    		'stage_view'		=> 'account/profile_complete/stage_'.$this->profile->check_profile_complete(),
    	);

    	if($this->uri->segment(3) != $this->data['profile_complete'])
    	{
            redirect('/account/edit-profile/'.$this->data['profile_complete'], 'refresh');
    	}

        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $this->form_validation->set_rules('basic_name', 'Name', 'trim|required');
            $this->form_validation->set_rules('twitter_handle', 'Twitter Handle', 'trim|required');

            $postdata = array(
                'basic_name'      => $this->input->post('basic_name'),
                'twitter_handle'  => $this->input->post('twitter_handle'),
            );

            if($this->form_validation->run() == FALSE)
            {
                $this->data['postdata'] = $postdata;
            }
            else
            {
                $this->data['profile_complete']++;
                $progress = $this->data['profile_complete'];

                $this->profile->update_profile_stage_one($postdata['basic_name'], $postdata['twitter_handle']);
                $this->profile->update_profile_completion($progress);

                redirect('/account/edit-profile/'.$progress);
            }
        }

    	if($stage_view == 4)
    	{
    		$stage_view = $this->profile->username();
    	}

    	$this->view = $this->data['stage_view'];
	}

	public function login()
	{
    	$identity    = $this->input->post('login_email');
    	$password 	 = $this->input->post('login_password');
    	$remember	 = $this->input->post('login_remember');

    	if(isset($remember))
    	{
    		$remember = true;
    	}
    	else
    	{
    		$remember = false;
    	}

		$this->ion_auth_model->login($identity, $password, $remember);
        redirect('/', 'refresh');
	}

	public function logout()
	{	
		$this->ion_auth->logout();
        redirect('/', 'refresh');
	}
}

/* End of file account.php */
/* Location: ./application/controllers/account.php */