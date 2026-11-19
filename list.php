<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des tâches</title>
</head>
<body>

    <h1>Ma liste de tâches</h1>

    <?php foreach ($tasks as $task): ?>

        <h2><?= htmlspecialchars($task['title']) ?></h2>

        <p><?= htmlspecialchars($task['description']) ?></p>

    <?php endforeach; ?>

</body>
</html>