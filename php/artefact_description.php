<?php
    require("../includes/BDD.php");
    include("../includes/head.php");
    include("../includes/nav.php");

    if (isset($_GET['ID'])AND !empty($_GET['ID']))
        {

            $reponse = $bdd->prepare('SELECT * FROM artefact WHERE ID_artefact= ?');
            $reponse->execute(array(htmlspecialchars($_GET['ID'])));

            if ($reponse->rowCount()== 1)
                {
                    $donnees = $reponse->fetch();
                    $image =$donnees['Illustration_artefact'];
                    $nom = $donnees['nom_artefact'];
                    $text=$donnees['histoire_artefact'];
                    $crea=$donnees["createur_artefact"];
                    $proprio=$donnees["proprietaire_artefact"];
                    $gen=$donnees["gen_artefact"];
                    $date=$donnees["date_artefact"];

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
                    <h1>Artéfact</h1>
                    <?php if(!empty($_SESSION['flash']['danger'])) {echo("<h2 style=\"color: whitesmoke;\">".$_SESSION['flash']['danger']."<h2>");$_SESSION['flash']['danger']="";}?>
                    <h2><?php echo $nom ?></h2>
                    <?php
                        echo(" 
                                <a  href=\"./../EspaceMembre/changeArtefact.php?ID=".$_GET['ID']."\">
                                    <svg width=\"1.5em\" height=\"1.5em\" viewBox=\"0 0 16 16\" class=\"bi bi-gear-wide\" fill=\"currentColor\" xmlns=\"http://www.w3.org/2000/svg\">
                                        <path fill-rule=\"evenodd\" d=\"M8.932.727c-.243-.97-1.62-.97-1.864 0l-.071.286a.96.96 0 0 1-1.622.434l-.205-.211c-.695-.719-1.888-.03-1.613.931l.08.284a.96.96 0 0 1-1.186 1.187l-.284-.081c-.96-.275-1.65.918-.931 1.613l.211.205a.96.96 0 0 1-.434 1.622l-.286.071c-.97.243-.97 1.62 0 1.864l.286.071a.96.96 0 0 1 .434 1.622l-.211.205c-.719.695-.03 1.888.931 1.613l.284-.08a.96.96 0 0 1 1.187 1.187l-.081.283c-.275.96.918 1.65 1.613.931l.205-.211a.96.96 0 0 1 1.622.434l.071.286c.243.97 1.62.97 1.864 0l.071-.286a.96.96 0 0 1 1.622-.434l.205.211c.695.719 1.888.03 1.613-.931l-.08-.284a.96.96 0 0 1 1.187-1.187l.283.081c.96.275 1.65-.918.931-1.613l-.211-.205a.96.96 0 0 1 .434-1.622l.286-.071c.97-.243.97-1.62 0-1.864l-.286-.071a.96.96 0 0 1-.434-1.622l.211-.205c.719-.695.03-1.888-.931-1.613l-.284.08a.96.96 0 0 1-1.187-1.186l.081-.284c.275-.96-.918-1.65-1.613-.931l-.205.211a.96.96 0 0 1-1.622-.434L8.932.727zM8 12.997a4.998 4.998 0 1 0 0-9.995 4.998 4.998 0 0 0 0 9.996z\"/>
                                    </svg>
                                </a><br>
                            ");
                    ?>
                    <img src="<?php echo $image?>" alt="<?php echo $nom ?>"><br><br>
                    <p>Cet artéfacte a été vu durant ces générations <?php echo $gen ?>
                        <br>Son dernier propriétaire connu est <?php echo $proprio ?>
                        <br>Son créateur est <?php echo $crea ?>
                    <p><?php echo $text?></p>
                    <p class="date">Ces informations ont était modifier le <?php echo $date?></p>
                </div>
            </div>
        </div>
    </body>
</html>