<? $basket=unserialize($_SESSION["basket"]); ?>
<h1>Оформить заказ</h1>
<b style="color:red"><? if ($data['err']){echo $data['err'];}?></b>
<b style="color:green"><? if ($data['orders']==true){echo "Заказ принят и ближайшее время обработают !";}?></b>

<form action="" method="POST">
<input type="text" name="name_orders" value="" > Ваше имя <br>
<input type="text" name="phone_orders" value="" > Ваш телефон в формате 0671111111<br>
<input type="text" name="mail_orders" value="" > Ваш Имейл <br>


<h2>Ваш заказ </h2>

<table style="border-collapse: collapse;">
	<tr >  
     <td >ID товара </td>
     <td >Название </td>
     <td >Количество </td>
     <td >Цена </td>
     <td >Сумма  </td>
   </tr> 
  
  <?    
   foreach ($basket as $key => $value) { 

      for ($i=0;$i<count($data['goods']);$i++){

        if ($data['goods'][$i]['id'] == $key) { ?>
     <input type="hidden" name="id_tovara_count" value="<?=$basket?>" >   
   <tr >  
     <td ><?=$key?></td>
      <td ><? echo $data['goods'][$i]['name'] ."<br>";?></td>
      <form action="" method="POST">
       <td ><?=$value;?></td>
      </form>
        <td ><?   echo $data['goods'][$i]['price']  ."<br>";?></td>
         <td ><?  $summ1+=$summ=$value*$data['goods'][$i]['price'];  echo  $summ."<br>";?></td>
         
   </tr>  
    <? }  }   }
       ?>
  <tr>  
     <td colspan="4">Сумма всего</td>
      <td><?  $summ=$value*$goods[$key]['price'];  echo  $summ1."<br>";?></td>
      <input type="hidden" name="summa_tovara_orders" value="<?=$summ1?>" >  
   </tr> 
    <tr>  
       <td colspan="5"><input type="submit" name="orders" value="Сделать заказ"></td>
   </tr> 
 </table>   




</form>

<a href ="/cart"  style="float:right;margin:0 10px 0 0;">Вернуться в корзину</a>

