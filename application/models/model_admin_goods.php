<?php

class Model_Admin_Goods extends Model
{
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

  

  public function addGood($nameOfGood,$text_goods,$priceOfGood,$raitingOFGood,$promoOfGood,$myfile_name,$myfile_file,$myfile_type,$myfile_size,$categoriya){
           //move_uploaded_file($myfile_file,"images/img/".time().".png");//добавляем фото
             $file_smol="smol_".time().".png";
             $this->resize($myfile_file,"images/img/".$file_smol, 150, 120);
             $file_big="big_".time().".png";
             $this->resize($myfile_file,"images/img/".$file_big, 250, 300);
            
            $nameOfGood = mysqli_real_escape_string($this->db->link, $nameOfGood);
            $query = "INSERT INTO `goods`  (`name`,`text_goods`,`price`, `raiting`, `timestamp`, `promo`, `photo_smol`,`photo_big`,`categoriya`) VALUES ( ?,?,?,?,?,?,?,?,?);";
            $stmt = mysqli_prepare($this->db->link, $query);
            mysqli_stmt_bind_param($stmt, 'ssiiiissi', $nameOfGood,$text_goods, $priceOfGood, $raitingOFGood, time(),$promoOfGood,$file_smol,$file_big,$categoriya);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            header('Refresh: 1; url='.$_SERVER['REQUEST_URI']);
          return true; 
      
   }//Конец функции addgood

   

   //добавление товара в форму 
    public function EditGoodForma($edit_tovar_id){
       $sql_goods="SELECT * FROM `goods` where id=".$edit_tovar_id; 
       $sqlresult_goods=mysqli_query($this->db->link,$sql_goods);
       $result_edit_goods=mysqli_fetch_array($sqlresult_goods, MYSQLI_ASSOC);
       return  $result_edit_goods;

    }

   //Редактирование товара
   public function EditGood($edit_idgoods,$nameOfGood,$priceOfGood,$raitingOFGood,$categoriya){
       $nameOfGood = mysqli_real_escape_string($this->db->link, $nameOfGood);
       $sql="UPDATE `goods` SET  `name`='$nameOfGood', `price`='$priceOfGood', `raiting`='$raitingOFGood', `categoriya`='$categoriya' where id='$edit_idgoods'";
       mysqli_query($this->db->link,$sql);
       header('Refresh: 1; url='.$_SERVER['REQUEST_URI']);
        return true;
    }

    //удаление товара
   public function DeleteGoods($id_delete){
      mysqli_query($this->db->link,"DELETE FROM `goods` where id='$id_delete'");
    
  }


 //сжимаем
 public function resize($file_input, $file_output, $w_o, $h_o, $percent = false) {
     list($w_i, $h_i, $type) = getimagesize($file_input);
    if (!$w_i || !$h_i) {
       echo 'Невозможно получить длину и ширину изображения';
        return;
      }
      $types = array('','gif','jpeg','png');
      $ext = $types[$type];
    if ($ext) {
      $func = 'imagecreatefrom'.$ext;
      $img = $func($file_input);
      } else {
    echo 'Некорректный формат файла';
          return;
        }

if ($percent) {
    $w_o *= $w_i / 100;
    $h_o *= $h_i / 100;
    }
    if (!$h_o) $h_o = $w_o/($w_i/$h_i);
    if (!$w_o) $w_o = $h_o/($h_i/$w_i);

    $img_o = imagecreatetruecolor($w_o, $h_o);
    imagecopyresampled($img_o, $img, 0, 0, 0, 0, $w_o, $h_o, $w_i, $h_i);
    if ($type == 2) {
      return imagejpeg($img_o,$file_output,100);
      } else {
      $func = 'image'.$ext;
        return $func($img_o,$file_output);
      }
    }

  // Пост навигация Определяем общее число сообщений в базе данных 
 public function Goodsacount(){ 
   
    $result = mysqli_query($this->db->link,"SELECT COUNT(*) FROM `goods`");
    $posts = mysqli_fetch_row($result); 
    return $posts;
   }

    public function Goodsstart($start,$num){ 

       $sql_Goods="SELECT * FROM `goods` LIMIT $start, $num" ; 
       $sqlresult_Goods=mysqli_query($this->db->link,$sql_Goods);
       while($result=mysqli_fetch_array($sqlresult_Goods, MYSQLI_ASSOC)){
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

}


