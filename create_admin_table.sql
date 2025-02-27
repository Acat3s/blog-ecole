-- Création de la table admin
CREATE TABLE admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

-- Insertion d'un utilisateur admin avec mot de passe sécurisé
-- Remplacez le hash par un hash généré via password_hash en PHP
INSERT INTO admin (username, password) 
VALUES ('admin', '$2y$10$EXEMPLEDEHASHSECURISEEXEMPLEPARPHP');
