<H1>Корзина </H1>

<?  if(!isset($_SESSION["basket"]) || count(unserialize($_SESSION["basket"]))<1 ){
	echo "Ваша корзина пустая !!";
}
else {
	$basket=unserialize($_SESSION["basket"]);
	//var_dump($basket);
?>
Количество товара в корзине: <?php echo count($basket); ?><br><br><br>

<table style="border-collapse: collapse;">
	<tr >  
     <td >ID товара </td>
     <td >Название </td>
     <td >Количество </td>
     <td >Цена </td>
     <td >Сумма  </td>
   </tr> 
  
  <? 
   if( $data['err']){ echo  $data['err'];} // показываем ошибку если чтото неправильно       
   foreach ($basket as $key => $value) { 

      for ($i=0;$i<count($data['goods']);$i++){

        if ($data['goods'][$i]['id'] == $key) { ?>
   <tr >  
     <td ><?=$key?></td>
      <td ><?   echo $data['goods'][$i]['name'] ."<br>";?></td>
      <form action="" method="POST">
       <td >   <input type="text" name="count_cart_edit" value="<?=$value;?>" >
        <input type="hidden" name="id" value="<?=$key ?>" >
       <input type="submit"  value="Изменить">
        <Br></td>
      </form>
        <td ><?   echo $data['goods'][$i]['price']  ."<br>";?></td>
         <td ><?  $summ1+=$summ=$value*$data['goods'][$i]['price'];  echo  $summ."<br>";?></td>
          <td > <a href ="?id=<?=$key?>&del_id=true">Удалить </a><br></td>
   </tr>  
    <? }  }  
      }
       ?>
  <tr>  
     <td colspan="4">Сумма всего</td>
      <td><?  $summ=$value*$goods[$key]['price'];  echo  $summ1."<br>";?></td>
      <td> <a href ="?del_card=true">Очистить корзину </a><br></td>
   </tr> 
   <tr>  
     <td colspan="6"> <a href ="/cart/orders"  style="float:right;margin:0 10px 0 0;">Оформить заказ</a></td>
   </tr>   
 </table>   

<?} ?>



<br>
<!--Возврат на предыдущую или главную страницу-->
<? if ($_SERVER['HTTP_REFERER'] != "http://demo.justdo.dp.ua/cart") {?>
<a href="<?= $_SERVER['HTTP_REFERER']; ?>">Вернуться назад </a>
<? } else { ?> 
<a href="/">Перейти на главную </a> 
<?}?>

