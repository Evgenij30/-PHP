<?php

class Controller_Categoriya extends Controller
{

	function __construct()
	{
		$this->model = new Model_Categoriya();
		$this->view = new View();
	}
	
	
       
       function action_index()
	{ 
		  // вывод боковой категории 
      $data['cat'] = $this->model->CategoryGoods();

    //если пришла категория то выводим товары
		 $id = trim(strip_tags($_GET["id"]));
		 $sort = trim(strip_tags($_GET["sort"]));

       if ($id){
       // сортируем товары если нужно
        
       	switch ($sort) {
    case 'name_ads':
        $sort="ORDER BY `name` ";
        break;
    case 'price_ads':  
        $sort="ORDER BY `price` ASC ";
        break;
       default:
       echo $sort=""; //сотрировка по умолчанию
       
      }
       	$data['cat_id'] = $this->model->PokazCategoryGoods($id,$sort);
       	echo $sort;
       }

       //если пришел фильтр
       if ($_GET['filter']){
       	  
          $data['get_filter'] = $this->model->get_data_filter();		
		  $this->view->generate('category_view.php', 'template_view.php', $data);
       }
       else{ 
		//$data = $this->model->get_data();		
		       $this->view->generate('category_view.php', 'template_view.php',$data);
	      } 
	}
	
}

