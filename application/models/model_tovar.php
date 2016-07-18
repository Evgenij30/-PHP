<?php

class Model_Tovar extends Model
{
	

   //Метод показа товара
  public function PokazGoods($id_tovara){
       $sql="SELECT * FROM `goods` where id=".$id_tovara; 
       $sqlresult=mysqli_query($this->db->link,$sql);
       $result_prosmotr_goods=mysqli_fetch_array($sqlresult, MYSQLI_ASSOC);
       return  $result_prosmotr_goods;

  }
  
  // вывод товаров категории 
  public function CategoryGoods(){
       $arr_cat=array();//Создаем массив всех категорий
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



}
