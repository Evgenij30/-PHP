<?php

class Controller_Registrations extends Controller
{
    function __construct()
	{
		$this->model = new Model_Registrations();
		$this->view = new View();
	}
	
	
	
       
       function action_index()
	{ 
      $login=trim(strip_tags($_POST['login']));
      $name=trim(strip_tags($_POST['name']));
      $fam=trim(strip_tags($_POST['fam']));
      $passwd=trim(strip_tags($_POST['passwd']));
      $mail=trim(strip_tags($_POST['mail']));
      $auth=trim(strip_tags($_POST['auth']));

// регестрация нового пользователя
if ($auth){
	$proverka_logina=$this->model->UserProverkaLogina($login);// проверяем логин

	//проверка логина перед регистрацией  
	if($proverka_logina==false){
		if ( preg_match_all("/[а-яa-z]/i",$name) && preg_match("/[a-zа-я]/i",$fam) && $name !="" && $fam !=""){ //проверка имя и фам
			  if ( preg_match("/[a-z0-9]$/i",$login) && $login !=""){ //проверка логина
			  	   if ( preg_match("/[a-z0-9,(,),%,@]{8,}/i",$passwd) && $passwd !=""){ //проверка пароля на вводимость
                            if (preg_match("/^([a-z0-9_\.-]+)@([a-z0-9_\.-]+)\.([a-z\.]{2,6})$/",$mail) && $mail !="" ){ 
                               $proverka_ok="ok";
                            }
                            else $data['err']='<p style="color:red">Заполните поле имейл к примеру mail@list.ua</p>';
                      }
			  	   else $data['err']='<p style="color:red">Заполните поле пароль, используйте англ буквы и цифры можно использовать спец символы @,(,),%,*.Минимум 8 символов </p>';
			  }
              else $data['err']='<p style="color:red">Заполните поле логин, используйте англ буквы и цифры</p>';
		} 
		else $data['err']='<p style="color:red">Заполните поле имя и фамилию используйте только буквы</p>';   
	}
	else $data['err']='<p style="color:red">Ошибка такой логин существует введите другой логин</p>';

//если удачно прошла проверку то регестрируем пользователя
if ($proverka_ok){
		$data['RegLogUser'] = $this->model->UserRegistrationsLogina($name,$fam,$login,$passwd,$mail);
	}
}


		$this->view->generate('registrations_view.php','registrations_view.php',$data);
	   
	}
		

}

