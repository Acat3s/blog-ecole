<?php
// Script pour générer un hash sécurisé
$mot_de_passe = "MonMotDePasse123"; 
$hash = password_hash($mot_de_passe, PASSWORD_BCRYPT);

echo "Mot de passe en clair : $mot_de_passe <br>";
echo "Hash généré : $hash";
?>
