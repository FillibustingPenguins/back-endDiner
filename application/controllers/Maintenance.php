<?php

require APPPATH . '/third_party/restful/libraries/Rest_controller.php';

class Maintenance extends Rest_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Menu');
	}

	// Handle an incoming GET ... return a menu item or all of them
        function index_get()
        {
            $key = $this->get('code');
            if (!$key)
            {
                $this->response($this->menu->all(), 200);
            } else
            {   
                $result = $this->menu->get($key);
                if ($result != null)
                    $this->response($result, 200);
                else
                    $this->response(array('error' => 'Menu item not found!'), 404);
            }
        }
}

