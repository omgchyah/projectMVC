<?php
class HomeController
{
    public function index()
    {
        echo "Home page";
    }

    public function execute($action)
    {
        $this->$action();
    }
}