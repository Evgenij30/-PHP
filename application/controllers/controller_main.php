<?php

class Controller_Main extends Controller
{

	function __construct()
	{
		
		$this->model = new Model_Main();
		$this->view = new View();
	}

	function action_index()
	{	
       $data['goods'] = $this->model->PokazCategoryGoods(); //получаем все товары
       $data['cat'] = $this->model->CategoryGoods();// получаем все категории
	
	   $this->view->generate('main_view.php', 'template_view.php',$data);
	}
	
}