
<h1>Редактировать товар</h1>

<?if ($data['GoodsEditForm']){?>
<form action="" method="POST" enctype="multipart/form-data">
  <table>
    <tr>
      <td>Название товара</td>
      <td>
        <input type="text" name="nameOfGood" value="<?=$data['GoodsEditForm']['name']?>" />
        <input type="hidden" name="edit_idgoods" value="<?=$data['GoodsEditForm']['id']?>" />
      </td>
    </tr>
      <td>Цена</td>
      <td><input type="text" name="price" value="<?=$data['GoodsEditForm']['price']?>" /></td>
    </tr>
    <tr>
      <td>Рейтинг</td>
      <td><input type="text" name="raiting" value="<?=$data['GoodsEditForm']['raiting']?>" /></td>
    </tr>
    <tr>
      <td>Выберите категорию</td>
      <td>
             <select name="categoriya">
           <option value="0">основная категория</option>
            <?foreach ($data['CategoryGoods'] as $value) {?>
            <option value="<?=$value['id']?>" > <?=$value['name']?></option>
            <?}?>
        </select>
      </td>
    </tr>
    <tr>
      <td><input id="promoInput" type="checkbox" name="promo" /></td>
      <td><lable for="promoInput">Акция</lable></td>
    </tr>
    
    <tr>

      <td colspan="2"><input type="submit" name="editGood" value="Редактировать" /></td>
    </tr>
  </table>
        
</form>
<?} else echo "чтото пошло не так :(";

if ( $data['GoodsEdit'] ==true ){echo "Категория удачно отредактирована";}

  ?>

