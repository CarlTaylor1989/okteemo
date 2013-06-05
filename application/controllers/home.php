<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

	public function index()
	{	
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('registration');

		$this->data['form_id'] = array(
			'id' => 'home_reg_form'
		);
		$this->data['title'] = 'Home';
		$this->data['body']	= 'home';

		$this->form_validation->set_rules('reg_username', 'Username', 'required|callback_username_check');
		$this->form_validation->set_rules('reg_email', 'Email', 'required|valid_email|callback_email_check');
		$this->form_validation->set_rules('reg_password', 'Password', 'required|matches[reg_conf_password]');
		$this->form_validation->set_rules('reg_conf_password', 'Password Confirmation', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			// Do not redirect
		}
		else
		{
			$this->registration->insert_entry();
			redirect('account/edit-profile');
		}
	}

	public function username_check($username)
	{
		if($this->registration->username_available($username))
	    {
	        return true;
	    }
	    else
	    {
	        $this->form_validation->set_message('username_check', 'Username already exists.');
	        return false;
	    }
	}

	public function email_check($email)
	{
		if($this->registration->email_available($email))
	    {
	        return true;
	    }
	    else
	    {
	        $this->form_validation->set_message('email_check', 'E-mail address already exists.');
	        return false;
	    }
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */