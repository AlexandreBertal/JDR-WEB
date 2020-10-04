<?php
    require("../includes/BDD.php");
    include("../includes/head.php");
    include("../includes/nav.php");
    
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
                    <h1>Personnages joueurs</h1>
                   
                            <?php 
                                for ($i=4; $i !== -1; $i--) 
                                    { 
                                        echo("<h2>Génération ".$i."</h2> <div class=\"liste\">");
                                    
                                        $fiche = $bdd->prepare('SELECT * FROM fiche WHERE generation = :generation');
                                        $fiche->bindValue(':generation',$i);
                                        $fiche->execute();
                                        
                                        while ($donnees = $fiche->fetch())
                                            {
                                                echo("                              
                                                        <a href=".$donnees['lien_fiche']."".$donnees['nom_fiche']."> 
                                                            <img src=\"".$donnees['image_fiche']."\" alt=\"".$donnees['nom_fiche']."\">
                                                        </a>
                                                    ");
                                            }
                                        $fiche->closeCursor();
                                        echo("</div>");
                                    }
                            
                            ?>
                        <div>
                </div>
            </div>
        </div>
    </body>
</html>