<?php 
    session_start();
    include('../includes/BDD.php');
    if (isset( $_POST['pseudo'])AND isset($_POST['mp']) AND !empty($_POST['pseudo']) AND !empty($_POST['mp']))
        {   
            $identifiant   = htmlspecialchars($_POST['pseudo']);
            $password_user = htmlspecialchars($_POST['mp']);
            
            $requser = $bdd->prepare('SELECT * FROM utilisateur WHERE pseudo = ? ');
            $requser->execute(array($identifiant));
            $user = $requser->fetch();
            if ($user !== NULL) 
                {  
                    if (password_verify( $password_user ,$user['mot_de_passe']) AND isset( $_POST['remember'])AND !empty($_POST['remember']) AND $_POST['remember'] == "on" ) 
                        {  
                        
                           
                            $_SESSION['auth'] = $user;
                            setcookie("Connecter[two]", $user['mot_de_passe'],time()+60*60*24*365,"/",);
                            setcookie("Connecter[one]", $user['pseudo'],time()+60*60*24*365,"/",);
                            header("Location: ./profil.php");
                            exit();

                        }
                    elseif (password_verify( $password_user ,$user['mot_de_passe'])) 
                        {  
                        
                            $_SESSION['auth'] = $user;
                            header("Location: ./profil.php");
                            exit();
                            
                        }
                    else
                        {
                            $_SESSION['flash']['danger'] = " Votre identifant ou votre mot de passe ne corresponde pas";
                            header("Location: ../index.php");
                           
                        }
                }
            else
                {
                    $_SESSION['flash']['danger'] = " Ce compte n'existe pas ";
                    header("Location: ../index.php");
                }    
        } 
?>