<?php
include "bdconnect.php";
if(isset($_POST["reg"])){
    $name=htmlspecialchars($_POST["name"]);
    $login=htmlspecialchars($_POST["login"]);
    $password=htmlspecialchars($_POST["password"]);
    $hash=password_hash($password,PASSWORD_BCRYPT);
    $q=mysqli_query($link,"SELECT * FROM users WHERE login='".$login."'");
    $nq=mysqli_num_rows($q);
    if($nq==0){
    $hasErrors=true;
    $sql="INSERT INTO users (login, hash, name) VALUES ('$login','$hash','$name')";
    $result=mysqli_query($link,$sql);
    $mfq=mysqli_fetch_array($q);
    $_SESSION["logged"] = 1;
    $sql="SELECT max(id) FROM users";
    $result=mysqli_query($link,$sql);
    $mfq=mysqli_fetch_array($q);
    $_SESSION["userid"] = $mfq[0];
    echo "успешная регистрация" ;
    }else {
    echo "Логин уже занят";
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
    <label for="login">Логин</label>
    <input type="text" name="login" id="">
    <label for="name">Имя</label>
    <input type="text" name="name" id="">
    <label for="password">Пароль</label>
    <input type="password" name="password" id="">
    <input type="submit" value="Зарегистрироваться" name="reg">
</form>
</body>
</html>