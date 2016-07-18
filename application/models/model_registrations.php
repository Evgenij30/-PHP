<?php

class Model_Registrations extends Model
{
 // регестрация логина
    public function UserProverkaLogina($login){
      $sqlresult=mysqli_query($this->db->link, "SELECT * FROM `users` ");
        foreach ($sqlresult as $login_proverka) {
          if ($login_proverka['login'] == $login){ 
            return true;    
         }
      } 
    }   

public function UserRegistrationsLogina($name,$fam,$login,$passwd,$mail){
                
        $passwd=password_hash( $passwd ,PASSWORD_DEFAULT ); //хешируем пароль
        $data=time();
        $polzovatel="2"; //обычный пользователь
        $sql_rusult="INSERT INTO `users` (`login`, `passwd`, `fam`, `name`, `mail`, `polzovatel`,`data_register`) VALUES ('$login', '$passwd', '$fam', '$name', '$mail', '$polzovatel',$data)";
        mysqli_query($this->db->link, $sql_rusult);
        header('Refresh: 1; url=/authorization');
         return true;

}
                     
      
  



}