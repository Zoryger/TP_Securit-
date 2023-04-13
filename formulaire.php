<!DOCTYPE html>
<html>

<head>
    <title>Formulaire de connexion</title>
</head>

<body>
    <h1>TP 1 Faille SQL</h1>
    <h2>Connexion</h2>
    <p>Entrer pour le nom d'utilisateur => test'#</p>
    <form method="post" action="connexion.php">
        <label>Nom d'utilisateur :</label>
        <input type="text" name="nom_utilisateur"><br><br>
        <label>Mot de passe :</label>
        <input type="password" name="mot_de_passe"><br><br>
        <input type="submit" value="Se connecter">
    </form>
    <br>
    <h2>Connexion sans faille SQL</h2>
    <form method="post" action="connexionSansFaille.php">
        <label>Nom d'utilisateur :</label>
        <input type="text" name="nom_utilisateur" required><br><br>
        <label>Mot de passe :</label>
        <input type="password" name="mot_de_passe" required><br><br>
        <input type="submit" value="Se connecter">
    </form>

    <!-- <h2>Créer un compte </h2>
    <form method="post" action="inscription.php">
        <label>Nom d'utilisateur :</label>
        <input type="text" name="nom_utilisateur" required><br><br>
        <label>Mot de passe :</label>
        <input type="password" name="mot_de_passe" required><br><br>
        <label>Email :</label>
        <input type="email" name="email" required><br><br>
        <input type="submit" value="Créer un compte">
    </form> -->

    <h1>TP 2 Faille XSS</h1>
    <h2>Entré une faille XSS =>
        &lt;script&gt;
        alert('Vous avez été piraté !');
        &lt;/script&gt;
    </h2>
    <form action="traitement.php" method="post">
        <label for="name">Nom :</label>
        <input type="text" name="name" id="name">
        <input type="submit" value="Envoyer">
    </form>
    <br>
    <h2>De même mais sécurisé</h2>
    <form action="traitementSecurise.php" method="post">
        <label for="name">Nom :</label>
        <input type="text" name="name" id="name">
        <input type="submit" value="Envoyer">
    </form>

    <h1>TP 3 OTP Mail</h1>
    <h2>Connexion</h2>
    <p>Connectez vous et réaliser l'autentification par email</p>
    <form method="post" action="connexionOTP.php">
        <label>Nom d'utilisateur :</label>
        <input type="text" name="nom_utilisateur"><br><br>
        <label>Mot de passe :</label>
        <input type="password" name="mot_de_passe"><br><br>
        <input type="submit" value="Se connecter">
    </form>

</body>

</html>