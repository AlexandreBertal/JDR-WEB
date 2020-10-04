<?php 
     $host = "mysql-jdr.alwaysdata.net";
     $databname = "";
     $username = "";
     $password = "";
     $port = "";

    try{
        $bdd = new PDO("mysql:host=$host;port=$port;dbname=$databname", $username, $password);
    }
    catch (Exception $e){
            die('Erreur : ' . $e->getMessage());
    }
?>
