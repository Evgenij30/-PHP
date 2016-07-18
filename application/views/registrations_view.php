<html>
<head>
<title>Регистрация</title>

<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" />
<link href="http://fonts.googleapis.com/css?family=Kreon" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="/css/style.css" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />

</head>

<body>
<div class="avtorisations_block">
<h1>Регистрация</h1>
  <form action="" method="POST">
  	<p><input type="text" name="name" value="<?=$_POST['name']?>" placeholder="Имя" class="form_aut"> </p>
  	<p><input type="text" name="fam" value="<?=$_POST['fam']?>" placeholder="Фамилия" class="form_aut"> </p>
	<p><input type="text" name="login" value="<?=$_POST['login']?>" placeholder="Логин" class="form_aut"> </p>
	<p><input type="password" name="passwd" value="<?=$_POST['passwd']?>" placeholder="Пароль" class="form_aut"> </p>
	<p><input type="text" name="mail" value="<?=$_POST['mail']?>" placeholder="Имейл " class="form_aut"> </p>
	<p><input type="submit" name="auth" value="Регистрация"></p>
	<p class="aut_demo"><a href="/">Я передумал  :(</a></b></p>
    <p><?=$data['err']?></p>
    <? if ($data['RegLogUser']==true) echo "Поздравляем регистрация прошла успешно :)";

    ?>
</form>

</div>
</body>
</html>