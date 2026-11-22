<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier la tache</title>
</head>
<body>

    <h2>Modifier une tâche</h2>

    <form method="POST" action="?action=update">
        <label for="title">Titre :</label>
        <input type="text" id="title" name="title" required value="<?= htmlspecialchars($task['title']) ?>">
        <input type="hidden" name="id" value="<?= $task['id'] ?>">
        <label for="description">Description :</label>
        <textarea id="description" name="description"><?= htmlspecialchars($task['description']) ?></textarea>

        <button type="submit">Enregistrer les modifications</button>
    </form>


</body>
</html>