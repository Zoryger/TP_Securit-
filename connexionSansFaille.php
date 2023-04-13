<?php
include('config.php');
$connexion = mysqli_connect($host, $utilisateur, $mot_de_passe, $nom_de_la_base);

if (!$connexion) {
    die("Erreur de connexion: " . mysqli_connect_error());
}
mysqli_set_charset($connexion, "utf8");

$nom_utilisateur = mysqli_real_escape_string($connexion, $_POST['nom_utilisateur']);
$mot_de_passe = mysqli_real_escape_string($connexion, $_POST['mot_de_passe']);

$requete = "SELECT * FROM utilisateurs WHERE nom_utilisateur = '" . $nom_utilisateur . "' AND mot_de_passe = '" . $mot_de_passe . "'";
$resultat = mysqli_query($connexion, $requete);

if (mysqli_num_rows($resultat) == 1) {
    session_start();
    $_SESSION['nom_utilisateur'] = $nom_utilisateur;
    echo "Connexion à $nom_utilisateur";
    exit();
} else {
    echo "Nom d'utilisateur ou mot de passe incorrect";
}
