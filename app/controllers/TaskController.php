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

    public function user()
    {
        $task = new Task();

        $tasksFound = $task->getAllTasksUser($_POST['user_id']);

        $_SESSION['tasksFounds'] = $tasksFound;

        $view = new View();
        $view->render("scripts/app/find");
    }

    public function showone()
    {
        $task = new Task();

        $taskFound = $task->getOneTask($_POST['id']);

        $_SESSION['tasksFound'] = $taskFound;

        $view = new View();
        $view->render("scripts/app/find");
    }

    public function find()
    {
        $task = new Task();

        $tasksFound = $task->findTasks($_POST['string']);

        $_SESSION['tasksFound'] = $tasksFound;

        $view = new View();
        $view->render("scripts/app/find");

    }

    public function edit()
    {
        // Get the task ID from the GET request
        $taskId = $_GET['task_id'];

    }

    public function delete() {

        /*
        Form Validation: When a form is submitted, you need to validate that the necessary data is present. By using isset($_POST['task_id']), you ensure that the form submission included a task_id.
        */

        if (isset($_POST['task_id'])) {
            $taskId = $_POST['task_id'];
            if (isset($_POST['id'])) {
                $task = new Task();
                $task->deletetask($_POST['id']);
                header('Location: ' . WEB_ROOT . '/task/index');
                exit;
            }

            $view = new View();
            $view->render('scripts/app/list');
        }
    }


}