<?php

/**
 * Base controller for the application.
 * Add general things in this controller.
 */
class ApplicationController extends Controller 
{
    // Added by Ross
    public function __construct()
    {
        // Common initialization code
        echo "ApplicationController initialized<br>" . WEB_ROOT;
    }

    // Added by Ross
    public function render($view, $data = [])
    {
        // Ensures .php is not added twice and adds a slash between directories
        $viewPath = ROOT_PATH . "/app/views/" . (strpos($view, ".php") === false ? $view . ".php" : $view);

        // Testing my controller
        echo "Rendering view: " . $viewPath . "<br>";

        if (file_exists($viewPath)) {
            extract($data);
            include $viewPath;
        } else {
            // Fallback to a default error view if the file is not found
            include ROOT_PATH . "/app/views/error/error.php";
        }
    }

    public function index()
    {
        $view = new View();
        $view->render("scripts/app/index");
    }

    public function create()
    {
        $view = new View();
        $view->render("scripts/app/create");
    }

    public function listTasks()
    {
        $task = new Task();
        $tasks = $task->getAll();

        $this->render("scripts/app/list", ['tasks' => $tasks]);
    }

    public function storeTask()
    {
        $task = new Task();
        $task->setName($_POST['task_name']);
        $task->setDescription($_POST['description']);
        $task->setUserId($_POST['user_id']);
        
        //Replace with actual user ID if available
        $task->setStatus(Status::Activa);
        
        $task->setDateCreated(new DateTime());
        $task->setDateUpdated(new DateTime());

        if ($task->save()) {
            // Redirect to the task list page
            header('Location: ' . WEB_ROOT . '/application/execute?action=listTasks');
            exit;
        } else {
            echo "<p>Failed to save the task. Please try again.</p>";
            echo '<button onclick="history.back()">Back</button>';
        }

    }

    public function execute($action = "index")
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
}
?>
