<?php

class TaskController extends Controller
{

    private Task $task;
    private array $tasks;
    // Added by Ross
    public function __construct()
    {
        $this->task = new Task();
        // Common initialization code
        echo "TaskController initialized<br>" . WEB_ROOT;
    }

    public function getAllTasks(): array
    {
        return $this->task->getAll();
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
        $date = new DateTime();

        $task->setId(0);
        $task->setName($_POST['task_name']);
        $task->setDescription($_POST['description']);
        $task->setUserId($_POST['userId']);
        // Validate input
        if ($task->getUserId() < 0) {
            // Handle invalid input
            echo "User ID cannot be negative.";
            return;
        }
        $task->setStatus(Status::Activa);
        $task->setDateCreated($date);
        $task->setDateUpdated($date);

        $task->create();

        $tasks = $task->getAll();
        

        $_SESSION['tasks']=$tasks;

        $view = new View();
        $view->render("scripts/app/list");
    }


    public function list()
    {

        $task = new Task();
        $tasks = $task->getAll();

        $_SESSION['tasks']=$tasks;
          
        $view = new View();
        $view->render("scripts/app/list");

          


    }
    public function delete() {
        if (isset($_POST['id'])) {
            $task = new Task();
            $task->deletetask($_POST['id']);
            header('Location: ' . WEB_ROOT . '/task/index');
            exit;
        }
    }

}
