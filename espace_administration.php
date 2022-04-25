<?php
if (!isset($_SESSION)) {
	session_start();
};
include 'include/header.php';
include 'connectionBDD.php';
$user = $_SESSION['courriel'];
$droits = $_SESSION['droits'];
?>

<script type="text/javascript" src="\AlsaNum\js\admin.js"></script>
<script type="text/javascript" src="js/modifClasse.js"></script>

<center style="margin-bottom: 50px;">
	<h1>ESPACE ADMINISTRATION<br></h1>
	<p style="font-family: 'Montserrat', sans-serif;"><small>connecté en tant que <?php echo $_SESSION['courriel']; ?></small></p>
</center>

<div class="container">
	<?php

	//INITIALISATION DU CHOIX DE LECOLE PAR LADMIN OU SELON LAPPARTENANCE DU CORRESPONDANT
	$choixEcole = "";
	if (isset($_POST['choixEcole'])) {
		$choixEcole = $_POST['choixEcole'];
		$_SESSION['choixEcole'] = $_POST['choixEcole'];
	} else {
		$querySelect = "SELECT FK_etablissement FROM utilisateur 
				WHERE email = '$user'";
		$execquerySelect = $mysqli->query($querySelect);
		$choixEcole = mysqli_fetch_array($execquerySelect, MYSQLI_BOTH)[0];
		$_SESSION['choixEcole'] = $choixEcole;
	}


	//SI CEST UN ADMIN QUI EST CONNECTE
	if ($droits == 1) {



		//REQUETE QUI RECUPERE TOUTES LES ECOLES
		$querryAll = "SELECT * from etablissement 
		inner join utilisateur on utilisateur.FK_etablissement = etablissement.ID_etablissement;";

		$resultAll = mysqli_query($mysqli, $querryAll);
	?>


		<!-- MENU DE SELECTION DECOLE POUR LADMIN -->
		<h2>Quelle ecole souhaitez vous gerer ?</h2>
		<form method="POST" action="espace_administration.php">
			<select name="choixEcole" class="form-select" aria-label="Default select example">
				<option value="" selected>Cliquez pour choisir</option>

				<?php while ($row = mysqli_fetch_array($resultAll, MYSQLI_BOTH)) { ?>

					<option value="<?php echo $row[0] ?>"><?php echo $row[2] ?></option>

				<?php } ?>

			</select>

			</select>
			<br>
			<input type="submit" class="btn btn-primary btn-sm btn-block" value="Valider">
		</form>




	<?php

	}


	//RECUPERATION DE L'ECOLE SELON LE CHOIX DANS LE MENU OU SELON LE CORRESPONDANT
	$query = "SELECT * FROM etablissement 
		INNER JOIN utilisateur
		ON utilisateur.FK_etablissement = etablissement.ID_etablissement
		LEFT JOIN classe
		ON classe.FK_etablissement = etablissement.ID_etablissement
		WHERE utilisateur.FK_etablissement = '$choixEcole'";


	$execquery = $mysqli->query($query);

	//RECUPERATION DES SAISIES
	while ($row = mysqli_fetch_array($execquery, MYSQLI_BOTH)) {
		$NomEcole = $row["nom_etablissement"];
		$identifiant = $row["identifiant_etablissement"];
		$Adresse = $row["adresse"];
		$CodePostal = $row["code_postal"];
		$Ville = $row["ville"];
		$Telephone = $row["telephone"];
		$Email = $row["email"];
		$derniereModification = $row["derniere_modification"];

		$genre_correpondant = $row["genre"];
		$nom_correpondant = $row["nom"];
		$prenom_correpondant = $row["prenom"];
		$email_correpondant = $row["email"];
	}


	//AFFICHAGE DES SAISIES SI LE CHOIX DE L'ECOLE EST FAIT OU SI CEST UN COORESPONDANT QUI EST CONNECTE
	if ($choixEcole != "") { ?>

		<form action="espace_admin_insert.php" method="POST">

			<h2>Coordonnées</h2>

			<div class="form-group row">
				<label for="name_gt_1" class="col-sm-2 col-form-label">Nom de l'école</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="nom_etablissement" id="nomEcole" value="<?= $NomEcole ?>" maxlength=100 required>
				</div>
			</div>

			<div class="form-group row">
				<label for="name_gt_2" class="col-sm-2 col-form-label">Identifiant</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="ID_etablissement" id="ID_etablissement" value="<?= $identifiant ?>" maxlength=100>
				</div>
			</div>

			<div class="form-group row">
				<label for="name_gt_3" class="col-sm-2 col-form-label">Adresse</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="Adresse" id="Adresse" value="<?= $Adresse ?>" maxlength=100>
				</div>
			</div>

			<div class="form-group row">
				<label for="name_gt_3" class="col-sm-2 col-form-label">Code Postal</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="CodePostal" id="Adresse" value="<?= $CodePostal ?>" maxlength=100>
				</div>
			</div>

			<div class="form-group row">
				<label for="name_gt_3" class="col-sm-2 col-form-label">Ville</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="Ville" id="Adresse" value="<?= $Ville ?>" maxlength=100>
				</div>
			</div>

			<div class="form-group row">
				<label for="name_gt_4" class="col-sm-2 col-form-label">Téléphone</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="Telephone" id="Telephone" value="<?= $Telephone ?>" maxlength=100>
				</div>
			</div>

			<div class="form-group row">
				<label for="name_gt_5" class="col-sm-2 col-form-label">Email</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="Email" id="Email" value="<?= $Email ?>" maxlength=100>
				</div>
			</div>

			<div class="form-group row">
				<label for="name_gt_7" class="col-sm-2 col-form-label">Derniere mis à jour</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="derniereModification" id="derniereModification" value="<?= $derniereModification ?>" maxlength=100>
				</div>
			</div>

			<p><br></p>

			<h2>Correspondant local</h2>
			<div class="form-group row">
				<label for="name_gt_8" class="col-sm-2 col-form-label">Genre</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="genre_correspondant" id="genre_correspondant" value="<?= $genre_correpondant ?>" maxlength=100>
				</div>
			</div>

			<div class="form-group row">
				<label for="name_gt_9" class="col-sm-2 col-form-label">Nom</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="nom_correspondant" id="nom_correspondant" value="<?= $nom_correpondant ?>" maxlength=100>
				</div>
			</div>

			<div class="form-group row">
				<label for="name_gt_10" class="col-sm-2 col-form-label">Prénom</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="prenom_correspondant" id="prenom_correspondant" value="<?= $prenom_correpondant ?>" maxlength=100>
				</div>
			</div>

			<div class="form-group row">
				<label for="name_gt_10" class="col-sm-2 col-form-label">Email</label>
				<div class="col-sm-10">
					<input type="email" class="form-control" name="email_correspondant" id="email_correspondant" value="<?= $email_correpondant ?>" maxlength=100>
				</div>
			</div>

			<p><br></p>

			<h2>Classes</h2>
			<br>

			<div class="row">

				<div class="col-sm-2">
					<h4>Niveau</h4>
				</div>

				<div class="col-sm-6">
					<h4>Nom de la classe</h4>
				</div>

				<div class="col-sm-3">
					<h4>Effectif de la classe</h4>
				</div>

			</div>

			<br>

			<div id="divClasse">
				<?php
				$sum = 0;
				$nameInput = "nom_classe";
				$effectifInput = "effectif_classe";
				mysqli_data_seek($execquery, 0);


				while ($row = mysqli_fetch_array($execquery, MYSQLI_BOTH)) {
					if ($row["niveau_classe"] != null) {
						$sum += $row['effectif_classe'];
				?>

						<div class="form-group row">
							<div class="col-sm-2">
								<label name="name_gt_1" class="col-form-label"> <?php echo $row["niveau_classe"]; ?> </label>
							</div>
							<div class="col-sm-6">
								<input type="text" class="form-control" name="<?php echo $nameInput; ?>" value="<?php echo $row["nom_classe"]; ?>" maxlength=100>
							</div>
							<div class="col-sm-3">
								<input type="number" class="form-control " name="<?php echo $effectifInput; ?>" value="<?php echo $row["effectif_classe"]; ?>" min="0" max="100">
							</div>

						</div>

				<?php
						$nameInput = $nameInput . "1";
						$effectifInput = $effectifInput . "1";
					}
				}
				?>
			</div>
			<br>

			<div class="form-group">
				<img src="img/add.png" alt="add_button" onclick="addClasse();">
			</div>

			<div class="form-group row">
				<label for="workload_week_fi" class="col-sm-2 col-form-label">Effectif total</label>
				<div class="col-sm-1">
					<input type="number" class="form-control" name="effectif_total" id="effectif_total" value="<?php echo $sum; ?>">
				</div>
			</div>

			<div class="row" style="margin-top: 50px; margin-bottom: 50px;">
				<button type="submit" class="btn btn-primary btn-lg col-md-5" style="margin-left: 100px;margin-right: 100px;">VALIDER LES MODIFICATIONS</button><br></br>
				<a onclick="AfficheSupprimer()" href="#supprimer" class="btn btn-danger btn-lg col-md-5" style="background-color:brown;">SUPPRIMER UNE CLASSE</a>
			</div>
		</form>


		<!-- MENU DE SELECTION LA CLASSE A SUPPRIMER -->
		<?php
		mysqli_data_seek($execquery, 0);
		?>

		<div id="supprimer" style="display: none;">
			<h2 style="color: brown;">Quelle classe souhaitez vous suprimmer ?</h2>
			<form method="POST" action="espace_admin_remove.php">
				<select name="choixClasse" class="form-select" aria-label="Default select example">
					<option value="" selected>Cliquez pour choisir</option>

					<?php while ($row = mysqli_fetch_array($execquery, MYSQLI_BOTH)) { ?>

						<option value="<?php echo $row['ID_classe'] ?>"><?php echo $row['nom_classe'] ?></option>

					<?php } ?>

				</select>

				</select>
				<br>
				<input type="submit" class="btn btn-danger btn-sm" style="background-color:brown;" value="Valider">
			</form>
		</div>

</div>
<?php } ?>