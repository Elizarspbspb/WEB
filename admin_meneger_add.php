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
        <h3 class="section_suptitle">Добавление новых Менеджеров</h3>
        <form  method="post" class="myForm">
            <p id="error"></p>
            <input  required  name="login" class="input" type="text" placeholder="Введите Логин">
            <br>
            <input  required  name="pass" class="input" type="text" placeholder="Введите Пароль">
            <br>
            <input  required  name="fam" class="input" type="text" placeholder="Введите Фамилию">
            <br>
            <input  required  name="name" class="input" type="text" placeholder="Введите Имя">
            <br>
            <input  required  name="otch" class="input" type="text" placeholder="Введите Отчество">
            <br>
			<input  required  name="telephone" class="input" type="text" placeholder="Введите Телефон">
            <br>
            <input  required  name="email" class="input" type="text" placeholder="Введите Email">
            <br>
			<br>
            <input type="submit" class="input_form" value="Добавление нового менеджера">
        </form>
    </div>
        <?

        if(isset($_POST["login"])){

		$sql = "insert into Менеджер set Логин = :tmp, Пароль = :tmp2, Фамилия = :tmp3, Имя = :tmp4, Отчество= :tmp5, `Номер телефона` = :tmp6, Email = :tmp7";
            
        $params = [
			
			    'tmp' => $_POST['login'],
				'tmp2' => $_POST['pass'],
				'tmp3' => $_POST['fam'],
				'tmp4' => $_POST['name'],
				'tmp5' => $_POST['otch'],
				'tmp6' => $_POST['telephone'],
				'tmp7' => $_POST['email']
				
        ];
        $statement = $connection->prepare($sql);
        $statement->execute($params);
					if($params) echo " Успешное Добавление нового менеджера. Обновите страницу ";
        }
    ?>
    <?
    require_once("footer.php");
    ?>