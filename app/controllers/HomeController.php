<?php
class HomeController extends ApplicationController
{
    public function index()
    {
        $view = new View();
        $view->render("layouts/home/index");
    }

    public function submitUserId()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_POST['user_id'];
            header('Location: ' . WEB_ROOT . '/task/index?user_id=' . urlencode($userId));
            exit();
        }
    }

    public function execute($action = "index")
    {
        $this->$action();
    }
}
