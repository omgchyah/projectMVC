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
        parent::__construct(); // Call the parent constructor
        $this->filePath = ROOT_PATH . "/data/tasks.json";
        $this->dateCreated = new DateTime(); // Set to current date and time
        $this->dateUpdated = new DateTime(); // Set to current date and time
    }

    //Getters
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

    //Setters
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

    public function delete($id)
	{
         $worked =false;
        $jsonContent = file_get_contents($this->filePath);
        $data = json_decode($jsonContent, true);
        foreach ($data as $key => $value) {
            if ($value['Id'] == $id) {
                // Eliminar el elemento del array
                unset($data[$key]);
                $data = array_values($data);
                $dataupdated = json_encode($data, JSON_PRETTY_PRINT);
                file_put_contents($this->filePath, $dataupdated);
                $worked = true;
                return $worked;
            }
            else{
                return $worked;
            }
        }
    
	}
  
}
