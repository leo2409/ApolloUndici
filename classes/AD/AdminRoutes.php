<?php
namespace AD;

class AdminRoutes implements \Framework\Interfaces\RoutesInterface{
    private $filmTable;
    private $eventTable;
    private $adminTable;
    private $authentication;

    public function __construct() {
        include_once __DIR__ . '/../../includes/DatabaseConnection.php';
        $this->filmTable = new \Framework\DatabaseTable($pdo, 'apolloundici.film', 'id_film');
        $this->eventTable = new \Framework\DatabaseTable($pdo, 'apolloundici.evento', 'id_evento');
        $this->adminTable = new \Framework\DatabaseTable($pdo, 'apolloundici.amministratore', 'id_amministratore');
        $this->authentication = new \Framework\Authentication($this->adminTable, 'username', 'password');
    }

    public function getRoute(): array {
        $adminController = new \AD\Controller\Admin( $this->filmTable, $this->eventTable);
        $loginController = new \AD\Controller\Login( $this->adminTable, $this->authentication);

        $routes = [
            #PROGRAMMAZIONE
            'home' => [
                'GET' => [
                    'controller' => $adminController,
                    'action' => 'home',
                ],
                
                'login' => true,
            ],

            'login' => [
                'GET' => [
                    'controller' => $loginController,
                    'action' => 'loginForm'
                ],

                'POST' => [
                    'controller' => $loginController,
                    'action' => 'loginProcess',
                ]
            ],
            
            'liveSearch' => [
                'GET' => [
                    'controller' => $adminController,
                    'action' => 'liveSearch',
                ],
                
                'login' => true,
            ],

            'film/edit' => [
                'GET' => [
                    'controller' => $adminController,
                    'action' => 'filmEdit',
                ],

                'POST' => [
                    'controller' => $adminController,
                    'action' => 'saveFilm',
                ],
                
                'login' => true,
            ],

            'event/edit' => [
                'GET' => [
                    'controller' => $adminController,
                    'action' => 'eventEdit',
                ],

                'POST' => [
                    'controller' => $adminController,
                    'action' => 'saveEvent',
                ],
                
                'login' => true,
            ],

            'film/delete' => [
                'GET' => [
                    'controller' => $adminController,
                    'action' => 'deleteFilm',
                ],
                
                'login' => true,
            ],

            'event/delete' => [
                'GET' => [
                    'controller' => $adminController,
                    'action' => 'deleteEvent',
                ],
                
                'login' => true,
            ],

            'find-film' => [
                'GET' => [
                    'controller' => $adminController,
                    'action' => 'findFilmById',
                ],
                
                'login' => true,
            ],

        ];
        return $routes;
    }

    public function getAuthentication(): \Framework\Authentication{
        return $this->authentication;
    }
    
    public function redirect() {
        header('location: ADAG.php?route=login');
    }

}


?>