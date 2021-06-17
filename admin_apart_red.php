<?
    session_start();
    require_once("function.php");
    require_once("db.php");
    require_once("header.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	
    <title>Апартаменты_admin</title>
</head>
<body>   
    <div class=" container_header"> 
    <h3 class="section_suptitle">Все Апартаменты в агентстве</h3> 
    <form action="" method="post">
    <?
			$sql = 'select аппартаменты.idАппартаменты as №, Застройщик.Название as Застройщик, `Тип аппартаментов`.Название as Тип, Аппартаменты.Цена, Аппартаменты.`Количество комнат`, Аппартаменты.Этаж, Аппартаменты.Этажность from Аппартаменты, Застройщик, `Тип аппартаментов` where Аппартаменты.`Тип аппартаментов_idТип аппартаментов` = `Тип аппартаментов`.`idТип аппартаментов` and Аппартаменты.Застройщик_idЗастройщик = Застройщик.idЗастройщик';

            $params = [
                "id" => $_SESSION['userIDM']
            ];
            
            $statement = $connection->prepare($sql);
            $statement->execute($params);
            $data1 = $statement->fetchAll(PDO::FETCH_ASSOC);  
            
            print_table($data1,1);

    ?>
    </form>
    </div>

    <? require_once "footer.php";?>
</body>
</html>

<h3 class="section_suptitle"> Обновить данные Апартаментов </h3>
        <form action='update.php' method="post" class="myForm">
            <p id="error"></p>
            <input  required  name="idАппартаменты" class="input" type="number" placeholder="№ Апартаментов:">
            <br>
			<input  required  name="room" class="input" type="text" placeholder="Количество комнат">
            <br>
			<input  required  name="cost" class="input" type="text" placeholder="Цена">
            <br>
			<input  required  name="etaz" class="input" type="text" placeholder="Номер этажа:">
            <br>
			<input  required  name="etaznost" class="input" type="text" placeholder="Этажность:">
            <br>
			<br>
			
			<label>Тип: </label>
			<select size="1"  name="filtr_field">
			<?php
            $req_type = "SELECT `idТип аппартаментов`, Название FROM  `Тип аппартаментов`";
            $statement = $connection->query($req_type);
            $data = $statement->fetchAll(PDO::FETCH_ASSOC);

            foreach($data as $s => $m)
            {
                    echo "<option selected value=\"". $m["idТип аппартаментов"] . "\">". $m["Название"] . "</option>";
            }
			?>
			</select>
	
			<label>Застройщик: </label>
			<select size="1"  name="filtr_field2">
			<?php
            $req_type = "SELECT `idЗастройщик`, Название FROM  Застройщик";
            $statement = $connection->query($req_type);
            $data = $statement->fetchAll(PDO::FETCH_ASSOC);

            foreach($data as $s => $m)
            {
                    echo "<option selected value=\"". $m["idЗастройщик"] . "\">". $m["Название"] . "</option>";
            }
			?>
			</select>
			<br>
            <br>
            <input type="submit" class="input_form" value="Добавить">
        </form>

