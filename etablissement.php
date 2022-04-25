<?php
session_start();
include 'include/header.php';
include 'connectionBDD.php';
if (isset($_SESSION['droits'])) {
	$droits = $_SESSION['droits'];
} else {
	$droits = 0;
}
?>
<script type="text/javascript" src="\AlsaNum\js\admin.js"></script>
<script type="text/javascript" src="js/modifClasse.js"></script>
<?php

$query = "SELECT * FROM Etablissement";

$result = mysqli_query($mysqli, $query);

?>
<div class="container">
	<div class="row">
		<?php

		while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) { ?>



			<div class="col-md-6">
				<div class="card mb-3 border border-primary" id="Ecole1">
					<a href="<?= $Googlemap = "https://www.google.com/maps/place/%C3%89cole+%C3%A9l%C3%A9mentaire+de+Bischoffsheim/@48.4867764,7.4860763,17z/data=!3m1!4b1!4m5!3m4!1s0x4796b2a7c66772bf:0xcf6195737a6bb082!8m2!3d48.4867688!4d7.4882682"; ?>" target="_blank">
						<img class="card-img-top" src="img/cassin.png" alt="Ecole">
					</a>

					<div class="card-body">
						<h5 class="card-title"><?php echo $row[2] ?> </h5>
						<p class="card-text">Identifiant : <?php echo $row[1] ?></p>
						<p class="card-text">Adresse : <?php echo $row[3] ?></p>
						<p class="card-text">Code postal : <?php echo $row[4] ?></p>
						<p class="card-text">Ville : <?php echo $row[5] ?></p>
						<p class="card-text">Telephone : <?php echo $row[6] ?></p>
						<p class="card-text">Email : <?php echo $row[7] ?></p>
						<p class="card-text"><small class="text-muted">Derniere mise à jour : <?php echo $row[8] ?></small></p>

						<form method="POST" action="page_informations_etablissement.php" style="margin-block-end: 0em;">
							<button type="submit" name="choixEcole" value="<?php echo $row[0] ?>" class="btn btn-primary btn-lg btn-block" style="display: block; width: 100%;">Cliquez pour plus d'informations</button>
						</form>

					</div>
				</div>

			</div>
		<?php }


		if ($droits == 1) { ?>



			<div class="col-md-6">
				<a href="#ajoutEtablissement">
				<img onclick="ajouterEtablissement()" src="img/add_grand.png" href style="display: block; margin-left: auto; margin-right: auto; margin-top: 15%; margin-bottom: 15%; width: 50%;">
				</a>
			</div>



			<form id="ajoutEtablissement" action="etablissement_requete.php" method="POST" style="display: none; margin-top: 70px;">

				<h2>Coordonnées</h2>

				<div class="form-group row">
					<label for="name_gt_1" class="col-sm-2 col-form-label">Nom de l'école</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="nom_etablissement" id="nomEcole" value="" maxlength=100 required>
					</div>
				</div>

				<div class="form-group row">
					<label for="name_gt_2" class="col-sm-2 col-form-label">Identifiant</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="ID_etablissement" id="ID_etablissement" value="" maxlength=100 required>
					</div>
				</div>

				<div class="form-group row">
					<label for="name_gt_3" class="col-sm-2 col-form-label">Adresse</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Adresse" id="Adresse" value="" maxlength=100 required>
					</div>
				</div>

				<div class="form-group row">
					<label for="name_gt_3" class="col-sm-2 col-form-label">Code Postal</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="CodePostal" id="Adresse" value="" maxlength=100 required>
					</div>
				</div>

				<div class="form-group row">
					<label for="name_gt_3" class="col-sm-2 col-form-label">Ville</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Ville" id="Adresse" value="" maxlength=100 required>
					</div>
				</div>

				<div class="form-group row">
					<label for="name_gt_4" class="col-sm-2 col-form-label">Téléphone</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Telephone" id="Telephone" value="" maxlength=100 required>
					</div>
				</div>

				<div class="form-group row">
					<label for="name_gt_5" class="col-sm-2 col-form-label">Email</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Email" id="Email" value="" maxlength=100 required>
					</div>
				</div>

				<div class="form-group row">
					<label for="name_gt_7" class="col-sm-2 col-form-label">Derniere mis à jour</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="derniereModification" id="derniereModification" value="" maxlength=100>
					</div>
				</div>

				<p><br></p>

				<h2>Correspondant local</h2>
				<div class="form-group row">
					<label for="name_gt_8" class="col-sm-2 col-form-label">Genre</label>
					<div class="col-sm-10">
						<select class="form-select" name="genre_correspondant" id="genre_correspondant">
							<option value="Monsieur" selected>Monsieur</option>
							<option value="Madame">Madame</option>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label for="name_gt_9" class="col-sm-2 col-form-label">Nom</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="nom_correspondant" id="nom_correspondant" value="" maxlength=100 required>
					</div>
				</div>

				<div class="form-group row">
					<label for="name_gt_10" class="col-sm-2 col-form-label">Prénom</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="prenom_correspondant" id="prenom_correspondant" value="" maxlength=100 required>
					</div>
				</div>

				<div class="form-group row">
					<label for="name_gt_10" class="col-sm-2 col-form-label">Email</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" name="email_correspondant" id="email_correspondant" value="" maxlength=100 required>
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

					<div id="divClasse">
					</div>


				</div>

				<div class="form-group">
					<br>
					<img src="img/add.png" alt="add_button" onclick="addClasse();">
				</div>

				<div class="row" style="margin-top: 50px; margin-bottom: 50px;">
					<button type="submit" class="btn btn-primary btn-lg col" style="margin-left: 100px;margin-right: 100px;">VALIDER LES MODIFICATIONS</button><br></br>
				</div>
			</form>

		<?php } ?>

	</div>
</div>