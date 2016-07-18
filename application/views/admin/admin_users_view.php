<h1>Работа с пользователями</h1>
<? if ($data['delete']==true){echo "Пользователь успешно удален!";}?>
<table >

	<tr>
	  <td></td>	
      <td><b>Логин</b></td>
      <td><b>ФИО</b></td>
      <td><b>Имейл</b></td>	
      <td><b>Роль</b></td>
      <td><b>Дата регестрации</b></td>	
      <td><b>Дата последней авторизации</b></td>			
	</tr>
	<form method="POST" action="">
	<? foreach ($data['users'] as $value) { ?>
	
     <tr>
      <td><input type="radio" name="id_users" value="<?=$value['id']?>"></td>
      <td><?=$value['login']?> </td>
      <td><?=$value['fam']?> <?=$value['name']?></td>
      <td><?=$value['mail']?></td>	
      <td>
      	 <? if ($value['polzovatel']=='1') { ?>
      	 	<option value="1">Админ</option> 
      	   <? } else { ?>  
             <option value="2">Пользователь</option>
      	    <? } ?>
      </td>
      <td><?=date('Y-M-d', $value['data_register'])?></td>	
      <td><?=date('Y-M-d', $value['last_entrance']) ?> </td>			
	</tr>

	<?}?>
	<tr>

		<td colspan="5"><input type="submit" name="edit" value="Редактировать"> <input type="submit" name="delete" value="Удалить "></td></tr>
  </form>
</table>	

<b><a href="admin_users/add">Добавить нового пользователся</a></b>