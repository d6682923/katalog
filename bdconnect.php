<?php
$host = 'localhost';
$user = 'yvcdiiuk';
$password = 'encHDJ';
$db_name = 'yvcdiiuk_m1'; // Замените на имя вашей БД

$link = mysqli_connect($host, $user, $password, $db_name);

if (!$link) {
    die("Ошибка подключения: " . mysqli_connect_error());
}

mysqli_set_charset($link, "utf8");
?>