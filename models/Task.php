<?php

class task {
    private $conn;
    private $table_name = "tasks";

    public $id;
    public $nom_task;
    public $date_task;s
    public $heure_task;
    public $active_task;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (nom_task, date_task, heure_task, active_task) 
                  VALUES (:nom_task, :date_task, :heure_task, :active_task)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nom_task", $this->nom_task);
        $stmt->bindParam(":date_task", $this->date_task);
        $stmt->bindParam(":heure_task", $this->heure_task;
        $stmt->bindParam(":active_task", $this->active_task);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function read() {
        $query = "SELECT id, nom_task, date_task, heure_task, active_task FROM " . $this->table_name;

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . " SET nom_task = :nom_task, date_task = :date_task, heure_task  = :heure_task, active_task = :active_task
                  WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":nom_task", $this->produit);
        $stmt->bindParam(":date_task", $this->prix);
        $stmt->bindParam(":heure_task", $this->nombre);
        $stmt->bindParam(":actie_task", $this->actif);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>