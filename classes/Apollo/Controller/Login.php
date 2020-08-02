<?php 
namespace Apollo\Controller;

class Login {
    private $utenteTable;
    private $authentication;
    
    public function __construct(\Framework\DatabaseTable $utenteTable, \Framework\Authentication $authentication) {
        $this->utenteTable = $utenteTable;
        $this->authentication = $authentication;
    }

    public function loginForm() {
        $title = 'login';

        return [
            'title' => $title,
            'templates' => [
                'template' => 'login.html.php',
            ]
        ];
    }

    public function loginProcess() {
        $title = 'login';
        if ($this->authentication->login($_POST['email'],$_POST['password'])) {
           header('location: index.php');
        } else {
            return [
                'title'=> $title,
                'templates' => [
                    'template' => 'login.html.php',
                ],
                'variables' => [
                    'email' => $_POST['email'],
                    'error' => 'invalid email/password',
                ]
            ];
        }
        
    }
}

?>