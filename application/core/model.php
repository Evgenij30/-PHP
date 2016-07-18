<?php

class Model
{
	public $db;
	public $query;
	/*
		Модель обычно включает методы выборки данных, это могут быть:
			> методы нативных библиотек pgsql или mysql;
			> методы библиотек, реализующих абстракицю данных. Например, методы библиотеки PEAR MDB2;
			> методы ORM;
			> методы для работы с NoSQL;
			> и др.
	*/
	function __construct(){
		$this->db = new Db();
	}
	// метод выборки данных
	public function get_data()
	{
		//echo "ок";
	}


     public function CategoryGoods(){
       $arr_cat1=array();//Создаем массив всех категорий
       $sql_categoriya="SELECT * FROM `categoriya`" ; 
       $sqlresult_categoriya=mysqli_query($this->db->link,$sql_categoriya);
       while($result=mysqli_fetch_array($sqlresult_categoriya, MYSQLI_ASSOC)){
        $arr_cat[]= array( 
                'id'=>$result['id'],
                'name'=>$result['name'],
                'id_sub'=>$result['id_sub']
                  );
       }
       return $arr_cat;
   }
   public function UserAuth() {
    
	 	if (!$_SESSION['login_admin']){
	 		header("Location: /authorization");
	 	}
	 }
}

