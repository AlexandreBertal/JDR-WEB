
<html>
	<?php 
		include("./includes/head_index.php");
		include("./includes/nav_index.php")
	?>
	<body>
		<div class="structure_de_la_page">
			<div class="informations_de_la_page">
				<div id="Accueil">
					<img src="./image/JdR1.png" alt="logo">
					<?php  if(!empty($_SESSION['flash']['danger'])) {echo("<h3 style=\"color: whitesmoke;\">".$_SESSION['flash']['danger']."<h3>");$_SESSION['flash']['danger']="";}?>
					<form action="./php/recherche.php" method="get">
						<input type="search" name="r" id="" placeholder="Je suis à votre service"><br>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>