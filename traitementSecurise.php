<?php
$name = $_POST["name"];
$name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
echo "Bonjour " . $name . " !";
