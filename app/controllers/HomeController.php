<?php
class HomeController extends ApplicationController
{
    public function index()
    {
        $view = new View();
        $view->render("layouts/home/index")

    }

    public function execute($action = "index")
    {
        $this->$action();
    }
}