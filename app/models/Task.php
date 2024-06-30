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
    private DateTime $dateFinished;
    private int $userId;

    public function __construct()
    {
        $this->filePath = ROOT_PATH . "/data/tasks.json";
    }

    // Getters
    public function getId(): int
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

    public function getDateFinished(): DateTime
    {
        return $this->dateFinished;
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

    public function setDateFinished(DateTime $dateFinished): void
    {
        $this->dateFinished = $dateFinished;
    }

    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    // Create
    public function create($data = [])
    {
        $data = array_merge([
            "id" => $this->getId(),
            "task_name" => $this->getName(),
            "description" => $this->getDescription(),
            "status" => $this->getStatus()->name,
            "dateCreated" => $this->getDateCreated()->format('Y-m-d'),
            "dateFinished" => $this->getDateFinished()->format('Y-m-d'),
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

        // Add the new task
        $tasks[] = $data;
        file_put_contents($this->filePath, json_encode($tasks, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        return true;
    }

    public function getAll(): array
    {
        // Read the existing data from the JSON file
        if (file_exists($this->filePath)) {
            $jsonContent = file_get_contents($this->filePath);
            return json_decode($jsonContent, true) ?: [];
        } else {
            return [];
        }
    }

    public function getAllTasksUser(int $userId): array
    {
        $tasksFound = [];

        // Read the data from the JSON file
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

        return $tasksFound;
    }

    public function getOneTask(int $id)
    {
        // Read the data from the JSON file
        if (file_exists($this->filePath)) {
            $jsonContent = file_get_contents($this->filePath);
            $tasks = json_decode($jsonContent, true);
        } else {
            $tasks = [];
        }

        foreach ($tasks as $task) {
            if ($task['id'] === $id) {
                return [$task];
            }
        }

        return [];
    }

    public function findTasks(string $string): array
    {
        $tasksFound = [];

        // Read the data from the JSON file
        if (file_exists($this->filePath)) {
            $jsonContent = file_get_contents($this->filePath);
            $tasks = json_decode($jsonContent, true);
        } else {
            $tasks = [];
        }

        foreach ($tasks as $task) {
            if (strstr($task['task_name'], $string)) {
                $tasksFound[] = $task;
            }
        }

        return $tasksFound;
    }

    public function deletetask($id)
    {
        $jsonContent = file_get_contents($this->filePath);
        $tasks = json_decode($jsonContent, true);

        foreach ($tasks as $key => $task) {
            if ($task['id'] == $id) {
                unset($tasks[$key]);
                file_put_contents($this->filePath, json_encode(array_values($tasks), JSON_PRETTY_PRINT));
                return true;
            }
        }

        return false;
    }

    public function getTaskById($id)
    {
        $jsonContent = file_get_contents($this->filePath);
        $tasks = json_decode($jsonContent, true);

        foreach ($tasks as $task) {
            if ($task['id'] == $id) {
                return $task;
            }
        }

        return null;  // Task not found
    }

    public function updateTask($id, $name, $description, $status, $userid, $dateCreated,  $dateFinished)
    {
        $jsonContent = file_get_contents($this->filePath);
        $tasks = json_decode($jsonContent, true);

        foreach ($tasks as $key => $task) {
            if ($task['id'] == $id) {
                $tasks[$key]['task_name'] = $name;
                $tasks[$key]['description'] = $description;
                $tasks[$key]['status'] = $status;
                $tasks[$key]['userId'] = $userid;
                $tasks[$key]['dateCreated'] = $dateCreated;
                $tasks[$key]['dateFinished'] = $dateFinished;
                break; // Exit the loop once the task is found and updated
            }
        }

        // Save the updated tasks back to the JSON file
        file_put_contents($this->filePath, json_encode($tasks, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        return true;
    }

    public function checkRepeat($name, $userid, $excludeId = null): bool
    {
        $jsonContent = file_get_contents($this->filePath);
        $tasks = json_decode($jsonContent, true);
        foreach ($tasks as $task) {
            if ($task['task_name'] == $name && $task['userId'] == $userid) {
                if ($excludeId === null || $task['id'] != $excludeId) {
                    return true;
                }
            }
        }
        return false;
    }
}
