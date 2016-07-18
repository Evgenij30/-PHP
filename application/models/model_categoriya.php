<?php

class Model_Categoriya extends Model
{

//Вывод всех категорий
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
   
   // все категории
   public function PokazCategoryGoods($id,$sort){
       $arr_pokaz_goods=array();//Создаем массив всех категорий
       $sql_tovar="SELECT * FROM `goods` where `categoriya`='$id' $sort " ;
       $sqlresult_sql_tovar=mysqli_query($this->db->link,$sql_tovar);
       while($result=mysqli_fetch_array($sqlresult_sql_tovar, MYSQLI_ASSOC)){
        $arr_pokaz_goods[]= array( 
                'id'=>$result['id'],
                'name'=>$result['name'],
                'price'=>$result['price'],
                'raiting'=>$result['raiting'],
                'timestamp'=>$result['timestamp'],
                'promo'=>$result['promo'],
                 'photo_smol'=>$result['photo_smol'],
                 'photo_big'=>$result['photo_big']

                  );
       }
       return $arr_pokaz_goods;

   }

    //Создание категории
  public function AddCategoryGoods($name,$id_sub){
     if( preg_match("/[a-z0-9а-я]$/i",$name) && $name !=''){
           $query="INSERT INTO `categoriya` (`name`, `id_sub`) VALUES (?,?);";
           $stmt = mysqli_prepare($this->db->link, $query);
           mysqli_stmt_bind_param($stmt, 'si', $name, $id_sub);
           mysqli_stmt_execute($stmt);
            echo "Категория $name удачно добавленна <br>";
            mysqli_stmt_close($stmt);
         }
       else echo "Категория не добавленна <br>";
      } //конец метода AddCategoryGoods

// удалить категории
 public function DeleteCategoryGoods($id_categ){
     mysqli_query($this->db->link,"DELETE FROM `categoriya` where id='$id_categ'");
    } // конец метода DeleteCategoryGoods


// редактирование категории формы 
 public function EditCategoryGoodsForm($id_categ){
           $sqlresult=mysqli_query($this->db->link,"SELECT name FROM `categoriya` where id='$id_categ'");
           $result=mysqli_fetch_array($sqlresult, MYSQLI_ASSOC);
           return $result['name'];
         }
  // основная категории 
 public function CategoryGoodsOsnovnaya(){
       $arr_cat=array();//Сохдаем массив всех категорий
       $sql_categoriya="SELECT * FROM `categoriya` where `id_sub`=0" ; 
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
 
 // категория суб 
 public function CategoryGoodsSub($id_sub){
       $arr_cat=array();//Создаем массив всех субкатегорий
       $sql_categoriya="SELECT * FROM `categoriya` where `id_sub`=".$id_sub  ; 
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


