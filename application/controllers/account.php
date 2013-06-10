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
    	$this->load->model('api');
    	$this->data = array(
    		'title' 			=> 'Edit your profile',
    		'body'				=> 'account-profile',
    		'username'			=> $this->profile->username(),
    		'profile_complete' 	=> $this->profile->check_profile_complete(),
    		'stage_view'		=> 'account/profile_complete/stage_'.$this->profile->check_profile_complete(),
    	);

    	if($stage_view == 1)
    	{
    		$this->view = 'account/profile_complete/stage_1';
    	}
    	else if($stage_view == 2)
    	{
    		$this->view = 'account/profile_complete/stage_2';
    	}
    	else if($stage_view == 3)
    	{
    		$this->view = 'account/profile_complete/stage_3';
    	}
    	else if($stage_view == 4)
    	{
    		$stage_view = $this->profile->username();
    	}

    	if($this->uri->segment(3) != $stage_view)
    	{
    		redirect('/account/edit-profile/'.$stage_view, 'refresh');
    	}
	}

	public function api_test()
	{
		$this->load->model('api');
        $api_call = $this->api->player();
		$this->data = array(
    		'title' 			=> 'Edit your profile',
    		'body'				=> 'account-profile',
    		'summoner_name'		=> $api_call['summoner_name'],
    		'icon_id'			=> $api_call['icon_id']
    	);
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