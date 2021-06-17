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
	
    <title>Апартаменты</title>
</head>
<body>
    <div class=" container_header"> 
    <h3 class="section_suptitle">Данные пользователя</h3> 
    <form action="" method="post" name="Data">
    <?
         $sql = 'select Фамилия, Имя, Отчество, Логин, Пароль, `Телефон` from Покупатель where idПокупатель = :id';

            $params = [
                "id" => $_SESSION['userID']
            ];
            
            $statement = $connection->prepare($sql);
            $statement->execute($params);
            $data1 = $statement->fetchAll(PDO::FETCH_ASSOC);  
            
            print_table($data1,1);
    ?>
    </form>
    </div>    
    <div class=" container_header"> 
    <h3 class="section_suptitle">Заказы</h3> 
    <form action="" method="post">
    <?
          $sql = 'select аппартаменты.idАппартаменты as №, Застройщик.Название as Застройщик, `Тип аппартаментов`.Название as Тип, Аппартаменты.Цена, Аппартаменты.Этаж from Аппартаменты, Застройщик, `Тип аппартаментов`, Сделка where Сделка.Покупатель_idПокупатель=:id and  Сделка.Аппартаменты_idАппартаменты = Аппартаменты.idАппартаменты and Аппартаменты.`Тип аппартаментов_idТип аппартаментов` = `Тип аппартаментов`.`idТип аппартаментов` and Аппартаменты.Застройщик_idЗастройщик = Застройщик.idЗастройщик';

            $params = [
                "id" => $_SESSION['userID']
            ];
            
            $statement = $connection->prepare($sql);
            $statement->execute($params);
            $data1 = $statement->fetchAll(PDO::FETCH_ASSOC);  
            
            print_table($data1,3);
            if($_SESSION['userID']){
                echo '<h3 class="section_suptitle"></h3>';  
                echo '<div class="sectionMy" >';
                echo "<input type='submit' value='Отменить' name='del' class='button'>";
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
        $array_zak = $_POST[ 'prod' ];
        foreach($array_zak as $state => $mass){
        $sql = "delete from Сделка where Аппартаменты_idАппартаменты = :idT";
                            $params = [
                            'idT' => $mass
                        ];
                        $statement = $connection->prepare($sql);
                        $statement->execute($params);
        }
        foreach($array_zak as $state => $mass){
            $sql = "update Аппартаменты set Статус = 1 where idАппартаменты = :idTmp";
            $params = [
                'idTmp' =>  $mass
            ];
            $statement = $connection->prepare($sql);
            $statement->execute($params);
        }
    }
?>
	
	
	
	
	<h3 class="section_suptitle"> Обновить Логин/Пароль </h3>
        <!-- <form action='updateUSER.php' method="post" class="myForm">  -->
		<form action="" method="post" class="myForm">
            <p id="error"></p>
			<!-- <input  required  name="idПокупатель" class="input" type="number" placeholder="№ Покупателя:"> -->
			<br>
			<input  required  name="login" class="input" type="text" placeholder="Логин">
            <br>
			<input  required  name="pass" class="input" type="text" placeholder="Пароль">
            <br>
            <br>
            <input type="submit" name="Up" class="input_form" value="Изменить">
        </form>
		
<?		if($_POST['Up']){
            $sql = "update Покупатель set Логин = :tmp, Пароль = :tmp2 where idПокупатель = :idTmp";
            $params = [
                'tmp' => $_POST['login'],
				'tmp2' => $_POST['pass'],
				'idTmp' => $_SESSION['userID']
            ];
            $statement = $connection->prepare($sql);
            $statement->execute($params); 
			if($params) echo " Успешное обновление данных. Обновите страницу ";
}
?>