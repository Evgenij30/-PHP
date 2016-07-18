<?php

class Model_Admin_Categoriya extends Model
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

   public function PokazCategoryGoods($id){
       $arr_pokaz_goods=array();//Создаем массив всех категорий
       $sql_tovar="SELECT * FROM `goods` where `categoriya`='$id'" ; 
       echo $sql_tovar;
       $sqlresult_sql_tovar=mysqli_query($this->db->link,$sql_tovar);
       while($result=mysqli_fetch_array($sqlresult_sql_tovar, MYSQLI_ASSOC)){
        $arr_pokaz_goods[]= array( 
                'id'=>$result['id'],
                'name'=>$result['name'],
                'price'=>$result['price'],
                'raiting'=>$result['raiting'],
                'timestamp'=>$result['timestamp'],
                'promo'=>$result['promo'],
                 'photo'=>$result['photo']
                 
                  );
       }
       return $arr_pokaz_goods;

   }

    //Создание категории
  public function AddCategoryGoods($new_categorya,$sub_categoriya){
     if( preg_match("/[a-z0-9а-я]$/i",$new_categorya) && $new_categorya !=''){
           $query="INSERT INTO `categoriya` (`name`, `id_sub`) VALUES (?,?);";
           $stmt = mysqli_prepare($this->db->link, $query);
           mysqli_stmt_bind_param($stmt, 'si', $new_categorya, $sub_categoriya);
           mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            header('Refresh: 1; url='.$_SERVER['REQUEST_URI']);
           return true; 
         }
       else false;
      } //конец метода AddCategoryGoods

 //удаляем категорию товара
 public function DeleteCategoryGoods($id_categ){
     $sql="DELETE FROM `categoriya` where id='$id_categ'";
     mysqli_query($this->db->link,$sql);
     header('Refresh: 1; url='.$_SERVER['REQUEST_URI']);
      return true;
    } // конец метода DeleteCategoryGoods

 // Редактируем категорию товара
 public function EditCategoryGoods($cat_edit_id,$new_categorya,$sub_categoriya){
        if( preg_match("/[a-z0-9а-я]$/i",$new_categorya) && $new_categorya !=''){
           mysqli_query($this->db->link,"UPDATE `categoriya` SET `name`='$new_categorya',`id_sub`='$sub_categoriya' WHERE `id`='$cat_edit_id'");
           header('Refresh: 1; url='.$_SERVER['REQUEST_URI']);
                return true;
         }
        else echo "Категория не отредактированна <br>";
       }

 //Редактируем категорию товара      
 public function EditCategoryGoodsForm($id_categ){
           $sqlresult=mysqli_query($this->db->link,"SELECT * FROM `categoriya` where id='$id_categ'");
           $result=mysqli_fetch_array($sqlresult, MYSQLI_ASSOC);
           return $result;
         }

 // вывод основной категории товара
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

// вывод категорий суб 
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


