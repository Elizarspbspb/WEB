<?php

    require_once("db.php");

if($t = $_POST['idПокупатель']){
            $sql = "update Покупатель set Фамилия = :tmp3, Имя = :tmp4, Отчество = :tmp5, `Паспортные данные` = :tmp6, Телефон = :tmp7, Email = :tmp8 where idПокупатель = :idTmp";
            $params = [
				'tmp3' => $_POST['fam'],
				'tmp4' => $_POST['name'],
				'tmp5' => $_POST['otch'],
				'tmp6' => $_POST['pasport'],
				'tmp7' => $_POST['number'],
				'tmp8' => $_POST['email'],
                'idTmp' =>  $t
            ];
            $statement = $connection->prepare($sql);
            $statement->execute($params);
header('Location: admin_pokupatel_del.php',true, 301);
}
