<?
    session_start();
    require_once("function.php");
    require_once("db.php");
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

<body>

   <? require_once("header.php");
    if(isset($_POST["filtr"])){
    $sql = 'select Аппартаменты.idАппартаменты as №,   `Тип аппартаментов`.Название as Тип, Аппартаменты.Цена, Аппартаменты.Этаж, Аппартаменты.Этажность, Аппартаменты.Метро, Застройщик.Название as Застройщик from Аппартаменты, Застройщик, `Тип аппартаментов` where Аппартаменты.`Застройщик_idЗастройщик`=Застройщик.idЗастройщик and Аппартаменты.`Тип аппартаментов_idТип аппартаментов`=`Тип аппартаментов`.`idТип аппартаментов` and Аппартаменты.`Тип аппартаментов_idТип аппартаментов`= :id and Аппартаменты.Статус = "1"';

    $params = [
         "id" => $_POST["filtr_field"]
    ];
    $statement = $connection->prepare($sql);
    $statement->execute($params);
    $data1 = $statement->fetchAll(PDO::FETCH_ASSOC);          
    }
    else {
        $sql2 = 'select idАппартаменты as №,   `Тип аппартаментов`.Название as Тип, Цена, Этаж, Этажность, Метро, Застройщик.Название as Застройщик from Аппартаменты, Застройщик, `Тип аппартаментов` where Аппартаменты.`Застройщик_idЗастройщик`=Застройщик.idЗастройщик and Аппартаменты.`Тип аппартаментов_idТип аппартаментов`=`Тип аппартаментов`.`idТип аппартаментов` and Аппартаменты.Статус = "1"';
        $statement = $connection->query($sql2);
        $data1 = $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    
?>

    <div class=" allDisp container_header"> 
    <h3 class="section_suptitle">Каталог</h3>   
    <form name="id" class="sectionMy" action="" method="post">
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
        <input type="submit" value="Применить фильтр" name="filtr" class="button">
        <input type="submit" value="Очистить" name="all" class="button">
            <?
    if($_SESSION['userID']){
        print_table($data1,2);
    }
    else{
         print_table($data1,1);
    }
    if($_SESSION['userID']){
        echo '<h3 class="section_suptitle"></h3>';  
        echo '<div class="sectionMy" >';
        echo "<input type='submit' value='Добавить в корзину' name='zak' class='button'>";
        echo '</div>';
    }
    ?>
    </form>  

    </div>
    <?
    require_once("footer.php");
    ?>

</body>

<?
    if ( $_POST['zak'] )
    {
        var_dump($_POST[ 'prod' ]);
        $array_zak = $_POST[ 'prod' ];
        foreach($array_zak as $state => $mass){
        $sql = "insert into Сделка
            (Менеджер_idМенеджер, Покупатель_idПокупатель, `Статус сделки_idСтатус сделки`, `Аппартаменты_idАппартаменты`)
            values
            (1, :idU, 1, :idT);";
                        $params = [
                            'idT' => $mass,
                            'idU' =>  $_SESSION['userID']
                        ];
                        $statement = $connection->prepare($sql);
            if($statement->execute($params)) {echo 'Данные добавлены';}
        }
        foreach($array_zak as $state => $mass){
            $sql = "update Аппартаменты set Статус = 0 where idАппартаменты = :idTmp";
            $params = [
                'idTmp' =>  $mass
            ];
            $statement = $connection->prepare($sql);
            $statement->execute($params);
        }
    }