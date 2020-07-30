<?php 
namespace AD\Controller;

class Admin {
    private $filmTable;
    private $eventTable;

    public function __construct(\Framework\DatabaseTable $filmTable, \Framework\DatabaseTable $eventTable) {
        $this->filmTable = $filmTable;
        $this->eventTable = $eventTable;
    }

    public function home() {
        $title = 'admin';
        $films = $this->filmTable->findAll();
        $eventi = $this->eventTable->findAll();
        foreach ($eventi as $key => $evento) {
            $eventi[$key]['film'] = $this->filmTable->findById($evento['id_film']);
        }
        return [
            'title' => $title,
            'templates' => [
                'template' => 'home.html.php',
            ],
            'variables' => [
                'films' => $films,
                'eventi' => $eventi,
            ]
        ];

    }

    public function saveFilm() {

        $fields = $_POST['film'];

        if (!empty($_FILES["locandina"]['name'])) {
            $target_dir = "upload/";
            $target_file = $target_dir . basename($_FILES["locandina"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            move_uploaded_file($_FILES["locandina"]["tmp_name"], $target_file);
            $fields['locandina'] = $target_dir . $_FILES['locandina']['name'];
        }


        $this->filmTable->save($fields);

        header('location: ADAG.php');
    }

    public function filmEdit() {
        $title = 'edit film';

        if (isset($_GET['id_film'])) {
            $film = $this->filmTable->findById($_GET['id_film']);
            return [
                'title' => $title,
                'templates' => [
                    'template' => 'film_form.html.php',
                ],
                'variables' => [
                    'film' => $film,
                ]
            ];
        } else {
            return [
                'title' => $title,
                'templates' => [
                    'template' => 'film_form.html.php',
                ]
            ];
        }
    }

    public function deleteFilm() {
        $id = $_GET['id_film'];
        $this->filmTable->remove($id);
        header('location: ADAG.php');
    }

    public function eventEdit() {
        $title = 'edit event';

        if (isset($_GET['id_evento'])) {
            $event = $this->eventTable->findById($_GET['id_evento']);
            $film = $this->filmTable->findById($event['id_film']);
            return [
                'title' => $title,
                'templates' => [
                    'template' => 'event_form.html.php',
                ],
                'variables' => [
                    'evento' => $event,
                    'film' => $film,
                ]
            ];
        } else {
            return [
                'title' => $title,
                'templates' => [
                    'template' => 'live_search.html.php',
                ]
            ];
        }
    }

    public function deleteEvent() {
        $id = $_GET['id_evento'];
        $this->eventTable->remove($id);
        header('location: ADAG.php');
    }

    public function saveEvent() {
        $fields = $_POST['evento'];
        $this->eventTable->save($fields);
        header('location: ADAG.php');
    }

    public function findFilmById() {
        $id = $_GET['id'];
        $film = $this->filmTable->findById($id);
        return [
            'templates' => [
                'template' => 'event_form_new.html.php',
            ],
            'variables' => [
                'film' => $film,
            ]
        ];
    }
}
?>