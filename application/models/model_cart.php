<?php

class Model_Cart extends Model
{
  
  //редактирование количества товара в корзине
	function count_cart_edit($id,$count_cart_edit){
    	$arr_card =unserialize($_SESSION["basket"]);
    	$arr_card[$id]=$count_cart_edit;
    	$_SESSION["basket"]=serialize($arr_card);
        header("Location: ".$_SERVER['HTTP_REFERER']);
   }

  //удаление одной позиции в корзине
   function del_card_id($id){
      $arr_card =unserialize($_SESSION["basket"]);
   	  unset($arr_card[$id]);
      $_SESSION["basket"]=serialize($arr_card);
   	  header("Location: ".$_SERVER['HTTP_REFERER']);
   
   }

   //очистка корзины
    function del_card(){
      unset($_SESSION["basket"]);   
      session_destroy();   
     header("Location: ".$_SERVER['HTTP_REFERER']);
   }

   // все товары
   public function Goods(){
        // $arr_goods=array();//Создаем массив всех категорий
       $sql_Goods="SELECT * FROM `goods`"; 
       $sqlresult_Goods=mysqli_query($this->db->link,$sql_Goods);
       while($result=mysqli_fetch_array($sqlresult_Goods, MYSQL_ASSOC)){
        $arr_goods[]= array( 
                'id'=>$result['id'],
                'name'=>$result['name'],
                'raiting'=>$result['raiting'],
                'timestamp'=>$result['timestamp'],
                'promo'=>$result['promo'],
                'photo_smol'=>$result['photo_smol'],
                'photo_big'=>$result['photo_big'],
                'categoriya'=>$result['categoriya'],
                'price'=>$result['price']
                  );
       }
       return $arr_goods;
   }
 
  // заказ товара 
  public function Orders($name_orders,$phone_orders,$mail_orders,$id_tovara_count,$summa_tovara_orders){

            $name_orders = mysqli_real_escape_string($this->db->link, $name_orders);//исправляем кирилицу
            $time=time(); //временная метка

            $query = "INSERT INTO `orders`  (`name_orders`, `phone_orders`, `mail_orders`, `id_tovara_count`, `summa_orders`, `data`) VALUES ( ?,?,?,?,?,?);";
            $stmt = mysqli_prepare($this->db->link, $query);
            mysqli_stmt_bind_param($stmt, 'sssssi', $name_orders, $phone_orders, $mail_orders, $id_tovara_count,$summa_tovara_orders,$time);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            //$id=mysql_insert_id($stmt);
            //var_dump($id) ;
            
            header('Refresh: 2; url=/cart/mail?name='.$name_orders.'&phone='.$phone_orders.'&mail='.$mail_orders.'&summa='.$summa_tovara_orders);
              return true; 

  }
}
