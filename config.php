<?php

try{
    $db = new PDO("mysql:host=localhost;dbname=discussion","root","");
}
catch(exception $e){
    die('Erreur'. $e->getMessage());
}

?>
