<div class="block_sort">
	<div class="sort">
     <form action="" method="GET">	
     	<input type="hidden" value="<?=$_GET['id']?>" name="id">
	    <select name="sort">
         <option value="name_ads">Сортировать по алфавиту</option>
         <option value="price_ads">Сортировать по цене</option>
         </select>
         

        <input type="submit" name="sort_perform" value="Сортировать">
     </form>
   </div>	
</div>
<h1>Вывод товаров категории </h1>

<?if ($data['cat_id']){?>

<? foreach ($data['cat_id'] as $result){?>

<div class="block_tovar">
  <div class="tovar_img">
    <img src="images/img/<?=$result['photo_smol']?>" width="150px" height="120px">
  </div>
    <p class="name"><a href="/tovar?id_tovara=<?=$result['id']?>"><?=$result['name']?></a></p>
    <p class="price"><b><?=$result['price']?> грн</b></p>
</div>


<?}}
else echo "В даной категории нет товаров!!!";
?>
