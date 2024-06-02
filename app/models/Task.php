<?php

class Task extends Model
{
    private $filePath;
    private $name;
    private $description;

    public function __construct()
    {
        parent::__construct(); // Call the parent constructor
        $this->filePath = ROOT_PATH . "/data/tasks.json";
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function save($data = array())
    {
        // Use the passed $data if provided, otherwise use object properties
        $data = !empty($data) ? $data : [
            "name" => $this->getName(),
            "description" => $this->getDescription(),
        ];

        // Read the existing data from the JSON file
        if (file_exists($this->filePath)) {
            $jsonContent = file_get_contents($this->filePath);
            $tasks = json_decode($jsonContent, true);
        } else {
            $tasks = [];
        }

        // Add the new task to the array
        $tasks[] = $data;

        // Encode the array back to JSON and save it to the file
        if (file_put_contents($this->filePath, json_encode($tasks, JSON_PRETTY_PRINT)) === false) {
            return false; // Indicate failure
        }

        return true; // Indicate success
    }

    public function getAll() {
        if (file_exists($this->filePath)) {
            $jsonContent = file_get_contents($this->filePath);
            return json_decode($jsonContent, true);
        } else {
            return [];
        }
    }

}