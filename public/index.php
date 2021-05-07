<?php
#PAGINA PRINCIPALE DEL SITO APOLLO UNDICI
try {
    # file che include automaticamente le classi che utilizzi
    include_once __DIR__ . '/../includes/AutoLoader.php';

    # route sarebbe il "sotto url". se non viene dato lo setto a homepage
    $route = $_GET['route'] ?? 'home';
    
    # metodo della richiesta (GET O POST)
    $method = $_SERVER['REQUEST_METHOD'];

    $templatesDir = '/../../templates/public/';

    # classe generale che si occupa di controllare l'url,
    # verificare se necessario il login attraverso la classe Authentication 
    # e caricare i templace
    $entryPoint = new \Framework\EntryPoint($route,  new \Apollo\ApolloRoutes(), $method, $templatesDir);
    
    #carica il layout generale con nav in alto e footer e vari meta, css, js
    $layout = 'layout.html.php';
    
    #manda in esecuzione l'entrypoint
    $entryPoint->run($layout);

} catch (\PDOException $e) {

    #GESTIONE DEGLI ERRORI
    $title = 'An error has occurred';
    $output = 'the operation was not successful: <br/>' . $e->getMessage() . ' in ' 
    . $e->getFile() . ': ' . $e->getLine();
    include __DIR__ . '/../layout/layout.html.php';
}
?>