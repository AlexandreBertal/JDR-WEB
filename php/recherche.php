<?php
    require("../includes/BDD.php");
    include("../includes/head.php");
    include("../includes/nav.php");
    

?>
<!DOCTYPE html>
<html>

    <head>
        <link rel="stylesheet" type="text/css" href="../CSS/structure.css" />
        <link rel="stylesheet" type="text/css" href="../CSS/disposition_carrer.css" />
    </head>

    <body>
        <div class="structure_de_la_page">
            <div class="informations_de_la_page">
                <div class="page">
                    <h1>Zone de recheche</h1><br>
                    
                        <form action="./recherche.php" method="get">
                            <input type="search" name="r" id="" placeholder="<?php if (isset($_GET['r'])AND !empty($_GET['r']))
                            {echo($_GET["r"]);}?>"><br>
                        </form>
            
                        <?php
                        if (isset($_GET['r'])AND !empty($_GET['r']))
                            {
                                $recherche = htmlspecialchars($_GET['r']);
                                $personnages = $bdd->query('SELECT * FROM personnages WHERE Nom LIKE "%'.$recherche.'%" ');
                                $fiche = $bdd->query('SELECT * FROM fiche WHERE nom_fiche LIKE "%'.$recherche.'%" ');
                                $bestiaire = $bdd->query('SELECT * FROM bestiaire WHERE nom_bestiaire LIKE "%'.$recherche.'%" ');
                                $groupe = $bdd->query('SELECT * FROM groupe WHERE nom_groupe LIKE "%'.$recherche.'%" ');
                                $carte = $bdd->query('SELECT * FROM carte WHERE nom_carte LIKE "%'.$recherche.'%" ');
                                $artefact = $bdd->query('SELECT * FROM artefact WHERE nom_artefact LIKE "%'.$recherche.'%" ');
                                $histoire = $bdd->query('SELECT * FROM histoire WHERE titre_histoire LIKE "%'.$recherche.'%" ');
                                
                                if ($personnages->rowCount()>= 1)
                                    {
                                        echo("<h2>Personnages<h2>");
                                        while ($donnees = $personnages->fetch())
                                                        {
                                                            
                                                            echo("<a href=./portrait.php?nom=".htmlspecialchars($donnees['ID_perso'])."> <img src=".$donnees['Illustration_perso']." alt=".$donnees['Nom']."></a>");
                                                        }
                                    }
                                if ( $fiche->rowCount()>= 1)
                                    {
                                        echo("<h2>Personnage joueur<h2>");
                                        while ($donnees = $fiche->fetch())
                                                        { 
                                                            echo("                                
                                                            <a href=".$donnees['lien_fiche']."".$donnees['nom_fiche']."> 
                                                                <img src=".$donnees['image_fiche']." 
                                                                alt=".$donnees['nom_fiche'].">
                                                            </a>"
                                                        );
                                                        }
                                    }
                                if ( $bestiaire->rowCount()>= 1)
                                    {
                                        echo("<h2>Bestiaire<h2>");
                                        while ($donnees = $bestiaire->fetch())
                                                        {   
                                                            if ($donnees['illustration_bestiaire'] == NULL) 
                                                                {
                                                                    echo("<a href=./bestiaire_description.php?ID=".$donnees['ID_bestiaire']."> <img src=".$donnees['corruption_bestiaire']." alt=".$donnees['nom_bestiaire']."></a>");
                                                                }
                                                            else
                                                                {
                                                                    echo("<a href=./bestiaire_description.php?ID=".$donnees['ID_bestiaire']."> <img src=".$donnees['illustration_bestiaire']." alt=".$donnees['nom_bestiaire']."></a>");
                                                                }
                                                        }
                                    }
                                if ( $groupe->rowCount()>= 1)
                                    {
                                        echo("<h2>Groupe<h2>");
                                        while ($donnees = $groupe->fetch())
                                                        { 
                                                            echo("                                
                                                            <a href=groupe_d.php?ID=".$donnees['ID_groupe']."".$donnees['nom_groupe']."> 
                                                                <img src=".$donnees['illustration_groupe']." 
                                                                alt=".$donnees['nom_groupe'].">
                                                            </a>"
                                                        );
                                                        }
                                    }
                                if ($carte->rowCount()>= 1)
                                    {
                                        echo("<h2>Carte<h2>");
                                        while ($donnees = $carte->fetch())
                                                        {
                                                            
                                                            echo("<a href=./carte_monde.php?ID=".$donnees["ID_carte"]."> <img src=".$donnees['lien_carte']." alt=".$donnees['nom_carte']."></a>");
                                                        }
                                    }
                                if ($artefact->rowCount()>= 1)
                                    {
                                        echo("<h2>Artefact<h2>");
                                        while ($donnees = $artefact->fetch())
                                                        {
                                                            
                                                            echo("<a href=./artefact_description.php?ID=".$donnees["ID_artefact"]."> <img src=".$donnees['Illustration_artefact']." alt=".$donnees['nom_artefact']."></a>");
                                                        }
                                    }
                                if ($histoire->rowCount()>= 1)
                                    {
                                        echo("<h2>Histoire<h2>");
                                        while ($donnees = $histoire->fetch())
                                                        {
                                                            
                                                            echo("<a href=".$donnees["lien_histoire"]."> <img src=".$donnees['illustration_histoire']." alt=".$donnees['titre_histoire']."></a>");
                                                        }
                                    }
        
                            }
                            
                        ?>
                   
                </div>
            </div>
        </div>
    </body>
</html>