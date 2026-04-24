
    <?php
include "bdconnect.php";

// Проверяем, были ли переданы товары для добавления в корзину
if(isset($_POST["id"]) && !isset($_POST["zak"])) {
    $mass = $_POST["id"];
    ?>
    <!DOCTYPE html>
    <html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Склад товаров -> Корзина товаров</title>
        <style>
            table { border-collapse: collapse; margin: 0 auto; }
            th, td { border: 1px solid #ddd; padding: 10px; text-align: center; }
            th { background-color: #4CAF50; color: white; }
            .total { font-size: 18px; font-weight: bold; text-align: right; margin-top: 20px; }
        </style>
    </head>
    <body>
        <h1 align="center">Вы добавили в корзину</h1>
        <form action="" method="post" name="frt">
            <table align="center" border="1">
                <tr>
                    <th>Идентификатор товара</th>
                    <th>Наименование</th>
                    <th>Количество</th>
                    <th>Цена за 1 шт.</th>
                    <th>Общая стоимость</th>
                    <th>Добавить в корзину</th>
                </tr>
                <?php
                $i = 0;
                $quantity = 0;
                while(isset($mass[$i])) {
                    $sql = "SELECT * FROM tovars WHERE id = " . intval($mass[$i]);
                    $result = mysqli_query($link, $sql) or die("Query failed");
                    $row = mysqli_fetch_array($result);
                    $stoi = 1 * $row["cena"]; // начальная стоимость для 1 шт.
                    ?>
                    <tr>
                        <td><?php echo $mass[$i]; ?></td>
                        <td>
                            <input type="text" name="name[]" value="<?php echo $row["name"]; ?>" readonly>
                        </td>
                        <td>
                            <input type="number" name="kol[]" value="1" min="1" max="<?php echo $row["kol"]; ?>" onchange="updateCost(this, <?php echo $row["cena"]; ?>)">
                        </td>
                        <td>
                            <input type="text" name="cena[]" value="<?php echo $row["cena"]; ?>" readonly>
                        </td>
                        <td class="stoi"><?php echo $stoi; ?></td>
                        <td>
                            <input type="checkbox" name="id[]" value="<?php echo $mass[$i]; ?>" checked>
                        </td>
                    </tr>
                    <?php
                    $quantity += $stoi;
                    $i++;
                }
                ?>
            </table>
            <div class="total">
                Общая стоимость заказа: <span id="total"><?php echo $quantity; ?></span> руб.
            </div>
            <div align="center">
                <input type="submit" name="zak" value="Оформить заказ">
            </div>
        </form>
        
        <script>
            function updateCost(element, price) {
                var row = element.parentElement.parentElement;
                var quantity = element.value;
                var costCell = row.cells[4];
                var totalCost = quantity * price;
                costCell.innerHTML = totalCost;
                
                // Пересчитываем общую сумму
                var total = 0;
                var allCosts = document.querySelectorAll('.stoi');
                allCosts.forEach(function(cost) {
                    total += parseInt(cost.innerHTML) || 0;
                });
                document.getElementById('total').innerHTML = total;
            }
        </script>
    </body>
    </html>
    <?php
}
// Оформление заказа
elseif(isset($_POST["zak"]) && isset($_POST["id"])) {
    $mass = $_POST["id"];
    $kol = $_POST["kol"];
    $cena = $_POST["cena"];
    $i = 0;
    $id_user = 9; // пока только один пользователь
    $data = date("Y-m-d H:i:s");
    $id_order = strtotime($data);
    
    while(isset($mass[$i])) {
        $sql = "INSERT INTO orders (id_order, id_user, id_tovar, quantity, cost, datatime) 
                VALUES ('$id_order', '$id_user', '{$mass[$i]}', '{$kol[$i]}', '{$cena[$i]}', '$data')";
        $result1 = mysqli_query($link, $sql) or die("Query failed: " . mysqli_error($link));
        $i++;
    }
    
    // Перенаправление на страницу uspex.php
    header("Location: uspex.php?i=4");
    exit();
}
?>
