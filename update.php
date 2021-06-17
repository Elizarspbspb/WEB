<?php

    require_once("db.php");

if($t = $_POST['idАппартаменты']){
            $sql = "update Аппартаменты set Этаж = :tmp, Этажность = :tmp2, `Количество комнат` = :tmp3, Цена = :tmp4, `Тип аппартаментов_idТип аппартаментов`= :tmp5, Застройщик_idЗастройщик = :tmp6 where idАппартаменты = :idTmp";
            $params = [
                'tmp' => $_POST['etaz'],
				'tmp2' => $_POST['etaznost'],
				'tmp3' => $_POST['room'],
				'tmp4' => $_POST['cost'],
				'tmp5' => $_POST['filtr_field'],
				'tmp6' => $_POST['filtr_field2'],
                'idTmp' =>  $t
            ];
            $statement = $connection->prepare($sql);
            $statement->execute($params);
header('Location: admin_apart_del.php',true, 301);
}
