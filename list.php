<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des tâches</title>
</head>
<body>
    
    <h1>Ma liste de tâches</h1>

    <h2>Ajouter une tâche</h2>

    <form method="POST" action="">
        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8') ?>" >
        <label for="title">Titre :</label>
        <input type="text" id="title" name="title" required>

        <label for="description">Description :</label>
        <textarea id="description" name="description"></textarea>

        <button type="submit">Ajouter</button>
    </form>
    <?php
    if (isset($_SESSION['nom_du_message'])) {
        $message = $_SESSION['nom_du_message'];
    ?>
        <p><?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?></p>
        
    <?php
    unset($_SESSION['nom_du_message']);
    }
    ?>
    <?php foreach ($tasks as $task): ?>

        <h2><?= htmlspecialchars($task['title']) ?></h2>

        <p><?= htmlspecialchars($task['description']) ?></p>

        <form method="POST" action="?action=delete">
            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8') ?>" >
           <input type="hidden" name="id" value="<?= $task['id'] ?>">
           <button type="submit">supprimer</button> 
        </form>
        <form method="POST" action="?action=edit">
            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8') ?>" >
            <input type="hidden" name="id" value="<?= $task['id'] ?>">
            <button type="submit">Modifier</button>
        </form>

    <?php endforeach; ?>

</body>
</html>