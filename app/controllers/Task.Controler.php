<?php
require_once('Models/Task');

Class TaskControler{
    
    Private $model;

    public function __construct(){
        $this->model= new Task;
    }

    public function Initiate(){
        require_once'views/header.php';
        require_once'views/tasks/index.php';
        require_once'views/footer.php';
    }
}