<?php 
#PAGINA ADMIN PER MODIFICA CONTENUTI, GESTIONE PRENOTAZIONI E ACQUISTI(SI SPERA), ACCETTAZIONE RICHIESTE SOCI
    try {
        # file che include automaticamente le classi che utilizzi
        include_once __DIR__ . '/../includes/AutoLoader.php';

        # route sarebbe il "sotto url". se non viene dato lo setto a homepage
        $route = $_GET['route'] ?? 'home';

        # metodo della richiesta (GET O POST)
        $method = $_SERVER['REQUEST_METHOD'];

        # path dir in cui recuperare i templates
        $templatesDir = '/../../templates/AD/';

        # classe generale che si occupa di controllare l'url,
        # verificare se necessario il login attraverso la classe Authentication 
        # e caricare i templace
        $entryPoint = new \Framework\EntryPoint($route,  new \AD\AdminRoutes(), $method, $templatesDir);

        #carica il layout generale con nav in alto e vari meta, css, js
        $layout = 'ADlayout.html.php';

        #manda in esecuzione l'entrypoint
        $entryPoint->run($layout);
        
    } catch (\PDOException $e) {

        #GESTIONE DEGLI ERRORI
        $title = 'An error has occurred';
        $output = 'the operation was not successful: <br/>' . $e->getMessage() . ' in ' 
        . $e->getFile() . ': ' . $e->getLine();
        include __DIR__ . '/../layout/ADlayout.html.php';
    }
?>