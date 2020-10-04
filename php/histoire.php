<?php
    require("../includes/BDD.php");
    include("../includes/head.php");
    include("../includes/nav.php");
    $personnages = $bdd->query('SELECT * FROM histoire ORDER BY gen_histoire DESC');
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
                    <h1>Histoire et Récit</h1>
                    
                    <div class="liste">

                        <?php
                            while ($donnees = $personnages->fetch())
                                {
                                    echo("<a href=../Documents/".$donnees['lien_histoire']."> <img src=".$donnees['illustration_histoire']." alt=".$donnees['titre_histoire']."></a>");
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