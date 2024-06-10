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

        $date = new DateTime();

        $task->setId(0);
        $task->setName($_POST['task_name']);
        $task->setDescription($_POST['description']);
        $task->setUserId($_POST['user_id']);
        $task->setStatus(Status::Activa);
        $task->setDateCreated($date);
        $task->setDateUpdated($date);

        $task->create();

        $tasks = $task->getAll();
        

    }


    public function list()
    {

        $task = new Task();

        $data = [
            'tasks' => $task->getAll(),
            'message' => 'This is a message for the view',
          ];
          
          $view = new View();
          $view->render($data);


    }
    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
            $task = new Task();
            $taskData = $task->getTaskById($_POST['id']);
            $viewData['task'] = $taskData;
        }
        $view = new View();
        $view->render("scripts/app/update");
    }


    public function saveUpdate() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
            $task = new Task();
            $task->updateTask($_POST); 
            header('Location: ' . WEB_ROOT . '/task/list');
            exit;
        }
        $view = new View();
        $view->render("scripts/app/saveUpdate");
    }

}
