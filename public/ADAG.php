<?php 
    try {
        include_once __DIR__ . '/../includes/AutoLoader.php';

        $method = $_SERVER['REQUEST_METHOD'];

        $route = $_GET['route'] ?? 'home';

        $templatesDir = '/../../templates/AD/';

        $entryPoint = new \Framework\EntryPoint($route,  new \AD\AdminRoutes(), $method, $templatesDir);

        $layout = 'ADlayout.html.php';

        $entryPoint->run($layout);
        
    } catch (\PDOException $e) {
        $title = 'An error has occurred';
        $output = 'the operation was not successful: <br/>' . $e->getMessage() . ' in ' 
        . $e->getFile() . ': ' . $e->getLine();
        include __DIR__ . '/../layout/ADlayout.html.php';
    }
?>