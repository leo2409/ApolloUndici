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
        return [
            'title' => $title,
            'templates' => [
                'template' => 'home.html.php',
            ],
            'variables' => [
                'prova' => $datatempo->format('Y-m-d H:i:s'),
            ],
        ];

    }
}
?>