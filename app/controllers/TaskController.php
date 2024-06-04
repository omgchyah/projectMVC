<?php

class TaskController extends ApplicationController
{
    private $task;

    public function __construct()
    {
        parent::__construct();
        $this->task = new Task();
    }

    public function index()
    {
        // Get the user ID from the query parameter
        $userId = isset($_POST['user_id']) ? $_POST['user_id'] : null;

        // You can add logic here to validate the user ID, fetch tasks for the user, etc.

        $view = new View();
        $view->userId = $userId; // Pass the user ID to the view
        $view->render("layouts/task/index");
    }

    public function execute($routes = WEB_ROOT, $controller = "Task", $action = "index")
    {
        $this->$action();
    } 


    public function store()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $taskName = $_POST["name"];
            $taskDescripction = $_POST["description"];
            //$taskUserId = isset($_POST["user_id"]) ? $_POST["user_id"];

            // Validate and sanitize inputs as needed
            $taskName = htmlspecialchars($taskName, ENT_QUOTES, "UTF-8");
            $taskDescripction = htmlspecialchars($taskDescripction, ENT_QUOTES, "UTF-8");

            $task = new Task();
            $task->setName($taskName);
            $task->setDescription($taskDescripction);
            //$task->setUserId($taskUserId);

            $task->save();

            header('Location: ' . WEB_ROOT . '/task/index');
                exit;

            
        }

    }
}