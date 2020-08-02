<?php 
namespace Apollo\Controller;

class Prenotazione {
    private $utenteTable;
    private $eventTable;
    private $prenotazioneTable;
    private $filmTable;
    private $authentication;


    public function __construct(\Framework\DatabaseTable $utenteTable, \Framework\DatabaseTable $eventTable, \Framework\DatabaseTable $prenotazioneTable, \Framework\DatabaseTable $filmTable, \Framework\Authentication $authentication) {
        $this->prenotazioneTable = $prenotazioneTable;
        $this->eventTable = $eventTable;
        $this->utenteTable = $utenteTable;
        $this->filmTable = $filmTable;
        $this->authentication = $authentication;
    }

    public function formPrenotazione() {
        $id_evento = $_GET['id_evento'];
        $title = 'prenotazione';
        $evento = $this->eventTable->findById($id_evento);
        $evento['film'] = $this->filmTable->findById($evento['id_film']);
        $utente = $this->authentication->getUser();
        return [
            'title' => $title,
            'templates' => [
                'template' => 'prenotazione_form.html.php',
            ],
            'variables' => [
                'evento' => $evento,
                'utente' => $utente,
            ],
        ];
    }

    public function prenotazioneProcess() {
        $prenotazione = $_POST['prenotazione'];
        $id_evento = $_GET['id_evento'];
        $evento = $this->eventTable->findById($id_evento);
        $utente = $this->authentication->getUser();
        if ($prenotazione['posti'] > 10) {
            $error = 'non è possibile prenotare più di 10 posti';
            $title = 'prenotazione';
            $evento['film'] = $this->filmTable->findById($evento['id_film']);
            return [
                'title' => $title,
                'templates' => [
                    'template' => 'prenotazione_form.html.php',
                ],
                'variables' => [
                    'evento' => $evento,
                    'utente' => $utente,
                    'error' => $error,
                ],
            ];
        } else {
            $prenotazione['id_evento'] = $evento['id_evento'];
            $prenotazione['id_utente'] = $utente['id_utente'];
            $this->prenotazioneTable->save($prenotazione);
            header('location: index.php');
        }
    }

    
}