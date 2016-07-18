<?php

class Controller_Admin extends Controller
{

	function __construct()
	{
		$this->model = new Model_Admin();
		$this->view = new View();
	}
	
	
       
       function action_index()
	{ 	
        //$this->model->UserAuth();
		//$data = $this->model->get_data();		
		$this->view->generate('admin/admin_view.php', 'admin/template_admin_view.php',$data);
	   
	}
		

}

