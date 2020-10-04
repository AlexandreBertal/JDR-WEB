<?php
    require("../includes/BDD.php");
    include("../includes/head.php");
    include("../includes/nav.php");
    $personnages = $bdd->query('SELECT*FROM personnages ORDER BY generation_personnage DESC');
    
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
                    <h1>Personnages</h1>
                    <div class="liste">
                        <?php
                            while ($donnees = $personnages->fetch())
                                {
                                    echo("<a href=./portrait.php?nom=".htmlspecialchars($donnees['ID_perso'])."> <img src=../image/".$donnees['Illustration_perso']." alt=".$donnees['Nom']."></a>");
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