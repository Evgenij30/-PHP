<?php

class Controller_Admin_Users extends Controller
{

	function __construct()
	{
		$this->model = new Model_Admin_Users();
		$this->view = new View();
	}
	
	
       
       function action_index()
	{ 
		
		$edit = trim(strip_tags($_POST["edit"]));
		$id = trim(strip_tags($_POST["id_users"]));
		$delete = trim(strip_tags($_POST["delete"]));

    //переадресация на редактирование юзеров
        if ($edit){
              header("Location:/admin_users/edit?id=".$id);
        }
    //удаление юзеров
        if ($delete ){
        	$data['delete']=$this->model->UserDelete($id);
        }

    //Получаем всех юзеров    
		$data['users']=$this->model->Users();
		$this->view->generate('admin/admin_users_view.php', 'admin/template_admin_view.php',$data);
	   
	}
	function action_edit()
	{ 
	    	$id = trim(strip_tags($_GET["id"]));
	    	$editUsers = trim(strip_tags($_POST["editUsers"]));      
        $ed_login = trim(strip_tags($_POST["ed_login"]));
        $ed_name = trim(strip_tags($_POST["ed_name"]));
        $ed_fam = trim(strip_tags($_POST["ed_fam"]));
        $ed_mail = trim(strip_tags($_POST["ed_mail"]));
        $polzovatel = trim(strip_tags($_POST["polzovatel"]));

    //получение юзеров
		if ($id){
			$data['user_edit']=$this->model->UsersEdit($id);
		}
    
    //редактирование юзеров
    if ($editUsers){
        	$data['UsersEditGo'] = $this->model->UsersEditGo($id,$ed_login,$ed_name,$ed_fam,$ed_mail,$polzovatel);
        }
		
		$this->view->generate('admin/admin_users_edit_view.php', 'admin/template_admin_view.php',$data);
	   
	}
		function action_add()
	{ 
	    $auth = trim(strip_tags($_POST["auth"]));
      $name = trim(strip_tags($_POST["name"]));
      $fam = trim(strip_tags($_POST["fam"]));
      $login = trim(strip_tags($_POST["login"]));
      $passwd = trim(strip_tags($_POST["passwd"]));
      $mail = trim(strip_tags($_POST["mail"]));
      $polzovatel = trim(strip_tags($_POST["polzovatel"]));

    //проверка юзера на существование логина  
    if ($auth){
    	$data['auth']=$this->model->UserProverkaLogina($login);
    	
      
    if ($data['auth']==false){
        $data['new_users_adm']=$this->model->UserRegistrationsLogina($name,$fam,$login,$passwd,$mail,$polzovatel);
         }
        else $data['err']="Такой логин существует придумай другой логин";
       
    }
    
      $this->view->generate('admin/admin_users_add_view.php', 'admin/template_admin_view.php',$data);

	}	

}

