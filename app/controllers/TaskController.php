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
        $view->render("header.php");
        $view->render("task/index", ['task' => $tasks]);
        $view->render("footer.php");
    }

    public function create() {
        $view = new View();
        $view->render('task/create');
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

            $task->save();

            header('Location: /PHP/ProjectMVC/app/views/layouts/task/index');
                exit;
        }

    }
}