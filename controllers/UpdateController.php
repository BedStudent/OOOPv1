<?php
use ToDo\Request;
use ToDo\Database;
use ToDo\Task;

$id =  intval(basename(Request::uri())); //Gaunam iraso id
$task = new Task(Database::connect()); //sukuriam task objektas ir perduodam prisijungima prie serverio
$data = $task->update($id); //vykdome metoda, grazina konkretaus iraso duomenis

if(isset($_POST['update'])){
    $task->storeUpdate($_POST,$id);
}
//echo "Hello this is UPDATE controller";

//echo intval(basename(Request::uri()));

require "views/pages/update-task.view.php";