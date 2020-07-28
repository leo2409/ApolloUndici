<?php
namespace AD;

class AdminRoutes implements \Framework\Interfaces\RoutesInterface{
    private $filmTable;
    private $eventTable;

    public function __construct() {
        include_once __DIR__ . '/../../includes/DatabaseConnection.php';
        $this->filmTable = new \Framework\DatabaseTable($pdo, 'apolloundici.film', 'id_film');
        $this->eventTable = new \Framework\DatabaseTable($pdo, 'apolloundici.evento', 'id_evento');
    }

    public function getRoute(): array {
        $adminController = new \AD\Controller\Admin( $this->filmTable, $this->eventTable);

        $routes = [
            #PROGRAMMAZIONE
            'home' => [
                'GET' => [
                    'controller' => $adminController,
                    'action' => 'home',
                ] 
            ],
            
            'liveSearch' => [
                'GET' => [
                    'controller' => $adminController,
                    'action' => 'liveSearch',
                ]
            ],

            'film/edit' => [
                'GET' => [
                    'controller' => $adminController,
                    'action' => 'filmEdit',
                ],

                'POST' => [
                    'controller' => $adminController,
                    'action' => 'saveFilm',
                ]
            ],

            'event/edit' => [
                'GET' => [
                    'controller' => $adminController,
                    'action' => 'eventEdit',
                ],

                'POST' => [
                    'controller' => $adminController,
                    'action' => 'saveEvent',
                ]
            ],

            'film/delete' => [
                'GET' => [
                    'controller' => $adminController,
                    'action' => 'deleteFilm',
                ]
            ],

            'find-film' => [
                'GET' => [
                    'controller' => $adminController,
                    'action' => 'findFilmById',
                ]
            ],

        ];
        return $routes;
    }
}


?>