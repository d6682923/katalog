<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
$i = $_GET["i"];

if ($i == 1) { 
    $st = "Данные успешно добавлены"; 
} elseif ($i == 2) { 
    $st = "Записи успешно удалены"; 
} else {
    $st = "Неизвестная операция";
}
?>

<h4 align="center"><?php echo $st; ?></h4>
<p align="center"><a href="index.html">На главную</a></p>
    
</body>
</html>
