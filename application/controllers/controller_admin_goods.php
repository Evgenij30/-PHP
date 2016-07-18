<?php

class Controller_Admin_Goods extends Controller
{

	function __construct()
	{
		$this->model = new Model_Admin_Goods();
		$this->view = new View();
	}
	
	
       
       function action_index()
  { 
    $id_delete = trim(strip_tags($_GET["id_delete"])); 

     //Удаление товара
      if ($id_delete){
        $this->model->DeleteGoods($id_delete);  
      }

    //Пост страничная навигация
    $num = 5; // Переменная хранит число сообщений выводимых на станице 
    $page = $_GET['page']; // Извлекаем из URL текущую страницу 
    $result=$this->model->Goodsacount();//считаем кол-во страниц
    $total = intval(($result[0] - 1) / $num) + 1; // Находим общее число страниц 
    $page = intval($page); // Определяем начало сообщений для текущей страницы 
    // Если значение $page меньше единицы или отрицательно переходим на первую страницу 
    // А если слишком большое, то переходим на последнюю 
    if(empty($page) or $page < 0) $page = 1; 
    if($page > $total) $page = $total; 
    $start = $page * $num - $num; // Вычисляем начиная к какого номера // следует выводить сообщения 
    $data['Goods'] = $this->model->Goodsstart($start,$num);  //выводим на страницу товары
    $data['total']=$total; //выводим количество 
    $data['page']=$page; //выводим страницу 
    //Конец Пост страничная навигация

    $this->view->generate('admin/admin_goods_view.php', 'admin/template_admin_view.php',$data);     
     
  }

	function action_add()
	{ 
		
      $priceOfGood = trim(strip_tags($_POST["price"]));
      $raitingOFGood = trim(strip_tags($_POST["raiting"]));
      $categoriya = trim(strip_tags($_POST["categoriya"]));
      $nameOfGood = trim(strip_tags($_POST["nameOfGood"]));
      $edit_id = (trim(strip_tags($_POST["edit_id"]))); 	
      $promoOfGood = (trim(strip_tags($_POST["promo"]))) ? 1 : 0;
      $text_goods = (trim(strip_tags($_POST["editor1"])));
      $addGood = (trim(strip_tags($_POST["addGood"])));


      $myfile_name = time().".png";
      $myfile_file=$_FILES["testfile"]["tmp_name"];
      $myfile_type=$_FILES["testfile"]["type"];
      $myfile_size=$_FILES["testfile"]["size"];
      $myfile_file_name=$_FILES["testfile"]["file_name"];
      $delete_tovar_id = (trim(strip_tags($_GET["delete_tovar"])));

      $data['CategoryGoods'] = $this->model->CategoryGoods();

//проверка перед добавлением товара 
if ($addGood){
	if (preg_match("/[a-z0-9а-я]/i",$nameOfGood) && $nameOfGood!=""){ 
          if(preg_match("/[0-9]$/i",$priceOfGood)){ 
                
                if ( preg_match("/[0-9,]$/i",$raitingOFGood) || $raitingOFGood==""){

                	//if (preg_match_all('/(jpeg)/',$myfile_type) && $myfile_size< '200000'){                       
                        $data['goods_add']=$this->model->addGood($nameOfGood,$text_goods,$priceOfGood,$raitingOFGood,$promoOfGood,$myfile_name,$myfile_file,$myfile_type,$myfile_size,$categoriya);
                	//}
                //	else $data['err']="Ошибка фотографии !!  Прикрепите формат фото jpeg,PNG,ipg или фото не больше 2000 кб ";

                }
                else $data['err']="Ошибка!! Поле рейтинг используйте только цифры ";
            }
           else $data['err']="Ошибка!! Поле цена используйте только цифры два знака после точки ";
	}
	else $data['err']="Ошибка!! Поле имя товара пустое или используйте текст или цифры!!";


}
//Вытягиваем товар из базы для редактирования 
if ($edit_tovar){
   $goods1->EditGoodForma($edit_tovar_id);
}
//Функция редактирвоания товара 
if ($edit_id){
   $goods1->EditGood($edit_id,$nameOfGood,$priceOfGood,$raitingOFGood,$categoriya);
}

//Функция удаления товара
if($delete_tovar_id){
  $goods1->DeleteGoods($delete_tovar_id);
 }
 

$this->view->generate('admin/admin_goods_add_view.php', 'admin/template_admin_view.php',$data);     
	   
	}

    function action_edit()
    { 

      $editGood = trim(strip_tags($_POST["editGood"]));
      $priceOfGood = trim(strip_tags($_POST["price"]));
      $raitingOFGood = trim(strip_tags($_POST["raiting"]));
      $categoriya = trim(strip_tags($_POST["categoriya"]));
      $nameOfGood = trim(strip_tags($_POST["nameOfGood"]));
      $edit_idgoods = trim(strip_tags($_POST['edit_idgoods'])); 
      $promoOfGood = (trim(strip_tags($_POST["promo"]))) ? 1 : 0;
      $edit_tovar_id = (trim(strip_tags($_GET['id_edit'])));

      //Редактирование товара попадание в форму
      if ($edit_tovar_id){ 
        $data['GoodsEditForm'] =$this->model->EditGoodForma($edit_tovar_id);
      }
      
      //Редактирование товара
      if ($editGood){
         $data['GoodsEdit'] =$this->model->EditGood($edit_idgoods,$nameOfGood,$priceOfGood,$raitingOFGood,$categoriya);
      }

      // получение всех категорий
       $data['CategoryGoods'] = $this->model->CategoryGoods();
     
      $this->view->generate('admin/admin_goods_edit_view.php', 'admin/template_admin_view.php',$data);      
      }

}

