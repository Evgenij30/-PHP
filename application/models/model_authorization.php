<?php

class Model_Authorization extends Model
{

    //Проверка на правильный ввод пароля
public function UserHash($login,$passwd){
  $sql=mysqli_query($this->db->link, "SELECT passwd FROM `users` where login='$login'");
    $result=mysqli_fetch_array($sql);
     $hesh = password_verify($passwd, $result['passwd']);
       if ($hesh==true){    
          return true;          
        } 
 }

 //Функция ошибки при вводе пароля     
protected function errors($login){
   $sql=mysqli_query($this->link, "SELECT * FROM `users` where login='$login'");
    $result=mysqli_fetch_array($sql);
    if ($result['error']<=2){
       $icount=$result['error']+1;
       mysqli_query($this->link,"UPDATE  `users` SET  `error`='$icount' where login='$login'");
      }
     if ($result['error']==3){
      $_SESSION['error']="ошибка более 3-х раз введен неверно пароль !! ждем 60 сек ";
      $_SESSION['time']=time()+60;
     }    
   //var_dump($result);
  
}

  
   //Авторизация пользователя 
  public function UserAvtorizations($login) {
          
              $result_idpolzovatelyaa=mysqli_query($this->db->link, "SELECT * FROM `users` where login='$login'");
              $result2=mysqli_fetch_array($result_idpolzovatelyaa, MYSQLI_ASSOC);
              $last_entrance=$result2['new_time']; //время последнего входа
              $time=time(); //текущее время
              mysqli_query($this->db->link,"UPDATE  `users` SET  `last_entrance`='$last_entrance',`error`='0',`new_time`='$time' where login='$login'");//если успешно обнуляем ерроры логина и добавляем врямя последнего входа 
               
                if($result2['polzovatel']==1){
                     $_SESSION['login_admin']=$login;  // Авторизация админа
                     header('Refresh:0; url=/admin'); 
                     //header('Refresh: 0; url=index.php' ); 
                   }
                else {
                      $_SESSION['login_polzovatel']=$login; //Авторизация пользователя 
                      header('Refresh:0; url=/'); 
                  }
  }
            
              
   //Проверка существует в базе пользователь с таким логином 
public function UserProverkaLogina($login,$link){
  $sqlresult=mysqli_query($link, "SELECT * FROM `users` ");
   foreach ($sqlresult as $login_proverka) {
     if ($login_proverka['login'] == $login){ 
        return true;    
      }
    } 
 }   



}