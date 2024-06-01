<?php

class TaskController extends ApplicationController
{
    private $taskModel;

    public function __construct()
    {
        parent::__construct();
        $this->taskModel = new Task();
    }
}