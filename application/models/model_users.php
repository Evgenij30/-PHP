<?php

class Model_Admin_Users extends Model
{
    public function Users(){
       $arr=array();//Создаем массив всех категорий
       $sql="SELECT * FROM `users`" ; 
       $sqlresult=mysqli_query($this->db->link,$sql);
       while($result=mysqli_fetch_array($sqlresult, MYSQLI_ASSOC)){
        $arr[]= array( 
                'login'=>$result['login'],
                'fam'=>$result['fam'],
                'name'=>$result['name'],
                'mail'=>$result['mail'],
                'polzovatel'=>$result['mail'],
                'last_entrance'=>$result['last_entrance'], 
                'data_register'=>$result['data_register']
                  );
       }
       return $arr;
   }
	 
}