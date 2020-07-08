<?php
namespace Apollo;

class ApolloRoutes implements \Framework\Interfaces\RoutesInterface{
    private $filmTable;
    private $eventTable;

    public function __construct() {
        include_once __DIR__ . '/../../includes/DatabaseConnection.php';
        $this->filmTable = new \Framework\DatabaseTable($pdo, 'apolloundici.film', 'id_film');
        $this->eventTable = new \Framework\DatabaseTable($pdo, 'apolloundici.evento', 'id_evento');
    }

    public function getRoute(): array {
        $eventController = new \Apollo\Controller\Event( $this->filmTable, $this->eventTable);

        $routes = [
            #PROGRAMMAZIONE
            'home' => [
                'GET' => [
                    'controller' => $eventController,
                    'action' => 'home',
                ]
            ],

        ];
        return $routes;
    }
}


?>