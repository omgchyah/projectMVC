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
        $tasksFile = fopen($this->filePath,"w+")
        or die("Unable to open file!");

       if(filesize($this->filePath) > 0) {
        $
       }

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
        if (file_exists($tasksFile)) {
            $jsonContent = file_get_contents($tasksFile);
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

        // Add the new task to the array
        $tasksArray[] = $data;

        file_put_contents($tasksFile, json_encode($tasksArray, JSON_PRETTY_PRINT));

        // Encode the array back to JSON and save it to the file
        /*if (file_put_contents($tasksFile, json_encode($tasks, JSON_PRETTY_PRINT)) === false) {
            echo "Failed to save tasks to file.<br>";
            return false; // Indicate failure
        }*/

        /*echo "Tasks successfully saved to file.<br>";*/
        print_r($data);
        //return true; // Indicate success

        fclose($tasksFile);
    }

    public function getAll()
    {
        if (file_exists($this->filePath)) {
            $jsonContent = file_get_contents($this->filePath);
            return json_decode($jsonContent, true);
        } else {
            return [];
        }
    }
}
