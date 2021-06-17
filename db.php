<?php
$server='localhost';
$username = 'root';
$pwd = 'root';
$db_name = 'home';
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

$connection = new PDO("mysql:host=$server;dbname=$db_name",$username,$pwd,$options);

