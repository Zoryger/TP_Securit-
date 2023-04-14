<?php
include('config.php');
session_start();
if (!isset($_SESSION['id'])) {
    header('Location: formulaire.php');
    exit();
}
$username = $_SESSION['username'];
$email = $_SESSION['email'];
$id = $_SESSION["id"];
$errors = array();
$success = '';

if (isset($_POST['password']) and isset($_POST['email'])) {

    $new_email = trim($_POST['email']);
    $new_password = trim($_POST['password']);

    if (empty($new_email)) {
        $errors[] = 'Veuillez rentrer un email';
    }
    if (empty($new_password)) {
        $errors[] = 'Veuillez rentrer un mot de passe';
    }

    if (empty($errors)) {

        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        $connexion = mysqli_connect($host, $utilisateur, $mot_de_passe, $nom_de_la_base);


        if (!$connexion) {
            die('Connexion échoué: ' . mysqli_connect_error());
        }

        $sql = "UPDATE utilisateurs SET email='$new_email', `mot_de_passe`='$hashed_password' WHERE id='$id'";

        if (mysqli_query($connexion, $sql)) {
            $success = 'Profil modifié avec succé';

            $log_file = 'modification_profil_' . date('Y-m-d') . '.log';
            $log_message = '[' . date('Y-m-d H:i:s') . '] Utilisateur ' . $username . ' a modifié son profil: email=' . $new_email . ', mot de passe=' . $new_password . "\n";
            file_put_contents($log_file, $log_message, FILE_APPEND);
        } else {
            $errors[] = 'Erreur lors de la modification: ' . mysqli_error($connexion);
        }

        mysqli_close($connexion);
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Profile</title>
</head>

<body>
    <h1>TP 4: modification du profil + TP 5 Log</h1>
    <?php if (!empty($errors)) : ?>
        <div style="color: red;">
            <?php foreach ($errors as $error) : ?>
                <p><?php echo $error; ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <?php if (!empty($success)) : ?>
        <div style="color: green;">
            <?php echo $success; ?>
        </div>
    <?php endif; ?>
    <form method="post">
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $email; ?>" required><br><br>
        <label>Nouveau mot de passe hashé:</label>
        <input type="password" name="password" required><br><br>
        <button type="submit">Modifier</button>
    </form>
</body>
<?php
