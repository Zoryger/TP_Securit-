<?php
include('config.php');
ini_set("SMTP", "smtp.gmail.com");
ini_set("smtp_port", "587");
ini_set("auth_username", "securite394@gmail.com");
ini_set("auth_password", "Securite123");
ini_set("ssl", "tls");
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
    $row = mysqli_fetch_assoc($resultat);
    $_SESSION['nom_utilisateur'] = $nom_utilisateur;
    $otp = codeOTP();
    $date = strtotime("now");
    $sql2 = "UPDATE `utilisateurs` SET `otp`='$otp', `otp_time`='$date' WHERE nom_utilisateur ='$nom_utilisateur' AND mot_de_passe = '$mot_de_passe'";
    $res = mysqli_query($connexion, $sql2);
    sendOTPEmail($otp, $row["email"]);
    header("Location: verifyOTP.php");
    exit;
} else {
    echo "Nom d'utilisateur ou mot de passe incorrect";
}


function codeOTP()
{
    $otp = rand(100000, 999999);
    return $otp;
}

function sendOTPEmail($otp, $email)
{
    $to = $email;
    $subject = 'Votre code OTP';
    $message = 'Votre code OTP est : ' . $otp;
    $headers = "From: securite394@gmail.com\r\n";
    $headers .= "Reply-To: securite394@gmail.com\r\n";
    $headers .= "Content-type: text/plain; charset=UTF-8\r\n";

    mail($to, $subject, $message);
}
