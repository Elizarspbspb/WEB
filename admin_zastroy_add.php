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
        <h3 class="section_suptitle">Добавление новых Застройщиков</h3>
        <form  method="post" class="myForm">
            <p id="error"></p>
            <input  required  name="name" class="input" type="text" placeholder="Введите Название">
            <br>
            <input  required  name="number" class="input" type="text" placeholder="Введите Номер телефона">
            <br>
			<input  required  name="adres" class="input" type="text" placeholder="Введите Адрес">
            <br>
			<br>
            <input type="submit" class="input_form" value="Добавление нового Застройщика">
        </form>
    </div>
        <?

        if(isset($_POST["name"])){

		$sql = "insert into Застройщик set Название = :tmp, Номер = :tmp2, Адрес = :tmp3";
            
        $params = [
			
			    'tmp' => $_POST['name'],
				'tmp2' => $_POST['number'],
				'tmp3' => $_POST['adres']
				
        ];
        $statement = $connection->prepare($sql);
        $statement->execute($params);
					if($params) echo " Успешное Добавление нового Застройщика. Обновите страницу ";
        }
    ?>
    <?
    require_once("footer.php");
    ?>