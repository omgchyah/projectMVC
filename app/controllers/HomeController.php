<?php
class HomeController extends ApplicationController
{


    public function index()
    {
        $view = new View();
        $view->render("layouts/home/index");
    }
    
       public function execute($action = "index")
    {
        $this->$action();
    } 

    public function submitUserId()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_POST['user_id'];

            $task = new Task();
            $task->setUserId($userId);

            header('Location: ' . WEB_ROOT . 'task/index?user_id=' . urlencode($userId));
            exit();
        }
    }


}
