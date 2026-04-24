<?php
 //  include "func.php"; //файл, который будет хранить функции для работы с БД
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Склад товаров -> Добавление товара</title>
</head>
<body>
<form action="insert_tovars.php" method="post" name="form1" >
   Название товара <input type="text" name="name" /><br>
   Категория товара
    <select name="category">
    <?php
  //  echo show_categories(); //вывод категорий из БД
    ?>
    </select><br>
   Цена товара <input type="number" name="cena" /><br>
   Количество <input type="text" name="kol" /><br>
   Срок годности <input type="date" name="srok" /><br>
   <input type="submit" name="insert" value="Добавить" />
</form>
</body>
</html>