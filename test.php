<?php

require_once 'config/database.php';
require_once 'app/Models/Task.php';

$taskModel = new Task($connexion);

// Ajouter une tâche
$taskModel->create(
    "Apprendre PHP",
    "Comprendre le fonctionnement du modèle MVC"
);

echo "Tâche ajoutée !";

// Récupérer toutes les tâches
$tasks = $taskModel->getAll();

echo "<pre>";
print_r($tasks);
echo "</pre>";

// Récupérer une tâche par son ID
$task = $taskModel->getById(1);

echo "<pre>";
print_r($task);
echo "</pre>";

$taskModel->update(
    1,
    "Apprendre PHP MVC",
    "Créer une application avec une architecture MVC"
);

echo "Tâche modifiée !";
