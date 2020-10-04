<?php 
    include("../includes/nav.php");
    require("./secu.php");
    require("../includes/BDD.php");
    include("../includes/head.php");
    
    if(isset($_POST['nom'])AND isset($_FILES['illustration']) AND !empty($_POST['nom']) AND !empty($_FILES['illustration']))
        { 
            if ($_FILES['illustration']['size'] <= 10000000)
                {
                   
                    //// Testons si l'extension est autorisée
                    $infosfichier = pathinfo($_FILES['illustration']['name']);
                    $extension_upload = $infosfichier['extension'];
                    $extensions_autorisees = array('jpg', 'jpeg', 'png');
                    if (in_array($extension_upload, $extensions_autorisees))
                        {
                            move_uploaded_file($_FILES['illustration']['tmp_name'], '../image/' . basename($_FILES['illustration']['name']));
                            $personnage = $bdd->prepare('INSERT INTO `carte`(`nom_carte`, `lien_carte`) VALUES (:nom,:illustration)');
                            $personnage->bindValue(':nom',$_POST['nom'], PDO::PARAM_STR);
                            $personnage->bindValue(':illustration',"../image/".$_FILES['illustration']['name'], PDO::PARAM_STR);
                            $personnage->execute();
                            
                            $_SESSION['flash']['danger']="Carte ajouté";
                            header('Location:./profil.php');
                        }
                    else
                        {
                            $_SESSION['flash']['danger']="Ce format n'est pas correct veuillez fournir un document JPG,JPEG ou PNG";
                            header('Location:./profil.php');
                        }
                }
            else
                {
                    $_SESSION['flash']['danger']="Votre image ne doit pas dépasser 10 Mo";
                    header('Location:./profil.php');
                }
        }
    elseif(isset($_POST['nom'])AND isset($_FILES['illustration'])AND isset($_POST['gen'])) 
        {
            $_SESSION['flash']['danger']="Vous devez obligatoirement fournir un nom une illustration et à quelle génération il appartient";
            header('Location:./profil.php');
        }
  ?>
<!DOCTYPE html>
<html>

    <head>
      <link rel="stylesheet" href="../CSS/profil.css">
    </head>

    <body>
        <div class="columP">     
            <form action="" method="post"enctype="multipart/form-data" >
                <label for="nom">Nom du lieu : </label>
                <input type="text" name="nom" id="nom">
                <hr>
                <label for="myPicture">Sélectionner votre carte : </label>
                <input type="file" id="myPicture" name="illustration"><br><br>
                <br><br>
                <input type="submit" value="Rajouter cette carte">
            </form>                 
        </div>
    </body>
</html>