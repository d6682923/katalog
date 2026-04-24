<?php
    include "bdconnect.php"; //Подключение к БД
    //Выполнение SQL-запроса к базе данных tovars – вывод записи с id=$id
    if(isset($_GET["id"])){
    $id=$_GET["id"];
    $sql="SELECT tovars.id, name,category, cena, kol, srok FROM tovars,category
    s WHERE tovars.id_cat=categories.id_cat AND tovars.id=$id";
    $result = mysql_query($link, $sql) or die ("товар не найден");

    //разбиваем результат запроса на строки ($row=mysql_fetch_array) и выводим в цикле построчно на экран
    $row = mysql_fetch_array($result);
    }
    if(isset($_POST["red"]))
    {
    $id=$_POST["id"];
    $cena=$_POST["cena"];
    $kol=$_POST["kol"];
    $sql="UPDATE tovars SET cena=$cena,kol=$kol WHERE id=$id";
    $result = mysql_query($link, $sql) or die ("Ошибка во время обновления информации");
    Header("Location: uspex.php?i=3");

    }
?>