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
        // Get the user ID from the query parameter
        $userId = isset($_GET['user_id']) ? $_GET['user_id'] : null;

        // You can add logic here to validate the user ID, fetch tasks for the user, etc.

        $view = new View();
        $view->userId = $userId; // Pass the user ID to the view
        $view->render("layouts/task/index");
    }

    public function execute($action = "index")
    {
        $this->$action();
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