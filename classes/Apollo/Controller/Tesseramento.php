<?php 
namespace Apollo\Controller;

class Tesseramento {
    private $socioTable;
    private $authentication;
    
    public function __construct(\Framework\DatabaseTable $socioTable, \Framework\Authentication $authentication) {
        $this->socioTable = $socioTable;
        $this->authentication = $authentication;
    }

    public function tesseramentoInfo() {
        $title = 'Modulo Tesseramento';


        return [
            'title' => $title,
            'templates' => [
                'template' => 'tesseramento_info.html.php',
            ],

            /*
            'variables' => [
                'id_evento' => $_GET['id_evento'],
            ]
            */
        ];
    }

    public function tesseramentoForm() {
        $title = 'Info Tesseramento';

        return [
            'title' => $title,
            'templates' => [
                'template' => 'tesseramento_form.html.php',
            ],
        ];
    }

    public function tesseramentoProcess() {
        $socio = $_POST['socio'];
        //controlli campi
        $error = [];
        $valid = true;
        if (empty($socio['nome'])) {
            $valid = false;
            $error[] = 'name cannot be blank';
        }
        if (empty($socio['cognome'])) {
            $valid = false;
            $error[] = 'lastname cannot be blank';
        }
        if (empty($socio['email'])) {
            $valid = false;
            $error[] = 'email cannot be blank';
        } else if (filter_var($socio['email'],FILTER_VALIDATE_EMAIL) == false) {
            $valid = false;
            $error[] = 'invalid email address';
        } else {
            $socio['email'] = strtolower($socio['email']);
            $res = $this->socioTable->find('email', $socio['email']);
            if (count($res) > 0) {
                $valid = false;
                $error[] = 'that email address is already registered';
            }
        }
        if (empty($socio['luogo_nascita']) or empty($socio['data_nascita']) or empty($socio['indirizzo']) or empty($socio['cap'])) {
            $valid = false;
            $error[] = 'i campi non posso essere vuoi';
        }
        if ($_POST['newsletter'] == false) {
            $valid = false;
            $error[] = 'si deve accettare la newsletter';
        }

        if ($valid == true) {
            $this->socioTable->save($socio);
            $title = 'tesseramento';
            return [
                'title' => $title,
                'templates' => [
                    'template' => 'tesseramento_success.html.php',
                ],
            ];
        } else {
            $title = 'Info Tesseramento';
            return [
                'title' => $title,
                'templates' => [
                    'template' => 'tesseramento_form.html.php',
                ],
                'variables' => [
                    'errors' => $error,
                    'socio' => $socio,
                ]
            ];
        }
    }

    /*
    public function loginForm() {
        $title = 'login';

        return [
            'title' => $title,
            'templates' => [
                'template' => 'login.html.php',
            ],
            'variables' => [
                'id_evento' => $_GET['id_evento'],
            ]
        ];
    }

    public function loginProcess() {
        $title = 'login';
        if ($this->authentication->login($_POST['email'],$_POST['password'])) {
            if (isset($_POST['id_evento'])) {
                $url = 'index.php?route=prenota&id_evento=' .  $_POST['id_evento'];
                header('location: ' . $url);
            } else {
                header('location: index.php');
            }
        } else {
            return [
                'title'=> $title,
                'templates' => [
                    'template' => 'login.html.php',
                ],
                'variables' => [
                    'email' => $_POST['email'],
                    'error' => 'invalid email/password',
                    'id_evento' => $_POST['id_evento'],
                ]
            ];
        }
        
    }
    */
}

?>