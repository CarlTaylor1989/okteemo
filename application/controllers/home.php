<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

	public function index()
	{	
		$this->load->database();
		$this->load->library('form_validation');

		$this->data['title'] = 'Home';
		$this->data['body']	= 'home';

		if ($this->form_validation->run() == FALSE)
		{
			// Do not redirect
		}
		else
		{
			$this->load->view('formsuccess');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */