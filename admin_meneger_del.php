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
	
    <title>Апартаменты_admin_meneger</title>
</head>
<body>   
    <div class=" container_header"> 
    <h3 class="section_suptitle">Все наши Менеджеры в агентстве</h3> 
    <form action="" method="post">
    <?
          //$sql = 'select аппартаменты.idАппартаменты as №, Застройщик.Название as Застройщик, `Тип аппартаментов`.Название as Тип, Аппартаменты.Цена, Аппартаменты.Этаж from Аппартаменты, Застройщик, `Тип аппартаментов`, Сделка where Сделка.Покупатель_idПокупатель=:id and  Сделка.Аппартаменты_idАппартаменты = Аппартаменты.idАппартаменты and Аппартаменты.`Тип аппартаментов_idТип аппартаментов` = `Тип аппартаментов`.`idТип аппартаментов` and Аппартаменты.Застройщик_idЗастройщик = Застройщик.idЗастройщик';
			$sql = 'select менеджер.idМенеджер as №, менеджер.Логин, менеджер.Пароль, менеджер.Фамилия, менеджер.Имя, менеджер.Отчество, менеджер.`Номер телефона` as Телефон, менеджер.Email from Менеджер';

            $params = [
                "id" => $_SESSION['userIDM']
            ];
            
            $statement = $connection->prepare($sql);
            $statement->execute($params);
            $data1 = $statement->fetchAll(PDO::FETCH_ASSOC);  
            
            print_table($data1,3);
            if($_SESSION['userIDM']){
                echo '<h3 class="section_suptitle"></h3>';  
                echo '<div class="sectionMy" >';
                echo "<input type='submit' value='Удалить' name='del' class='button'>";
                echo '</div>';
            }
    ?>
    </form>
    </div>

    <? require_once "footer.php";?>
</body>
</html>
<?

    if ( $_POST['del'] )
    {
        $array_apart = $_POST[ 'prod' ];		
        foreach($array_apart as $state => $mass){
			$sql = "delete from менеджер where idМенеджер = :idT";
            $params = [
                'idT' => $mass
            ];
            $statement = $connection->prepare($sql);
            $statement->execute($params);
        }
    }
?>
	
	
	
	
	<h3 class="section_suptitle"> Обновить данные Менеджеров </h3>
        <form action='updateM.php' method="post" class="myForm">
            <p id="error"></p>
            <input  required  name="idМенеджер" class="input" type="number" placeholder="№ Менеджера:">
            <br>
			<input  required  name="login" class="input" type="text" placeholder="Логин">
            <br>
			<input  required  name="pass" class="input" type="text" placeholder="Пароль">
            <br>
			<input  required  name="fam" class="input" type="text" placeholder="Фамилия:">
            <br>
			<input  required  name="name" class="input" type="text" placeholder="Имя:">
            <br>
			<input  required  name="otch" class="input" type="text" placeholder="Отчество:">
            <br>
			<input  required  name="number" class="input" type="text" placeholder="Номер телефона:">
            <br>
			<input  required  name="email" class="input" type="text" placeholder="Email:">
			<br>
            <br>
            <input type="submit" class="input_form" value="Изменить">
        </form>
