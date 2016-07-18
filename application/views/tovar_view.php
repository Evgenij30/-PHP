 <h1>Вывод товаров категории </h1>
<? if ($data['tovar']){?>

<div class="block_tovar_prosmotr">
    <div class="photo_prosmotr">
      <img src="images/img/<?=$data['tovar']['photo_big']?>" width="250px" height="300px">
       </div>
     <div class="info"> 
      <h1><?=$data['name']?></h1>
 <ul>
  <li> Рейтинг товара:<?=$data['tovar']['raiting']?></li>
  <li> Цена : <?=$data['tovar']['price']?> грн</li>
  <li> Дата добавления : <?= date("d-M-Y", $data['tovar']['timestamp'])?></li>
  <li> Акция: <?=$data['tovar']['promo']?></li>
  <li> <a href="?id_tovara=<?=$data['tovar']['id']?>&zakaz=true">ЗАКАЗАТЬ ТОВАР</a></li>
  </ul>
 </div>
 <div class="opisanie_tovara">
  <h2> Описание товара </h2>
  <? if ($data['tovar']['text_goods']){ 
   echo  $data['tovar']['text_goods'];
   }
   else echo "Нет описания товара ";
    ?>
</div>

<?}
else echo "Упс чтото пошло не так :(";
?>

</div>
