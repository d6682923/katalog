$result = mysql_query($link, "SELECT * FROM tovars");
while($row = mysql_fetch_array($result))
{
    $id=$row[0]; //переменная $id содержит идентификатор (номер) записи
    echo "<tr>
            <td>".$row["id"]."</td>
            <td>".$row["name"]."</td>
            <td>".$row["cena"]."</td>
            <td>".$row["kol"]."</td>
            <td>".$row["srok"]."</td>
        </td>";
}
<!--Добавляем ссылку «Редактировать» и передаем в файл update.php идентификатор редактируемой записи-->
<a href="update.php?id=<? echo $id ?>">Редактировать</a></td><td>

<!-- Добавляем в таблицу столбец с флажком, каждый флажок указывает на номер записи -->
<input type=checkbox name=ud_id[] value="<? echo $id ?>">
    <? echo "</td>
    </tr>";
}
</table>
<! - - Кнопка «Удалить» - - >
<center><input type=submit name="ud" value=удалить></center>
</form>