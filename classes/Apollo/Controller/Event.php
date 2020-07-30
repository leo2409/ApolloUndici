<?php 
namespace Apollo\Controller;

class Event {
    private $filmTable;
    private $eventTable;

    public function __construct(\Framework\DatabaseTable $filmTable, \Framework\DatabaseTable $eventTable) {
        $this->filmTable = $filmTable;
        $this->eventTable = $eventTable;
    }

    public function home() {
        $title = 'Apollo Undici';
        $datatempo = new \DateTime();
        $sql = 'SELECT evento.data FROM evento GROUP BY evento.data ORDER by evento.data limit 5';
        $stmt = $this->eventTable->query($sql);
        $date = $stmt->fetchAll();
        foreach ($date as $key => $data) {
            $date[$key]['events'] = $this->eventTable->find('data',$data['data']);
            foreach ($date[$key]['events'] as $key2 => $event) {
                $date[$key]['events'][$key2]['film'] = $this->filmTable->findById($event['id_film']);
            }
        }
        return [
            'title' => $title,
            'templates' => [
                'template' => 'home.html.php',
            ],
            'variables' => [
                'date' => $date,
            ],
        ];

    }
}
?>