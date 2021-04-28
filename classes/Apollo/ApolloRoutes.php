<?php
namespace Apollo;

class ApolloRoutes implements \Framework\Interfaces\RoutesInterface{
    private $filmTable;
    private $eventTable;
    private $prenotazioneTable;
    private $utenteTable;
    private $authentication;

    public function __construct() {
        include_once __DIR__ . '/../../includes/DatabaseConnection.php';
        $this->filmTable = new \Framework\DatabaseTable($pdo, 'apolloundici.film', 'id_film');
        $this->eventTable = new \Framework\DatabaseTable($pdo, 'apolloundici.evento', 'id_evento');
        $this->utenteTable = new \Framework\DatabaseTable($pdo, 'apolloundici.utente', 'id_utente');
        $this->prenotazioneTable = new \Framework\DatabaseTable($pdo, 'apolloundici.prenotazione', 'id_prenotazione');
        $this->authentication = new \Framework\Authentication($this->utenteTable, 'email', 'password','username','password');
    }

    public function getRoute(): array {
        $eventController = new \Apollo\Controller\Event( $this->filmTable, $this->eventTable);
        $prenotazioneController = new \Apollo\Controller\Prenotazione( $this->utenteTable, $this->eventTable, $this->prenotazioneTable, $this->filmTable, $this->authentication);
        $loginController = new \Apollo\Controller\Login( $this->utenteTable, $this->authentication);
        $registerController = new \Apollo\Controller\Register($this->utenteTable);
        $tesseramentoController = new \Apollo\Controller\Tesseramento($this->utenteTable, $this->authentication);

        $routes = [
            #PROGRAMMAZIONE
            'home' => [
                'GET' => [
                    'controller' => $eventController,
                    'action' => 'home',
                ]
            ],

            'tesseramento/info' => [
                'GET' => [
                    'controller' => $tesseramentoController,
                    'action' => 'tesseramentoInfo',
                ],
            ],

            'tesseramento/modulo' => [
                'GET' => [
                    'controller' => $tesseramentoController,
                    'action' => 'tesseramentoForm',
                ],
            ],

            'prenota' => [
                'GET' => [
                    'controller' => $prenotazioneController,
                    'action' => 'formPrenotazione',
                ], 

                'POST' => [
                    'controller' => $prenotazioneController,
                    'action' => 'prenotazioneProcess',
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

            'register' => [
                'GET' => [
                    'controller' => $registerController,
                    'action' => 'registerForm',
                ],

                'POST' => [
                    'controller' => $registerController,
                    'action' => 'registerProcess',
                ]
            ],

            'register/success' => [
                'GET' => [
                    'controller' => $registerController,
                    'action' => 'registerSuccess',
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
        if (isset($_GET['id_evento'])) {
            header('location: index.php?route=login&id_evento=' . $_GET['id_evento']);
        } else {
            header('location: index.php?route=login');
        }
        
    }
}


?>