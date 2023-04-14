<?php
include('config.php');
$connexion = mysqli_connect($host, $utilisateur, $mot_de_passe, $nom_de_la_base);

session_start();
$id = $_GET['id'];
$sql = "SELECT * FROM utilisateurs WHERE id ='$id'";
$resultat = mysqli_query($connexion, $sql);
$row = mysqli_fetch_assoc($resultat);
$code = $row["otp"];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $otpGive = $_POST['otp'];
    $dateNow = strtotime("now");
    if (isLessThanFiveMinutes($dateNow, $row["otp_time"])) {
        if ($row["otp"] == $otpGive) {
            $_SESSION["id"] = $id;
            $_SESSION["email"] = $row["email"];
            $_SESSION["username"] = $row["nom_utilisateur"];
            header("Location: modificationUser.php");
        } else {
            echo "Mauvais code !";
        }
    } else {
        echo "Trop tard !";
    }
}

function isLessThanFiveMinutes($timestamp1, $timestamp2)
{
    $date1 = new DateTime("@$timestamp1");
    $date2 = new DateTime("@$timestamp2");

    $diff = $date1->diff($date2);

    if ($diff->y == 0 && $diff->m == 0 && $diff->d == 0 && $diff->h == 0 && $diff->i < 5) {
        return true;
    }

    return false;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Vérification OTP</title>
</head>

<body>
    <h1>Vérification OTP</h1>
    <form method="POST" action="">
        <label for="otp">Code OTP</label>
        <input type="text" id="otp" name="otp" required>

        <button type="submit">Vérifier</button>
    </form>
    <?php echo "Code si le mail n'est pas envoyé : $code"; ?>
</body>

</html>