<?php 
namespace AD\Controller;

class Login {
    private $adminTable;
    private $authentication;
    
    public function __construct(\Framework\DatabaseTable $adminTable, \Framework\Authentication $authentication) {
        $this->adminTable = $adminTable;
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
        if ($this->authentication->login($_POST['username'],$_POST['password'])) {
           header('location: ADAG.php');
        } else {
            return [
                'title'=> $title,
                'templates' => [
                    'template' => 'login.html.php',
                ],
                'variables' => [
                    'error' => 'invalid email/password',
                ]
            ];
        }
        
    }
}

?>