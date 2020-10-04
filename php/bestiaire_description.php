<?php
    require("../includes/BDD.php");
    include("../includes/head.php");
    include("../includes/nav.php");

    if (isset($_GET['ID'])AND !empty($_GET['ID']))
        {

            $reponse = $bdd->prepare('SELECT * FROM bestiaire WHERE ID_bestiaire = :ID_bestiaire');
            $reponse->bindValue(':ID_bestiaire',htmlspecialchars($_GET['ID']));
            $reponse->execute();
            if ($reponse->rowCount()== 1)
                {
                    $donnees = $reponse->fetch();
                    $image =$donnees['illustration_bestiaire'];
                    $nom = $donnees['nom_bestiaire'];
                    $text=$donnees['description_bestiaire'];
                    $gen=$donnees["generation_bestiaire"];
                    $loc=$donnees["localisation_bestiaire"];
                    $etat=$donnees["statu_bestiaire"];
                }
            else 
                {
                    die('Ce personnage n\'exsite pas ou n\'a pas encore été rajoué ' );
                }
        }
    else
        {
            header("Location:../personnages.php");
        }
?>
<!DOCTYPE html>
<html>

    <head>
        <link rel="stylesheet" type="text/css" href="../CSS/structure.css" />
        <link rel="stylesheet" type="text/css" href="../CSS/disposition_description.css" />
    </head>

    <body>
        <div class="structure_de_la_page">
            <div class="informations_de_la_page">
                <div class="page">
                    <h1>Bestiaire</h1>
                    <h2><?php echo $nom ?></h2>
                    <img src="
                        <?php echo ($image);?>" alt="<?php echo $nom ?>"><br><br>
                    <p>Dernière apparition, génération <?php echo $gen ?> <br>Localisation : <?php echo $loc ?>,<br> État de l'espèce : <?php echo $etat ?> </p>
                    <p><?php echo $text?></p>
                </div>
            </div>
        </div>
    </body>
</html>