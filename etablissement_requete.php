<?php
session_start();
include 'connectionBDD.php';
$user = $_SESSION["courriel"];
$droits = $_SESSION['droits'];

// RECUPERATIONS POST
$NomEcole = $_POST["nom_etablissement"];
$Identifiant = $_POST["ID_etablissement"];
$Adresse = $_POST["Adresse"];
$CodePostal = $_POST["CodePostal"];
$Ville = $_POST["Ville"];
$Telephone = $_POST["Telephone"];
$Email = $_POST["Email"];
$Genre_correpondant = $_POST["genre_correspondant"];
$Nom_correpondant = $_POST["nom_correspondant"];
$Prenom_correpondant = $_POST["prenom_correspondant"];
$Email_correpondant = $_POST["email_correspondant"];

$MDP = "motdepasse";
$BoolCorrespondant = '1';



if (
	$Identifiant != "" && $NomEcole != "" && $Adresse != "" && $CodePostal != "" && $Ville != "" && $Telephone != "" && $Email != "" && $Genre_correpondant != "" && $Nom_correpondant != "" && $Prenom_correpondant != ""
	&& $Email_correpondant != "" && $MDP != "" && $BoolCorrespondant != ""
) {

	//REQUETE AJOUT ETABLISSEMENT DANS LA BDD
	$date = date('d/m/Y H:i:s');
	$queryAjoutEtablissement = $mysqli->prepare("INSERT INTO etablissement (identifiant_etablissement,nom_etablissement,adresse,code_postal,ville,telephone,email,derniere_modification)
VALUES (?,?,?,?,?,?,?,?);");

	$queryAjoutEtablissement->bind_param("ssssssss", $Identifiant, $NomEcole, $Adresse, $CodePostal, $Ville, $Telephone, $Email, $date);

	if ($queryAjoutEtablissement->execute()) {
		$queryAjoutEtablissementState = true;
	}

	// REQUETE SELECTION IDETABLISSEMENT
	$querySelectIdEtab = "SELECT ID_etablissement FROM etablissement WHERE identifiant_etablissement='$Identifiant' ORDER BY ID_etablissement  DESC LIMIT 1;";
	$exec_query = mysqli_query($mysqli, $querySelectIdEtab);
	$resultat = mysqli_fetch_array($exec_query);
	$FK = $resultat[0];



	//REQUETE AJOUT CORRESPONDANT DANS LA BDD
	$queryAjoutUtilisateur = $mysqli->prepare("INSERT INTO utilisateur (genre,nom,prenom,email,motdepasse,correspondant,FK_etablissement )
VALUES (?,?,?,?,?,?,?);");

	$queryAjoutUtilisateur->bind_param("sssssss", $Genre_correpondant, $Nom_correpondant, $Prenom_correpondant, $Email_correpondant, $MDP, $BoolCorrespondant, $FK);

	if ($queryAjoutUtilisateur->execute()) {
		$queryAjoutUtilisateurState = true;
	}
}


//REQUETTE D'AJOUT DE CLASSE
$niveauClasseInput = "name_gt_11";
$nameInput = "nom_classe";
$effectifInput = "effectif_classe";
$elementaire = "elementaire";

while (isset($_POST["$effectifInput"])) {
	$nomClasse = $_POST["$nameInput"];
	$effectifClasse = $_POST["$effectifInput"];
	$niveauClasse = $_POST["$niveauClasseInput"];

	$queryClasse = $mysqli->prepare("INSERT INTO classe (niveau_enseignement,niveau_classe,nom_classe,effectif_classe,FK_etablissement ) VALUES (?,?,?,?,?);");

	$queryClasse->bind_param("ssssi", $elementaire, $niveauClasse, $nomClasse, $effectifClasse, $FK);

	if ($effectifClasse == "" || $nomClasse == "") {
		$queryClasseState = false;
	} else {
		$queryClasse->execute();
		$queryClasseState = true;
	}

	$nameInput = $nameInput . "1";
	$effectifInput = $effectifInput . "1";
	$niveauClasse = $niveauClasse . "1";
}


header('Location: etablissement.php');
