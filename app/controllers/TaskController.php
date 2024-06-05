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
    }


    public function create()
    {
        $view = new View();
        $view->render("scripts/app/create");

    }

    public function store()
    {
        $task = new Task();
        $task->setName($_POST['task_name']);
        $task->setDescription($_POST['description']);
        $task->setUserId(0); // Replace with actual user ID if available
        $task->setStatus(Status::Activa); // Assuming Status is an Enum or similar
        $task->setDateCreated(new DateTime());
        $task->setDateUpdated(new DateTime());

        if ($task->save()) {
            // Redirect to the task list page
            header('Location: ' . WEB_ROOT . '/task/execute?action=list');
            exit;
        } else {
            echo "<p>Failed to save the task. Please try again.</p>";
            echo '<button onclick="history.back()">Back</button>';
        }
    }


    public function list()
    {
        $task = new Task();
        $tasks = $task->getAll();

        $view = new View();
        $view->render("scripts/app/list");
    }


}