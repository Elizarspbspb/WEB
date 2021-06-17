<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	
    <title>Апартаменты</title>
</head>

    <?
    require_once("function.php");
    require_once("db.php");
    require_once("header.php");
    ?>
    <div  class="allDisp container_header">
        <h3 class="section_suptitle">Регистрация</h3>
        <form  method="post" class="myForm">
            <p id="error"></p>
            <input  required  name="name" class="input" type="text" placeholder="Введите имя">
            <br>
            <input  required  name="f" class="input" type="text" placeholder="Введите фамилию">
            <br>
            <input  required  name="o" class="input" type="text" placeholder="Введите отчество">
            <br>
            <input  required  name="login" class="input" type="text" placeholder="Введите логин">
            <br>
            <input  required  name="phone" class="input" type="text" placeholder="Введите телефон">
            <br>
            <input  required  name="passport" class="input" type="text" placeholder="Введите паспортные данные">
            <br>
            <input  required   name="password" class="input" type="password" placeholder="password">
            <br>
            <input type="submit" class="input_form" value="Регистрация">
        </form>
    </div>
        <?
        if(isset($_POST["login"])){
        $sql = 'insert into Покупатель (Фамилия, Имя,Отчество, Логин, Пароль, `Телефон`,`Паспортные данные`) values (:f, :n, :o, :l,:pass, :p, :passport)';

        $params = [
            "l" => $_POST["login"],
            "pass" => $_POST["password"],
            "p" => $_POST["phone"],
            "f" => $_POST["f"],
            "o" => $_POST["o"],
            "passport" => $_POST["passport"],
            "n" => $_POST["name"]

        ];
        $statement = $connection->prepare($sql);
        $statement->execute($params);
        }
    ?>
    <?
    //require_once("footer.php");
    ?>