<?php

require_once "Status.php";

class Task extends Model
{
    private $filePath;
    private int $id;
    private string $name;
    private string $description;
    private Status $status;
    private DateTime $dateCreated;
    private DateTime $dateUpdated;
    private int $userId;

    public function __construct()
    {
        $this->filePath = ROOT_PATH . "/data/tasks.json";
    }

    // Getters
    public function getId() : int
    {
        return $this->id;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getDescription(): string
    {
        return $this->description;
    }

    public function getStatus(): Status
    {
        return $this->status;
    }

    public function getDateCreated(): DateTime
    {
        return $this->dateCreated;  
    }
    public function getDateUpdated(): DateTime
    {
        return $this->dateUpdated;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    // Setters
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function setName(string $name): void
    {
        $this->name = $name;
    }
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
    public function setStatus(Status $status): void
    {
        $this->status = $status;
    }
    public function setDateCreated(DateTime $dateCreated): void
    {
        $this->dateCreated = $dateCreated;
    }
    public function setDateUpdated(DateTime $dateUpdated): void
    {
        $this->dateUpdated = $dateUpdated;
    }
    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    // Create
    public function create($data=[])
    {

        $data = array_merge([
            "id" => $this->getId(),
            "task_name" => $this->getName(),
            "description" => $this->getDescription(),
            "status" => $this->getStatus()->name,
            "dateCreated" => $this->getDateCreated()->format('Y-m-d H:i:s'),
            "dateUpdated" => $this->getDateUpdated()->format('Y-m-d H:i:s'),
            "userId" => $this->getUserId(),
        ], $data);

        // Read the existing data from the JSON file
        if (file_exists($this->filePath)) {
            $jsonContent = file_get_contents($this->filePath);
            $tasks = json_decode($jsonContent, true);
        } else {
            $tasks = [];
        }

        // Determine the next ID
        if (empty($tasks)) {
            $data['id'] = 1;
        } else {
            $lastTask = end($tasks);
            $data['id'] = $lastTask['id'] + 1;
        }

        // Check for duplicate tasks
         $duplicateFound = false;
         foreach ($tasks as $existingTask) {
             if ($existingTask['userId'] === $data['userId'] && $existingTask['task_name'] === $data['task_name']) {
             $duplicateFound = true;
             break; // Exit the loop if a duplicate is found
             }
         }

         // Add the new task if no duplicate is found
         if (!$duplicateFound) {
             $tasks[] = $data;
         } else {
             // Handle the case where a duplicate is found (e.g., display an error message)
             die("Task with the same name already exists for this user!");
         }

        // Add the new task to the array
        //$tasks[] = $data;

       $_SESSION['tasks']=$tasks;

        
        if (file_put_contents($this->filePath, json_encode($tasks, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE))) {
            return true; 
        }
        else{
            return false; 
        }

    }

    public function getAll(): array
    {
        // Read the existing data from the JSON file
        if (file_exists($this->filePath)) {
            $jsonContent = file_get_contents($this->filePath);
            $tasks = json_decode($jsonContent, true);
        } else {
            $tasks = [];
        }

        $_SESSION['tasks']=$tasks;

        return $tasks;
    }



    public function getAllTasksUser(int $userId): array
    {
        $tasksFound = [];

        //Read the data from JSON file
        if (file_exists($this->filePath)) {
            $jsonContent = file_get_contents($this->filePath);
            $tasks = json_decode($jsonContent, true);
        } else {
            $tasks = [];
        }

        foreach ($tasks as $task) {
            if ($task['userId'] === $userId) {
                $tasksFound[] = $task;

            }    
        }
        $_SESSION['tasksFound']=$tasksFound;
        return $tasksFound;
    }

    public function getOneTask(int $id)
    {

        $tasksFound = [];

        //Read the data from JSON file
        if (file_exists($this->filePath)) {
            $jsonContent = file_get_contents($this->filePath);
            $tasks = json_decode($jsonContent, true);
        } else {
            $tasks = [];
        }

        foreach ($tasks as $task) {
            if ($task['id'] === $id) {
                $tasksFound[] = $task;

            }    
        }
        
        $_SESSION['tasksFound']=$tasksFound;
        return $tasksFound;

    }

    public function findTasks(string $string): array
    {
        $tasksFound = [];

        //Read the data from JSON file
        if (file_exists($this->filePath)) {
            $jsonContent = file_get_contents($this->filePath);
            $tasks = json_decode($jsonContent, true);
        } else {
            $tasks = [];
        }

        foreach($tasks as $task) {
            if (strstr($task['task_name'], $string)) {
                $tasksFound[] = $task;
            }
        }

        $_SESSION['tasksFound']=$tasksFound;

        return $tasksFound;
    }



    public function deletetask($id) {
        $jsonContent = file_get_contents($this->filePath);
        $tasks = json_decode($jsonContent, true);

        foreach ($tasks as $key => $task) {
            if ($task['id'] == $id) {
                unset($tasks[$key]);
                file_put_contents($this->filePath, json_encode(array_values($tasks), JSON_PRETTY_PRINT));
                echo "Tarea eliminada correctamente";
                return true;
            }
        }

        return false;
    }

    public function getTaskById($id) {
        $jsonContent = file_get_contents($this->filePath);
        $tasks = json_decode($jsonContent, true);
        foreach ($tasks as $task) {
            if ($task['id'] == $id) {
                return $task;
            }
        }
        return null;
    }




    public function updateTask($data) {
        $jsonContent = file_get_contents($this->filePath);
        $tasks = json_decode($jsonContent, true);

        foreach ($tasks as & $task) {
            if ($task['id'] == $data) {
                $task['task_name'] = $data['task_name'];
                $task['description'] = $data['description'];
                $task['status'] = $data['status'];
                $task['user_id'] = $data['user_id'];
                $task['dateUpdated'] = date('Y-m-d'); 
                break;
            }
        }
        file_put_contents($this->filePath, json_encode($tasks, JSON_PRETTY_PRINT));
    }
}





