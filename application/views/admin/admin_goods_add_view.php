
<h1>Добавить новый товар </h1>
<?=$data['err']?>

<?php if ($data['goods_add']) echo "Товар удачно добавлен";?>
<?php if ($data['goods_add']==false && $data['goods_add']) echo "Ошибка добавления товара";?>
<form action="" method="POST" enctype="multipart/form-data">
  <table>
    <tr>
      <td>Имя товара</td>
      <td><input type="text" name="nameOfGood" /></td>
    </tr>
    <tr>
      <td>Цена</td>
      <td><input type="text" name="price" placeholder="в грн"/></td>
    </tr>
    <tr>
      <td>Рейтинг</td>
      <td><input type="text" name="raiting" /></td>
    </tr>
    <tr>
      <td>Выберите категорию</td>
      <td>
             <select name="categoriya">
           <option value="0">основная категория</option>
            <?foreach ($data['CategoryGoods']  as $value) {?>
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
      <td colspan="2">Добавить фото</td>
    </tr>
    <tr>
      <td colspan="2"><input type="file" name="testfile"></td>
    </tr>
  
  </table>
  <textarea name="editor1" id="editor1" rows="10" cols="80">
                Описание товара
            </textarea>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
            </script>
   <br>
   <input type="submit" name="addGood" value="Добавить" />         
  <!-- <select name="test">
    <option value="test1">sdgg</option>
    <option value="test2">sdgg</option>
  </select> -->
</form>


