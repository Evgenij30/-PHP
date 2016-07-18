<?php

class Controller_Authorization extends Controller
{
    function __construct()
	{
		$this->model = new Model_Authorization();
		$this->view = new View();
	}
	
 
       function action_index()
	{ 
		 
		
     if ($_POST){ 
		 $login=trim(strip_tags($_POST['login']));
         $passwd=trim(strip_tags($_POST['passwd']));
         $auth=trim(strip_tags($_POST['auth']));
         $exit=trim(strip_tags($_POST['exit']));
      
     }
      
      //Проверка авторизации
     if ($auth){ 
	      $UserHash = $this->model->UserHash($login,$passwd); //проверяем логин пароль
	    
	      if ($UserHash==true){ //если удачно создаем сессии
                 $this->model->UserAvtorizations($login);//
	      }
	      else $data['err']='<p style="color:red">Неправильный логин или пароль.Попробуйте еще раз.</p>';
        }
         
        	
		$this->view->generate('authorization_view.php','authorization_view.php',$data);
	   
	}
		

}

