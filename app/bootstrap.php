<?php

//For autoloading classes
spl_autoload_register(function ($className) {
    $path = "core/$className.php";
    if (file_exists($path)) {
        require_once $path;
    }
});
