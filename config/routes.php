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

 $routes = [
    '/' => 'application#index', // Root URL
    '/task/execute' => 'task#execute', // Route for dynamic action
    '/task/store' => 'task#store',
    '/task/list' => 'task#list', // Route for listing tasks
    '/task/user' => 'task#user',
    '/task/find' => 'task#find',
    '/task/showone' => 'task#showone',
    '/task/delete' => 'task#delete', // Route for deliting tasks
];