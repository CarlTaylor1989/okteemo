<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

	public function index()
	{	
		$this->data['title'] = 'OKteemo';
		$this->data['body']	= 'home';
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */