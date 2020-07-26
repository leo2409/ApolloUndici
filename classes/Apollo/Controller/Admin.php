<?php 
namespace Apollo\Controller;

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
                'template' => 'adform.html.php',
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
}
?>