<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

// Connexion à la base de données
$host = "localhost";
$dbname = "Dieu";
$user = "root";
$password = "Iroise29";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// Ajouter un nouvel article
if (isset($_POST['add'])) {
    $titre = htmlspecialchars($_POST['titre']);
    $contenu = htmlspecialchars($_POST['contenu']);
    $auteur = htmlspecialchars($_POST['auteur']);
    $date_publication = $_POST['date_publication'];
    $image = "";

    // Gérer l'upload de l'image
    if (!empty($_FILES['image']['name'])) {
        $image = 'uploads/' . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], __DIR__ . '/' . $image);
    }

    $sql = "INSERT INTO articles (titre, contenue, auteur, date_publication, image) VALUES (:titre, :contenu, :auteur, :date_publication, :image)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':titre' => $titre,
        ':contenu' => $contenu,
        ':auteur' => $auteur,
        ':date_publication' => $date_publication,
        ':image' => $image
    ]);
}

// Supprimer un article
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $pdo->prepare("DELETE FROM articles WHERE id = ?")->execute([$id]);
}

// Modifier un article
if (isset($_POST['update'])) {
    $id = (int)$_POST['id'];
    $titre = htmlspecialchars($_POST['titre']);
    $contenu = htmlspecialchars($_POST['contenu']);
    $auteur = htmlspecialchars($_POST['auteur']);
    $date_publication = $_POST['date_publication'];
    $image = $_POST['current_image']; // Par défaut, on conserve l'image actuelle

    // Gérer l'upload d'une nouvelle image
    if (!empty($_FILES['image']['name'])) {
        $newImage = 'uploads/' . basename($_FILES['image']['name']);
        // Upload de la nouvelle image
        if (move_uploaded_file($_FILES['image']['tmp_name'], __DIR__ . '/' . $newImage)) {
            $image = $newImage; // Remplacer l'ancienne image par la nouvelle
        }
    }

    $sql = "UPDATE articles SET titre = :titre, contenue = :contenu, auteur = :auteur, date_publication = :date_publication, image = :image WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':titre' => $titre,
        ':contenu' => $contenu,
        ':auteur' => $auteur,
        ':date_publication' => $date_publication,
        ':image' => $image,
        ':id' => $id
    ]);
}

// Récupérer les articles
$articles = $pdo->query("SELECT * FROM articles ORDER BY date_publication DESC")->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Back Office - Gestion des Articles</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f4f4f4; }
        h1, h2 { text-align: center; color: #333; }
        .container { max-width: 800px; margin: auto; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: center; }
        th { background-color: #f4f4f4; }
        input, textarea { width: 95%; margin-bottom: 10px; padding: 8px; border: 1px solid #ddd; border-radius: 4px; }
        button { padding: 8px 12px; background-color: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background-color: #45a049; }
        .delete-btn { background-color: #f44336; }
        .delete-btn:hover { background-color: #d32f2f; }
        img { max-width: 100px; border-radius: 4px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Back Office</h1>
        <h2>Gestion des Articles</h2>

        <!-- Formulaire pour ajouter un nouvel article -->
        <h3>Ajouter un nouvel article</h3>
        <form method="POST" enctype="multipart/form-data">
            <input type="text" name="titre" placeholder="Titre de l'article" required><br>
            <textarea name="contenu" placeholder="Contenu de l'article" rows="5" required></textarea><br>
            <input type="text" name="auteur" placeholder="Auteur" required><br>
            <input type="date" name="date_publication" required><br>
            <input type="file" name="image" accept="image/*"><br>
            <button type="submit" name="add">Ajouter l'article</button>
        </form>

        <!-- Liste des articles existants -->
        <h3>Articles existants</h3>
        <table>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Contenu</th>
                <th>Auteur</th>
                <th>Date</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($articles as $article): ?>
                <tr>
                    <form method="POST" enctype="multipart/form-data">
                        <td><?= $article['id']; ?></td>
                        <td><input type="text" name="titre" value="<?= htmlspecialchars($article['titre']); ?>"></td>
                        <td><textarea name="contenu"><?= htmlspecialchars($article['contenue']); ?></textarea></td>
                        <td><input type="text" name="auteur" value="<?= htmlspecialchars($article['auteur']); ?>"></td>
                        <td><input type="date" name="date_publication" value="<?= $article['date_publication']; ?>"></td>
                        <td>
                            <img src="<?= htmlspecialchars($article['image']); ?>" alt="Image de l'article">
                            <input type="hidden" name="current_image" value="<?= htmlspecialchars($article['image']); ?>">
                            <input type="file" name="image" accept="image/*">
                        </td>
                        <td>
                            <input type="hidden" name="id" value="<?= $article['id']; ?>">
                            <button type="submit" name="update">Modifier</button>
                            <a href="?delete=<?= $article['id']; ?>" class="delete-btn" onclick="return confirm('Supprimer cet article ?');">Supprimer</a>
                        </td>
                    </form>
                </tr>
            <?php endforeach; ?>
        </table>

        <br><a href="logout.php">Déconnexion</a>
    </div>
</body>
</html>
