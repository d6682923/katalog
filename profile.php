<?php
session_start();
include "bdconnect.php";
include "func.php";
include "validate_user.php";

if(isset($_SESSION["logged"]) && $_SESSION["logged"]=="1" && $_SESSION["userid"]=="1") {
    header("Location: profile_admin.php");
    exit();
}
else if(isset($_SESSION["logged"]) && $_SESSION["logged"]=="1") {
    ?>
<!DOCTYPE html>
<html lang="en">
<head>    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>
</head>
<body>
<?php 
if(isset($user["name"])) {
    echo "<h2>Вы вошли под именем, " . htmlspecialchars($user["name"]) . "!</h2>";
} echo else {
    echo "<h2>Ошибка загрузки профиля</h2>";
}
?>
<p>Фото</p>
<p>Возраст</p>
<p>Зарплата</p>
<a href="logout.php">Выйти из аккаунта</a><br>
<a href="index.php">На главную</a>
</body>
</html>
<?php
}
?> 