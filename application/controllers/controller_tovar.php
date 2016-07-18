<?php

class Controller_Tovar extends Controller
{

	function __construct()
	{
		$this->model = new Model_Tovar();
		$this->view = new View();
	}
	
	function action_index()
	{ 
		 //вывод категорий в товаре 
         $data['cat'] = $this->model->CategoryGoods();

         //если пришел товар то выводим из таблицы товара 
	     $id_tovara = trim(strip_tags($_GET["id_tovara"]));
	     if ($id_tovara){
	        $data['tovar'] = $this->model->PokazGoods($id_tovara);
	     }

	  //корзина  маленькая
      $zakaz = trim(strip_tags($_GET["zakaz"]));
      if($zakaz){
	    if (isset($_SESSION["basket"])){ 
           $arr_card =unserialize($_SESSION["basket"]);
          }else { 
           $arr_card=[];
          }

 if ( array_key_exists ($id_tovara,$arr_card) ){
     	$arr_card[$id_tovara]++;
     }
     else {
     	$arr_card[$id_tovara]=1;
     }
     
     if($arr_card){
     	 $_SESSION["basket"]=serialize($arr_card);
     }
     
    }
     //конец корзина  маленькая
		$this->view->generate('tovar_view.php', 'template_view.php', $data);
	}

	
}
