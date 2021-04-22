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
        $cordata = new \DateTime;
        $parameters = [
            ':datacor' => $cordata->format('Y-m-d'),
        ];
        $sql = 'SELECT evento.data FROM evento WHERE evento.data >= :datacor GROUP BY evento.data ORDER by evento.data, evento.orario limit 5';
        $stmt = $this->eventTable->query($sql, $parameters);
        $date = $stmt->fetchAll();
        foreach ($date as $key => $data) {
            $date[$key]['events'] = $this->eventTable->find('data',$data['data']);
            $datatempo = new \DateTime($date[$key]['data']);
            $date[$key]['data'] = $datatempo->format('l, d-M');
            foreach ($date[$key]['events'] as $key2 => $event) {
                $date[$key]['events'][$key2]['film'] = $this->filmTable->findById($event['id_film']);
                $datatempo = new \DateTime($date[$key]['events'][$key2]['orario']);
                $date[$key]['events'][$key2]['orario'] = $datatempo->format('H:m');
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