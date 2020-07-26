<?php
namespace Apollo;

class AdminRoutes implements \Framework\Interfaces\RoutesInterface{
    private $filmTable;
    private $eventTable;

    public function __construct() {
        include_once __DIR__ . '/../../includes/DatabaseConnection.php';
        $this->filmTable = new \Framework\DatabaseTable($pdo, 'apolloundici.film', 'id_film');
        $this->eventTable = new \Framework\DatabaseTable($pdo, 'apolloundici.evento', 'id_evento');
    }

    public function getRoute(): array {
        $adminController = new \Apollo\Controller\Admin( $this->filmTable, $this->eventTable);

        $routes = [
            #PROGRAMMAZIONE
            'home' => [
                'GET' => [
                    'controller' => $adminController,
                    'action' => 'home',
                ], 

                'POST' => [
                    'controller' => $adminController,
                    'action' => 'saveFilm',
                ]
            ],

        ];
        return $routes;
    }
}


?>