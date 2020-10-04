<?php 
//a terminé
    include("../includes/nav.php");
    require("./secu.php");
    require("../includes/BDD.php");
    include("../includes/head.php");
    if (isset($_GET['ID'])AND !empty($_GET['ID'])) 
        {
            $personnage = $bdd->prepare('SELECT*FROM groupe WHERE ID_groupe = :ID');
            $personnage->bindValue(':ID',$_GET['ID'], PDO::PARAM_STR);
            $personnage->execute();
            $donnees = $personnage->fetch();
        }
    else 
        {
            header('Location:../php/groupe.php');
        }
    if(isset($_POST['nom'])AND isset($_FILES['illustration'])AND isset($_POST['gen']) AND !empty($_POST['nom']) AND !empty($_FILES['illustration']) AND !empty($_POST['gen']) AND $_FILES['illustration']["name"] == "")
        { 
                        {
                            $groupe = $bdd->prepare('UPDATE `groupe` SET `nom_groupe`=:nom,chef_groupe=:chef,but_groupe=:but,description_groupe=:histoire,generation_groupe=:gen,illustration_groupe=:illustration WHERE ID_groupe=:ID');
                            $groupe->bindValue(':illustration',$donnees["illustration_groupe"], PDO::PARAM_STR);
                            $groupe->bindValue(':nom',$_POST['nom'], PDO::PARAM_STR);
                            $groupe->bindValue(':histoire',$_POST['text'], PDO::PARAM_STR);
                            $groupe->bindValue(':gen',$_POST['gen'], PDO::PARAM_STR);
                            $groupe->bindValue(':but',$_POST['but'], PDO::PARAM_STR);
                            $groupe->bindValue(':chef',$_POST['chef'], PDO::PARAM_STR);
                            $groupe->bindValue(':ID',$donnees["ID_groupe"], PDO::PARAM_STR);
                            $groupe->execute();
                            $_SESSION['flash']['danger']="Groupe modifié";
                            header("Location:../php/groupe_d.php?ID=".$donnees["ID_groupe"]."");
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
                            $groupe = $bdd->prepare('UPDATE `groupe` SET `nom_groupe`=:nom,chef_groupe=:chef,but_groupe=:but,description_groupe=:groupe,generation_groupe=:gen,illustration_groupe=:illustration WHERE ID_groupe=:ID');
                            $groupe->bindValue(':nom',$_POST['nom'], PDO::PARAM_STR);
                            $groupe->bindValue(':histoire',$_POST['text'], PDO::PARAM_STR);
                            $groupe->bindValue(':illustration',"../image/".$_FILES['illustration']['name'], PDO::PARAM_STR);
                            $groupe->bindValue(':gen',$_POST['gen'], PDO::PARAM_STR);
                            $groupe->bindValue(':but',$_POST['but'], PDO::PARAM_STR);
                            $groupe->bindValue(':chef',$_POST['chef'], PDO::PARAM_STR);
                            $groupe->bindValue(':ID',$donnees["ID_perso"], PDO::PARAM_STR);
                            $groupe->execute();
                            
                            $_SESSION['flash']['danger']="Groupe modifié";
                            header("Location:../php/groupe_d.php?ID=".$donnees["ID_groupe"]."");
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
                <label for="nom">Nom du groupe : </label>
                <input type="text" name="nom" id="nom" value="<?php echo($donnees["nom_groupe"])?>">
                <hr>
                <label for="myPicture">Sélectionner une illustration pour le groupe : </label>
                <input type="file" id="myPicture" name="illustration" value="<?php echo($donnees["illustration_groupe"])?>"><br><br>
                <hr>
                <textarea placeholder="Ajout une histoire a votre groupe" rows="15" cols="40" name="text"><?php echo($donnees["description_groupe"])?></textarea><br><br>
                <hr>
                <label for="gen">Indiquer la dernière génération où ils ont étaient vu : </label>
                <select name="gen" id="gen">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <hr>
                <label for="but">Résumer en quelques lignes l'objectif du groupe : </label>
                <input type="text" name="but" id="but" value="<?php echo($donnees["but_groupe"])?>">
                <hr>
                <label for="chef">Indiquer le nom du chef de ce groupe : </label>
                <input type="text" name="chef" id="chef" value="<?php echo($donnees["chef_groupe"])?>">
                <br><br>
                <input type="submit" value="Modifié ce groupe">
            </form>                 
        </div>
    </body>
</html>