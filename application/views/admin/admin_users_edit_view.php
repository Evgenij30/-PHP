<h1>Редактировать пользователя</h1>
<? if ($data['user_edit']){?>
<? if ( $data['UsersEditGo'] ==true ){echo "Пользователь удачно отредактирован";} ?>
<table >

	<tr>
      <td><b>Логин</b></td>
      <td><b>Имя</b></td>
      <td><b>Фам</b></td>
      <td><b>Имейл</b></td>	
      <td><b>Роль</b></td>	
	</tr>
<form action="" method="POST" >

     <tr>
      <td><input type="text" name="ed_login" value="<?=$data['user_edit'][0]['login']?>"> </td>
      <td><input type="text" name="ed_name" value="<?=$data['user_edit'][0]['name']?>"> </td>
       <td><input type="text" name="ed_fam" value="<?=$data['user_edit'][0]['fam']?>"> </td>
      <td><input type="text" name="ed_mail" value="<?=$data['user_edit'][0]['mail']?>"></td>	
      <td>
       <select  name="polzovatel"> 
      	 	<option value="1">Админ</option> 
             <option value="2">Пользователь</option>
      	</select> 
      </td>
 
	</tr>
</table>	<br>
<input type="submit" name="editUsers" value="Редактировать" />
</form>
<?} 
else echo "Чтото пошло не так :(";
?>