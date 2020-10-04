<?php 
    $host = "mysql-jdr.alwaysdata.net";
    $databname = "jdr_bdd";
    $username = "jdr";
    $password = "KDr#s+6mbTt_";
    $port = "3306";

    try{
        $bdd = new PDO("mysql:host=$host;port=$port;dbname=$databname", $username, $password);
    }
    catch (Exception $e){
            die('Erreur : ' . $e->getMessage());
    }
?>