<?php 
//a terminé
    include("../includes/nav.php");
    require("./secu.php");
    require("../includes/BDD.php");
    include("../includes/head.php");
    if (isset($_GET['ID'])AND !empty($_GET['ID'])) 
        {
            $artefact = $bdd->prepare('SELECT*FROM artefact WHERE ID_artefact = :ID');
            $artefact->bindValue(':ID',$_GET['ID'], PDO::PARAM_STR);
            $artefact->execute();
            $donnees = $artefact->fetch();
        }
    else 
        {
            header('Location:../php/Personnage.php');
        }
    if(isset($_POST['nom'])AND isset($_FILES['illustration'])AND isset($_POST['gen']) AND !empty($_POST['nom']) AND !empty($_FILES['illustration']) AND !empty($_POST['gen']) AND $_FILES['illustration']["name"] == "")
        { 
                        {
                            $artefact = $bdd->prepare('UPDATE `artefact` SET Illustration_artefact=:illustration,nom_artefact=:nom,createur_artefact=:createur,proprietaire_artefact=:proprietaire,gen_artefact=:gen,histoire_artefact=:histoire,date_artefact=NOW() WHERE ID_artefact=:ID');
                            $artefact->bindValue(':nom',$_POST['nom'], PDO::PARAM_STR);
                            $artefact->bindValue(':illustration',$donnees["Illustration_artefact"], PDO::PARAM_STR);
                            $artefact->bindValue(':histoire',$_POST['text'], PDO::PARAM_STR);
                            $artefact->bindValue(':gen',$_POST['gen'], PDO::PARAM_STR);
                            $artefact->bindValue(':proprietaire',$_POST['proprio'], PDO::PARAM_STR);
                            $artefact->bindValue(':createur',$_POST['createur'], PDO::PARAM_STR);
                            $artefact->bindValue(':ID',$donnees["ID_artefact"], PDO::PARAM_STR);
                            $artefact->execute();
                            $_SESSION['flash']['danger']="Artéfact modifier";
                            header("Location:../php/artefact_description.php?ID=".$donnees["ID_artefact"]."");
                        }
        }
   
    elseif(isset($_POST['nom'])AND isset($_FILES['illustration'])AND isset($_POST['gen']) AND !empty($_POST['nom']) AND !empty($_FILES['illustration']) AND !empty($_POST['gen']))
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
                            $artefact = $bdd->prepare('UPDATE `artefact` SET Illustration_artefact=:illustration,nom_artefact=:nom,createur_artefact=:createur,proprietaire_artefact=:proprietaire,gen_artefact=:gen,histoire_artefact=:histoire,date_artefact=NOW() WHERE ID_artefact=:ID');
                            $artefact->bindValue(':illustration',"../image/".$_FILES['illustration']['name'], PDO::PARAM_STR);
                            $artefact->bindValue(':nom',$_POST['nom'], PDO::PARAM_STR);
                            $artefact->bindValue(':proprietaire',$_POST['proprio'], PDO::PARAM_STR);
                            $artefact->bindValue(':createur',$_POST['createur'], PDO::PARAM_STR);
                            $artefact->bindValue(':histoire',$_POST['text'], PDO::PARAM_STR);
                            $artefact->bindValue(':gen',$_POST['gen'], PDO::PARAM_STR);
                            $artefact->execute();
                            $_SESSION['flash']['danger']="Artéfact modifier";
                            header("Location:../php/artefact_description.php?ID=".$_GET['ID']."");
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
                <input type="text" name="nom" id="nom" value="<?php echo($donnees["nom_artefact"])?>">
                <hr>
                <label for="myPicture">Sélectioner une illustration pour l'artéfact : </label>
                <input type="file" id="myPicture" name="illustration" value="<?php echo($donnees["Illustration_artefact"])?>"><br><br>
                <hr>
                <textarea placeholder="Ajout une histoire a votre personnage" rows="15" cols="40" name="text"><?php echo($donnees["histoire_artefact"])?></textarea><br><br>
                <hr>
                <label for="createur">Indiquer le créateur de l'artéfact : </label>
                <input type="text" name="createur" id="createur"value="<?php echo($donnees["createur_artefact"])?>">
                <hr>

                <label for="gen">Indiquer la ou les générations où il a été vu : </label>
                <select name="gen" id="gen">
                <?php echo(" <option value=\"".$donnees["gen_artefact"]."\">".$donnees["gen_artefact"]."</option>")?>
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="1 et 2">1 et 2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <hr>
                <label for="proprio">Indiquer le dernier proprietaire de l'artéfact : </label>
                <input type="text" name="proprio" id="proprio" value="<?php echo($donnees["proprietaire_artefact"])?>">
                <hr>
                <br><br>
                <input type="submit" value="Modifier cet artéfact">
            </form>                 
        </div>
    </body>
</html>