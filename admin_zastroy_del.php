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
	
    <title>Апартаменты_admin_zastroy</title>
</head>
<body>   
    <div class=" container_header"> 
    <h3 class="section_suptitle">Все наши Застройщики в агентстве</h3> 
    <form action="" method="post">
    <?
			$sql = 'select застройщик.idЗастройщик as №, застройщик.Название, застройщик.Номер, застройщик.Адрес from Застройщик';

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
			$sql = "delete from застройщик where idЗастройщик = :idT";
            $params = [
                'idT' => $mass
            ];
            $statement = $connection->prepare($sql);
            $statement->execute($params);
        }
    }
?>
	
	
	
	
	<h3 class="section_suptitle"> Обновить данные Застройщика </h3>
        <form action='updateZ.php' method="post" class="myForm">
            <p id="error"></p>
            <input  required  name="idЗастройщик" class="input" type="number" placeholder="№ Застройщика:">
            <br>
			<input  required  name="name" class="input" type="text" placeholder="Название:">
            <br>
			<input  required  name="number" class="input" type="text" placeholder="Номер:">
            <br>
			<input  required  name="adres" class="input" type="text" placeholder="Адрес:">
            <br>
            <br>
            <input type="submit" class="input_form" value="Изменить">
        </form>