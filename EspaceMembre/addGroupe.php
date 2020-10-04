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
                            $groupe = $bdd->prepare('INSERT INTO `groupe`(nom_groupe,chef_groupe,but_groupe,description_groupe,generation_groupe,illustration_groupe ) VALUES (:nom,:chef,:but,:histoire,:gen,:illustration)');
                            $groupe->bindValue(':nom',$_POST['nom'], PDO::PARAM_STR);
                            $groupe->bindValue(':histoire',$_POST['text'], PDO::PARAM_STR);
                            $groupe->bindValue(':illustration',"../image/".$_FILES['illustration']['name'], PDO::PARAM_STR);
                            $groupe->bindValue(':gen',$_POST['gen'], PDO::PARAM_STR);
                            $groupe->bindValue(':but',$_POST['but'], PDO::PARAM_STR);
                            $groupe->bindValue(':chef',$_POST['chef'], PDO::PARAM_STR);
                            $groupe->execute();
                            $_SESSION['flash']['danger']="groupe ajouté";
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
                    $_SESSION['flash']['danger']="Votre image ne doit pas dépasser 1 Mo.";
                    header('Location:./profil.php');
                }
        }
    elseif(isset($_POST['nom'])AND isset($_FILES['illustration'])AND isset($_POST['gen'])) 
        {
            $_SESSION['flash']['danger']="Vous devez obligatoirement fournir un nom, une illustration et indiquer à quelle génération il appartient.";
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
                <label for="nom">Nom du groupe : </label>
                <input type="text" name="nom" id="nom">
                <hr>
                <label for="myPicture">Sélectionner une illustration pour le groupe : </label>
                <input type="file" id="myPicture" name="illustration"><br><br>
                <hr>
                <textarea placeholder="Ajout une histoire a votre groupe" rows="15" cols="40" name="text"></textarea><br><br>
                <hr>
                <label for="gen">Indiquer la ou les générations où ils ont étaient vu : </label>
                <select name="gen" id="gen">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="1 et 2">1 et 2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <hr>
                <label for="but">Résumer en quelques lignes l'objectif du groupe : </label>
                <input type="text" name="but" id="but">
                <hr>
                <label for="chef">Indiquer le nom du chef de ce groupe : </label>
                <input type="text" name="chef" id="chef">
                <br><br>
                <input type="submit" value="Rajouter ce groupe">
            </form>                 
        </div>
    </body>
</html>