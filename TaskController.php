<?php

require_once __DIR__ . '/../Models/Task.php';

class TaskController {

    private $taskModel;

    public function __construct($connexion) {
        $this->taskModel = new Task($connexion);
    }

    public function index() {

    $tasks = $this->taskModel->getAll();

    require __DIR__ . '/../Views/tasks/list.php'; //require :charge le fichier View.
    }

    public function show($id){
        $tasks = $this->taskModel->getById($id);

        return $tasks;
    }
}