
    <?php
include "bdconnect.php"; // соединение с БД

$name = $_POST["name"];   // получить значение поля name из формы
$cena = $_POST["cena"];   // получить значение цены из формы
$kol = $_POST["kol"];     // получить значение количества из формы
$srok = $_POST["srok"];   // получить значение срока годности из формы
$id_cat = $_POST["id_cat"]; 
// Экранирование специальных символов для безопасности
$name = mysqli_real_escape_string($link, $name);
$cena = mysqli_real_escape_string($link, $cena);
$kol = mysqli_real_escape_string($link, $kol);
$srok = mysqli_real_escape_string($link, $srok);

// выполнение SQL-запроса к базе данных tovars на вставку записи
$sql = "INSERT INTO tovars (name, cena, kol, srok,id_cat) VALUES ('$name', '$cena', '$kol', '$srok','$id_cat')";


$result = mysqli_query($link, $sql) or die("Query failed: " . mysqli_error($link));

// Перенаправление пользователя на страницу uspex.php; при этом передаем параметр i=1 – ввод в базу данных
header("Location: uspex.php?i=1");
exit;
?>
