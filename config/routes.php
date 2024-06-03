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
    '/' => 'home#index', // Root URL
    'home/submitUserId' => 'home#submitUserId',
    'task/index' => 'task#index', // Route for task index
    // Add other routes here
];