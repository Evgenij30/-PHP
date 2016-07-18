<?php 

if ($_GET["mail"] && $_GET["summa"] && $_GET["phone"]){ 
$to  = $_GET["mail"] ; 


$subject = "Тест"; 

$message = 'Привет <br>
Ваш заказ принят на общую сумму '. $_GET["summa"].'<br>
Мы перезвоним по телефону'.$_GET["phone"].'  в ближайшее время';

$headers  = "Content-type: text/html; charset=UTF8; \r\n"; 
$headers .= "From: Ваш заказ принят с тестового сайта <win32@list.ru>\r\n"; 
$headers .= "Reply-To: win32@list.ru\r\n"; 

$massege_ok=mail($to, $subject, $message, $headers); 

if ($massege_ok){
	unset($_SESSION["basket"]);   
     session_destroy();  
	 header("Location: /");
}
}
else echo "Чтото пошло не так :(";