<?php
include('config.php');

$connexion = mysqli_connect($host, $utilisateur, $mot_de_passe, $nom_de_la_base);

$nom_utilisateur = $_POST['nom_utilisateur'];
$mot_de_passe = $_POST['mot_de_passe'];
$email = $_POST['email'];

$requete = "SELECT * FROM utilisateurs WHERE nom_utilisateur = '$nom_utilisateur'";
$resultat = mysqli_query($connexion, $requete);

if (mysqli_num_rows($resultat) == 0) {
    $requete = "INSERT INTO utilisateurs (nom_utilisateur, mot_de_passe, email) VALUES ('$nom_utilisateur', '$mot_de_passe', '$email')";
    mysqli_query($connexion, $requete);

    echo "Compte créé avec succès";
} else {
    echo "Le nom d'utilisateur est déjà pris";
}
