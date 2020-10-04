<?php 
    include("../includes/nav.php");
    require("./secu.php");
    require("../includes/BDD.php");
    include("../includes/head.php");
    
    if(isset($_POST['nom'])AND isset($_FILES['illustration'])AND isset($_POST['gen']) AND !empty($_POST['nom']) AND !empty($_FILES['illustration']) AND !empty($_POST['gen']))
        { 
            if ($_FILES['illustration']['size'] <= 1000000)
                {
                   
                    //// Testons si l'extension est autorisée
                    $infosfichier = pathinfo($_FILES['illustration']['name']);
                    $extension_upload = $infosfichier['extension'];
                    $extensions_autorisees = array('jpg', 'jpeg', 'png');
                    if (in_array($extension_upload, $extensions_autorisees))
                        {
                            move_uploaded_file($_FILES['illustration']['tmp_name'], '../image/' . basename($_FILES['illustration']['name']));
                            $Creature = $bdd->prepare('INSERT INTO `bestiaire`(`nom_bestiaire`, `illustration_bestiaire`, `generation_bestiaire`, `description_bestiaire`, `localisation_bestiaire`, `statu_bestiaire`) VALUES (:nom,:illustration,:gen,:histoire,:localisation,:etat)');
                            $Creature->bindValue(':nom',$_POST['nom'], PDO::PARAM_STR);
                            $Creature->bindValue(':histoire',$_POST['text'], PDO::PARAM_STR);
                            $Creature->bindValue(':illustration',"../image/".$_FILES['illustration']['name'], PDO::PARAM_STR);
                            $Creature->bindValue(':gen',$_POST['gen'], PDO::PARAM_STR);
                            $Creature->bindValue(':localisation',$_POST['localisation'], PDO::PARAM_STR);
                            $Creature->bindValue(':etat',$_POST['etat'], PDO::PARAM_STR);
                            $Creature->execute();
                            
                            
                            $_SESSION['flash']['danger']="Créature ajouté";
                            header('Location:./profil.php');
                        }
                    else
                        {
                            $_SESSION['flash']['danger']="Ce format n'est pas correct  veuillez fournir un document JPG,JPEG ou PNG";
                            header('Location:./profil.php');
                        }
                }
            else
                {
                    $_SESSION['flash']['danger']="Votre image ne doit pas dépasser 1 Mo";
                    header('Location:./profil.php');
                }
        }
    elseif(isset($_POST['nom'])AND isset($_FILES['illustration'])AND isset($_POST['gen'])) 
        {
            $_SESSION['flash']['danger']="Vous devez obligatoirement fournir un nom une illustration et à quelle génération elle appartient";
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
                <label for="nom">Nom de la Créature : </label>
                <input type="text" name="nom" id="nom">
                <hr>
                <label for="myPicture">Sélectionner une illustration pour la Créature : </label>
                <input type="file" id="myPicture" name="illustration"><br><br>
                <hr>
                <textarea placeholder="Ajout une histoire à votre Créature" rows="15" cols="40" name="text"></textarea><br><br>
                <hr>
                <label for="localisation">Indiquer la dernière localisation de la Créature : </label>
                <input type="text" name="localisation" id="localisation">
                <hr>
                <label for="gen">Indiquer la ou les générations où il a été vu : </label>
                <select name="gen" id="gen">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="1 et 2">1 et 2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <hr>
                <label for="etat">Indiquer si cette Créature était en vie ou non : </label>
                <input type="text" name="etat" id="etat">
                <hr>
                <br><br>
                <input type="submit" value="Rajouter cette Créature">
            </form>                 
        </div>
    </body>
</html>