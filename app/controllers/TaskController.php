<?php

class TaskController extends Controller
{
    private Task $task;

    public function __construct()
    {
        $this->task = new Task();
/*         echo "TaskController initialized<br>" . WEB_ROOT; */
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
        if ($task->getUserId() < 0) {
            echo "ID de usuario no puede ser negativo.";
            return;
        }
        $task->setStatus(Status::Activa);
        $task->setDateCreated($date);
        $task->setDateFinished(new DateTime($_POST['dateFinished']));

        $task->create();

        $tasks = $task->getAll();
        $view = new View();
        $view->tasks = $tasks;
        $view->render("scripts/app/list");
    }

    public function list()
    {
        $tasks = $this->task->getAll();
        $view = new View();
        $view->tasks = $tasks;
        $view->render("scripts/app/list");
    }

    public function user()
    {
        $tasksFound = $this->task->getAllTasksUser($_POST['userId']);
        $message = "No se encontraron tareas para este usuario.";

        $view = new View();
        if(empty($tasksFound)) {
            $view->message = $message;
            $view->tasksFound = $tasksFound;;
            $view->render("scripts/app/find");
        } else {
            $view->message = " ";
            $view->tasksFound = $tasksFound;
            $view->render("scripts/app/find");
        }

    }

    public function showone()
    {
        $taskFound = $this->task->getOneTask($_POST['id']);

        $message = "La tarea con este ID no existe.";
        
        $view = new View();
        if(empty($taskFound)) {
            $view->message = $message;
            $view->tasksFound = $taskFound;;
            $view->render("scripts/app/find");
        } else {
            $view->message = " ";
            $view->tasksFound = $taskFound;
            $view->render("scripts/app/find");
        }
    }

    public function find()
    {
        $tasksFound = $this->task->findTasks($_POST['string']);
        $message = "No se encontraron tareas que contengan la palabra clave.";

        $view = new View();
        if(empty($tasksFound)) {
            $view->message = $message;
            $view->tasksFound = $tasksFound;;
            $view->render("scripts/app/find");
        } else {
            $view->message = " ";
            $view->tasksFound = $tasksFound;
            $view->render("scripts/app/find");
        }
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
            $taskToUpdate = $this->task->getTaskById($_POST['id']);

            $_POST['task_name'] = $taskToUpdate['task_name'];
            $_POST['description'] = $taskToUpdate['description'];
            $_POST['status'] = $taskToUpdate['status'];
            $_POST['userId'] = $taskToUpdate['userId'];
            $_POST['dateCreated'] = $taskToUpdate['dateCreated'];
            $_POST['dateFinished'] = $taskToUpdate['dateFinished'];

            $view = new View();
            $view->render("scripts/app/update");
        }
    }

    public function saveUpdate()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
        $taskId = $_POST['id'];
        $taskName = $_POST['task_name'];
        $description = $_POST['description'];
        $status = $_POST['status'];
        $userId = $_POST['userId'];
        $dateCreated = $_POST['dateCreated'];
        $dateFinished = $_POST['dateFinished'];

        // Check for duplicate task name for the same user
        if ($this->task->checkRepeat($taskName, $userId, $taskId)) {
            $message = "Ya existe una tarea con el mismo nombre para este usuario.";
            $view = new View();
            $view->message = $message;

            // Load the existing task details to display in the form
            $task = $this->task->getTaskById($taskId);
            $view->task = $task;
            $view->render("scripts/app/update");
            return;
        }

        // No duplicates found, proceed with the update
        $this->task->updateTask($taskId, $taskName, $description, $status, $userId, $dateCreated, $dateFinished);

        $tasks = $this->task->getAll();
        $view = new View();
        $view->tasks = $tasks;
        $view->render("scripts/app/list");
    } else {
        $view = new View();
        $view->render("scripts/app/update");
    }
}


/*     public function saveUpdate()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
            $taskId = $_POST['id'];
            $taskName = $_POST['task_name'];
            $description = $_POST['description'];
            $status = $_POST['status'];
            $userId = $_POST['userId'];
            $dateCreated = $_POST['dateCreated'];
            $dateFinished = $_POST['dateFinished'];

            $this->task->updateTask($taskId, $taskName, $description, $status, $userId, $dateCreated, $dateFinished);

            $tasks = $this->task->getAll();
            $view = new View();
            $view->tasks = $tasks;
            $view->render("scripts/app/list");
        } else {
            $view = new View();
            $view->render("scripts/app/update");
        }
    } */

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
            $this->task->deletetask($_POST['id']);
        }
        $tasks = $this->task->getAll();
        $view = new View();
        $view->tasks = $tasks;
        $view->render("scripts/app/list");
    }
}
