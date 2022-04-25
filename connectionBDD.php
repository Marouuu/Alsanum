<?php

    //identifiants mysql
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "Alsanum";
    $openDbOk = false;

    //Ouvrir une nouvelle connexion au serveur MySQL
    $mysqli = new mysqli($servername, $username, $password, $database);

    //Afficher toute erreur de connexion
    if ($mysqli->connect_error) {
        die("<div style='margin-left:5%'>" . "Erreur de connection a la base de données: " . mysqli_connect_error());
    }
    // echo "<div style='margin-left:5%'>" . "Connection a la BDD : OK <br>";
    $openDbOk = true;
?>