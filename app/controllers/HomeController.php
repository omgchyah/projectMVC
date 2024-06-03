<?php
class HomeController extends ApplicationController
{
    public function index()
    {
        $this->render("layouts/header.php");
        $this->render("layouts/home/index.php");
        $this->render("layouts/footer.php");
    }

    public function execute($action = "index")
    {
        $this->$action();
    }
}