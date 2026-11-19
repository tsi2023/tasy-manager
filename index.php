<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../app/Controllers/TaskController.php';

// Créer le Controller
$controller = new TaskController($connexion);

// Appeler la méthode index()
$controller->index();