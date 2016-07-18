<?php
session_start();?>
<html>
<head>
<title>Авторизация</title>

<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" />
<link href="http://fonts.googleapis.com/css?family=Kreon" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="/css/style.css" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />

</head>

<body>
<div class="avtorisations_block">
<h1>Авторизация</h1>

<?php if (!$_SESSION['admin']){ ?>
  <form action="" method="POST">
	<p><input type="text" name="login" value="" placeholder="Логин" class="form_aut"> </p>
	<p><input type="password" name="passwd" value="" placeholder="Пароль" class="form_aut"> </p>
	<p><input type="submit" name="auth" value="Войти" ></p>
     <p class="aut_demo">*тестовый вход demo/demodemo <b><a href="/registrations">Регистрация</a></b></p>
     <?=$data['err']?>
</form>

<?php }?>

</div>
</body>
</html>