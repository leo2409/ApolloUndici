<?php
namespace AD\Controller;

class Prenotazione {
    private $eventTable;
    private $filmTable;
    private $prenotazioneTable;
    private $utenteTable;

    public function __construct(\Framework\DatabaseTable $filmTable, \Framework\DatabaseTable $eventTable, \Framework\DatabaseTable $prenotazioneTable, \Framework\DatabaseTable $utenteTable) {
        $this->eventTable = $eventTable;
        $this->filmTable = $filmTable;
        $this->prenotazioneTable = $prenotazioneTable;
        $this->utenteTable = $utenteTable;
    }

    public function prenotazioneTable() {
        $title = 'prenotazione';
        $cordata = new \DateTime;
        $eventi = $this->eventTable->find('data',$cordata->format('Y-m-d'));
        foreach($eventi as $key_evento => $evento) {
            $eventi[$key_evento]['film'] = $this->filmTable->findById($evento['id_film']);
            $eventi[$key_evento]['prenotazioni'] = $this->prenotazioneTable->find('id_evento',$evento['id_evento']);
            $eventi[$key_evento]['occupati'] = 0;
            foreach ($eventi[$key_evento]['prenotazioni'] as $key_prenotazione => $prenotazione) {
                $eventi[$key_evento]['occupati'] += $eventi[$key_evento]['prenotazioni'][$key_prenotazione]['posti'];
                $eventi[$key_evento]['prenotazioni'][$key_prenotazione]['utente'] = $this->utenteTable->findById($eventi[$key_evento]['prenotazioni'][$key_prenotazione]['id_utente']);
            }
        }
        return [
            'title' => $title,

            'templates' => [
                'template' => 'table_prenotazioni.html.php',
            ],
            'variables' => [
                'eventi' => $eventi,
            ],
        ];
        
    }

    public function ajaxDeletePrenotazione() {
        $this->prenotazioneTable->remove($_GET['id_prenotazione']);
        $myJSON = json_encode('eliminato correttamente');
        echo $myJSON;
    }
}
?>