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
        $view->render("layouts/header.php");
        $view->render("layouts/task/create", ['task' => $tasks]);
        $view->render("layouts/footer.php");
    }


    public function store()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $taskName = $_POST["name"];
            $taskDescripction = $_POST["description"];

            // Validate and sanitize inputs as needed
            $taskName = htmlspecialchars($taskName, ENT_QUOTES, "UTF-8");
            $taskDescripction = htmlspecialchars($taskDescripction, ENT_QUOTES, "UTF-8");

            $task = new Task();
            $task->setName($taskName);
            $task->setDescription($taskDescripction);

            $task->save();

            header('Location: task/index');
                exit;
        }

    }
}