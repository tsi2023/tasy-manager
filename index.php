<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../app/Controllers/TaskController.php';

// Créer le Controller
$controller = new TaskController($connexion);

if (isset($_GET['action']) && $_GET['action'] === 'delete') {
    $controller->delete();
} else {
    $controller->index();
}

