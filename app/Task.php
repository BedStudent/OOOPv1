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

}