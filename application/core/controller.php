<?php

class Controller {
	
	public $model;
	public $view;
	
	function __construct()
	{   
		$this->model = new Model();
		$this->view = new View();
	}
	
   

	// действие (action), вызываемое по умолчанию
	function action_index()
	{
    

     
     
		
	}


}

