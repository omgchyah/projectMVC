<?php

/**
 * Base controller for the application.
 * Add general things in this controller.
 */
class ApplicationController extends Controller 
{
    // Added by Ross
    public function __construct()
    {
        // Common initialization code
        echo "ApplicationController initialized<br>" . WEB_ROOT;
    }

    // Added by Ross
    public function render($view)
    {
        // Ensures .php is not added twice and adds a slash between directories
        $viewPath = ROOT_PATH . "/app/views/" . (strpos($view, ".php") === false ? $view . ".php" : $view);

        // Testing my controller
        echo "Rendering view: " . $viewPath . "<br>";

        if (file_exists($viewPath)) {
            extract($data);
            include $viewPath;
        } else {
            // Fallback to a default error view if the file is not found
            include ROOT_PATH . "/app/views/error/error.php";
        }
    }

    public function index()
    {
        $view = new View();
        $view->render("scripts/app/index");
    }


    public function execute($action = "index")
    {
        if (isset($_POST['action'])) {
            $action = $_POST['action'];
        } elseif (isset($_GET['action'])) {
            $action = $_GET['action'];
        }

        if (method_exists($this, $action)) {
            $this->$action();
        } else {
            echo "Action '$action' not found.";
        }
    }
}

