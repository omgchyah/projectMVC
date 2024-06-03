<?php 

/**
 * Used to define the routes in the system.
 * 
 * A route should be defined with a key matching the URL and an
 * controller#action-to-call method. E.g.:
 * 
 * '/' => 'index#index',
 * '/calendar' => 'calendar#index'
 */
<<<<<<< Updated upstream
$routes = array(
	'/test' => 'test#index'
);
=======

 //Modified by Ross
$routes = [
    '/' => 'home#index',
    'task/create' => 'task#create',
    'task/index' => 'task#index',
    'task/store' => 'task#store', // Route for handling form submission
    // Add other routes here
];
>>>>>>> Stashed changes
