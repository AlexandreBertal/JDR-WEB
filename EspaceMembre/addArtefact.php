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
                    $extensions_autorisees = array('jpg', 'jpeg', 'png', 'gif');
                    if (in_array($extension_upload, $extensions_autorisees))
                        {
                            move_uploaded_file($_FILES['illustration']['tmp_name'], '../image/' . basename($_FILES['illustration']['name']));
                            $artefact = $bdd->prepare('INSERT INTO `artefact`(Illustration_artefact,nom_artefact,createur_artefact,proprietaire_artefact,gen_artefact,histoire_artefact,date_artefact) VALUES (:illustration,:nom,:createur,:proprietaire,:gen,:histoire,NOW())');
                            $artefact->bindValue(':illustration',"../image/".$_FILES['illustration']['name'], PDO::PARAM_STR);
                            $artefact->bindValue(':nom',$_POST['nom'], PDO::PARAM_STR);
                            $artefact->bindValue(':proprietaire',$_POST['proprio'], PDO::PARAM_STR);
                            $artefact->bindValue(':createur',$_POST['createur'], PDO::PARAM_STR);
                            $artefact->bindValue(':histoire',$_POST['text'], PDO::PARAM_STR);
                            $artefact->bindValue(':gen',$_POST['gen'], PDO::PARAM_STR);
                            $artefact->execute();
                            $_SESSION['flash']['danger']="Artéfact ajouté";
                            header('Location:./profil.php');
                        }
                    else
                        {
                            $_SESSION['flash']['danger']="Ce format n'est pas correct veuillez fournir un document JPG,JPEG,PNG ou GIF";
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
                <label for="nom">Nom de l'artéfact : </label>
                <input type="text" name="nom" id="nom">
                <hr>
                <label for="myPicture">Sélectionner une illustration pour l'artéfact : </label>
                <input type="file" id="myPicture" name="illustration"><br><br>
                <hr>
                <textarea placeholder="Ajouter l'histoire de votre artéfact" rows="15" cols="40" name="text"></textarea><br><br>
                <hr>
                <label for="createur">Indiquer le créateur de l'artéfact : </label>
                <input type="text" name="createur" id="createur">
                <hr>
                <label for="gen">Indiquer la ou les générations où il a été vu :  </label>
                <select name="gen" id="gen">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="1 et 2">1 et 2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <hr>
                <label for="proprio">Indiquer le dernier proprietaire de l'artéfact : </label>
                <input type="text" name="proprio" id="proprio">
                <hr>
                <br><br>
                <input type="submit" value="Rajouter cet Artéfact">
            </form>                 
        </div>
    </body>
</html>