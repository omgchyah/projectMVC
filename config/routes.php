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

 //Modified by Ross
$routes = [
    '/' => 'home#index',
    'home/index' => 'home#index',
    'task/create' => 'task#create',
    'task/index' => 'task#index' // Route for handling form submission
    // Add other routes here
];