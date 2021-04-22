<?php
namespace Framework;

class Authentication {
    private $users;
    private $usernameColumn;
    private $passwordColumn;
    private $sessionUsername;
    private $sessionPassword;

    public function __construct(DatabaseTable $users, $usernameColumn, $passwordColumn, $sessionUsername = 'username', $sessionPassword = 'password') {
        session_start();
        $this->users = $users;
        $this->usernameColumn = $usernameColumn;
        $this->passwordColumn = $passwordColumn;
        $this->sessionUsername = $sessionUsername;
        $this->sessionPassword = $sessionPassword;
    }

    public function login($username, $password) {
        $user = $this->users->find($this->usernameColumn, strtolower($username));
        if (!empty($user) && password_verify($password, $user[0][$this->passwordColumn])) {
            session_regenerate_id();
            $_SESSION[$this->sessionUsername] = $username;
            $_SESSION[$this->sessionPassword] = $user[0][$this->passwordColumn];
            return true;
        } else {
            return false;
        }
    }

    public function isLoggedIn() {
        if (empty($_SESSION[$this->sessionUsername])) {
            return false;
        }

        $user = $this->users->find($this->usernameColumn,strtolower($_SESSION[$this->sessionUsername]));
        if (!empty($user) && $user[0][$this->passwordColumn] === $_SESSION[$this->sessionPassword]) {
            return true;
        } else {
            return false;
        }
    }

    public function getUser() {
        if ($this->isLoggedIn()) {
            return $this->users->find($this->usernameColumn, strtolower($_SESSION[$this->sessionUsername]))[0];
        } else {
            return false;
        }
    }

}
?>