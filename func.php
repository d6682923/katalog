<?php
// вывод товаров
function show_tovars() {
    include "bdconnect.php";
    
    $sql = "SELECT tovars.id, name, category, cena, kol, srok 
            FROM tovars, categories 
            WHERE tovars.id_cat = categories.id_cat";
    
    // фильтрация по категориям
    if(isset($_POST["filtr"])) {
        $category = $_POST["category"];
        if($category != "Bce") {
            $sql = "SELECT tovars.id, name, category, cena, kol, srok 
                    FROM tovars, categories 
                    WHERE tovars.id_cat = categories.id_cat 
                    AND categories.id_cat = $category 
                    ORDER BY cena";
        }
    }
    
    // сортировка по цене
    if(isset($_POST["sort"])) {
        $cena = $_POST["cena"];
        if($cena == "min") {
            $sql = "SELECT tovars.id, name, category, cena, kol, srok 
                    FROM tovars, categories 
                    WHERE tovars.id_cat = categories.id_cat 
                    ORDER BY cena";
        }
        if($cena == "max") {
            $sql = "SELECT tovars.id, name, category, cena, kol, srok 
                    FROM tovars, categories 
                    WHERE tovars.id_cat = categories.id_cat 
                    ORDER BY cena DESC";
        }
    }
    
    $result = mysqli_query($link, $sql) or die("Query failed");
    $str = "";
    
    while($row = mysqli_fetch_array($result)) {
        $str .= "<tr>";
        $str .= "<td>" . $row["id"] . "</td>";
        $str .= "<td>" . $row["name"] . "</td>";
        $str .= "<td>" . $row["category"] . "</td>";
        $str .= "<td>" . $row["cena"] . "</td>";
        $str .= "<td>" . $row["kol"] . "</td>";
        $str .= "<td>" . $row["srok"] . "</td>";
        $str .= "<td><a href='tovar.php?id=" . $row["id"] . "'>Подробнее</a></td>";
        $str .= "<td><input type='checkbox' name='id[]' value='" . $row["id"] . "'></td>";
        $str .= "</tr>";
    }
    echo $str;
}

// вывод категорий
function show_categories() {
    include "bdconnect.php";
    $sql = "SELECT id_cat, category FROM categories";
    $result = mysqli_query($link, $sql);
    $str = "";
    while($row = mysqli_fetch_array($result)) {
        $str .= "<option value='" . $row["id_cat"] . "'>" . $row["category"] . "</option>";
    }
     return $str;
}
?>