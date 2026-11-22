<?php

require_once __DIR__ . '/../Models/Task.php';

class TaskController {

    private $taskModel;

    public function __construct($connexion) {
        $this->taskModel = new Task($connexion);
    }

    public function index() {

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $title = $_POST['title'];
            $description = $_POST['description'];
            $this->taskModel->create($title, $description);
            header("Location: index.php");
            exit;
        }
        $tasks = $this->taskModel->getAll();
        require __DIR__ . '/../Views/tasks/list.php'; //require :charge le fichier View.
    
    }

    public function show($id){
        $tasks = $this->taskModel->getById($id);

        return $tasks;
    }

    public function delete(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];
            $this->taskModel->delete($id);
            header("Location: index.php");
            exit;
        }
    }
}