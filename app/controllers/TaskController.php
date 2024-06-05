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
        $tasks = $task->getAll();

        $task->setName($_POST['task_name']);
        $task->setDescription($_POST['description']);
        $task->setUserId($_POST['user_id']); // Replace with actual user ID if available
        $task->setStatus(Status::Activa); // Assuming Status is an Enum or similar
        $task->setDateCreated(new DateTime());
        $task->setDateUpdated(new DateTime());

        if ($task->save()) {
            echo json_encode(["status" => "success"]);
            // Redirect to the task list page
            // header('Location: ' . WEB_ROOT . '/task/execute?action=list');
            exit;
        } else {
            echo json_encode(["status" => "error", "message" => "Failed to save the task."]);
        }

        /*if ($task->save()) {
            // Redirect to the task list page
            header('Location: ' . WEB_ROOT . '/task/execute?action=list');
            exit;
        } else {
            echo "<p>Failed to save the task. Please try again.</p>";
            echo '<button onclick="history.back()">Back</button>';
        }*/

    }


    public function list()
    {
        $task = new Task();
        $tasks = $task->getAll();

        $task = new Task();
        $tasks = $task->getAll();

    }


}