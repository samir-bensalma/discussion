<?php

$pdo = new PDO("mysql:host=localhost;dbname=discussion","root","");
var_dump($pdo);

if (isset($pdo)){
    echo "OK";
}


?>
