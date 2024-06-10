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
    public function create()
    {

        $data = [
            'id' => $this->getId(),
            'task_name' => $this->getName(),
            'description' => $this->getDescription(),
            'status' => $this->getStatus()->name,
            'dateCreated' => $this->getDateCreated()->format('Y-m-d H:i:s'),
            'dateUpdated' => $this->getDateUpdated()->format('Y-m-d H:i:s'),//('Y-m-d H:i:s'),
            'userId' => $this->getUserId()
        ];

        // Read the existing data from the JSON file
        if (file_exists($this->filePath)) {
            $jsonContent = file_get_contents($this->filePath);
            $tasksArray = json_decode($jsonContent, true);
        } else {
            $tasksArray = [];
        }

        // Determine the next ID
        if (empty($tasksArray)) {
            $data['id'] = 1;
        } else {
            $lastTask = end($tasksArray);
            $data['id'] = $lastTask['id'] + 1;
        }

          // Check for duplicate tasks
        $duplicateFound = false;
        foreach ($tasksArray as $existingTask) {
            if ($existingTask['userId'] === $data['userId'] && $existingTask['task_name'] === $data['task_name']) {
             $duplicateFound = true;
            break; // Exit the loop if a duplicate is found
            }
        }

        // Add the new task if no duplicate is found
        if (!$duplicateFound) {
            $tasksArray[] = $data;
        } else {
            // Handle the case where a duplicate is found (e.g., display an error message)
            die("Task with the same name already exists for this user!");
        }

    // Write the updated array back to the JSON file
    if (file_put_contents($this->filePath, json_encode($tasksArray, JSON_PRETTY_PRINT)) === false) {
        die("Unable to write to file!");
    }

        //print_r($data);

    }

    public function getAll(): array
    {
        // Read the existing data from the JSON file
        if (file_exists($this->filePath)) {
            $jsonContent = file_get_contents($this->filePath);
            $tasksArray = json_decode($jsonContent, true);
        } else {
            $tasksArray = [];
        }

        return $tasksArray;

    }
    public function deletetask($id)
    {
        $jsonContent = file_get_contents($this->filePath);
        json_decode($jsonContent , true);
            foreach($jsonContent as $tasktodelete){
                if ($jsonContent['id'] == $id ){
                    unset($jsonContent[$tasktodelete]);
                    file_put_contents($this->filePath, json_encode(array_values($jsonContent), JSON_PRETTY_PRINT)); 
                    echo "Tarea eliminada correctamente";
            }
        } 
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

        foreach ($tasks as &$task) {
            if ($task['id'] == $data['id']) {
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





