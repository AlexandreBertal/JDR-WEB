<nav>
	<ul>
	<?php 
		session_start();
		require("../includes/BDD.php");
		if (isset($_SESSION['auth'])) 
			{
				if ($_SESSION['auth']["image_utilisateur"] == NULL) 
					{
										echo("
												<a href=\"../EspaceMembre/profil.php\">
													<div class=\"profil\">
														<img class=\"avatarNav\" src=\"../image/avatarNull.png\" alt=\"\">
													</div>
												</a>
												<li><a href=\"../EspaceMembre/exit.php\">Déconnexion</a></li>
												
											");
										
					}
				else
					{
						echo("
								<a href=\"../EspaceMembre/profil.php\">
									<div class=\"profil\">
									<img class=\"avatarNav\" src=\"../image/profil/".$_SESSION['auth']["image_utilisateur"]."\" alt=\"\">
									</div>
								</a>
								<li><a href=\"../EspaceMembre/exit.php\">Déconnexion</a></li>
							");		
					}
				
			}
		elseif (!isset($_SESSION['auth']) AND isset($_COOKIE["Connecter"]))
		{
		
			$requser = $bdd->prepare('SELECT * FROM utilisateur WHERE pseudo = ? ');
			$requser->execute(array($_COOKIE["Connecter"]["one"]));
			$user = $requser->fetch();
			if ($_COOKIE["Connecter"]["two"]===$user['mot_de_passe']) 
				{  
					$_SESSION['auth'] = $user;
					echo("
								<a href=\"../EspaceMembre/profil.php\">
									<div class=\"profil\">
									<img class=\"avatarNav\" src=\"../image/profil/".$_SESSION['auth']["image_utilisateur"]."\" alt=\"\">
									</div>
								</a>
								<li><a href=\"../EspaceMembre/exit.php\">Déconnexion</a></li>
							");	
					
					

				}
		}
		 
		elseif (!isset($_SESSION['auth'])) 
		{
			echo
				("
						<li>  
							<div class=\"w3-container\">
								<button onclick=\"document.getElementById('id01').style.display='block'\" class=\"w3-button w3-block w3-green w3-section w3-padding\">Login</button>
								<div id=\"id01\" class=\"w3-modal\">
									<div class=\"w3-modal-content w3-card-4 w3-animate-zoom\" style=\"max-width:600px\">
									<div class=\"w3-center\"><br>
										<span onclick=\"document.getElementById('id01').style.display='none'\" class=\"w3-button w3-xlarge w3-transparent w3-display-topright\" title=\"Close Modal\">×</span>
										</div>
											<form class=\"w3-container\" method=\"POST\" action=\"../EspaceMembre/login.php\">
												<div class=\"w3-section\">
													<label><b>Pseudo</b></label>
													<input class=\"w3-input w3-border w3-margin-bottom\" type=\"text\" placeholder=\"Enter votre Pseudo\" name=\"pseudo\" required>
													<label><b>Mot de passe</b></label>
													<input class=\"w3-input w3-border\" type=\"password\" placeholder=\"Enter votre mot de passe\" name=\"mp\" required>
													<button class=\"w3-button w3-block w3-green w3-section w3-padding\"  type=\"submit\">Login</button>
													<label>
													<input type=\"checkbox\" name=\"remember\"> Rester connecté
												  </label>
												</div>
											</form>
										</div>
								</div>
							</div>
						</li>"
				);
		}	
	?>
		<li><a href="../index.php">Accueil</a></li>
		<li><a href="../php/fiche.php">Fiches Perso</a></li>
		<li>
			<a href="../php/bibliotheque.php">Bibliothèque</a>
			<ul>
				<li>
					<a href="../php/Personnage.php">Personnages</a>
				</li>
				<li>
					<a href=../php/groupe.php>Groupes</a> 
				</li>
				<li>
					<a href=../php/bestiaire.php>Bestiaire</a> 
				</li>
				<li>
					<a href=../php/artefact.php>Artéfact</a> 
				</li>
				<li>
					<a href=../php/histoire.php>Histoire et récit</a> 
				</li>
				<li>
					<a href="https://cdn.knightlab.com/libs/timeline3/latest/embed/index.html?source=1TH8p9QL8-bH5G8mlccAWYnVTfVEdtIor_vhe2zDnTP8&font=Default&lang=fr&initial_zoom=3&height=650">Chronologie</a> 
				</li>    
			</ul> 
		</li> 
		<li>
			<a href="carte_monde.php?ID=1">Carte Monde</a>
			<ul>
				<?php 
					$carte = $bdd->query('SELECT*FROM carte');
					while ($donnees = $carte->fetch())
						{
							echo("<li><a href=\"../php/carte_monde.php?ID=".$donnees["ID_carte"]."\">".$donnees["nom_carte"]."</a></li>");
						}
				?>
			</ul>
		</li>
		<?php 
			if (isset($_SESSION['auth']) AND $_SESSION['auth']["droit_utilisateur"] > 0) 
			{
				echo("
						<li class=\"admin\" ><a href=\"../EspaceMembre/addPerso.php\">+ Personnage</a></li>
						<li class=\"admin\" ><a href=\"../EspaceMembre/addGroupe.php\">+ Groupe</a></li>
						<li class=\"admin\" ><a href=\"../EspaceMembre/addBestiaire.php\">+ Créature</a></li>
						<li class=\"admin\" ><a href=\"../EspaceMembre/addArtefact.php\">+ Artéfact</a></li>
						<li class=\"admin\" ><a href=\"../EspaceMembre/addCarte.php\">+ Carte</a></li>
						<li class=\"admin\" ><a href=\"../EspaceMembre/addHistoire.php\">+ Histoire</a></li>
					");
			}
		?>
	</ul>
</nav>