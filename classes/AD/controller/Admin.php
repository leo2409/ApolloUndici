<?php 
namespace AD\Controller;

class Admin {
    private $filmTable;
    private $eventTable;

    public function __construct(\Framework\DatabaseTable $filmTable, \Framework\DatabaseTable $eventTable) {
        $this->filmTable = $filmTable;
        $this->eventTable = $eventTable;
    }
    //GLI PASSI UNA FOTO E UNA QUALITA' DI COMPRESSIONE E METTE IN UPLOAD CARTELLA DUE FILE UNO WEBP E UN'ALTRO JPEG (sicuro webp per safari jpeg 2000 e jpeg?? (3!!!)) (FA UNA SCALA???) (SI PERCHE' GESTISCO SOLO LOCANDINE)
    //DEVE GESTIRE I FORMATI PIU' COMUNI 
    private function upload_image($file, $name, $new_width, $compression_quality = 80) {

        // controllo se la locandine già esiste
        $output_file = 'upload/' . $name;
        if (file_exists($output_file . '.webp')) {
            return [
                'esito' => false,
                'errore' => 'la locandina è gia presente nel server',
            ];
        }

        // recupero il formato
        $file_type = $file['type'];
        echo $file_type;

        //file temp
        $temp_file = $file['tmp_name'];

        // creo l'immagine in base al formato
        
        switch ($file_type) {
            case 'image/jpeg':
            case 'image/jpg':
                $image = imagecreatefromjpeg($temp_file);
                break;

            case 'image/png':
                $image = imagecreatefrompng($temp_file);
                imagepalettetotruecolor($image);
                imagealphablending($image, true);
                imagesavealpha($image, true);
                break;

            case 'image/gif':
                $image = imagecreatefromgif($temp_file);
                break;
            default:
                return [
                    'esito' => false,
                    'errore' => 'formato locandina non supportato (supportati: jpeg, png, gif)',
                ];
        }
        

        //resize foto
        list($width, $height) = getimagesize($temp_file);
        $ratio = $width / $height;
        $new_height = $new_width/$ratio;
        $image_scaled = imagescale($image , $new_width , $new_height ,IMG_BILINEAR_FIXED);
        if ($image_scaled == false) {
            return [
                'esito' => false,
                'errore' => 'impossibile modificare scala immagine',
            ];
        }


        // converto l'immagine in webp
        $result_webp = imagewebp($image_scaled, $output_file . '.webp', $compression_quality);
        $result_jpeg = imagejpeg($image_scaled, $output_file . '.jpeg', $compression_quality);
        if ($result_jpeg === false and $result_webp === false) {
            return [
                'esito' => false,
                'errore' => 'impossibile convertire la locandina nel formato',
            ];
        }
        // libero memoria 
        imagedestroy($image);
        imagedestroy($image_scaled);
        
    }

    public function home() {
        $title = 'admin';
        $films = $this->filmTable->findAll(3);
        $eventi = $this->eventTable->findAll(3);
        foreach ($eventi as $key => $evento) {
            $eventi[$key]['film'] = $this->filmTable->findById($evento['id_film']);
            $datatempo = new \DateTime($eventi[$key]['data']);
            $eventi[$key]['data'] = $datatempo->format('l, d-M');
            $datatempo = new \DateTime($eventi[$key]['orario']);
            $eventi[$key]['orario'] = $datatempo->format('H:m');
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
        $eventi = $_POST['eventi'];
        
        $fields = $_POST['film'];

        if (!empty($_FILES["locandina"]['name'])) {
            $name = $_POST['film']['titolo'];
            $esito = $this->upload_image($_FILES['locandina'], $name, 300, 80);
            $target_dir = "upload/";
            $fields['locandina'] = $target_dir . $_POST['film']['titolo'];
        }


        $id_film = $this->filmTable->save($fields);
        foreach ($eventi as $evento) {
            $evento['id_film'] = $id_film;
            $evento['descrizione'] = $fields['descrizione'];
            $this->eventTable->save($evento);
        }

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

    public function allFilm() {
        $title = 'Films';
        $films = $this->filmTable->findAll();
        return [
            'title' => $title,
            'templates' => [
                'template' => 'tutti_film.html.php',
            ],
            'variables' => [
                'films' => $films,
            ]
        ];
    }

    public function ajaxFilmSearch() {
        $stringa = $_GET['s'];
    
        $films = $this->filmTable->findByInitials($stringa,'titolo');
        if (!isset($films[0])) {
            echo '<p>no result</p>';
        } else {
            foreach ($films as $film) {
                echo '<button class="search-result" id="' . $film['id_film'] . '" onclick="inserisciDati(' . $film['id_film'] . ')">' . $film['titolo'] . '</button>';
            }
        }
        
    }
}
?>