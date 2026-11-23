<?php
session_start();
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token']= bin2hex(random_bytes(32));
}

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../app/Controllers/TaskController.php';

// Créer le Controller
$controller = new TaskController($connexion);

if (isset($_GET['action']) && $_GET['action'] === 'delete') {
    $controller->delete();
} elseif(isset($_GET['action']) && $_GET['action'] === 'edit'){
    $controller->edit();
}elseif (isset($_GET['action']) && $_GET['action'] === 'update'){
    $controller->update();
} else {
    $controller->index();
}

