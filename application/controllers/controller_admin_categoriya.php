<?php

class Controller_Admin_categoriya extends Controller
{

	function __construct()
	{
		$this->model = new Model_Admin_Categoriya();
		$this->view = new View();
	}
	
	
       
       function action_index()
	{ 
		  
		         $new_categorya = trim(strip_tags($_POST["new_categorya"]));
                 $sub_categoriya = trim(strip_tags($_POST["sub_categoriya"]));
                 $create_categoriya = trim(strip_tags($_POST["create_categoriya"]));
                 $id_categ = trim(strip_tags($_POST["categ"]));
                 $delete = trim(strip_tags($_POST["delete"]));
                 $edit = trim(strip_tags($_POST["edit"]));
                 $name_category = trim(strip_tags($_POST["name_category"]));
                 $edit_categoriya = trim(strip_tags($_POST["edit_categoriya"]));
                 $cat_edit_id = trim(strip_tags($_POST["cat_edit"]));

                 //получаем все категории
                 $data['CategoryGoods'] = $this->model->CategoryGoods();

                 //Добавление категории
                 if ($create_categoriya){
	            $data['create_categoriya'] = $this->model->AddCategoryGoods($new_categorya,$sub_categoriya);
                    }
                 
                 //если приходит категория для удаления
                if($delete){
                   $data['delete'] = $this->model->DeleteCategoryGoods($id_categ);
                   }

                 //
                if($edit){
                 $data['edit'] = $this->model->EditCategoryGoodsForm($id_categ);
                 }

                 //Редактирование категорий  
                if ($edit_categoriya){
                  $data['edit_categoriya'] = $this->model->EditCategoryGoods($cat_edit_id,$new_categorya,$sub_categoriya);
                 }
		
                	
		$this->view->generate('admin/admin_categoriya_add_view.php', 'admin/template_admin_view.php',$data);
	   
	}

	function action_add()
	{ 
		         
	   
	}
		

}

