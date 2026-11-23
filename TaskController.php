<?php

require_once __DIR__ . '/../Models/Task.php';

class TaskController {

    private $taskModel;

    public function __construct($connexion) {
        $this->taskModel = new Task($connexion);
    }

    public function index() {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if($this->isCsrfTokenValid()){

            $title = trim($_POST['title'] ?? '');
            $description = trim($_POST['description'] ?? '');

            if ($title !== '') {
            
                $this->taskModel->create($title, $description);

                header("Location: index.php");
                exit;
            }    
        }
    }

    $tasks = $this->taskModel->getAll();
    require __DIR__ . '/../Views/tasks/list.php';
}

    public function show($id){
        $tasks = $this->taskModel->getById($id);

        return $tasks;
    }

    public function delete(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if($this->isCsrfTokenValid()){
                $id = filter_var($_POST['id'] ?? null, FILTER_VALIDATE_INT);
                if ($id !== false && $id > 0){
                    if($this->taskModel->getById($id)){            
                        $this->taskModel->delete($id);
                        header("Location: index.php");
                        exit;
                    }
                }
            }
        }
    }
    public function edit() {
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
          if($this->isCsrfTokenValid()){  
            $id = filter_var($_POST['id'] ?? null, FILTER_VALIDATE_INT);
            if ($id !== false && $id > 0){
                $task = $this->taskModel->getById($id);
                if ($task){
                    require __DIR__ . '/../Views/tasks/edit.php';
                }
            }
          }
        }
    }
    public function update() {
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if($this->isCsrfTokenValid()){
                $id = filter_var($_POST['id'] ?? null, FILTER_VALIDATE_INT);
                $title = trim($_POST['title'] ?? '');
                $description = trim($_POST['description'] ?? '');
                if ($id !== false && $id > 0 && $title !== ''){
                    if($this->taskModel->getById($id)){            
                        $this->taskModel->update($id, $title, $description);
                        header("Location: index.php");
                        exit;
                    }
                }
            }
        }
    }
    private function isCsrfTokenValid(){
    return isset($_POST['csrf_token'])
        && isset($_SESSION['csrf_token'])
        && hash_equals($_SESSION['csrf_token'], $_POST['csrf_token']);
    }
}

