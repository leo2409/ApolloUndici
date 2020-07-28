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

        return [
            'title' => $title,
            'templates' => [
                'template' => 'home.html.php',
            ],
            'variables' => [
                'films' => $films,
            ]
        ];

    }

    public function saveFilm() {
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES["locandina"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        move_uploaded_file($_FILES["locandina"]["tmp_name"], $target_file);

        $fields = $_POST['film'];

        $fields['locandina'] = $target_dir . $_FILES['locandina']['name'];


        $this->filmTable->save($fields);

        header('location: ADAG.php');
    }

    public function filmEdit() {
        $title = 'edit film';

        if (isset($_GET['id'])) {
            $film = $this->filmTable->findById($_GET['id']);
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
        $id = $_GET['id'];
        $this->filmTable->remove($id);
        header('location: ADAG.php');
    }

    public function eventEdit() {
        $title = 'edit event';
        return [
            'title' => $title,
            'templates' => [
                'template' => 'live_search.html.php',
            ]
        ];
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
                'template' => 'event_form.html.php',
            ],
            'variables' => [
                'film' => $film,
            ]
        ];
    }
}
?>