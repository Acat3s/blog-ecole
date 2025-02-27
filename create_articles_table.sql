CREATE TABLE articles (
    id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    contenue TEXT NOT NULL,
    auteur VARCHAR(100) NOT NULL,
    date_publication DATE NULL,
    image VARCHAR(255) NULL
);
