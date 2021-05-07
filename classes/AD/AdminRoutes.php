<?php
namespace AD;

class AdminRoutes implements \Framework\Interfaces\RoutesInterface{
    private $filmTable;
    private $eventTable;
    private $adminTable;
    private $authentication;
    private $utenteTable;
    private $socioTable;
    

    public function __construct() {
        include_once __DIR__ . '/../../includes/DatabaseConnection.php';
        $this->filmTable = new \Framework\DatabaseTable($pdo, 'apolloundici.film', 'id_film');
        $this->eventTable = new \Framework\DatabaseTable($pdo, 'apolloundici.evento', 'id_evento');
        $this->adminTable = new \Framework\DatabaseTable($pdo, 'apolloundici.amministratore', 'id_amministratore');
        $this->prenotazioneTable = new \Framework\DatabaseTable($pdo, 'apolloundici.prenotazione', 'id_prenotazione');
        $this->utenteTable = new \Framework\DatabaseTable($pdo, 'apolloundici.utente', 'id_utente');
        $this->socioTable = new \Framework\DatabaseTable($pdo, 'apolloundici.socio', 'id_socio');
        $this->authentication = new \Framework\Authentication($this->adminTable, 'username', 'password', 'adminUser', 'adminPassword');
    }

    public function getRoute(): array {
        $adminController = new \AD\Controller\Admin( $this->filmTable, $this->eventTable);
        $loginController = new \AD\Controller\Login( $this->adminTable, $this->authentication);
        $prenotazioneController = new \AD\Controller\Prenotazione($this->filmTable, $this->eventTable, $this->prenotazioneTable, $this->utenteTable);
        $tessereController = new \AD\Controller\Tessere( $this->socioTable);

        $routes = [
            #PROGRAMMAZIONE
            'home' => [
                'GET' => [
                    'controller' => $adminController,
                    'action' => 'home',
                ],
                
                'login' => true,
            ],

            # login
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

            'soci' => [
                'GET' => [
                    'controller' => $tessereController,
                    'action' => 'soci',
                ],

                'login' => true,
            ],

            'soci/ricerca' => [
                'GET' => [
                    'controller' => $tessereController,
                    'action' => 'searchSoci'
                ],

                'login' => true,
            ],
            
            # ricerca film
            'liveSearch' => [
                'GET' => [
                    'controller' => $adminController,
                    'action' => 'liveSearch',
                ],
                
                'login' => true,
            ],

            # modifica film
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

            'film/all' => [
                'GET' => [
                    'controller' => $adminController,
                    'action' => 'allFilm',
                ],

                'login' => true,

            ],

            'prenotazioni' => [
                'GET' => [
                    'controller' => $prenotazioneController,
                    'action' => 'prenotazioneTable', 
                ],

                'login' => true,
            ],

            'prenotazione/modifica' => [
                'GET' => [
                    'controller' => $prenotazioneController,
                    'action' => 'edit',
                ],

                'login' => true,
            ],

            'prenotazione/elimina' => [
                'GET' => [
                    'controller' => $prenotazioneController,
                    'action' => 'deletePrenotazione',
                ],

                'login' => true,
            ]



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