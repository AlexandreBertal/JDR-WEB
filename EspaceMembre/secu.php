<?php

    if(session_status() == PHP_SESSION_NONE)
        {
            session_start();
        }
        
    if(!isset($_SESSION['auth']))
        {
            // L'utilisateur n'est pas connecté ! redirection !
            $_SESSION['flash']['danger'] = "Vous n'avez passer accès à cette page";
            header('Location: ../index.php');
            exit();
        }
?>
