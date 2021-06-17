<?php

    require_once("db.php");

if($t = $_POST['idПокупатель']){
            $sql = "update Покупатель set Логин = :tmp, Пароль = :tmp2 where idПокупатель = :idTmp";
            $params = [
                'tmp' => $_POST['login'],
				'tmp2' => $_POST['pass'],
                'idTmp' =>  $t
            ];
            $statement = $connection->prepare($sql);
            $statement->execute($params);
header('Location: account.php',true, 301);
}
