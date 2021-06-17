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
	
    <title>Апартаменты_Admin</title>
</head>

    <?
    require_once("function.php");
    require_once("db.php");
    require_once("header.php");
    ?>
    <div  class="allDisp container_header">
            <h3 class="section_suptitle">Вход в аккаунт Администратора</h3>
            <form  action="in_admin.php" method="post" class="myForm">
    <br>
                    <input class="input" name="login" type="text" placeholder="login">
    <br>
                    <input class="input"   name="password" type="password" placeholder="password">
    <br>
                <input type="submit"  class="input_form"  value="Войти как администратор">
            </form>
    </div>
    <?
        if(isset($_POST["login"])){
        $sql = 'select * from Менеджер where Логин = :id and Пароль = :pass and idМенеджер = 1';

        $params = [
            "id" => $_POST["login"],
            "pass" => $_POST["password"]
        ];
        
        $statement = $connection->prepare($sql);
        $statement->execute($params);
        $data1 = $statement->fetchAll(PDO::FETCH_ASSOC);  
        
        $_SESSION[ "userIDM" ]  = $data1[0]['idМенеджер'];
        var_dump($_SESSION); 
        }
    ?>
    <?
    require_once("footer.php");
    ?>