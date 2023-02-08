<?php

$router->define([
    '/'=>'controllers/homeController.php',
    '/add-task'=>'controllers/addTaskController.php',
    '/update-task'=>'controllers/UpdateController.php',
    '/delete-task'=>'controllers/DeleteController.php',
    '404'=>'controllers/404Controller.php'
]);
