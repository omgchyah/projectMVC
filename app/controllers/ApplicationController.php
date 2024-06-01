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
        //echo "ApplicationController initialized<br>";
    }

    //added by Ross
    public function render($view)
    {
        //Ensures .php is not added twice and adds a slach between directories
        $viewPath = ROOT_PATH . "/app/views/" . (strpos($view, ".php") === false ? $view . "php" : $view);

        //Testing my controller
        echo "Rendering view: " . $viewPath . "<br>";

        if(file_exists($viewPath)) {
            include $viewPath;
        } else {
            echo "View file not found:" . $viewPath;
        }
    }
	
}
