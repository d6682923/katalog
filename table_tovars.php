<?php 
include "func.php"; 
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Склад товаров -> Информация о товарах</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h3 align="center">Список товаров</h3>
    
    <form action="" method="post">
        <label for="category">Выбор по категории </label>
        <select name="category">
            <option value="Bce">Все</option>
            <?php  
            show_categories();
             ?>
        </select>
        <input type="submit" value="Фильтр" name="filtr">
        
        <label for="cena">Сортировка по цене:</label>
        <select name="cena">
            <option value="0">Без сортировки</option>
            <option value="min">По возрастанию</option>
            <option value="max">По убыванию</option>
        </select>
        <input type="submit" value="Сортировать" name="sort">
    </form>
    <br>
    
    <form action="zakaz.php" method="post">
        <table width="100%" border="2">
            <tr>
                <th>Номер</th>
                <th>Наименование</th>
                <th>Категория</th>
                <th>Цена</th>
                <th>Количество</th>
                <th>Срок годности</th>
                <th>Подробнее</th>
                <th>Добавить в корзину</th>
            </tr>
            <?php 
       echo    show_tovars(); 
            ?>
        </table>
        <br>
        <input type="submit" value="Добавить в корзину">
        <br>
        <a href="index.php">На главную</a>
    </form>
</body>
</html>  