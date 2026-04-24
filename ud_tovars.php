<?php
/* Скрипт для удаления информации из БД */
include "bdconnect.php";    // Подключение к БД

// Обработка удаления (должна быть выше HTML, чтобы редирект сработал до вывода контента)
if(isset($_POST["ud_id"]) && !empty($_POST["ud_id"])) {
    $mass = $_POST["ud_id"]; // Получаем массив идентификаторов (номеров) записей, которые нужно удалить
    
    foreach($mass as $id) {
        // Экранируем данные для безопасности (или используйте подготовленные запросы)
        $id = mysqli_real_escape_string($link, $id);
        // Выполнение SQL-запроса к базе данных workers - удаление массива записей
        $sql = "DELETE FROM tovars WHERE id = $id";
        $result1 = mysqli_query($link, $sql) or die("Query failed: " . mysqli_error($link));
    }
    
    // Перенаправление пользователя на страницу uspex.php; при этом передаем параметр i=2 - удаление записей
    header("Location: uspex.php?i=2");
    exit(); // Останавливаем выполнение скрипта после редиректа
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Управление <?php
    include "func.php";
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Склад товаров - Информация о товарах</title>
</head>
<body>

<h3 align="center">Список товаров</h3>
<form action="" method="post">
    <label for="category">Выбор по категории </label>
    <select name="category">
        <option value="Все">Все</option>
        <?php
            echo show_categories();
        ?>
    </select>
    <input type="submit" value="Фильтр" name="filtr">
</form>
<br>
<table width="100%" border="2">
    <tr>
        <th>Номер</th>
        <th>Наименование</th>
        <th>Категория</th>
        <th>Цена</th>
        <th>Количество</th>
        <th>Срок годности</th>
    </tr>
    <?php
        if(isset($_POST["filtr"])) {
            echo show_tovars();
        }
    ?>
</table>
<br>
<a href="index.php">На главную</a>
</body>
</html>товарами</title>
</head>
<body>

<h3 align="center">Список товаров</h3> 

<!-- Форма для удаления информации из БД -->
<form method="post" action="ud_tovars.php">
    <table width="100%" border="1" cellpadding="5" cellspacing="0">
        <tr>
            <td>Номер</td>
            <td>Наименование</td>
            <td>Цена</td>
            <td>Количество</td>
            <td>Срок</td>
            <td>Удалить</td>
        </tr>
        
        <?php
        // Получаем данные из базы для отображения
        $result = mysqli_query($link, "SELECT * FROM tovars");
        if (!$result) {
            die("Ошибка запроса: " . mysqli_error($link));
        }
        
        while($row = mysqli_fetch_array($result)) {
            $id = $row['id'];    // переменная $id содержит идентификатор (номер) записи
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['cena']) . "</td>";
            echo "<td>" . htmlspecialchars($row['kol']) . "</td>";
            echo "<td>" . htmlspecialchars($row['srok']) . "</td>";
            echo "<td align='center'><input type='checkbox' name='ud_id[]' value='" . htmlspecialchars($id) . "'></td>";
            echo "</tr>";
        }
        ?>
        
    </table>
    
    <!-- Кнопка «Удалить» -->
    <center><input type="submit" name="ud" value="Удалить выбранные"></center>
</form>

<a href="index.html">На главную</a>

</body>
</html>

<?php
// Закрываем соединение с базой данных (если требуется)
mysqli_close($link);
?>   