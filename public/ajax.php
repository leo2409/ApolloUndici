<?php
# L'IDEA ERA DI DIVIDERE LE RICHIESTE AJAX DA QUELLE NORMALE DI PAGINA
# EVITARE ALCUNI PASSAGGI INUTILI SENZA PASSARE DA ENTRYPOINT
try {
    # file che include automaticamente le classi che utilizzi
    include_once __DIR__ . '/../includes/AutoLoader.php';

    # route sarebbe il "sotto url"
    $url = $_GET['route'];
    
    # metodo della richiesta (GET O POST)
    $method = $_SERVER['REQUEST_METHOD'];

    # classe che si occupa di passare ai vari controller le classi che richiedono 
    # e di utilizzare il controller opportuno in base alla variabile GET "route"
    $routes =  new \AD\ajaxRoutes();

    # metodo che restituisce una specie di mappa dei vari controller e se sono richieste autenticazioni
    $route = $routes->getRoute();
    
    # metodo che restituisce la classe authentication settata con i dati giusti
    $authentication = $routes->getAuthentication();

    # in caso sia richiesto il login per accedere alla pagina richiesta lo controllo con la classe authentication
    if (isset($route[$url]['login']) && $route[$url]['login'] = true && $authentication->isLoggedIn()) {

        # recupero il controller opportuno
        $controller = $route[$url][$method]['controller'];

        # recupero il metodo opportuno
        $action = $route[$url][$method]['action'];

        # lo eseguo
        $controller->$action();
    }

    
    
} catch (\PDOException $e) {

    #GESTIONE DEGLI ERRORI
    $title = 'An error has occurred';
    $output = 'the operation was not successful: <br/>' . $e->getMessage() . ' in ' 
    . $e->getFile() . ': ' . $e->getLine();
    echo $output;
}
 ?>
