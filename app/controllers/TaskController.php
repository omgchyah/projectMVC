<?php

class TaskController extends ApplicationController
{
    private $taskModel;

    public function __construct()
    {
        parent::__construct();
        $this->taskModel = new Task();
    }

    public function index()
    {
        $task = new Task();
        $tasks = $task->getAll();

        $view = new View();
        $view->tasks = $tasks;
        $view->render("layouts/task/create");
    }


    public function store()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $taskName = $_POST["task_name"];
            $taskDescripction = $_POST["task_descrip"];

            // Validate and sanitize inputs as needed
            $taskName = htmlspecialchars($taskName, ENT_QUOTES, "UTF-8");
            $taskDescripction = htmlspecialchars($taskDescripction, ENT_QUOTES, "UTF-8");

            $task = new Task();
            $task->setName($taskName);
            $task->setDescription($taskDescripction);
            if ($task->save()) {
                header('Location: /task/index');
                exit;
            } else {
                // Handle the failure case
                echo "Failed to save the task.";
            }
        }

    }
}