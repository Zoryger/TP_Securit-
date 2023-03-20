<?php
// Récupération des informations de connexion depuis un fichier externe
include('config.php');

// Connexion à la base de données
$connexion = mysqli_connect($host, $utilisateur, $mot_de_passe, $nom_de_la_base);

// Vérification des erreurs de connexion
if (!$connexion) {
    die("Erreur de connexion: " . mysqli_connect_error());
}

// Vérification des informations de connexion
$nom_utilisateur = $_POST['nom_utilisateur'];
$mot_de_passe = $_POST['mot_de_passe'];

$requete = "SELECT * FROM utilisateurs WHERE nom_utilisateur = '$nom_utilisateur' AND mot_de_passe = '$mot_de_passe'";
$resultat = mysqli_query($connexion, $requete);

if (mysqli_num_rows($resultat) == 1) {
    // Les informations de connexion sont correctes
    session_start();
    $_SESSION['nom_utilisateur'] = $nom_utilisateur;
    echo "Connexion à $nom_utilisateur";
    exit();
} else {
    // Les informations de connexion sont incorrectes
    echo "Nom d'utilisateur ou mot de passe incorrect";
}
