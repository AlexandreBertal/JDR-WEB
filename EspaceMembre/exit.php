<?php
	session_start();
	unset($_SESSION['auth']);
	unset($_SESSION['flash']);

	$_SESSION['flash']['danger'] = "Vous avez été deconnecté !";
	setcookie("Connecter[two]", $user['mot_de_passe'],time()-60*60*24*365,"/",);
	setcookie("Connecter[one]", $user['pseudo'],time()-60*60*24*365,"/",);
	//Deconnexion faites !
	header('Location:../index.php');


?>