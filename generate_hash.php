<?php
// Script pour g�n�rer un hash s�curis�
$mot_de_passe = "MonMotDePasse123"; 
$hash = password_hash($mot_de_passe, PASSWORD_BCRYPT);

echo "Mot de passe en clair : $mot_de_passe <br>";
echo "Hash g�n�r� : $hash";
?>
