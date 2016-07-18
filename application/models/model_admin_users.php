<?php

class Model_Admin_Users extends Model
{

  //все юзеры
    public function Users(){
       $arr_users=array();//Создаем массив всех категорий
       $sql="SELECT * FROM `users`" ; 
       $sqlresult=mysqli_query($this->db->link,$sql);
       while($result=mysqli_fetch_array($sqlresult, MYSQLI_ASSOC)){
        $arr_users[]= array( 
        	     'id'=>$result['id'],
                'login'=>$result['login'],
                'fam'=>$result['fam'],
                'name'=>$result['name'],
                'mail'=>$result['mail'],
                'polzovatel'=>$result['polzovatel'],
                'last_entrance'=>$result['last_entrance'], 
                'data_register'=>$result['data_register']
                  );
       }
       return $arr_users;
   }
   
   //редактирование юзеров
	 public function UsersEdit($id){
       $arr_users_edit=array();//Создаем массив всех категорий
       $sql="SELECT * FROM `users` where id=".$id; 
       $sqlresult=mysqli_query($this->db->link,$sql);
       while($result=mysqli_fetch_array($sqlresult, MYSQLI_ASSOC)){
        $arr_users_edit[]= array( 
                'login'=>$result['login'],
                'fam'=>$result['fam'],
                'name'=>$result['name'],
                'mail'=>$result['mail'],
                'polzovatel'=>$result['polzovatel']
                
                  );
       }
       return $arr_users_edit;
   }

//
public function UsersEditGo($id,$ed_login,$ed_name,$ed_fam,$ed_mail,$polzovatel){
       $ed_name = mysqli_real_escape_string($this->db->link, $ed_name);
        $ed_fam = mysqli_real_escape_string($this->db->link, $ed_fam);

       $sql="UPDATE `users` SET  `login`='$ed_login', `fam`='$ed_fam', `name`='$ed_name', `mail`='$ed_mail' , `polzovatel`='$polzovatel' where id='$id'";
       mysqli_query($this->db->link,$sql);
       header('Refresh: 1; url='.$_SERVER['REQUEST_URI']);
        return true;
    }

 //удалить юзеров
  public function UserDelete($id){
    mysqli_query($this->db->link,"DELETE FROM `users` where id='$id'");
    header('Refresh: 1; url='.$_SERVER['REQUEST_URI']);
     return true;
  }
  
  //проверка существующего юзера
  public function UserProverkaLogina($login){
      $sqlresult=mysqli_query($this->db->link, "SELECT * FROM `users` ");
        foreach ($sqlresult as $login_proverka) {
          if ($login_proverka['login'] == $login){ 
            return true;    
         }
      } 
    }   

//регестрация юзера
public function UserRegistrationsLogina($name,$fam,$login,$passwd,$mail,$polzovatel){
                
        $passwd=password_hash( $passwd ,PASSWORD_DEFAULT ); //хешируем пароль
        $data=time();
        $sql_rusult="INSERT INTO `users` (`login`, `passwd`, `fam`, `name`, `mail`, `polzovatel`,`data_register`) VALUES ('$login', '$passwd', '$fam', '$name', '$mail', '$polzovatel',$data)";
        mysqli_query($this->db->link, $sql_rusult);
        header('Refresh: 1; url=/admin_users');
         return true;

}

}
	 
