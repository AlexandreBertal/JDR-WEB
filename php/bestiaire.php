<?php
    require("../includes/BDD.php");
    include("../includes/head.php");
    include("../includes/nav.php");
    $personnages = $bdd->query('SELECT ID_bestiaire,nom_bestiaire,illustration_bestiaire FROM bestiaire ORDER BY generation_bestiaire DESC');
?>
<!DOCTYPE html>
<html>

    <head>
        <link rel="stylesheet" type="text/css" href="../CSS/disposition_carrer.css" />
    </head>
    <body>
        <div class="structure_de_la_page">
            <div class="informations_de_la_page">
                <div class="page">
                    <h1>Bestiaire</h1>
                    <div class="liste">
                        <?php
                            while ($donnees = $personnages->fetch())
                                {
                                   
                                   
                                            echo("<a href=./bestiaire_description.php?ID=".$donnees['ID_bestiaire']."> <img src=".$donnees['illustration_bestiaire']." alt=".$donnees['nom_bestiaire']."></a>");
            
                                }
                            $personnages->closeCursor();
                            $personnages = NULL; 
                        ?>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </body>
</html>