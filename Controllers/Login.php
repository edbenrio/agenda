<?php
    class Login extends Controllers{
        public function __construct(){
            parent::__construct();
        }

        public function login(){
            $this->views->getView($this, "login");
        }

        public function cerrarSession(){
            require_once('Controllers/Session.php');
            $session = new Session();
            $session->logOut();
        }

        public function nuevaSession(){
            require_once('Controllers/Session.php');
            $session = new Session();
            $session->newSession($user);
        }
    }