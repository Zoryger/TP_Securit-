<?php

// Fonction pour chiffrer ou déchiffrer un message avec une clé donnée
function vigenere($text, $key, $decrypt=false)
{
    $result = '';
    $textLen = strlen($text);
    $keyLen = strlen($key);
    
    // Si le message est plus court que la clé, répétez la clé pour couvrir toute la longueur du message
    $key = str_repeat($key, ceil($textLen/$keyLen));
    $key = substr($key, 0, $textLen);
    
    // Parcours chaque caractère du texte et applique le chiffrement/déchiffrement
    for ($i=0; $i<$textLen; $i++) {
        $char = $text[$i];
        $kchar = $key[$i];
        if (ctype_alpha($char)) {
            $base = ord('a');
            if (ctype_upper($char)) {
                $base = ord('A');
            }
            $offset = ord($kchar) - $base;
            $shifted = ord($char) + ($decrypt ? -$offset : $offset) - $base;
            $shifted = ($shifted + 26) % 26 + $base;
            $result .= chr($shifted);
        } else {
            $result .= $char;
        }
    }
    
    return $result;
}

// Si le formulaire est soumis, traitez les données
if (isset($_POST['submit'])) {
    $message = $_POST['message'];
    $key = $_POST['key'];
    $action = $_POST['action'];
    $result = '';
    
    // Si l'action est "Chiffrer", utilisez la fonction vigenere() avec $decrypt=false
    if ($action == 'Chiffrer') {
        $result = vigenere($message, $key, false);
    }
    
    // Si l'action est "Déchiffrer", utilisez la fonction vigenere() avec $decrypt=true
    if ($action == 'Déchiffrer') {
        $result = vigenere($message, $key, true);
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Vigenère</title>
</head>
<body>

<h1>Vigenère</h1>

<!-- Afficher le formulaire avec les champs "Message", "Clé" et "Action" -->
<form method="post">
    <label for="message">Message:</label>
    <input type="text" name="message" id="message" value="<?php echo isset($message) ? htmlspecialchars($message) : ''; ?>"><br>
    <label for="key">Clé:</label>
    <input type="text" name="key" id="key" value="<?php echo isset($key) ? htmlspecialchars($key) : ''; ?>"><br>
    <label for="action">Action:</label>
    <select name="action" id="action">
        <option value="Chiffrer" <?php echo isset($action) && $action == 'Chiffrer' ? 'selected' : ''; ?>>Chiffrer</option>
        <option value="Déchiffrer" <?php echo isset($action)&& $action == 'Déchiffrer' ? 'selected' : ''; ?>>Déchiffrer</option>
</select><br>
<input type="submit" name="submit" value="OK">

</form>
<!-- Afficher le résultat du chiffrement/déchiffrement -->
<?php if (isset($result)): ?>
    <h2>Résultat:</h2>
<?php echo htmlspecialchars($result); ?>
<?php endif; ?>
</body>
</html>
