<?php
# probabilemnte questa classe è inutile
# forse si può utilizzare un altro metodo in AdminRoutes (getAjaxRoute()) o anche sesnsa

namespace AD;

class AjaxRoutes implements \Framework\Interfaces\RoutesInterface{
    private $filmTable;
    private $eventTable;
    private $adminTable;
    private $authentication;
    private $utenteTable;

    public function __construct() {
        include_once __DIR__ . '/../../includes/DatabaseConnection.php';
        $this->filmTable = new \Framework\DatabaseTable($pdo, 'apolloundici.film', 'id_film');
        $this->eventTable = new \Framework\DatabaseTable($pdo, 'apolloundici.evento', 'id_evento');
        $this->adminTable = new \Framework\DatabaseTable($pdo, 'apolloundici.amministratore', 'id_amministratore');
        $this->prenotazioneTable = new \Framework\DatabaseTable($pdo, 'apolloundici.prenotazione', 'id_prenotazione');
        $this->utenteTable = new \Framework\DatabaseTable($pdo, 'apolloundici.utente', 'id_utente');
        $this->authentication = new \Framework\Authentication($this->adminTable, 'username', 'password', 'adminUser', 'adminPassword');
    }

    public function getRoute(): array {
        $adminController = new \AD\Controller\Admin( $this->filmTable, $this->eventTable);
        $loginController = new \AD\Controller\Login( $this->adminTable, $this->authentication);
        $prenotazioneController = new \AD\Controller\Prenotazione($this->filmTable, $this->eventTable, $this->prenotazioneTable, $this->utenteTable);

        $routes = [

            'ajaxFilmSearch' => [
                'GET' => [
                    'controller' => $adminController,
                    'action' => 'ajaxFilmSearch',
                ],

                'login' => true,
            ],

            'prenotazione/elimina' => [
                'GET' => [
                    'controller' => $prenotazioneController,
                    'action' => 'ajaxDeletePrenotazione',
                ],

                'login' => true,
            ],

        ];
        return $routes;
    }

    public function getAuthentication(): \Framework\Authentication{
        return $this->authentication;
    }

}


?>