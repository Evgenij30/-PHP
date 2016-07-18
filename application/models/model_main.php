<?php

class Model_Main extends Model
{
 
 public function PokazCategoryGoods(){
       $arr_pokaz_goods=array();//Создаем массив всех категорий
       $sql_tovar="SELECT * FROM `goods`" ; 
       $sqlresult_sql_tovar=mysqli_query($this->db->link,$sql_tovar);
       while($result=mysqli_fetch_array($sqlresult_sql_tovar, MYSQLI_ASSOC)){
        $arr_pokaz_goods[]= array( 
                'id'=>$result['id'],
                'name'=>$result['name'],
                'price'=>$result['price'],
                'raiting'=>$result['raiting'],
                'timestamp'=>$result['timestamp'],
                'promo'=>$result['promo'],
                 'photo_smol'=>$result['photo_smol']
                 
                  );
       }
       return $arr_pokaz_goods;

   }

}



