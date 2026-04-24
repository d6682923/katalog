<?php
include "bdconnect.php";

$name = $_POST["name"];
$cena = $_POST["cena"];
$srok = $_POST["srok"];
$kol = $_POST["kol"];
$id_cat = $_POST["category"];

$sql = "INSERT INTO tovars (name, id_cat, cena, kol, srok) 
        VALUES ('$name', $id_cat, '$cena', '$kol', '$srok')";

$result = mysqli_query($link, $sql) or die("Query failed");

Header("Location: uspex.php?i=1");
?>