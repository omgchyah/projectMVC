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
    '/' => 'application#index', // Root URL
    '/task/execute' => 'task#execute', // Route for dynamic action
    '/task/store' => 'task#store',
    '/task/list' => 'task#list',
    '/task/delete' => 'task#delete', // Route for deliting tasks

];