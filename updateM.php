<?php

    require_once("db.php");

if($t = $_POST['idМенеджер']){
            $sql = "update Менеджер set Логин = :tmp, Пароль = :tmp2, Фамилия = :tmp3, Имя = :tmp4, Отчество = :tmp5, `Номер телефона` = :tmp6, Email = :tmp7 where idМенеджер = :idTmp";
            $params = [
                'tmp' => $_POST['login'],
				'tmp2' => $_POST['pass'],
				'tmp3' => $_POST['fam'],
				'tmp4' => $_POST['name'],
				'tmp5' => $_POST['otch'],
				'tmp6' => $_POST['number'],
				'tmp7' => $_POST['email'],
                'idTmp' =>  $t
            ];
            $statement = $connection->prepare($sql);
            $statement->execute($params);
header('Location: admin_meneger_del.php',true, 301);
}
