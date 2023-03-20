<!DOCTYPE html>
<html>
<head>
	<title>Formulaire de connexion</title>
</head>
<body>
	<h1>Connexion</h1>
	<form method="post" action="connexion.php">
		<label>Nom d'utilisateur :</label>
		<input type="text" name="nom_utilisateur" required><br><br>
		<label>Mot de passe :</label>
		<input type="password" name="mot_de_passe" required><br><br>
		<input type="submit" value="Se connecter">
	</form>

	<h1>Créer un compte</h1>
	<form method="post" action="inscription.php">
		<label>Nom d'utilisateur :</label>
		<input type="text" name="nom_utilisateur" required><br><br>
		<label>Mot de passe :</label>
		<input type="password" name="mot_de_passe" required><br><br>
		<label>Email :</label>
		<input type="email" name="email" required><br><br>
		<input type="submit" value="Créer un compte">
	</form>

    <form action="traitement.php" method="post">
    <label for="name">Nom :</label>
    <input type="text" name="name" id="name">
    <input type="submit" value="Envoyer">
    </form>
    
</body>
</html>
