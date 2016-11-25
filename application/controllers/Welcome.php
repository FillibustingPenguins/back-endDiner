<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application {

	public function index()
	{
		$this->load->helper('formfields');
		$this->data['title'] = 'Diner (Server)';
		$this->data['pagebody'] = 'Welcome to the Diner server!';
		$this->render();
	}

}
