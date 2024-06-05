<?php

class TaskController extends Controller 
{
    // Added by Ross
    public function __construct()
    {
        // Common initialization code
        echo "TaskController initialized<br>" . WEB_ROOT;
    }

    public function create()
    {
        $view = new View();
        $view->render("scripts/app/create");

    }

    public function listTasks()
    {
        $view = new View();
        $view->render("scripts/app/list");
    }

    public function execute($action = "create")
    {
        if (isset($_POST['action'])) {
            $action = $_POST['action'];
        } elseif (isset($_GET['action'])) {
            $action = $_GET['action'];
        }

        if (method_exists($this, $action)) {
            $this->$action();
        } else {
            echo "Action '$action' not found.";
        }
    }

    public function storeTask()
    {

        $task = new Task();
        $task->setName($_POST["task_name"]);
        $task->setDescription($_POST['description']);
        $task->setUserId($_POST['user_id']);
        
        //Replace with actual user ID if available
        $task->setStatus(Status::Activa);
        
        $task->setDateCreated(new DateTime());
        $task->setDateUpdated(new DateTime());

        if ($task->save()) {
            // Redirect to the task list page
            header('Location: ' . WEB_ROOT . '/task/execute?action=listTasks');
            exit;
        } else {
            echo "<p>Failed to save the task. Please try again.</p>";
            echo '<button onclick="history.back()">Back</button>';
        }

    }
}