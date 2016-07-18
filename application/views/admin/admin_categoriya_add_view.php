
<h1>Добавить новую категорию</h1>
  
<form method="POST" action="">
  <input type="text" name="new_categorya" value="<? if(!$data['edit']){echo "";}else {echo $data['edit']['name'];}?>">
  <input type="hidden" name="cat_edit" value="<?=$data['edit']['id']?>">
  <select name="sub_categoriya">
     <option value="0">основная категория</option>
 <?foreach ($data['CategoryGoods'] as $value) {?>
     <option value="<?=$value['id']?>" > <?=$value['name']?></option>
  <?}?>
  </select>
   <?if(!$data['edit']){?><p><input type="submit" name="create_categoriya" value="Создать"></p><?}
   else {?><p><input type="submit" name="edit_categoriya" value="Редактировать"> <?}?>
</form>
<p style="color:red;"><?if ($data['create_categoriya']==true){echo "Категория удачно добавленна <br>";}?></p>
<p style="color:red;"><?if ( $data['edit_categoriya']==true){echo "Категория удачно отредактированна <br>";}?></p>

<h1>Список категорий</h1>
<p style="color:red;"><? if ($data['delete']==true){echo "Категория удачно Удалена";}?></p>
<form method="POST" action="">
 
 <? foreach ($data['CategoryGoods'] as $value) {?>
     <?if ($value['id_sub']==0){?>
      <ul>
         <li style="list-style-type: none;"> <input type="radio" name="categ" value="<?=$value['id']?>"/>  <?=$value['name']?></li>
      </ul>
      <?}?>      
         <?foreach ($data['CategoryGoods'] as $children){
            if ($value['id'] == $children['id_sub']){?>
                  <ul style='margin-left:10px;'>
                      <li style="list-style-type: none;"> <input type="radio" name="categ" value="<?=$children['id']?>"/> <?=$children['name']?></li>
                  </ul>
               <?}}?>
       <?}?>



<p><input type="submit" name="edit" value="Редактировать"><input type="submit" name="delete" value="Удалить"></p>
</form>
