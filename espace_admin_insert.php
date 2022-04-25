<?php
session_start();
include 'connectionBDD.php';
$user = $_SESSION["courriel"];
$droits = $_SESSION['droits'];



$choixEcole = $_SESSION['choixEcole'];
$queryClasseState = false;
$querryModifsState = false;

//RECUPERATIONS $_POST DES SAISIES
$NomEcole = $_POST["nom_etablissement"];
$Identifiant = $_POST["ID_etablissement"];
$Adresse = $_POST["Adresse"];
$CodePostal = $_POST["CodePostal"];
$Ville = $_POST["Ville"];
$Telephone = $_POST["Telephone"];
$Email = $_POST["Email"];
$DerniereModification = $_POST["derniereModification"];
$Genre_correpondant = $_POST["genre_correspondant"];
$Nom_correpondant = $_POST["nom_correspondant"];
$Prenom_correpondant = $_POST["prenom_correspondant"];
$Email_correpondant = $_POST["email_correspondant"];


//RECUPERATION DE L'ECOLE CHOISIE PAR L'ADMIN OU L'ECOLE RELIE AU REFERRANT
$querySelect = "SELECT * FROM etablissement 
			INNER JOIN utilisateur
			ON utilisateur.FK_etablissement = etablissement.ID_etablissement
			INNER JOIN classe
			ON classe.FK_etablissement = etablissement.ID_etablissement
			WHERE utilisateur.FK_etablissement = '$choixEcole'";


// EXECUTION QUERYSELECT
$execquerySelect = $mysqli->query($querySelect);



//ECRITURE DES MODIFICATIONS ETABLISSEMENT&CORRESPONDANT
$date = date('d/m/Y H:i:s');
$querryModifs = $mysqli->prepare("UPDATE etablissement
				INNER JOIN utilisateur on etablissement.ID_etablissement = utilisateur.FK_etablissement
				set etablissement.nom_etablissement = ?,
				etablissement.identifiant_etablissement = ?,
				etablissement.adresse = ?,
				etablissement.code_postal = ?,
				etablissement.ville = ?,
				etablissement.telephone = ?,
				etablissement.email = ?,
				etablissement.derniere_modification = ?,
				utilisateur.genre = ?,
				utilisateur.nom = ?,
				utilisateur.prenom = ?,
				utilisateur.email = ?
				where utilisateur.FK_etablissement = '$choixEcole';");

$querryModifs->bind_param("ssssssssssss", $NomEcole, $Identifiant, $Adresse, $CodePostal, $Ville, $Telephone, $Email, $date, $Genre_correpondant, $Nom_correpondant, $Prenom_correpondant, $Email_correpondant);

if ($querryModifs->execute()) {
	$querryModifsState = true;
}


// ECRITURE DES MODIFICATIONS DES CLASSES DANS LA BDD
$i = "nom_classe";
$a = "effectif_classe";
while ($row = mysqli_fetch_array($execquerySelect, MYSQLI_BOTH)) {

	$nomClasse = $_POST["$i"];
	$effectifClasse = $_POST["$a"];
	$IDClasse = $row['ID_classe'];

	$queryClasse = $mysqli->prepare("UPDATE classe
				INNER JOIN utilisateur on classe.FK_etablissement = utilisateur.FK_etablissement
				set classe.nom_classe = ?,classe.effectif_classe= ?
				WHERE classe.ID_classe  = ?;");

	$queryClasse->bind_param("sss", $nomClasse, $effectifClasse, $IDClasse);

	$i = $i . "1";
	$a = $a . "1";

	if ($queryClasse->execute()) {
		$queryClasseState = true;
	}
}

$j = "name_gt_11";
$elementaire = "elementaire";
while (isset($_POST["$a"])) {
	$nomClasse = $_POST["$i"];
	$effectifClasse = $_POST["$a"];
	$niveauClasse = $_POST["$j"];
	$FKEtablissement = $choixEcole;

	$queryClasse = $mysqli->prepare("INSERT INTO classe (niveau_enseignement,niveau_classe,nom_classe,effectif_classe,FK_etablissement ) VALUES (?,?,?,?,?);");

	$queryClasse->bind_param("ssssi", $elementaire, $niveauClasse, $nomClasse, $effectifClasse, $FKEtablissement);

	if ($effectifClasse == "" || $nomClasse == "") {
		$queryClasseState = false;
	} else {
		$queryClasse->execute();
		$queryClasseState = true;
	}

	$i = $i . "1";
	$a = $a . "1";
	$j = $j . "1";
}



if ($querryModifsState && $queryClasseState) {
?>
	<div class="alert alert-success" id="success-alert">
		<button style="float: right;" type="button" class="btn-close" aria-label="Close" data-dismiss="alert"></button>
		<strong>Modifications effectués avec succes !</strong>
	</div>
<?php
	include 'espace_administration.php';
} else {
?>
	<div class="alert alert-danger" role="alert">
		<button style="float: right;" type="button" class="btn-close" aria-label="Close" data-dismiss="alert"></button>
		<strong>Attention ! Les champs ne peuvent êtres vides</strong>
	</div>
<?php
	include 'espace_administration.php';
}



if ($mysqli->error) {
	printf("Could not insert record into table: %s <br>", $mysqli->error);
}
?>