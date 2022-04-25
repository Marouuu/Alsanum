<?php
if (!isset($_SESSION)) {
    session_start();
};
include 'include/header.php';
include 'connectionBDD.php';
$choixEcole = $_POST['choixEcole'];
?>

<script type="text/javascript" src="\AlsaNum\js\admin.js"></script>
<script type="text/javascript" src="js/modifClasse.js"></script>



<div class="container" style="margin-bottom: 60px;">
    <?php

    //RECUPERATION DE L'ECOLE SELON LE CHOIX DANS LE MENU OU SELON LE CORRESPONDANT
    $query = "SELECT * FROM etablissement 
		INNER JOIN utilisateur
		ON utilisateur.FK_etablissement = etablissement.ID_etablissement
		LEFT JOIN classe
		ON classe.FK_etablissement = etablissement.ID_etablissement
		WHERE utilisateur.FK_etablissement = '$choixEcole'";


    $execquery = $mysqli->query($query);
    

    //RECUPERATION DES INFORMATIONS
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
        $nom_mairie = $row["nom_cmairie"];
        $prenom_mairie =$row["prenom_cmairie"];
        $numero_mairie = $row["numero_cmairie"];
    }


    //AFFICHAGE DES SAISIES SI LE CHOIX DE L'ECOLE EST FAIT OU SI CEST UN COORESPONDANT QUI EST CONNECTE
    if ($choixEcole != "") { ?>
        <center style="margin-bottom: 50px;">
            <h1 style="font-size: 2.2rem;"><?= $NomEcole ?><br></h1>
        </center>

        <h2>Coordonnées</h2>

        <div class="form-group row">
            <label for="name_gt_1" class="col-sm-2 col-form-label">Nom de l'école</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nom_etablissement" id="nomEcole" value="<?= $NomEcole ?>" maxlength=100 disabled required>
            </div>
        </div>

        <div class="form-group row">
            <label for="name_gt_2" class="col-sm-2 col-form-label">Identifiant</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="ID_etablissement" id="ID_etablissement" value="<?= $identifiant ?>" maxlength=100 disabled>
            </div>
        </div>

        <div class="form-group row">
            <label for="name_gt_3" class="col-sm-2 col-form-label">Adresse</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="Adresse" id="Adresse" value="<?= $Adresse ?>" maxlength=100 disabled>
            </div>
        </div>

        <div class="form-group row">
            <label for="name_gt_3" class="col-sm-2 col-form-label">Code Postal</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="CodePostal" id="Adresse" value="<?= $CodePostal ?>" maxlength=100 disabled>
            </div>
        </div>

        <div class="form-group row">
            <label for="name_gt_3" class="col-sm-2 col-form-label">Ville</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="Ville" id="Adresse" value="<?= $Ville ?>" maxlength=100 disabled>
            </div>
        </div>

        <div class="form-group row">
            <label for="name_gt_4" class="col-sm-2 col-form-label">Téléphone</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="Telephone" id="Telephone" value="<?= $Telephone ?>" maxlength=100 disabled>
            </div>
        </div>

        <div class="form-group row">
            <label for="name_gt_5" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="Email" id="Email" value="<?= $Email ?>" maxlength=100 disabled>
            </div>
        </div>

        <div class="form-group row">
            <label for="name_gt_7" class="col-sm-2 col-form-label">Derniere mis à jour</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="derniereModification" id="derniereModification" value="<?= $derniereModification ?>" maxlength=100 disabled>
            </div>
        </div>

        <p><br></p>

        <h2>Correspondant local</h2>
        <div class="form-group row">
            <label for="name_gt_8" class="col-sm-2 col-form-label">Genre</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="genre_correspondant" id="genre_correspondant" value="<?= $genre_correpondant ?>" maxlength=100 disabled>
            </div>
        </div>

        <div class="form-group row">
            <label for="name_gt_9" class="col-sm-2 col-form-label">Nom</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nom_correspondant" id="nom_correspondant" value="<?= $nom_correpondant ?>" maxlength=100 disabled>
            </div>
        </div>

        <div class="form-group row">
            <label for="name_gt_10" class="col-sm-2 col-form-label">Prénom</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="prenom_correspondant" id="prenom_correspondant" value="<?= $prenom_correpondant ?>" maxlength=100 disabled>
            </div>
        </div>

        <div class="form-group row">
            <label for="name_gt_10" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" name="email_correspondant" id="email_correspondant" value="<?= $email_correpondant ?>" maxlength=100 disabled>
            </div>
        </div>

        <p><br></p>

        <h2>Correspondant mairie</h2>
        <div class="form-group row">
            <label for="name_gt_8" class="col-sm-2 col-form-label">Genre</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="genre_correspondant" id="genre_correspondant" value="<?= $prenom_mairie?>" maxlength=100 disabled>
            </div>
        </div>

        <div class="form-group row">
            <label for="name_gt_9" class="col-sm-2 col-form-label">Nom</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nom_correspondant" id="nom_correspondant" value="<?= $nom_mairie ?>" maxlength=100 disabled>
            </div>
        </div>

        <div class="form-group row">
            <label for="name_gt_10" class="col-sm-2 col-form-label">Prénom</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="prenom_correspondant" id="prenom_correspondant" value="<?= $numero_mairie ?>" maxlength=100 disabled>
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
                            <input type="text" class="form-control" name="<?php echo $nameInput; ?>" value="<?php echo $row["nom_classe"]; ?>" maxlength=100 disabled>
                        </div>
                        <div class="col-sm-3">
                            <input type="number" class="form-control " name="<?php echo $effectifInput; ?>" value="<?php echo $row["effectif_classe"]; ?>" min="0" max="100" disabled>
                        </div>

                    </div>

            <?php
                    $nameInput = $nameInput . "1";
                    $effectifInput = $effectifInput . "1";
                }
            }
            ?>
            <br>
            <div class="form-group row">
                <label for="workload_week_fi" class="col-sm-2 col-form-label">Effectif total</label>
                <div class="col-sm-1">
                    <input type="number" class="form-control" name="effectif_total" id="effectif_total" value="<?php echo $sum; ?>" disabled>
                </div>
            </div>
        </div>


</div>
<?php } ?>