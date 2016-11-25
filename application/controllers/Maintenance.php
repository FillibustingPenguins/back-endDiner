<?php

require APPPATH . '/third_party/restful/libraries/Rest_controller.php';

class Maintenance extends Rest_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Menu');
                //$this->load->library(['curl', 'format', 'rest']);
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
        
        // Handle an incoming GET ... return 1 menu item
        //you would reference that with "backend/maintenance/item/id/6".
        function item_get()
        {
            $key = $this->get('id');
            $result = $this->menu->get($key);
            if ($result != null)
                $this->response($result, 200);
            else
                $this->response(array('error' => 'Menu item not found!'), 404);        
        }     

        // Handle an incoming POST - add a new menu item
        // If the item ID is passed in the payload, eg POST to "/maintenance"
        function index_post()
        {
            $key = $this->get('id');
            $record = array_merge(array('id' => $key), $_POST);
            $this->menu->add($record);
            $this->response(array('ok'), 200);
        }
        
        // Handle an incoming POST - add a new menu item
        // If the item ID is passed as part of the URI, eg POST to "/maintenance/item/id/123"
        function item_post()
        {
            $key = $this->get('id');
            $record = array_merge(array('id' => $key), $_POST);
            $this->menu->add($record);
            $this->response(array('ok'), 200);
        }
        
        // Handle an incoming PUT - update a menu item
        // PUT to "/maintenance" with the id passed in the payload, or a PUT to "/maintenance?id=123"
        function index_put()
        {
            $key = $this->get('id');
            $record = array_merge(array('id' => $key), $this->_put_args);
            $this->menu->update($record);
            $this->response(array('ok'), 200);
        }
        
        function item_put()
        {
            $key = $this->get('id');
            $record = array_merge(array('id' => $key), $this->_put_args);
            $this->menu->update($record);
            $this->response(array('ok'), 200);
        }

        // Handle an incoming DELETE - delete a menu item
        // DELETE to "/maintenance/item/id/123" with
        function index_delete()
        {
            $key = $this->get('id');
            $this->menu->delete($key);
            $this->response(array('ok'), 200);
        }
        
        function item_delete()
        {
            $key = $this->get('id');
            $this->menu->delete($key);
            $this->response(array('ok'), 200);
        }
}

