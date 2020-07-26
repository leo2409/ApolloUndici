<?php 
    try {
        include_once __DIR__ . '/../includes/AutoLoader.php';

        $method = $_SERVER['REQUEST_METHOD'];

        $route = 'home';

        $entryPoint = new \Framework\EntryPoint($route,  new \Apollo\AdminRoutes(), $method);

        $layout = 'ADlayout.html.php';

        $entryPoint->run($layout);
        
    } catch (\PDOException $e) {
        $title = 'An error has occurred';
        $output = 'the operation was not successful: <br/>' . $e->getMessage() . ' in ' 
        . $e->getFile() . ': ' . $e->getLine();
        include __DIR__ . '/../layout/ADlayout.html.php';
    }
?>