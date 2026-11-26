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
    <form method="GET" action="index.php">
        <select name="status">
            <option value="all">Toutes les tâches</option>
            <option value="0">À faire</option>
            <option value="1">En cours</option>
            <option value="2">Terminées</option>
        </select>

        <button type="submit">Filtrer</button>
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

        <h2><?= htmlspecialchars($task['title'], ENT_QUOTES, 'UTF-8') ?></h2>
        <p><?= htmlspecialchars($task['description'], ENT_QUOTES, 'UTF-8') ?></p>
        <?php if ($task['status'] == 0):?>
            <p>A faire</p>
        <?php elseif ($task['status'] == 1):?>
            <p>en cours</p>
        <?php elseif ($task['status'] == 2):?>
            <p>Terminée</p>    
        <?php else: ?>
            <p>Statut inconnu</p>
        <?php endif; ?>
        <form method="POST" action="?action=updateStatus">
            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8') ?>" >
           <input type="hidden" name="id" value="<?= $task['id'] ?>">
           <select name="status">
                <option value="0" <?= $task['status'] == 0 ? 'selected' : '' ?>>À faire</option>
                <option value="1" <?= $task['status'] == 1 ? 'selected' : '' ?>>En cours</option>
                <option value="2" <?= $task['status'] == 2 ? 'selected' : '' ?>>Terminée</option>
            </select>
            <button type="submit">Modifier le statut</button>
        </form>
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