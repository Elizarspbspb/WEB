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
        <h3 class="section_suptitle">Добавление новых Апартаментов</h3>
        <form  method="post" class="myForm">
            <p id="error"></p>
            <input  required  name="room" class="input" type="text" placeholder="Введите Количество комнат">
            <br>
            <input  required  name="cost" class="input" type="text" placeholder="Введите Цену">
            <br>
            <input  required  name="floor" class="input" type="text" placeholder="Введите Этаж">
            <br>
            <input  required  name="floors" class="input" type="text" placeholder="Введите Этажность дома">
            <br>
            <input  required  name="stena" class="input" type="text" placeholder="Введите Материал стен">
            <br>
			<input  required  name="staff" class="input" type="text" placeholder="Охрана есть - 1. Охраны нет - 2">
            <br>
            <input  required  name="metro" class="input" type="text" placeholder="Введите Метро">
            <br>
			
			<label>Тип: </label>
			<select size="1"  name="filtr_field1">
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
            <input type="submit" class="input_form" value="Добавление нового апартамента">
        </form>
    </div>
        <?

        if(isset($_POST["room"])){

		$sql = "insert into Аппартаменты set Этаж = :tmp, Этажность = :tmp2, `Количество комнат` = :tmp3, Цена = :tmp4, `Тип аппартаментов_idТип аппартаментов`= :tmp5, Застройщик_idЗастройщик = :tmp6, Метро = :tmp7, Охрана = :tmp8, `Материал стен` = :tmp9";
            
        $params = [
			
			    'tmp' => $_POST['floor'],
				'tmp2' => $_POST['floors'],
				'tmp3' => $_POST['room'],
				'tmp4' => $_POST['cost'],
				'tmp5' => $_POST['filtr_field1'],
				'tmp6' => $_POST['filtr_field2'],
				'tmp7' => $_POST['metro'],
				'tmp8' => $_POST['staff'],
				'tmp9' => $_POST['stena']
				
        ];
        $statement = $connection->prepare($sql);
        $statement->execute($params);
					if($params) echo " Успешное Добавление новых апартаментов. Обновите страницу ";
        }
    ?>
    <?
    require_once("footer.php");
    ?>