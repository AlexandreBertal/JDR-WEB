<?php 
    include("../includes/nav.php");
    require("./secu.php");
    require("../includes/BDD.php");
    include("../includes/head.php");
    $groupe = $bdd->query('SELECT nom_groupe FROM groupe');
    
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
                            $personnage = $bdd->prepare('INSERT INTO `personnages`(`Nom`, `Illustration_perso`, `Histoire`, `generation_personnage`, `localisation_personnage`, `etat_personnage`, `groupe_personnage`) VALUES (:nom,:illustration,:histoire,:gen,:localisation,:etat,:fac)');
                            $personnage->bindValue(':nom',$_POST['nom'], PDO::PARAM_STR);
                            $personnage->bindValue(':histoire',$_POST['text'], PDO::PARAM_STR);
                            $personnage->bindValue(':illustration',"../image/".$_FILES['illustration']['name'], PDO::PARAM_STR);
                            $personnage->bindValue(':gen',$_POST['gen'], PDO::PARAM_STR);
                            $personnage->bindValue(':localisation',$_POST['localisation'], PDO::PARAM_STR);
                            $personnage->bindValue(':etat',$_POST['etat'], PDO::PARAM_STR);
                            $personnage->bindValue(':fac',$_POST['fac'], PDO::PARAM_STR);
                            $personnage->execute();
                            
                            $_SESSION['flash']['danger']="Personnage ajouté";
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
                    $_SESSION['flash']['danger']="Votre image ne doit pas dépasser 1 Mo";
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
                <label for="nom">Nom du personnage : </label>
                <input type="text" name="nom" id="nom">
                <hr>
                <label for="myPicture">Sélectionner une illustration pour le personnage : </label>
                <input type="file" id="myPicture" name="illustration"><br><br>
                <hr>
                <textarea placeholder="Ajouter une histoire à votre personnage" rows="15" cols="40" name="text"></textarea><br><br>
                <hr>
                <label for="localisation">Indiquer la dernière localisation du personnage : </label>
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
                <label for="etat">Indiquer si ce personnage était en vie ou non : </label>
                <input type="text" name="etat" id="etat">
                <hr>
                <label for="fac">Indiquer à quel faction appartient votre personnage : </label>
                <select name="fac" id="fac">
                    <option value="inconnue"></option>
                    <?php
                         while ($donnees = $groupe->fetch())
                         {
                             echo(" <option value=\"".$donnees["nom_groupe"]."\">".$donnees["nom_groupe"]."</option>");
                         }
                    ?>
                </select><br><br>
                <input type="submit" value="Rajouter ce personnage">
            </form>                 
        </div>
    </body>
</html>