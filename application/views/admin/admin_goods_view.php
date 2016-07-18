
<h1>Все товары</h1> <p style=""><a href="/admin_goods/add">Добавить новый товар </a></p>

<table>
  <tr>
     <td>Фото товара</td>
      <td>Название товара</td>
      <td colspan="2">Действие </td>
  </tr> 
<? foreach ($data['Goods'] as  $value) {?>
  <tr>
     <td><img src="../images/img/<?=$value['photo_smol']?>" width="150px" height="120px"></td>
      <td><?=$value['name']?></td>
      <td ><a href="/admin_goods/edit?id_edit=<?=$value['id']?>"> Редактировать</td>
      <td ><a href="/admin_goods/?id_delete=<?=$value['id']?>"> Удалить</td>
  </tr> 
  <? } ?>
</table>




<?php 

$total=$data['total'];
$page=$data['page'];

// Проверяем нужны ли стрелки назад 
if ($page != 1) $pervpage = '<a href= ./admin_goods?page=1><<</a> 
                               <a href= ./admin_goods?page='. ($page - 1) .'><</a> '; 
// Проверяем нужны ли стрелки вперед 
if ($page != $total) $nextpage = ' <a href= ./admin_goods?page='. ($page + 1) .'>></a> 
                                   <a href= ./admin_goods?page=' .$total. '>>></a>'; 

// Находим две ближайшие станицы с обоих краев, если они есть 
if($page - 2 > 0) $page2left = ' <a href= ./admin_goods?page='. ($page - 2) .'>'. ($page - 2) .'</a> | '; 
if($page - 1 > 0) $page1left = '<a href= ./admin_goods?page='. ($page - 1) .'>'. ($page - 1) .'</a> | '; 
if($page + 2 <= $total) $page2right = ' | <a href= ./admin_goods?page='. ($page + 2) .'>'. ($page + 2) .'</a>'; 
if($page + 1 <= $total) $page1right = ' | <a href= ./admin_goods?page='. ($page + 1) .'>'. ($page + 1) .'</a>'; 

// Вывод меню 
echo $pervpage.$page2left.$page1left.'<b>'.$page.'</b>'.$page1right.$page2right.$nextpage; 

?>
  



