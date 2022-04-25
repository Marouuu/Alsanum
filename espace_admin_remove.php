<?php
session_start();
include 'connectionBDD.php';
$user = $_SESSION["courriel"];
$droits = $_SESSION['droits'];
$choixEcole = $_SESSION['choixEcole'];
$choixClasse = $_POST['choixClasse'];

$queryDelete = $mysqli->prepare("DELETE FROM classe WHERE ID_classe=?;");

$queryDelete->bind_param("i", $choixClasse);

if ($queryDelete->execute()) {
	$queryDeleteState = true;
}

if ($queryDeleteState) {
    ?>
        <div class="alert alert-success" id="success-alert">
            <button style="float: right;" type="button" class="btn-close" aria-label="Close" data-dismiss="alert"></button>
            <strong>Classe supprimée avec succes !</strong>
        </div>
    <?php
        include 'espace_administration.php';
    } else {
    ?>
        <div class="alert alert-danger" role="alert">
            <button style="float: right;" type="button" class="btn-close" aria-label="Close" data-dismiss="alert"></button>
            <strong>Attention ! La classe n'a pas pu etre supprimée</strong>
        </div>
    <?php
        include 'espace_administration.php';
    }


?>