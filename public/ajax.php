<?php
//connessione al database
try {
    include_once __DIR__ . '/../includes/AutoLoader.php';

    $url = $_GET['route'];
    
    $method = $_SERVER['REQUEST_METHOD'];

    $routes =  new \AD\ajaxRoutes();

    $route = $routes->getRoute();
    
    $authentication = $routes->getAuthentication();
    $bool = (isset($route[$url]['login']) && $route[$url]['login'] = true && $authentication->isLoggedIn());
    
    if (isset($route[$url]['login']) && $route[$url]['login'] = true && $authentication->isLoggedIn()) {
        $controller = $route[$url][$method]['controller'];
        $action = $route[$url][$method]['action'];
        $controller->$action();
    }

    
    
} catch (\PDOException $e) {
 $title = 'An error has occurred';
        $output = 'the operation was not successful: <br/>' . $e->getMessage() . ' in ' 
        . $e->getFile() . ': ' . $e->getLine();
        echo $output;
    }
 ?>
