<?php 
    include("../includes/nav.php");
    require("./secu.php");
    require("../includes/BDD.php");
    include("../includes/head.php");
  
    if(isset($_POST['text'])AND !empty($_POST['text']AND $_POST['text'] !== $_SESSION['auth']["description_utilisateur"]))
        {
            $utilisateur = $bdd->prepare(' UPDATE utilisateur SET description_utilisateur = :description  WHERE ID_utilisateur = :Joueur');
            $utilisateur->bindValue(':description',$_POST['text'], PDO::PARAM_STR);
            $utilisateur->bindValue(':Joueur',$_SESSION['auth']["ID_utilisateur"],PDO::PARAM_INT);
            $utilisateur->execute();
            $_SESSION['auth']["description_utilisateur"]=$_POST['text'];
            header('Location:./profil.php');
        }
    if(isset($_POST['pseudo'])AND !empty($_POST['pseudo']AND $_POST['pseudo'] !== $_SESSION['auth']["pseudo"]))
        {
            $utilisateur = $bdd->prepare(' UPDATE utilisateur SET pseudo = :pseudo  WHERE ID_utilisateur = :Joueur');
            $utilisateur->bindValue(':pseudo',$_POST['pseudo'], PDO::PARAM_STR);
            $utilisateur->bindValue(':Joueur',$_SESSION['auth']["ID_utilisateur"],PDO::PARAM_INT);
            $utilisateur->execute();
            $_SESSION['auth']["pseudo"]=$_POST['pseudo'];
            header('Location:./profil.php');
            
        }
    if(isset($_POST['Amp']) AND isset($_POST['Nmp']) AND !empty($_POST['Amp']) AND !empty($_POST['Nmp']) AND $_POST['Amp'] == $_SESSION['auth']["mot_de_passe"])
        {
            $hash = password_hash( $_POST['Nmp'], PASSWORD_BCRYPT);
            $utilisateur = $bdd->prepare(' UPDATE utilisateur SET mot_de_passe = :MP  WHERE ID_utilisateur = :Joueur');
            $utilisateur->bindValue(':MP', $hash, PDO::PARAM_STR);
            $utilisateur->bindValue(':Joueur',$_SESSION['auth']["ID_utilisateur"],PDO::PARAM_INT);
            $utilisateur->execute();
            $_SESSION['auth']["mot_de_passe"]=$hash;
            header('Location:./profil.php');
        }
    elseif (isset($_POST['Amp']) AND isset($_POST['Nmp']) AND !empty($_POST['Amp']) AND !empty($_POST['Nmp']) AND $_POST['Amp'] !== $_SESSION['auth']["mot_de_passe"]) 
        {
            $_SESSION['flash']['danger'] = " mot de passe incorecte" ;
            header('Location:./profil.php'); 
        }
    if(isset($_FILES['pp'])AND !empty($_FILES['pp'])AND $_FILES['pp'] !== $_SESSION['auth']["image_utilisateur"] )
        {
           
            // Testons si le fichier n'est pas trop gros
            if ($_FILES['pp']['size'] <= 500000)
                {
                    //// Testons si l'extension est autorisée
                    $infosfichier = pathinfo($_FILES['pp']['name']);
                    $extension_upload = $infosfichier['extension'];
                    $extensions_autorisees = array('jpg', 'jpeg', 'png');
                    if (in_array($extension_upload, $extensions_autorisees))
                        {
                            move_uploaded_file($_FILES['pp']['tmp_name'], '../image/profil/' . basename($_FILES['pp']['name']));
                            $utilisateur = $bdd->prepare(' UPDATE utilisateur SET image_utilisateur = :pp  WHERE ID_utilisateur = :Joueur');
                            $utilisateur->bindValue(':pp', $_FILES['pp']['name'], PDO::PARAM_STR);
                            $utilisateur->bindValue(':Joueur',$_SESSION['auth']["ID_utilisateur"],PDO::PARAM_INT);
                            $utilisateur->execute();
                            $_SESSION['auth']["image_utilisateur"]=$_FILES['pp']['name'];
                            header('Location:./profil.php');
                        }
                }
            else
                {
                    $_SESSION['flash']['danger'] = " Votre image ne doit pas dépasser 500 Ko" ;
                    header('Location:./profil.php'); 
                }
        }      
?>
<!DOCTYPE html>
<html>

    <head>
      <link rel="stylesheet" href="../CSS/profil.css">
    </head>

    <body>
        <div class="columP">
                <?php
                   
				if ($_SESSION['auth']["image_utilisateur"] == NULL) 
                {
                    if(!empty($_SESSION['flash']['danger'])) {echo("<h3 style=\"color: whitesmoke;\">".$_SESSION['flash']['danger']."<h3>");$_SESSION['flash']['danger']="";}
                                    echo
                                        ("
                                           
                                        <form action=\"\" method=\"POST\"enctype=\"multipart/form-data\">
                                        <label for=\"myPicture\">Sélectionner une image pour votre photo de profil : </label>
                                        <input type=\"file\" id=\"myPicture\" name=\"pp\"><br><br>
                                         <hr> 
                                        <textarea placeholder=\"Ajouter une description à votre profil\" rows=\"15\" cols=\"40\" name=\"text\">". $_SESSION['auth']["description_utilisateur"]."</textarea><br><br>
                                        <hr>
                                        <label for=\"pseudo\">Votre nouveau pseudo</label>
                                        <input placeholder=\"".$_SESSION['auth']["pseudo"]."\" type=\"text\" name=\"pseudo\" id=\"pseudo\">
                                        <hr>
                                        <label for=\"Amp\">Votre mot de passe actuel</label>
                                        <input type=\"password\" name=\"Amp\" id=\"Amp\">
                                        <br><br>
                                        <label for=\"Nmp\">Confirmé votre nouveau mot de passe</label>
                                        <input type=\"password\" name=\"Nmp\" id=\"nmp\"><br><br>
                                        <input type=\"submit\" value=\"Modifier\" class=\"btn btn-primary\" >
                                    </form>
                                        ");
                }
            else
                {
                  
                    echo
                    ("
                        <form action=\"\" method=\"POST\"enctype=\"multipart/form-data\">
                            <label for=\"myPicture\">Sélectionner une image pour votre photo de profil : </label>
                            <input type=\"file\" id=\"myPicture\" name=\"pp\"><br><br>
                             <hr> 
                            <textarea placeholder=\"Ajout un description à ton profil\" rows=\"15\" cols=\"40\" name=\"text\">". $_SESSION['auth']["description_utilisateur"]."</textarea><br><br>
                            <hr>
                            <label for=\"pseudo\">Votre nouveau pseudo</label>
                            <input placeholder=\"".$_SESSION['auth']["pseudo"]."\" type=\"text\" name=\"pseudo\" id=\"pseudo\">
                            <hr>
                            <label for=\"Amp\">Votre mot de passe actuel</label>
                            <input type=\"password\" name=\"Amp\" id=\"Amp\">
                            <br><br>
                            <label for=\"Nmp\">Confirmé votre nouveau mot de passe</label>
                            <input type=\"password\" name=\"Nmp\" id=\"nmp\"><br><br>
                            <input type=\"submit\" value=\"Modifier\" class=\"btn btn-primary\" >
                        </form>
                    ");		
                }
            

                ?>
               
         
        
           
                       
</div>
            
    
    

    </body>
</html>