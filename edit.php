<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier la tache</title>
</head>
<body>

    <h2>Modifier une tâche</h2>

    <form method="POST" action="?action=update">
        <input type="hidden" name="csrf_token" value=<?= htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8') ?> >
        <label for="title">Titre :</label>
        <input type="text" id="title" name="title" required value="<?= htmlspecialchars($task['title'], ENT_QUOTES, 'UTF-8') ?>">
        <input type="hidden" name="id" value="<?= $task['id'] ?>">
        <label for="description">Description :</label>
        <textarea id="description" name="description"><?= htmlspecialchars($task['description']), ENT_QUOTES, 'UTF-8' ?></textarea>

        <button type="submit">Enregistrer les modifications</button>
    </form>


</body>
</html>