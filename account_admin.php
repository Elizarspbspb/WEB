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
    <h3 class="section_suptitle">Данные Администратора</h3> 
    <?
         $sql = 'select Фамилия, Имя, Отчество, Логин, Пароль, `Номер телефона`, Email from Менеджер where idМенеджер = :id';

            $params = [
                "id" => $_SESSION['userIDM']
            ];
            
            $statement = $connection->prepare($sql);
            $statement->execute($params);
            $data1 = $statement->fetchAll(PDO::FETCH_ASSOC);  
            
            print_table($data1,1);
    ?>
    </div>   
	
	
	
	
	<h3 class="section_suptitle"> Обновить Данные </h3>
        <!-- <form action='updateUSER.php' method="post" class="myForm">  -->
		<form action="" method="post" class="myForm">
            <p id="error"></p>
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
            <input type="submit" name="Up" class="input_form" value="Изменить">
        </form>
		
<?		if($_POST['Up']){
            $sql = "update Менеджер set Логин = :tmp, Пароль = :tmp2, Фамилия = :tmp3, Имя = :tmp4, Отчество = :tmp5, `Номер телефона` = :tmp6, Email = :tmp7 where idМенеджер = :idTmp";
            $params = [
                'tmp' => $_POST['login'],
				'tmp2' => $_POST['pass'],
				'tmp3' => $_POST['fam'],
				'tmp4' => $_POST['name'],
				'tmp5' => $_POST['otch'],
				'tmp6' => $_POST['number'],
				'tmp7' => $_POST['email'],
				'idTmp' => $_SESSION['userIDM']
            ];
            $statement = $connection->prepare($sql);
            $statement->execute($params); 
			if($params) echo " Успешное обновление данных. Обновите страницу ";
}
?>	
    