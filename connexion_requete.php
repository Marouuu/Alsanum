<?php
session_start();
include 'connectionBDD.php';

$courriel = $_POST["courriel"];
$motdepasse = $_POST["motdepasse"];

if($courriel !== "" && $motdepasse !== ""){
    
    //Trouve si l'utilisateur existe et compte le nombre d'occurence
    $query = "SELECT count(*) FROM `Utilisateur` WHERE email='$courriel' and motdepasse='$motdepasse';";
    $exec_query = mysqli_query($mysqli,$query);
    $reponse = mysqli_fetch_array($exec_query);
    $count = $reponse['count(*)'];
    
    //Select de l'utilisateur         
    // row[6] = correspondant et row[7] = admin
    $query2 = "SELECT * FROM `Utilisateur` WHERE email='$courriel'";
    $result = mysqli_query($mysqli,$query2);
    $row = mysqli_fetch_row($result);

    //Si correspondance affiche succes
    if($count>0) {
        $_SESSION['courriel']=$courriel;
        $_SESSION['logged-in'] = true;
        $_SESSION['nom'] = $row[0];
        $_SESSION['droits'] = $row[7];
        include 'index.php';
    }
    
    //Si identifiants incorrectes
    else 
    {
        include 'connexion.php';
        echo "Erreur, nom d'utilisateur ou mot de passe incorrect";
        echo "<br> Veuillez <a href=" . "connexion.php" .">réessayer</a> ";
    }


}
else{
    echo "champs incomplets";
}
