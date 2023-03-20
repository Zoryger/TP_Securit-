<?php
// Connexion à la base de données
include('config.php');

$connexion = mysqli_connect($host, $utilisateur, $mot_de_passe, $nom_de_la_base);

// Vérification des informations d'inscription
$nom_utilisateur = $_POST['nom_utilisateur'];
$mot_de_passe = $_POST['mot_de_passe'];
$email = $_POST['email'];

// Vérification si le nom d'utilisateur est déjà pris
$requete = "SELECT * FROM utilisateurs WHERE nom_utilisateur = '$nom_utilisateur'";
$resultat = mysqli_query($connexion, $requete);

if (mysqli_num_rows($resultat) == 0) {
    // Le nom d'utilisateur est disponible, on ajoute l'utilisateur à la base de données
    $requete = "INSERT INTO utilisateurs (nom_utilisateur, mot_de_passe, email) VALUES ('$nom_utilisateur', '$mot_de_passe', '$email')";
    mysqli_query($connexion, $requete);
    
    echo "Compte créé avec succès";
} else {
    // Le nom d'utilisateur est déjà pris
    echo "Le nom d'utilisateur est déjà pris";
}