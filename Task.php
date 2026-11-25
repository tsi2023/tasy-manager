<?php

class Task {

    private $connexion;

    public function __construct($connexion) {

        $this->connexion = $connexion;
    }

    //recupère toutes les taches
    public function getAll() {

        $resultat = $this->connexion->query("SELECT * FROM tasks");

        $tasks = $resultat->fetchAll(PDO::FETCH_ASSOC);

        return $tasks;
    }
    //ajouter ,une tache
    public function create($title, $description, $status) {

        $sql = "INSERT INTO tasks (title, description, status)
                VALUES (:title, :description, :status)";

        $prepare = $this->connexion->prepare($sql);

        $prepare->execute([
            ':title' => $title,
            ':description' => $description,
            ':status' => $status
        ]);
    }
    public function update($id, $title, $description) {

        $sql = "UPDATE tasks 
                SET title = :title, description = :description
                WHERE id = :id";

        $prepare = $this->connexion->prepare($sql);

        $prepare->execute([
            ':id' => $id,
            ':title' => $title,
            ':description' => $description
        ]);
    
    }
    public function delete($id) {

        $sql ="DELETE FROM tasks
               WHERE id = :id";

        $prepare = $this->connexion->prepare($sql);

        $prepare->execute([
            ':id' => $id
        ]);
    }
    public function getById($id) {

        $sql = "SELECT * FROM tasks 
                WHERE id = :id";

        $prepare = $this->connexion->prepare($sql);

        $prepare->execute([
            ':id' => $id
        ]);
        $task = $prepare->fetch(PDO::FETCH_ASSOC);

        return $task;
    }
    public function updateStatus($id, $status){
        $sql = "UPDATE tasks SET status = :status WHERE id = :id" ;
        $prepare = $this->connexion->prepare($sql);
        $prepare->execute([
            ':id' => $id,
            ':status' => $status
        ]);
    }
}