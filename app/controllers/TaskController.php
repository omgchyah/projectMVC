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

        $tasksFound = $task->getAllTasksUser($_POST['userId']);

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
    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
           
                $view = new View();
                $view->render("scripts/app/update");  
        }
    }

    /*Método original
    public function saveUpdate() {
        //Hacer lo mismo para create?
        $task = new Task();
        
        if ($task->checkrepit( $_POST['task_name'],$_POST['userId'])===false){
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
               
                $task->updateTask(
                    $_POST['id'],
                    $_POST['task_name'],
                    $_POST['description'],
                    $_POST['status'],
                    $_POST['userId']
                ); 
            }
            $task = new Task();
            $tasks = $task->getAll();
            $_SESSION['tasks']=$tasks;
            $view = new View();
            $view->render("scripts/app/list");
        }
        else{
            
            $task = new Task();
            $tasks = $task->getAll();
            $_SESSION['tasks']=$tasks;
            $view = new View();
            $view->render("scripts/app/update");
        }
        
        }*/

        public function saveUpdate() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
                $taskId = $_POST['id'];
                $taskName = $_POST['task_name'];
                $description = $_POST['description'];
                $status = $_POST['status'];
                $userId = $_POST['userId'];
        
                $task = new Task();
                $task->updateTask($taskId, $taskName, $description, $status, $userId);
        
                // Retrieve all tasks and render the list view
                $tasks = $task->getAll();
                $_SESSION['tasks'] = $tasks;
                $view = new View();
                $view->render("scripts/app/list");
            } else {
                // If not a POST request, redirect to the update form
                $view = new View();
                $view->render("scripts/app/update");
            }
        }
        
        
      
    public function delete() {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
            $task = new Task();
            $task->deletetask($_POST['id']);
        }
        $task = new Task();
        $tasks = $task->getAll();

        $_SESSION['tasks']=$tasks;
        $view = new View();
        $view->render("scripts/app/list");
    }


}