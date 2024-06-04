<?php

/**
 * Base controller for the application.
 * Add general things in this controller.
 */
class ApplicationController extends Controller 
{

    //added by Ross
    public function __construct()
    {
        // Common initialization code
        echo "ApplicationController initialized<br>"
        . WEB_ROOT;
    }

    //added by Ross
    public function render($view)
    {
        
        //Ensures .php is not added twice and adds a slash between directories
        $viewPath = ROOT_PATH . "/app/views/" . (strpos($view, ".php") === false ? $view . "php" : $view);

        //Testing my controller
        echo "Rendering view: " . $viewPath . "<br>";

        if(file_exists($viewPath)) {
            include $viewPath;
        } else {
            echo "View file not found:" . $viewPath;
        }
    }

    public function index()
    {
        $view = new View();
        $view->render("scripts/app/index");
    }

    public function create()
    {
        $view = new View();
        $view->render("scripts/app/create");
    }
    
    public function execute($action = "index")
    {
        if (isset($_POST['action'])) {
            $action = $_POST['action'];
        }

        if (method_exists($this, $action)) {
            $this->$action();
        } else {
            echo "Action '$action' not found.";
        }
    }
    

    
}
