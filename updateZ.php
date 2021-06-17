<?php

    require_once("db.php");

if($t = $_POST['idЗастройщик']){
            $sql = "update Застройщик set Название = :tmp, Номер = :tmp2, Адрес = :tmp3 where idЗастройщик = :idTmp";
            $params = [
                'tmp' => $_POST['name'],
				'tmp2' => $_POST['number'],
				'tmp3' => $_POST['adres'],
                'idTmp' =>  $t
            ];
            $statement = $connection->prepare($sql);
            $statement->execute($params);
header('Location: admin_zastroy_del.php',true, 301);
}
