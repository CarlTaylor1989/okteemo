<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends MY_Controller {

	public function index()
	{	
		//$this->load->database();
		$this->data['title'] = 'Account';
		$this->data['body']	= 'account';
	}

	public function create_profile()
	{
		$this->data['title'] = 'Create your profile';
		$this->data['body']	= 'account';
	}
}

/* End of file account.php */
/* Location: ./application/controllers/account.php */