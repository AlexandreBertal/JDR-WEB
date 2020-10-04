<?php
    require("../includes/BDD.php");
    include("../includes/head.php");
    include("../includes/nav.php");
    $personnages = $bdd->query('SELECT * FROM artefact ORDER BY gen_artefact DESC');
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
                    <h1>Artéfact</h1>
                    
                    <div class="liste">

                        <?php
                            while ($donnees = $personnages->fetch())
                                {
                                    echo("<a href=artefact_description.php?ID=".$donnees['ID_artefact']."> <img src=".$donnees['Illustration_artefact']." alt=".$donnees['nom_artefact']."></a>");
                                }
                            $personnages->closeCursor();
                            $personnages = NULL; 
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>