<?php 
namespace Apollo\Controller;

class Register {
    private $utenteTable;
    
    public function __construct(\Framework\DatabaseTable $utenteTable) {
        $this->utenteTable = $utenteTable;
    }

    public function registerForm() {
        $title = 'Register';

        return [
            'title' => $title,
            'templates' => [
                'template' => 'register_form.html.php',
            ]
        ];
    }

    public function registerProcess() {

        $user = $_POST['user'];
        $error = [];
        $valid = true;
        if (empty($user['nome'])) {
            $valid = false;
            $error[] = 'name cannot be blank';
        }
        if (empty($user['cognome'])) {
            $valid = false;
            $error[] = 'lastname cannot be blank';
        }
        if (empty($user['email'])) {
            $valid = false;
            $error[] = 'email cannot be blank';
        } else if (filter_var($user['email'],FILTER_VALIDATE_EMAIL) == false) {
            $valid = false;
            $error[] = 'invalid email address';
        } else {
            $user['email'] = strtolower($user['email']);
            $res = $this->utenteTable->find('email', $user['email']);
            if (count($res) > 0) {
                $valid = false;
                $error[] = 'that email address is already registered';
            }
        }
        if (empty($user['password'])) {
            $valid = false;
            $error[] = 'password cannot be blank';
        }

        if ($valid == true) {
            $user['password'] = password_hash($user['password'], PASSWORD_DEFAULT);
            $this->utenteTable->save($user);
            header('location: index.php?route=register/success');
        } else {
            return [
                'templates' => [  
                    'template' => 'register_form.html.php',
                ],
                'title' => 'Register an account',
                'variables' => [
                    'errors' => $error,
                    'user' => $user,
                ]
            ];
        }
    }
}

?>