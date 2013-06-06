<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends MY_Controller {

	public function index()
	{	
		//$this->load->database();
		$this->data['title'] = 'Account';
		$this->data['body']	= 'account';
	}

	public function edit_profile()
	{
		if (!$this->ion_auth->logged_in())
		{
      		redirect('/', 'refresh');
    	}
		$this->load->database();
		$this->data['title'] = 'Edit your profile';
		$this->data['body']	= 'account-profile';
	}

	public function login()
	{
    	$email       = $this->input->post('login_email');
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

		$this->ion_auth->login($email, $password, $remember);
        redirect('/');
	}

	public function logout()
	{	
		$this->ion_auth->logout();
        redirect('/');
	}
}

/* End of file account.php */
/* Location: ./application/controllers/account.php */