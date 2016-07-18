<h1>Все товары</h1>

<? foreach ($data['goods'] as $result){?>

<div class="block_tovar">
  <div class="tovar_img">
    <img src="images/img/<?=$result['photo_smol']?>" width="150px" height="120px">
  </div>
    <p class="name"><a href="/tovar?id_tovara=<?=$result['id']?>"><?=$result['name']?></a></p>
    <p class="price"><b><?=$result['price']?> грн</b></p>
</div>


<?}?>
