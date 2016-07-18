<h1>Добавить нового пользователя</h1>

<form action="" method="POST">
  	<p><input type="text" name="name" value="" placeholder="Имя" class="form_aut"> </p>
  	<p><input type="text" name="fam" value="" placeholder="Фамилия" class="form_aut"> </p>
	<p><input type="text" name="login" value="" placeholder="Логин" class="form_aut"> </p>
	<p><input type="password" name="passwd" value="" placeholder="Пароль" class="form_aut"> </p>
	<p><input type="text" name="mail" value="" placeholder="Имейл " class="form_aut"> </p>
	<select  name="polzovatel"> 
      	 	<option value="1">Админ</option> 
             <option value="2">Пользователь</option>
     </select> 
	<p><input type="submit" name="auth" value="Регистрация юзера"></p>
	
    
    <? 
    if ($data['err']){echo $data['err'];}
    if ($data['new_users_adm']==true) echo "Поздравляем регистрация прошла успешно :)";
    ?>
</form>
