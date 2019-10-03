<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Home';// wajib
		$config['css'] = null;//opsional file di folder view/css
		$config['view'] = 'home';//wajib file di folder view
		$config['modal'] = null;//opsional file di folder view/modal
		$config['js'] = null;//opsional file di folder view/js
		$this->func->view($config,$data);
	}

}

/* End of file Home.php */
/* Location: .//F/xampp/htdocs/GitHub/App-Sistem-Informasi/app/controllers/Home.php */