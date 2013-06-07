<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends MY_Controller {

	public function index()
	{	
		$this->data['title'] = 'Account';
		$this->data['body']	= 'account';
	}

	public function edit_profile()
	{
		// is user logged in? if not, redirect them to index
		if (!$this->ion_auth->logged_in())
		{
      		redirect('/', 'refresh');
    	}

    	// load profile details
    	$this->load->model('profile');
    	$this->data = array(
    		'title' 			=> 'Edit your profile',
    		'body'				=> 'account-profile',
    		'profile_complete' 	=> $this->profile->check_profile_complete()
    	);

    	if($this->data['profile_complete'] == 4)
    	{
    		$this->data['profile_complete'] = 'complete';
    	}

    	// checks to see if profile is on the correct stage
    	if($this->uri->segment(3) != $this->data['profile_complete'])
    	{
    		redirect('/account/edit-profile/'.$this->data['profile_complete'], 'refresh');
    	}
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