<?php 
//a terminé
    include("../includes/nav.php");
    require("./secu.php");
    require("../includes/BDD.php");
    include("../includes/head.php");
    if (isset($_GET['ID'])AND !empty($_GET['ID'])) 
        {
            $groupe = $bdd->query('SELECT nom_groupe FROM groupe');
            $personnage = $bdd->prepare('SELECT*FROM personnages WHERE ID_perso = :ID');
            $personnage->bindValue(':ID',$_GET['ID'], PDO::PARAM_STR);
            $personnage->execute();
            $donnees = $personnage->fetch();
        }
    else 
        {
            header('Location:../php/Personnage.php');
        }
    if(isset($_POST['nom'])AND isset($_FILES['illustration'])AND isset($_POST['gen']) AND !empty($_POST['nom']) AND !empty($_FILES['illustration']) AND !empty($_POST['gen']) AND $_FILES['illustration']["name"] == "")
        { 
                        {
                            $personnage = $bdd->prepare('UPDATE `personnages` SET `Nom`=:nom,`Illustration_perso`=:illustration,`Histoire`=:histoire, `generation_personnage`=:gen, `localisation_personnage`=:localisation, `etat_personnage`=:etat, `groupe_personnage`=:fac WHERE ID_perso=:ID');
                            $personnage->bindValue(':nom',$_POST['nom'], PDO::PARAM_STR);
                            $personnage->bindValue(':illustration',$donnees["Illustration_perso"], PDO::PARAM_STR);
                            $personnage->bindValue(':histoire',$_POST['text'], PDO::PARAM_STR);
                            $personnage->bindValue(':gen',$_POST['gen'], PDO::PARAM_STR);
                            $personnage->bindValue(':localisation',$_POST['localisation'], PDO::PARAM_STR);
                            $personnage->bindValue(':etat',$_POST['etat'], PDO::PARAM_STR);
                            $personnage->bindValue(':fac',$_POST['fac'], PDO::PARAM_STR);
                            $personnage->bindValue(':ID',$donnees["ID_perso"], PDO::PARAM_STR);
                            $personnage->execute();
                            $_SESSION['flash']['danger']="Personnage modifié";
                            header("Location:../php/portrait.php?nom=".$donnees["ID_perso"]."");
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
                            $personnage = $bdd->prepare('UPDATE `personnages` SET `Nom`=:nom,`Illustration_perso`=:illustration,`Histoire`=:histoire, `generation_personnage`=:gen, `localisation_personnage`=:localisation, `etat_personnage`=:etat, `groupe_personnage`=:fac WHERE ID_perso=:ID');
                            $personnage->bindValue(':nom',$_POST['nom'], PDO::PARAM_STR);
                            $personnage->bindValue(':illustration',"../image/".$_FILES['illustration']['name'], PDO::PARAM_STR);
                            $personnage->bindValue(':histoire',$_POST['text'], PDO::PARAM_STR);
                            $personnage->bindValue(':gen',$_POST['gen'], PDO::PARAM_STR);
                            $personnage->bindValue(':localisation',$_POST['localisation'], PDO::PARAM_STR);
                            $personnage->bindValue(':etat',$_POST['etat'], PDO::PARAM_STR);
                            $personnage->bindValue(':fac',$_POST['fac'], PDO::PARAM_STR);
                            $personnage->bindValue(':ID',$donnees["ID_perso"], PDO::PARAM_STR);
                            $personnage->execute();
                            
                            $_SESSION['flash']['danger']="Personnage modifié";
                            header("Location:../php/portrait.php?nom=".$_GET['ID']."");
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
                <label for="nom">Nom du personnage : </label>
                <input type="text" name="nom" id="nom" value="<?php echo($donnees["Nom"])?>">
                <hr>
                <label for="myPicture">Sélectioner une illustration pour le personnage : </label>
                <input type="file" id="myPicture" name="illustration" value="<?php echo($donnees["Illustration_perso"])?>"><br><br>
                <hr>
                <textarea placeholder="Ajout une histoire a votre personnage" rows="15" cols="40" name="text"><?php echo($donnees["Histoire"])?></textarea><br><br>
                <hr>
                <label for="localisation">Indiquer la dernière localisation du personnage : </label>
                <input type="text" name="localisation" id="localisation"value="<?php echo($donnees["localisation_personnage"])?>">
                <hr>
                <label for="gen">Indiquer la dernière génération où il a été vu pour la dernière fois : </label>
                <select name="gen" id="gen">
                <?php echo(" <option value=\"".$donnees["generation_personnage"]."\">".$donnees["generation_personnage"]."</option>")?>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <hr>
                <label for="etat">Indiquer si ce personnage était en vie ou non : </label>
                <input type="text" name="etat" id="etat" value="<?php echo($donnees["etat_personnage"])?>">
                <hr>
                <label for="fac">Indiquer a quel faction appartient votre personnage : </label>
                <select name="fac" id="fac">
                <?php echo(" <option value=\"".$donnees["groupe_personnage"]."\">".$donnees["groupe_personnage"]."</option>")?>
                    <?php
                         while ($donnees = $groupe->fetch())
                         {
                             echo(" <option value=\"".$donnees["nom_groupe"]."\">".$donnees["nom_groupe"]."</option>");
                         }
                    ?>
                </select><br><br>
                <input type="submit" value="Modifié ce personnage">
            </form>                 
        </div>
    </body>
</html>