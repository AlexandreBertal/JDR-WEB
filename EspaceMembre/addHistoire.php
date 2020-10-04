<?php 
    include("../includes/nav.php");
    require("./secu.php");
    require("../includes/BDD.php");
    include("../includes/head.php");
    
    if(isset($_POST['nom'])AND isset($_FILES['illustration'])AND isset($_FILES['histoire'])AND isset($_POST['gen']) AND !empty($_POST['nom']) AND !empty($_FILES['illustration']) AND !empty($_FILES['histoire']) AND !empty($_POST['gen']))
        { 
            if ($_FILES['illustration']['size'] <= 1000000)
                {
                   
                    //// Testons si l'extension est autorisée
                    $infosImage = pathinfo($_FILES['illustration']['name']);
                    $extension_upload = $infosImage['extension'];
                    $extensions_autorisees = array('jpg', 'jpeg', 'png');
                    if (in_array($extension_upload, $extensions_autorisees))
                        {
                            $infosfichier = pathinfo($_FILES['histoire']['name']);
                            $extension_upload = $infosfichier['extension'];
                            $extensions_autorisees = array('pdf','PDF');
                            if (in_array($extension_upload, $extensions_autorisees))
                                {
                                    move_uploaded_file($_FILES['histoire']['tmp_name'], '../Documents/' . basename($_FILES['histoire']['name']));
                                    move_uploaded_file($_FILES['illustration']['tmp_name'], '../image/' . basename($_FILES['illustration']['name']));
                                    $artefact = $bdd->prepare('INSERT INTO `histoire`(`titre_histoire`, `lien_histoire`, `illustration_histoire`, `gen_histoire`) VALUES (:nom,:histoire,:illustration,:gen)');
                                    $artefact->bindValue(':illustration',"../image/".$_FILES['illustration']['name'], PDO::PARAM_STR);
                                    $artefact->bindValue(':nom',$_POST['nom'], PDO::PARAM_STR);
                                    $artefact->bindValue(':histoire',"../Documents/".$_FILES['histoire']['name'], PDO::PARAM_STR);
                                    $artefact->bindValue(':gen',$_POST['gen'], PDO::PARAM_STR);
                                    $artefact->execute();
                                    $_SESSION['flash']['danger']="Histoire ajouter";
                                    header('Location:../php/histoire.php');
                                }
                            else
                                {
                                    $_SESSION['flash']['danger']="Ce format n'est pas correct veuillez fournir un document PDF";
                                    header('Location:./profil.php');
                                }
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
                <label for="nom">Nom du récit : </label>
                <input type="text" name="nom" id="nom">
                <hr>
                <label for="myPicture">Sélectionner une illustration pour votre histoire : </label>
                <input type="file" id="myPicture" name="illustration"><br><br>
                <hr>
                <label for="histoire">Sélectionner votre documents PDF contenant votre histoire/récit : </label>
                <input type="file" id="histoire" name="histoire"><br><br>
                <hr>
                <label for="gen">Indiquer à quelle génération appartient ce récit ou à qu'elle génération il a était trouvé :  </label>
                <select name="gen" id="gen">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="1 et 2">1 et 2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <hr>
                <br><br>
                <input type="submit" value="Rajouter cette histoire">
            </form>                 
        </div>
    </body>
</html>