<?php

class Controller_Cart extends Controller
{

  function __construct()
  {
    $this->model = new Model_Cart();
    $this->view = new View();
  }
  
  function action_index()
  { 

       $count_cart_edit = strip_tags(trim($_POST["count_cart_edit"]));
        $id = strip_tags(trim($_POST["id"]));

       if ($count_cart_edit){

          if (preg_match('/^[0-9]+$/i',$count_cart_edit)){ 
              $this->model->count_cart_edit($id,$count_cart_edit);
          }
          else  $data['err'] ="в поле количество только цыфры!!";
       }
      
    $del_id = strip_tags(trim($_GET["del_id"])); 
    $id = strip_tags(trim($_GET["id"]));
    $del_card = strip_tags(trim($_GET["del_card"]));

    if($del_id){
      $this->model->del_card_id($id);
    }
    if($del_card){
      $this->model->del_card();
    }
         $data['goods']=$this->model->Goods();
    
    $this->view->generate('cart_view.php', 'template_view.php', $data);
  }

  function action_orders()
  { 

       $name_orders = strip_tags(trim($_POST["name_orders"]));
       $phone_orders = strip_tags(trim($_POST["phone_orders"]));
       $mail_orders = strip_tags(trim($_POST["mail_orders"]));
       $id_tovara_count = $_SESSION["basket"];
      
       $summa_tovara_orders = strip_tags(trim($_POST["summa_tovara_orders"]));
       $orders = strip_tags(trim($_POST["orders"]));
 
       if ($orders){
        
             if (preg_match("/[a-z0-9а-я]$/i",$name_orders)){
              if(preg_match('/[0-9]$/i',$phone_orders)){
                if(preg_match("/[a-z0-9][@]{1}[a-z.]/i",$mail_orders)){
                      // проверки успешны добавляем заказ в базу
                       $data['orders']=$this->model->Orders($name_orders,$phone_orders,$mail_orders,$id_tovara_count,$summa_tovara_orders);
                   }
                   else $data['err']="Ошибка в поле имейл введите правильный имейл к примеру win@list.ua";
              }
                else $data['err']="Ошибка в поле телефон введите в формате 0671111111";
                  
             }
             else $data['err']="Ошибка в поле Имя введите только буквы или цыфры";
       }

       //Отправляем письмо с заказом на почту 
       
       
       
         $data['goods']=$this->model->Goods();
    
    $this->view->generate('orders_view.php', 'template_view.php', $data);
  }

  function action_mail()
  { 
       
      if ($massege){
         echo "string";
      }

    $this->view->generate('mail_view.php', 'template_view.php', $data);
  }

}