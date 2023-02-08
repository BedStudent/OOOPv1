<?php

namespace ToDo;

use PDO;

class Task{
    protected $pdo;
    private $subject;
    private $priority;
    private $dueDate;
    private $status = 0;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function createTask($task){
        $this->subject = $task['Title'];
        $this->priority = $task['priority'];
        $this->dueDate = $task['date'];
        $this->insertTask();
    }

    private function insertTask(){
        try{
            $query = "INSERT INTO `tasks`(`subject`,`priority`,`dueDate`,`status`,`modified`)
            VALUES(:subject, :priority, :dueDate,:status, NOW())";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':subject',$this->subject, PDO::PARAM_STR);
            $stmt->bindParam(':priority',$this->priority, PDO::PARAM_STR);
            $stmt->bindParam(':dueDate',$this->dueDate, PDO::PARAM_STR);
            $stmt->bindParam(':status',$this->status, PDO::PARAM_STR);
            $stmt->execute();
            header('Location:/');
        }catch(\PDOException $e){
            echo $e->getMessage();
        }
    }
    public function allTasks(){
        $stmt=$this->pdo->prepare('select * from tasks');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); //Grazinam duomenis kaip asociatyvus masyvas
    }

    public function deleteTask($id){
        $stmt= $this->pdo->prepare("DELETE FROM `tasks` WHERE id=$id");
        $stmt->execute();
        header('Location:/');
    }

    public function update($id){
        $stmt = $this->pdo->prepare("SELECT * FROM `tasks` WHERE id=$id");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function storeUpdate($task, $id){

        var_dump($task);
        var_dump($id);
        try{
            $query = "UPDATE tasks SET subject=:subject,priority=:priority,dueDate=:dueDate, modified= NOW() WHERE id=:id";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':subject',$task['Title'], PDO::PARAM_STR);
            $stmt->bindParam(':priority',$task['priority'], PDO::PARAM_STR);
            $stmt->bindParam(':dueDate',$task['date'], PDO::PARAM_STR);
            $stmt->bindParam(':id',$id, PDO::PARAM_STR);
            $stmt->execute();
            header("Location:/");

        }catch(\PDOException $e){
            echo $e->getMessage();
        }
    }
    public function completeTask($id){
        try{
            $stmt = $this->pdo->prepare("UPDATE tasks SET status=1, modified=NOW() WHERE id=$id");
            $stmt->execute();
            header("Location:/");
        }catch(\PDOException $e){
            echo $e->getMessage();
        }
    }
}
