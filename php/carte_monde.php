<?php
    require("../includes/BDD.php");
    include("../includes/head.php");
    include("../includes/nav.php");

    if (isset($_GET['ID'])AND !empty($_GET['ID']))
    {

        $reponse = $bdd->prepare('SELECT * FROM carte WHERE ID_carte= ?');
        $reponse->execute(array(htmlspecialchars($_GET['ID'])));

        if ($reponse->rowCount()== 1)
            {
                $donnees = $reponse->fetch();
                $image =$donnees['lien_carte'];
                $nom = $donnees['nom_carte'];
            }
    }
    else 
    {
        $reponse = $bdd->prepare('SELECT * FROM carte WHERE ID_carte= "1"');
        $donnees = $reponse->fetch();
        $image = "../image/MapV2.png";
        $nom = $donnees['nom_carte'];
       
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../CSS/disposition_map.css">
        <link rel="stylesheet" href="../CSS/carte.css">
    </head>
    <body>
        <div class="structure_de_la_page">
			<div class="informations_de_la_page">
                <img id="myImg" src="<?php echo($image);?>" alt="<?php echo($nom);?>">

                <!-- The Modal -->
                <div id="myModal" class="modal">
                <span class="close">&times;</span>
                <img class="modal-content" id="img01">
                <div id="caption"></div>
                </div>
			</div>
		</div>
    </body>
    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = document.getElementById("myImg");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function(){
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
        }

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() { 
        modal.style.display = "none";
        }
    </script>
</html>