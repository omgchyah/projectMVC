<?php

class TaskController extends Controller 
{
    // Added by Ross
    public function __construct()
    {
        // Common initialization code
        echo "TaskController initialized<br>" . WEB_ROOT;
    }

    public function execute($action = "create")
    {
        if (method_exists($this, $action)) {
            $this->$action();
        } else {
            echo "Action '$action' not found.";
        }

        $task = new Task();
        $tasks = $task->getAll();
    }


    public function create()
    {
        $view = new View();
        $view->render("scripts/app/create");

        $task = new Task();
        $tasks = $task->getAll();

    }

    public function store()
    {

        $view = new View();
        $view->render("scripts/app/list");

        $task = new Task();

        $date = new DateTime();

        $task->setId(0);
        $task->setName($_POST['task_name']);
        $task->setDescription($_POST['description']);
        $task->setUserId($_POST['user_id']);
        $task->setStatus(Status::Activa);
        $task->setDateCreated($date);
        $task->setDateUpdated($date);

        $task->create();

        $tasks = $task->getAll();

    }


    public function list()
    {
        $task = new Task();
        $tasks = $task->getAll();


    }


}