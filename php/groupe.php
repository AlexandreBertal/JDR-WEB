<?php
    require("../includes/BDD.php");
    include("../includes/head.php");
    include("../includes/nav.php");
    $personnages = $bdd->query('SELECT * FROM groupe ORDER BY generation_groupe DESC');
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
                    <h1>Groupe</h1>
                    
                    <div class="liste">

                        <?php
                            while ($donnees = $personnages->fetch())
                                {
                                    echo("<a href=groupe_d.php?ID=".$donnees['ID_groupe']."> <img src=".$donnees['illustration_groupe']." alt=".$donnees['nom_groupe']."></a>");
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