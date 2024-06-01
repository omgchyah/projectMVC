<?php
class HomeController extends ApplicationController
{
    public function index()
    {
        $this->render("home/index.php");
    }

    public function execute($action = "index")
    {
        $this->$action();
    }
}